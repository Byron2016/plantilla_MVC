<?php 

abstract class Controller
{
	protected $_view;
    protected $_acl;
    protected $_request;
	
	public function __construct()
	{
        $this->_acl = new ACL();
        //echo "en controller", exit;
        $this->_request = new Request();
		$this->_view = new View($this->_request, $this->_acl);
	}

	abstract public function index();

    protected function loadModel($modelo, $modulo = false) 
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'models' . DS . $modelo . '.php';
        //echo $rutaModelo;
        if(!$modulo){
            $modulo = $this->_request->getModulo();
        }
        if($modulo){
            if($modulo != 'default'){
                
                $rutaModelo = ROOT . 'modules' . DS . $modulo . DS . 'models' . DS . $modelo .  '.php'; 
            }
        }

        if (is_readable($rutaModelo))
        {
            //echo 'si es legible';
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else 
        {
            throw new Exception('Error en Controler: Error de modelo función LoadMOdel');
        
        }
    }

    protected function getLibrary($libreria,$dirInterno)
    {
        $rutaLibreria = ROOT . 'libs' . DS . $dirInterno . DS . $libreria . '.php';
        
        if (is_readable($rutaLibreria))
        {
            require_once $rutaLibreria;
            
        }
        else 
        {
            throw new Exception('Error en Controler getLibrary: Error de libreria');
        }
        
    }

    protected function getTexto($clave) 
    {
        //toma variable enviada por post, la filtra y la retorna
        if(isset($_POST[$clave]) && !empty($_POST[$clave]))
        {
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }
        
        return '';
    }

    protected function getInt($clave) 
    {
        //toma variable enviada or post y la filtra y retoran entero
        if(isset($_POST[$clave]) && !empty($_POST[$clave]))
        {
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }
        
        return 0;
    }

    protected function redireccionar($ruta = FALSE)
    {
        if($ruta)
        {
            header('location:' . BASE_URL . $ruta);
            exit();
        }
        else
        {
            header('location:' . BASE_URL);
            exit();
        }
    }

    protected function filtrarInt($int)
    {
        //valida el int quero llega por url.
        $int = (int) $int;
        
        if(is_int($int)){
            return $int;
        }
        else{
            return 0;
        }
    }

    protected function getPostParam($clave)
    {
        if(isset($_POST[$clave])){
            return $_POST[$clave];
        }
    }   

    protected function getSql($clave)
    {
        //limpia los stringtags
        //sanitizar password
        
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = strip_tags($_POST[$clave]);
            
            if(!get_magic_quotes_gpc()){
                //$_POST[$clave] = mysql_escape_string($_POST[$clave]);
                
            }
            return trim($_POST[$clave]);
        }
    }
    
    protected function getAlphaNum($clave)
    {
        //solo acepta 0 9 a z y andrescords.
        //sanitizar nombre usuario

        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
        
    }

    public function validarEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
                return FALSE;
        }
        
        return true;
    }

}
