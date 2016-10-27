<?php

class ajaxController extends Controller
{
	private $_ajax;
	
	public function __construct()
	{
		parent::__construct();
		$this->_ajax = $this->loadModel('ajax');
	}

	public function index()
	{
		

		if(USAR_SMARTY == '1'){
            $this->_view->assign('titulo','Ejemplo de AJAX');
             $this->_view->setJs(array('ajax'));
            $this->_view->assign('paises' , $this->_ajax->getPaises());
        } else {
            $this->_view->titulo = 'Ejemplo de AJAX';
        }

        $this->_view->renderizar('index');

	}

	public function getCiudades()
	{
		//echo "Hola estuve en getCiudades" . $this->getInt('pais');
		
		if($this->getInt('pais'))
			echo json_encode($this->_ajax->getCiudades($this->getInt('pais')));
		/*
		else
			echo 'esta en el else';
			*/
			

	}
	public function insertarCiudad()
	{
		if($this->getInt('pais') && $this->getSql('ciudad'))
		{
			$this->ajax->insertarCiudad($this->getSql('ciudad'), $this->getInt('pais'));
		}


	}
}