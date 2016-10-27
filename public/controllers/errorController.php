<?php

class errorController extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
            
            if(USAR_SMARTY == '1'){
                $this->_view->assign('titulo','Error');
                $this->_view->assign('mensaje',$this->_getError());
            } else {
                $this->_view->titulo = 'Error';
                $this->_view->mensaje = $this->_getError();
            }
            $this->_view->renderizar('index');

	}
        
    public function access($codigo)
    {

            if(USAR_SMARTY == '1'){
                $this->_view->assign('titulo','Error');
                $this->_view->assign('mensaje',$this->_getError($codigo));
            } else {
                $this->_view->titulo = 'Error';
                $this->_view->mensaje = $this->_getError($codigo);
            }
        $this->_view->renderizar('access');
    }

    private function _getError($codigo = false)
	{
        if($codigo){
            $codigo = $this->filtrarInt($codigo);
            if(is_int($codigo))
                $codigo = $codigo;
        }else{
            $codigo = 'default';
        }
           
        $error['default'] = 'Ha ocurrido un error y la pagina no puede mostrarse';
        $error['5050'] = 'Acceso Restringido';
        $error['8080'] = 'Tiempo de la session agotado'; //se define para manejar tiempo de sesion

        if(array_key_exists($codigo, $error))
        {
            return $error[$codigo];
        }  else {
            return $error['default'];
        }

	}
}

?>