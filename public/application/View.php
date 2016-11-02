<?php 

if (SMARTY_PRUEBA == '1') { 
	if (!class_exists('Smarty')) { 
    	include SMARTY_DIR_L . 'Smarty.class.php'; 
    	$smarty = new Smarty();
    	// debugging... 
    	$smarty->testInstall();exit;
	}else {
		require_once SMARTY_DIR_L . 'Smarty.class.php';
	}
} else {
	require_once SMARTY_DIR_L . 'Smarty.class.php';
}

/*
Para quitar smarty, comentar: extends Smarty y en constructor el parent::__construct();
Ademas en config poner 0 en usar smarty.

*/
class View extends Smarty
{
	private $_controlador;
	private $_js;
	private $_acl;

	public function __construct(Request $peticion, Acl $_acl)
	{
		parent::__construct();

		$this->_controlador = $peticion->getControlador();
		$this->_js = array();
		$this->_acl = $_acl;
	}

	public function renderizar($vista, $item = false)
	{

		if(USAR_SMARTY == '1'){
            $this->template_dir = ROOT . 'views' . DS . 'layout' .DS . DEFAULT_LAYOUT . DS;

			$this->config_dir = ROOT . 'views' . DS . 'layout' .DS . DEFAULT_LAYOUT . DS . 'configs' . DS ;

			$this->cache_dir = ROOT . 'tmp' . DS . 'cache' .DS;

			$this->compile_dir = ROOT . 'tmp' . DS . 'template' .DS;
        } 


		$menu = array(
			array(
				'id' => 'inicio',
				'titulo' => 'Inicio',
				'enlace' => BASE_URL
			),

			array(
				'id' => 'hola',
				'titulo' => 'Hola',
				'enlace' => BASE_URL . 'hola'
			),

			array(
				'id' => 'post',
				'titulo' => 'Post',
				'enlace' => BASE_URL . 'post'
			)
		);

		if(Session::get('autenticado')){
			$menu[] = array(
				'id' => 'login',
				'titulo' => 'Cerrar Sesion',
				'enlace' => BASE_URL . 'login/cerrar'
			);
		} else {
			$menu[] = array(
				'id' => 'login',
				'titulo' => 'Iniciar Sesion',
				'enlace' => BASE_URL . 'login'
			);
			
            $menu[] = array (
                'id' => 'registro',
                'titulo' => 'Registrar Usuario',
                'enlace' => BASE_URL . 'registro'
            );
		}


		$js = array();
        
        if(count($this->_js))
        {
            $js = $this->_js;
        }


		if(USAR_SMARTY == '1'){
            $_params = array(
			'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
			'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
			'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
			'menu' => $menu,
			'item' => $item,
            'js' => $js,
            'root' => BASE_URL,
            'configs' => array(
            	'app_name' =>APP_NAME,
            	'app_slogan' => APP_SLOGAN,
            	'app_company' => APP_COMPANY

            )
			);
        } else {

            $_layoutParams = array(
			'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
			'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
			'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
			'menu' => $menu,
            'js' => $js
			);
        }

		if(USAR_SMARTY == '1'){
            $rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.tpl';
        } else {
            $rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';
        }

		if(is_readable($rutaView)){
			
			if(USAR_SMARTY == '1'){
            	$this->assign('_contenido',$rutaView);
        	} else {

            	include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
				include_once $rutaView;
				include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        	}
		} else {
			throw new Exception ('Error View: Error de vista');
		}

		
		if(USAR_SMARTY == '1'){
			$this->assign('_acl', $this->_acl);
            $this->assign('_layoutParams', $_params);
			
        } else {
        	$this->_acl = $this->_acl;
            $this->_layoutParams = $_params;
            
                
        }
        $this->display('template.tpl');
	}

	public function setJs(array $js) 
    {
    	//para enviar js que deseamos incluir en una vista
        if(is_array($js) && count($js))
        {
            for ($i=0; $i < count($js); $i++)
            {
                $this->_js[] = BASE_URL . 'views/' . $this->_controlador . '/js/' . $js[$i] . '.js';
                
            }
        } else{
            throw new Exception('Error View: SetJS Error de js'); 
        }
    }
}
