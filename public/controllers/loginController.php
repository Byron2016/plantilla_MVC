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
            Session::set('level', 'admin');
            Session::set('var1', 'var1');
            Session::set('var2', 'var2');

            $this->redireccionar('login/mostrar');

            /*

1

http://plantilla_mvc.net/login/

despliega

level: especial
var1: var1
var2: var2

al agregar post indica acceso restringuido

2

level: admin
var1: var1
var2: var2

en post deja ingresar

2.1

level: admin
var1: var1
var2: var2

en post NO deja ingresar ya que pusimos true.






            */
    }
    

    public function mostrar()
    {
            echo 'level: ' . Session::get('level').'<br>';
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