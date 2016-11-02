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


        //Session::accesoEstricto(array('usuario'),false);
        $this->_acl->acceso('editar_post');

        if(!$this->filtrarInt($pagina)){
            $pagina = false;
        }else {
            $pagina = (int) $pagina;
        }
        $this->getLibrary('paginador','paginador');
        $paginador = new Paginador();

        if(USAR_SMARTY == '1'){
            $this->_view->assign('posts', $paginador->paginar($this->_post->getPosts(),$pagina));
            $this->_view->assign('paginacion', $paginador->getView('prueba','post/index'));
            $this->_view->assign('titulo','Post');
        } else {
            $this->_view->posts = $paginador->paginar($this->_post->getPosts(),$pagina);
            $this->_view->paginacion = $paginador->getView('prueba','post/index');
            $this->_view->titulo = 'Post';
        }

        
        $this->_view->renderizar('index', 'post');
    }
    
    public function nuevo()
    {
        //Session::accesoEstricto(array('usuario'),false);

        $this->_acl->acceso('nuevo_post');
        
        //$this->view->prueba = $this->getTexto('titulo');

        if(USAR_SMARTY == '1'){
            $this->_view->assign('titulo','Nuevo Post');
        } else {
            $this->_view->titulo = 'Nuevo Post';
        }




        $this->_view->setJs(array('nuevo'));
        
        if($this->getInt('guardar') == 1){
            
            if(USAR_SMARTY == '1'){
                $this->_view->assign('datos',$_POST);
            } else {
                $this->_view->datos = $_POST; //para que se quede lleno. No deberia hacerse así sino hacer funcion que retorne parámetros post.
            }
            
            if(!$this->getTexto('titulo')){
                
                if(USAR_SMARTY == '1'){
                    $this->_view->assign('_error','Debe introducir el titulo del post');
                } else {
                    $this->_view->_error = 'Debe introducir el titulo del post';
                }
                $this->_view->renderizar('nuevo', 'post');
                exit;
            }
            
            if(!$this->getTexto('cuerpo')){

                if(USAR_SMARTY == '1'){
                    $this->_view->assign('_error','Debe introducir el cuerpo del post');
                } else {
                    $this->_view->_error = 'Debe introducir el cuerpo del post';
                }
                $this->_view->renderizar('nuevo', 'post');
                exit;
            }
            //echo 'a1';

            $imagen = '';

            if(isset($_FILES['imagen']['name']))
            {
                $this->getLibrary('class.upload','upload');
                $ruta = ROOT . 'public' . DS . 'img' . DS . 'post' . DS;

                $upload = new upload($_FILES['imagen']);
                //tipos mimes a ser aceptados
                $upload->allowed = array('image/*');
                //renombrar
                $upload->file_new_name_body = 'upl_' . uniqid();
                //ruta donde queremos q se guarde el archivo
                $upload->process($ruta);
                //verificar si fue exitoso
                if($upload->processed){
                    //miniatura de imagen
                    //https://www.verot.net/php_class_upload.htm
                    $imagen = $upload->file_dst_name;
                    $thumb = new upload($upload->file_dst_pathname);
                    $thumb->image_resize = true;
                    $thumb->image_x = 100;
                    $thumb->image_y = 70;
                    $thumb->file_name_body_pre = 'thumb_';
                    $thumb->process($ruta . 'thumb' . DS);

                } else {
                    //error a la vista
                    if(USAR_SMARTY == '1'){
                        $this->_view->assign('_error', $upload->error);
                    } else {
                        $this->_view->_error = $upload->error;
                    }
                    exit;
                }
            }



            $this->_post->insertarPost(
                    $this->getPostParam('titulo'),
                    $this->getPostParam('cuerpo'),
                    $imagen
                    );
            
            $this->redireccionar('post');
        }       
        
        $this->_view->renderizar('nuevo', 'post');
        
    }

    public function editar($id)
    {
        $this->_acl->acceso('editar_post');
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

