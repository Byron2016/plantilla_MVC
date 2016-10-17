<?php 

class Bootstrap
{
	public static function run(Request $peticion)
	{
		$controller = $peticion->getControlador() . 'Controller';
		$rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';

		echo $rutaControlador; exit;

	}
}
