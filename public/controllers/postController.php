<?php

class postController extends Controller
{
    private $_post;
    
    public function __construct() {
        parent::__construct();
        $this->_post = $this->loadModel('post');
        $this->_view->setTemplate('twb-R');
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

        $this->_view->setJsPlugin(array('jquery.validate'));
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
        
        //$this->_view->titulo = 'Editar Post';

        if(USAR_SMARTY == '1'){
            $this->_view->assign('titulo','Editar Post');
        } else {
            $this->_view->titulo = 'Editar Post';
        }

        $this->_view->setJs(array('nuevo'));

        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('titulo')){

                if(USAR_SMARTY == '1'){
                    $this->_view->assign('_error','Debe introducir el titulo del post');
                } else {
                    $this->_view->_error = 'Debe introducir el titulo del post';
                }
                $this->_view->renderizar('editar', 'post');
                exit;
            }
            
            if(!$this->getTexto('cuerpo')){
                if(USAR_SMARTY == '1'){
                    $this->_view->assign('_error','Debe introducir el cuerpo del post');
                } else {
                    $this->_view->_error = 'Debe introducir el cuerpo del post';
                }
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
        
        if(USAR_SMARTY == '1'){
            $this->_view->assign('posts', $this->_post->getPost($this->filtrarInt($id)));
                
        } else {
            $this->_view->datos = $this->_post->getPost($this->filtrarInt($id)); //los datos de la vista lo llenamos con el registro base datos
        }
        
        $this->_view->renderizar('editar', 'post');
    }

    public function eliminar($id)
    {
        //Session::acceso('admin');
        $this->_acl->acceso('eliminar_post');
        
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
        $ajaxModel = $this->loadModel('ajax');

        if(USAR_SMARTY == '1'){
        
            $this->_view->assign('paises', $ajaxModel->getPaises());
            $this->_view->assign('posts', $paginador->paginar($this->_post->getPrueba(),$pagina));
            $this->_view->assign('paginacion', $paginador->getView('prueba','post/prueba'));
            $this->_view->assign('titulo', 'Post');
        } else {
            $this->_view->posts = $paginador->paginar($this->_post->getPrueba(),$pagina);
            $this->_view->paginacion = $paginador->getView('prueba','post/prueba');
            $this->_view->titulo = 'Post';
        }

        $this->_view->renderizar('prueba', 'prueba', false);
    }

    public function prueba2($pagina = false)
    {

        //Este método es con paginacion
        $ajaxModel = $this->loadModel('ajax');
        $this->_view->assign('paises', $ajaxModel->getPaises());
        $this->getLibrary('paginador','paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('prueba_ajax'));
        $this->_view->assign('posts', $paginador->paginar($this->_post->getPrueba(),$pagina));
        $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
        $this->_view->assign('titulo', 'Post');
        $this->_view->renderizar('prueba2', 'prueba2', false);
    }

    public function pruebaAjax()
    {
        //Este método va a traer la paginación.
        //Trabaja con prueba2
        $pagina = $this->getInt('pagina');
        $nombre = $this->getSql('nombre');
        $pais = $this->getInt('pais');
        $ciudad = $this->getInt('ciudad');
        $registros = $this->getInt('registros');
        $condicion = '';

        if($nombre){
            $condicion .= " AND nombre like '%$nombre%' ";
        }

        if($pais){
            $condicion .= " AND id_pais = '$pais' ";
        }

        if($ciudad){
            $condicion .= " AND id_ciudad = '$ciudad' ";
        }

        $this->getLibrary('paginador','paginador');
        $paginador = new Paginador();
        $this->_view->setJs(array('prueba_ajax'));
        //solo para smarty va a funcionar
        $this->_view->assign('posts', $paginador->paginar($this->_post->getPrueba($condicion), $pagina, $registros));
        $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
        $this->_view->renderizar('ajax/prueba', false, true);
        //se crea vista para demas registros para eso se crea carpeta ajax y colocar archivo de smarty.
    }
}

?>

