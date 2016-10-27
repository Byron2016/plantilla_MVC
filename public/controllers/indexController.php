<?php

class indexController extends Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		if(USAR_SMARTY == '1'){
			$this->_view->assign('titulo', 'Portada');
		} else {
			$this->_view->titulo='Portada';
		}
		
		$this->_view->renderizar('index','inicio');
	}

}

