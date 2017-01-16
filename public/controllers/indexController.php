<?php

class indexController extends Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		//if(!$this->_acl->permiso('nuevo_post')) echo 'true'; exit;
		//echo '<pre>'; print_r($this->_acl->getPermisos());exit;
		if(USAR_SMARTY == '1'){
			$this->_view->assign('titulo', 'Portada');
			//$a = $this->_view->widget('menu','menu');
			//echo $a; exit;
			$this->_view->assign('widget', $this->_view->widget('menu','menu'));  //se manda nombre del widgeg: menuwidget y el metodo, en este caso no tiene opciones.
			//echo $this->_view->widget('menu','menu'); exit;
		} else {
			$this->_view->titulo='Portada';
		}
		
		$this->_view->renderizar('index','inicio');
	}

}

