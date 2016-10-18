<?php

class loginController extends Controller
{
    private $_login;
    
    public function __construct(){
        parent::__construct();
        
    }

    public function index()
    {
           
            Session::set('autenticado', true);
            Session::set('level', 'usuario');
            Session::set('tiempo', time()); //para saber que usuario inicio sesion
            Session::set('var1', 'var1');
            Session::set('var2', 'var2');

            $this->redireccionar('login/mostrar');

            /*

1

http://plantilla_mvc.net/login/

despliega

level: usuario
tiempo: 1476829411
var1: var1
var2: var2

al ir a aumentar sale: http://plantilla_mvc.net/error/access/8080

Timepo se sesion agotado.






            */
    }
    

    public function mostrar()
    {
            echo 'level: ' . Session::get('level').'<br>';
            echo 'tiempo: ' . Session::get('tiempo').'<br>';
            echo 'var1: ' . Session::get('var1').'<br>';
            echo 'var2: ' . Session::get('var2').'<br>'; 
    }
    
    public function cerrar()
    {
        Session::destroy();
        $this->redireccionar('login/mostrar');
    }

}

?>