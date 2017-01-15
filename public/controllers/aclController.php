<?php

class aclController extends Controller
{
	private $_aclm;

	public function __construct(){
		parent::__construct();
		$this->_aclm =  $this->loadModel('acl');
	}
	public function index()
	{
		if(USAR_SMARTY == '1'){
			$this->_view->assign('titulo', 'Listas de Acceso');
		} else {
			$this->_view->titulo='Listas de Acceso';
		}
		
		$this->_view->renderizar('index');
	}

	public function roles()
	{
		if(USAR_SMARTY == '1'){
			$this->_view->assign('titulo', 'Administración de roles');
			$this->_view->assign('roles', $this->_aclm->getRoles());
		} else {
			$this->_view->titulo='Listas de Acceso';
			$this->_view->roles = $this->_aclm->getRoles();
		}

		$this->_view->renderizar('roles');
	}

	public function permisos_role($roleID)
	{
		$id = $this->filtrarInt($roleID);

		if(!$id){
			$this->redireccionar('acl/roles');
		}

		$row = $this->_aclm->getRole($id);

		if(!$row){
			$this->redireccionar('acl/roles');
		}

		$this->_view->assign('titulo','Administración de permisos role');

		//var_dump($_POST);

		if($this->getInt('guardard') == 1){
			echo 'entro guardar' . '<br>';
			$values = array_keys($_POST);
			$replace = array();
			$eliminar = array();
			//var_dump($values );
			//var_dump($_POST);

			for($i = 0; $i < count($values); $i++){
				//echo 'a_'.$i. '<br>';
				if(substr($values[$i],0,5) == 'perm_'){
					//echo '0_'.$i. '<br>';
					if($_POST[$values[$i]] == 'x'){
						//echo '1:: '.$values[$i].' '.substr($values[$i], -1). '<br>';
						$eliminar[] = array(
							'role' => $id,
							'permiso' => substr($values[$i], -1)

							);
					}
					else {
						//echo '1e'. '<br>';
						if($_POST[$values[$i]] == 1){
							$v = 1;
							//echo '1et'. '<br>';
						}
						else {
							$v = 0;
							//echo '1e0'. '<br>';
						}

						$replace[] = array(
							'role' => $id,
							'permiso' => substr($values[$i], -1),
							'valor' => $v

							);
					}
				}
			}
			//echo 'f1'. '<br>';

			for($i = 0; $i <count($eliminar); $i++){
				$this->_aclm->eliminarPermisoRole(
					$eliminar[$i]['role'], 
					$eliminar[$i]['permiso']);
			}
			//echo 'f2'. '<br>';

			for($i = 0; $i <count($replace); $i++){
				$this->_aclm->editarPermisosRole(
					$replace[$i]['role'], 
					$replace[$i]['permiso'],
					$replace[$i]['valor']);
			}

		}


		$this->_view->assign('role', $row);
		$this->_view->assign('permisos', $this->_aclm->getPermisosRole($id));
		$this->_view->renderizar('permisos_role');
	}

	public function permisos()
    {
        $this->_view->assign('titulo', 'Administracion de permisos');
        $this->_view->assign('permisos', $this->_aclm->getPermisos());
        $this->_view->renderizar('permisos', 'acl');
    }
}
