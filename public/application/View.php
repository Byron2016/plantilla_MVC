<?php 

class View
{
	private $_controlador;

	public function __construct(Request $peticion)
	{
		$this->_controlador = $peticion->getControlador();

	}

	public function renderizar($vista, $item = false)
	{

		$rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';

		//echo $rutaView;

		if(is_readable($rutaView)){
			include_once $rutaView;
		} else {
			throw new Exception ('Error View: Error de vista');
		}
	}

}
