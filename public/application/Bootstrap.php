<?php 

class Bootstrap
{
	public static function run(Request $peticion)
	{
		$controller = $peticion->getControlador() . 'Controller';
		$rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
		//echo $rutaControlador;

		$metodo =  $peticion->getMetodo();
		$args = $peticion->getArgs();

		//echo $controller.'/'.$metodo;
		//echo " la rutacontrolador es: ". $rutaControlador . "<br>";
		//echo " la controller es: ". $controller . "<br>";
		//echo " la metodo es: ". $metodo . "<br>";

		if(is_readable($rutaControlador)){
			//vverificar si archivo existe y es legible
			require_once $rutaControlador;

			$controller = new $controller;

			if(is_callable(array($controller, $metodo))){
				$metodo = $peticion->getMetodo();
			} else {
				$metodo = DEFAULT_METODO;
			}

			if(isset($args)){
				call_user_func_array(array($controller, $metodo), $args);
			} else {
				call_user_func(array($controller, $metodo));
			}
		} else {
			throw new Exception('Error en Bootstrap1: No encontrado: ' . $rutaControlador);
		}

	}
}
