<?php

class indexController extends usuariosController
{
	private $_usuarios;

	public function __construct(){
		parent::__construct();
		$this->_usuarios =  $this->loadModel('index');
	}
	public function index()
	{
		if(USAR_SMARTY == '1'){
			$this->_view->setJs(array('prueba'));
			$this->_view->assign('titulo', 'Usuarios');
			$this->_view->assign('usuarios', $this->_usuarios->getUsuarios());
		} else {
			$this->_view->titulo = 'Usuarios';
			//$this->_view->usuarios = this->_usuarios->getUsuarios();
		}
		
		$this->_view->renderizar('index');
	}

	public function permisos($usuarioID)
	{
		//echo 'entro';
		$id = $this->filtrarInt($usuarioID);
		if(!$id){
			//echo '1entro';
			//exit;
			$this->redireccionar('usuarios');
		}
		//echo '2entro';
		//exit;

		//validar si se enviaron datos vía post. mismo de aclControler PermisoRole
		if($this->getInt('guardar') == 1){

			//echo 'entro guardar1' . '<br>';
			$values = array_keys($_POST);
			$replace = array();
			$eliminar = array();
			//var_dump($values );
			//var_dump($_POST);

			for($i = 0; $i < count($values); $i++){
				//echo 'a_'.$i. '<br>';
				if(substr($values[$i],0,5) == 'perm_'){
					$permiso = (strlen($values[$i]) - 5);
					//echo 'en if_ VALOR PERMISO'. $permiso . ' vALOR I ' .$i. '<br>';
					//OJO: cuando valor está len x el permiso es heredado del rol.
					if($_POST[$values[$i]] == 'x'){
						$eliminar[] = array(
							'usuario' => $id,
							'permiso' => substr($values[$i], -1)

							);
					}
					else {
						if($_POST[$values[$i]] == 1){
							$v = 1;
						}
						else {
							$v = 0;
						}

						$replace[] = array(
							'usuario' => $id,
							'permiso' => substr($values[$i], - $permiso),
							'valor' => $v

							);
					}
				}
			}

			//echo 'f1' . '<br>';
			for($i = 0; $i <count($eliminar); $i++){
				//echo '1' . '<br>';
				$this->_usuarios->eliminarPermiso(
					$eliminar[$i]['usuario'], 
					$eliminar[$i]['permiso']);
			}

			for($i = 0; $i <count($replace); $i++){
				$this->_usuarios->editarPermiso(
					$replace[$i]['usuario'], 
					$replace[$i]['permiso'],
					$replace[$i]['valor']);
			}

		}

		$permisosUsuario = $this->_usuarios->getPermisosUsuario($id); //echo "a1";
		//var_dump($permisosUsuario);exit;
		$permisosRole = $this->_usuarios->getPermisosRole($id); //echo "a2";

		if(!$permisosUsuario || !$permisosRole){
			//echo "entro al if1"; //exit;
			$this->redireccionar('usuarios');

		} //echo "entro al ifq";// exit;
		//var_dump(array_keys($permisosUsuario));
		//var_dump($permisosUsuario);//exit;
		$usurioConsulta = $this->_usuarios->getUsuario($id);

		if(USAR_SMARTY == '1'){
			$this->_view->assign('titulo', 'Permisos de Usuario');
			$this->_view->assign('permisos', array_keys($permisosUsuario));
			$this->_view->assign('usuario', $permisosUsuario);
			$this->_view->assign('role', $permisosRole);
			//$this->_view->assign('infoa', $this->_usuarios->getUsuario($id));
			$this->_view->assign('infoa', $usurioConsulta);
			//var_dump($this->_usuarios->getUsuario($id)); //exit;
			//var_dump($usurioConsulta);
		} else {
			$this->_view->titulo = 'perm';
			//$this->_view->usuarios = this->_usuarios->getUsuarios();
		}

		$this->_view->renderizar('permisos');
	}
}