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
	private $_request;
	private $_js;
	private $_acl;
	private $_rutas;
	private $_jsPlugin;
    private $_template;

	public function __construct(Request $peticion, ACL $_acl)
	{
		parent::__construct();

		$this->_request = $peticion;
		$this->_js = array();
		$this->_acl = $_acl;
		$this->_rutas = array();
		$this->_jsPlugin = array();
        $this->_template = DEFAULT_LAYOUT;

		$modulo = $this->_request->getModulo();
		$controlador = $this->_request->getControlador();

		if($modulo){
			$this->_rutas['view'] = ROOT . 'modules' . DS . $modulo . DS . 'views' . DS . $controlador . DS;
			$this->_rutas['js'] = BASE_URL . 'modules/' . $modulo . '/views/' . $controlador . '/js/' ;

		}
		else {
			$this->_rutas['view'] = ROOT . 'views' . DS . $controlador . DS;
			$this->_rutas['js'] = BASE_URL .  'views/' . $controlador . '/js/' ;
		}
	}

	public function renderizar($vista, $item = false, $noLayout = false)
	{

		if(USAR_SMARTY == '1'){
            $this->template_dir = ROOT . 'views' . DS . 'layout' .DS . $this->_template . DS;

			$this->config_dir = ROOT . 'views' . DS . 'layout' .DS . $this->_template . DS . 'configs' . DS ;

			$this->cache_dir = ROOT . 'tmp' . DS . 'cache' .DS;

			$this->compile_dir = ROOT . 'tmp' . DS . 'template' .DS;
        } 


		$menu = array(
			array(
				'id' => 'inicio',
				'titulo' => 'Inicio',
				'enlace' => BASE_URL,
				'imagen' => 'icon-home'
			),

			array(
				'id' => 'hola',
				'titulo' => 'Hola',
				'enlace' => BASE_URL . 'hola',
				'imagen' => 'icon-home'
			),

			array(
				'id' => 'post',
				'titulo' => 'Post',
				'enlace' => BASE_URL . 'post',
				'imagen' => 'icon-flag'
			)
		);

		if(Session::get('autenticado')){
			$menu[] = array(
				'id' => 'login',
				'titulo' => 'Cerrar Sesion',
				'enlace' => BASE_URL . 'usuarios/login/cerrar',
				'imagen' => 'icon-book'
			);
		} else {
			$menu[] = array(
				'id' => 'login',
				'titulo' => 'Iniciar Sesion',
				'enlace' => BASE_URL . 'usuarios/login',
				'imagen' => 'icon-book'
			);
			
            $menu[] = array (
                'id' => 'registro',
                'titulo' => 'Registrar Usuario',
                'enlace' => BASE_URL . 'usuarios/registro',
				'imagen' => 'icon-book'
            );
		}



		$js = array();
        
        if(count($this->_js))
        {
            $js = $this->_js;
        }
                $menuRight['menu'] = array(
            array(
                'id' => 'usuarios',
                'titulo' => 'Usuarios',
                'enlace' => BASE_URL . 'usuarios',
                'imagen' => 'icon-user'
                ),
            
            array(
                'id' => 'acl',
                'titulo' => 'Listas de control de acceso',
                'enlace' => BASE_URL . 'acl',
                'imagen' => 'icon-list-alt'
                ),
            
            array(
                'id' => 'ajax',
                'titulo' => 'Ejemplo uso de AJAX',
                'enlace' => BASE_URL . 'ajax',
                'imagen' => 'icon-refresh'
                ),
            
            array(
                'id' => 'prueba',
                'titulo' => 'Prueba paginaci&oacute;n',
                'enlace' => BASE_URL . 'post/prueba',
                'imagen' => 'icon-random'
                ),

            array(
                'id' => 'prueba2',
                'titulo' => 'Prueba paginaci&oacute;n con AJAX',
                'enlace' => BASE_URL . 'post/prueba2',
                'imagen' => 'icon-random'
                ),
            
            array(
                'id' => 'pdf',
                'titulo' => 'Documento PDF 1',
                'enlace' => BASE_URL . 'pdf/pdf1/param1/param2',
                'imagen' => 'icon-file'
                ),
            
            array(
                'id' => 'pdf',
                'titulo' => 'Documento PDF 2',
                'enlace' => BASE_URL . 'pdf/pdf2/param1/param2',
                'imagen' => 'icon-file'
                )
            );


		if(USAR_SMARTY == '1'){
            $_params0 = array(
			'ruta_css' => BASE_URL . 'views/layout/' . $this->_template . '/css/',
			'ruta_img' => BASE_URL . 'views/layout/' . $this->_template . '/img/',
			'ruta_js' => BASE_URL . 'views/layout/' . $this->_template . '/js/',
			'menu' => $menu,
            'menu_right' => $menuRight,
            'item' => $item,
            'js' => $js,
            'js_plugin' => $this->_jsPlugin,
            'root' => BASE_URL,
            'configs' => array(
                'app_name' =>APP_NAME,
                'app_slogan' => APP_SLOGAN,
                'app_company' => APP_COMPANY
            )
            );
            if (INCLUIR_WIDGET != '1') { 

        
                $_params1 = array(
                'menu_right11' => $menuRight //comento para video 24 crear widget
                );
                

            } else {
                $_params1 = array();
            }


            $_params = array_merge($_params0, $_params1);
            //var_dump($_params); exit;
        } else {

            $_layoutParams = array(
			'ruta_css' => BASE_URL . 'views/layout/' . $this->_template . '/css/',
			'ruta_img' => BASE_URL . 'views/layout/' . $this->_template . '/img/',
			'ruta_js' => BASE_URL . 'views/layout/' . $this->_template . '/js/',
			'menu' => $menu,
			'menu_right' => $menuRight,
            'js' => $js
			);
        }

        //echo BASE_URL . 'views/layout/' . $this->_template . '/img/'; exit;

        /*

		if(USAR_SMARTY == '1'){
            $rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.tpl';
        } else {
            $rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';
        }
        */

        //echo '<pre>'; print_r($this->_rutas); exit;

        //echo 'llego3'; //exit;

		if(is_readable($this->_rutas['view'] . $vista . '.tpl')){
            //echo 'a';
            if($noLayout){
                $this->template_dir = $this->_rutas['view'];
                exit;
                $this->display( $this->_rutas['view'] . $vista . '.tpl');
                exit;
            }
			
			if(USAR_SMARTY == '1'){
                //echo 'b';
            	$this->assign('_contenido',$this->_rutas['view'] . $vista . '.tpl');
        	} else {

            	include_once ROOT . 'views' . DS . 'layout' . DS . $this->_template . DS . 'header.php';
				include_once $this->_rutas['view'] . $vista . '.tpl';
				include_once ROOT . 'views' . DS . 'layout' . DS . $this->_template . DS . 'footer.php';
        	}
		} else {
			throw new Exception ('Error View: Error de vista');
		}

        //echo 'llego4'; exit;



		
		if(USAR_SMARTY == '1'){
			$this->assign('_acl', $this->_acl);
            $this->assign('_layoutParams', $_params);
            $this->display('template.tpl');
			
        } else {
        	$this->_acl = $this->_acl;     
        }
        
	}

	public function setJs(array $js) 
    {
    	//para enviar js que deseamos incluir en una vista
        if(is_array($js) && count($js))
        {
            for ($i=0; $i < count($js); $i++)
            {
                $this->_js[] = $this->_rutas['js'] .  $js[$i] . '.js';
                
            }
            //var_dump($this->_js);
        } else{
            throw new Exception('Error View: SetJS Error de js'); 
        }
    }

	public function setJsPlugin(array $js) 
    {
    	//para enviar js que deseamos incluir en una vista
        if(is_array($js) && count($js))
        {
            for ($i=0; $i < count($js); $i++)
            {
                $this->_jsPlugin[] = BASE_URL . 'public/js/' .  $js[$i] . '.js';
                
            }
        } else{
            throw new Exception('Error View: SetJS Error de js plugin'); 
        }
    }

    public function setTemplate($template)
    {
        $this->_template = (string) $template;
    }

    public function widget($widget, $method, $options = array())
    {
        //método q llama al widget
        //este método actua como un bootstrap para los widgets
        if(!is_array($options)){
            $options = array($options);
        }
        if(is_readable(ROOT . 'widgets' . DS . $widget . '.php')){
            include_once ROOT . 'widgets' . DS . $widget . '.php';
            $widgetClass = $widget . 'widget';

            if(!class_exists($widgetClass)){
                throw new Exception('Error View: widget Error clase widget'); 

            }
            //echo '1' . $widgetClass . ' ' . $method . ' ';
            if(is_callable($widgetClass, $method)){
                //echo '3';
                if(count($options)){
                    return call_user_func_array(array(new $widgetClass, $method), $options);
                }
                else {
                    return call_user_func(array(new $widgetClass, $method));
                }
                //echo '2';
            }

            throw new Exception('Error View: widget Error metodo widget'); 
        }

        throw new Exception('Error View: widget Error de widget'); 

    }

    public function getLayoutPositions()
    {
        if(is_readable(ROOT . 'views' . DS . 'layout' . DS . $this->_template . DS . 'configs.php')){
            include_once ROOT . 'views' . DS . 'layout' . DS . $this->_template . DS . 'configs.php';
            return get_layout_positions();

        }
        throw new Exception('Error View: getLayoutPositions Error de configruacion layout'); 
    }
}
