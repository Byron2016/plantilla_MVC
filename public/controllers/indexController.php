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

			if (INCLUIR_WIDGET == '1') { 
				//print_r($this->_view->getLayoutPositions());
                //$this->_view->assign('widget', $this->_view->widget('menu','getMenu')); //se manda nombre del widgeg: menuwidget y el metodo, en este caso no tiene opciones.
            } else {
            	$this->_view->assign('widget', '');
            }
			$this->_view->assign('titulo', 'Portada');
			//$a = $this->_view->widget('menu','menu');
			//echo $a; exit;
		} else {
			$this->_view->titulo='Portada';
		}
		
		$this->_view->renderizar('index','inicio');
	}

}

