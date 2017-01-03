<?php

class aclController extends Controller
{
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		if(USAR_SMARTY == '1'){
			$this->_view->assign('titulo', 'Listas de Acceso');
		} else {
			$this->_view->titulo='Listas de Acceso';
		}
		
		$this->_view->renderizar('index');
	}
}
