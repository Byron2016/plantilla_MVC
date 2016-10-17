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

level: usuario
var1: var1
var2: var2

2 prueba destroy

http://plantilla_mvc.net/login/cerrar

level: 
var1: 
var2: 

3 destroy enviando 2 variables como arreglo

http://plantilla_mvc.net/login/
http://plantilla_mvc.net/login/cerrar

level: usuario
var1: 
var2:

4 destroy enviando 1 variables como arreglo

http://plantilla_mvc.net/login/
http://plantilla_mvc.net/login/cerrar

level: usuario
var1: 
var2: var2

5 prueba destroy

http://plantilla_mvc.net/login/cerrar

level: 
var1: 
var2: 

6 autenticacion

http://plantilla_mvc.net/login/
http://plantilla_mvc.net --se tiene sesion iniciada
vamos a nuevo post y debe salir acceso restringuido ya que está puesta especial.

7 Se coloca en nuevo acceso usuario y ya debe permitir.

8 con acceso admin
http://plantilla_mvc.net/login
http://plantilla_mvc.net
si permite agruegar
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