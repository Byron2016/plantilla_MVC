<?php

class postController extends Controller
{
    private $_post;
    
    public function __construct() {
        parent::__construct();
        $this->_post = $this->loadModel('post');
    }
    
    public function index($pagina = false)
    {
        /*
        for($i =0; $i <300; $i++){
            $model = $this->loadModel('post');
            $model->insertarPost('titlo ' . $i, 'cueropo'.$i) ;
        }
        */


        Session::accesoEstricto(array('usuario'),false);

        if(!$this->filtrarInt($pagina)){
            $pagina = false;
        }else {
            $pagina = (int) $pagina;
        }
        $this->getLibrary('paginador','paginador');
        $paginador = new Paginador();

        $this->_view->assign('posts', $paginador->paginar($this->_post->getPosts(),$pagina));
        $this->_view->assign('paginacion', $paginador->getView('prueba','post/index'));
        $this->_view->assign('titulo','Post');
        $this->_view->renderizar('index', 'post');
    }
    
    public function nuevo()
    {
        Session::accesoEstricto(array('usuario'),false);
        $this->_view->titulo = 'Nuevo Post';
        //$this->view->prueba = $this->getTexto('titulo');
        $this->_view->setJs(array('nuevo'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST; //para que se quede lleno. No deberia hacerse así sino hacer funcion que retorne parámetros post.
            
            if(!$this->getTexto('titulo')){
                $this->_view->_error = 'Debe introducir el titulo del post';
                $this->_view->renderizar('nuevo', 'post');
                exit;
            }
            
            if(!$this->getTexto('cuerpo')){
                $this->_view->_error = 'Debe introducir el cuerpo del post';
                $this->_view->renderizar('nuevo', 'post');
                exit;
            }
            echo 'a1';
            $this->_post->insertarPost(
                    $this->getPostParam('titulo'),
                    $this->getPostParam('cuerpo')
                    );
            
            $this->redireccionar('post');
        }       
        
        $this->_view->renderizar('nuevo', 'post');
        
    }

    public function editar($id)
    {
        if(!$this->filtrarInt($id)){
            $this->redireccionar('post');
        }
        
        if(!$this->_post->getPost($this->filtrarInt($id))){
            $this->redireccionar('post');
        }
        
        $this->_view->titulo = 'Editar Post';
        $this->_view->setJs(array('nuevo'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('titulo')){
                $this->_view->_error = 'Debe introducir el titulo del post';
                $this->_view->renderizar('editar', 'post');
                exit;
            }
            
            if(!$this->getTexto('cuerpo')){
                $this->_view->_error = 'Debe introducir el cuerpo del post';
                $this->_view->renderizar('editar', 'post');
                exit;
            }
            
            $this->_post->editarPost(
                    $this->filtrarInt($id),
                    $this->getPostParam('titulo'),
                    $this->getPostParam('cuerpo')
                    );
            
            $this->redireccionar('post');
        }
        
        $this->_view->datos = $this->_post->getPost($this->filtrarInt($id)); //los datos de la vista lo llenamos con el registro base datos
        $this->_view->renderizar('editar', 'post');
    }

    public function eliminar($id)
    {
        Session::acceso('admin');
        
        if(!$this->filtrarInt($id)){
            $this->redireccionar('post');
        }
        
        if(!$this->_post->getPost($this->filtrarInt($id))){
            $this->redireccionar('post');
        }
        
        $this->_post->eliminarPost($this->filtrarInt($id));
        $this->redireccionar('post');
    }

    public function prueba($pagina = false)
    {
        /*
        for($i =0; $i <300; $i++){
            $model = $this->loadModel('post');
            $model->insertarPrueba('nombre ' . $i) ;
        }
        */

        if(!$this->filtrarInt($pagina)){
            $pagina = false;
        }else {
            $pagina = (int) $pagina;
        }
        $this->getLibrary('paginador','paginador');
        $paginador = new Paginador();

        $this->_view->posts = $paginador->paginar($this->_post->getPrueba(),$pagina);
        $this->_view->paginacion = $paginador->getView('prueba','post/prueba');
        $this->_view->titulo = 'Post';
        $this->_view->renderizar('prueba', 'post');
    }
}

?>

