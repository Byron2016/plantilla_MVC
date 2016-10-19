<?php

class registroController extends Controller
{
	
	private $_registro;

	public function __construct()
	{
		parent::__construct();
		$this->_registro = $this->loadModel('registro');
	}

	public function index()
	{
		if (Session::get('autenticado')) {
			$this->redireccionar();
		}

		$this->_view->titulo = 'Registro';
		
		if ($this->getInt('enviar') == 1) 
		{
			$this->_view->datos = $_POST;

			if (!$this->getSql('nombre')) 
			{
				$this->_view->_error = "Debe introducir su nombre";
				$this->_view->renderizar('index', 'registro');
				exit;
			}

			if (!$this->getAlphaNum('usuario')) 
			{
				$this->_view->_error = "Debe introducir su nombre de usuario";
				$this->_view->renderizar('index', 'registro');
				exit;
			}

			if ($this->_registro->verificarUsuario($this->getAlphaNum('usuario'))) 
			{
				$this->_view->_error = "El usuario " . $this->getAlphaNum('usuario') . " ya existe";
				$this->_view->renderizar('index', 'registro');
				exit;
			}

			if (!$this->validarEmail($this->getPostParam('email'))) 
			{
				$this->_view->_error = "La direccion de email es inv&aacute;ida";
				$this->_view->renderizar('index', 'registro');
				exit;
			}

			if ($this->_registro->verificarEmail($this->getPostParam('email'))) 
			{
				$this->_view->_error = "Esta direccion de correo ya esta registrada";
				$this->_view->renderizar('index', 'registro');
				exit;
			}

			if (!$this->getSql('pass')) 
			{
				$this->_view->_error = "Debe introducir un password";
				$this->_view->renderizar('index', 'registro');
				exit;
			}

			if ($this->getPostParam('pass') != $this->getPostParam('confirmar')) 
			{
				$this->_view->_error = "Los passwords no coinciden";
				$this->_view->renderizar('index', 'registro');
				exit;
			}

			$this->getLibrary('class.phpmailer','phpMailer');
			$mail = new PHPMailer();

			$this->_registro->registrarUsuario(
					$this->getSql('nombre'),
					$this->getAlphaNum('usuario'),
					$this->getSql('pass'),
					$this->getPostParam('email')
					);

			//vuelve a verificar si usaurio existe

			$usuario = $this->_registro->verificarUsuario($this->getAlphaNum('usuario'));
			


			if (!$usuario) 
			{
				$this->_view->_error = "Error al registrar el usuario1";
				$this->_view->renderizar('index', 'registro');
				exit;
			}

			$body = 'Hola <strong>' . $this->getSql('nombre') . 
			', </strong>,' . '<p>Se ha registrado en www.xxx para activar su cuenta' . 
			'<a href="' . BASE_URL.'REGISTRO/ACTIVAR/' .  $usuario['id'] . '/' . $usuario['codigo'] . 
			'"> Presione para Activar</p>' ;

			//echo $body;

			$mail->From = 'plantilla_mvc.net/';
			$mail->FromName = 'tutoria';
			$mail->subject = 'Activacion cuenta';
			$mail->body= 'Hola <strong>' . $this->getSql('nombre') . ', </strong>,' . '<p>Se ha registrado en www.xxx para activar' . '<a href="' . BASE_URL.'REGISTRO/ACTIVAR/' .  $usuario['id'] . '/' . $usuario['codigo'] . '">' . BASE_URL.'REGISTRO/ACTIVAR/' .  $usuario['id'] . '/' . $usuario['codigo'] . '</p>' ;

			$mail->altBody = 'Su servidor de correo no soporta html';
			$mail->addAddress($this->getPostParam('email'));
			$mail->send();

			$this->_view->datos = false;
			//$this->_view->_mensaje = "Registro Completado";
			$this->_view->_mensaje = "Revise su mail para activar su cuenta " . $body;


		}
		$this->_view->renderizar('index', 'Registro');
	}

	public function activar($id, $codigo)
	{
		if(!$this->filtrarInt($id) || !$this->filtrarInt($codigo))
		{

			$this->_view->_error = "Esta cuenta no existe";
				$this->_view->renderizar('activar', 'registro');
				exit;
		}

		$row = $this->_registro->getUsuario(
			$this->filtrarInt($id),
			$this->filtrarInt($codigo));

		//print_r($row);

		if($row['estado'] == 1)
		{

			$this->_view->_error = "Esta cuenta ya ha sido activada";
				$this->_view->renderizar('activar', 'registro');
				exit;
		}

		$this->_registro->activarUsuario($this->filtrarInt($id),$this->filtrarInt($codigo));

		$row = $this->_registro->getUsuario(
			$this->filtrarInt($id),
			$this->filtrarInt($codigo));

		//print_r($row);

		if($row['estado'] == 0)
		{

			$this->_view->_error = "Error al activar la cuenta, por favor intente más tarde";
				$this->_view->renderizar('activar', 'registro');
				exit;
		}

		$this->_view->_mensaje = "su cuenta activada con éxito";
		$this->_view->renderizar('activar', 'registro');


	}
}
?>