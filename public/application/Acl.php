<?php 


class ACL 
{
	private $_registry; //2
	private $_db;
	private $_id;
	private $_role;
	private $_permisos;

	public function __construct($id = false)
	{
		//echo $id . '<br>';

		if($id)
		{
			//echo "en acl function __construct dentro if"  . '<br>'; //exit;
			$this->_id = (int) $id;

		} else {
			//si usuario no ha iniciado sesion
			if(Session::get('id_usuario')){
				$this->_id = Session::get('id_usuario');

			} else {
				$this->_id = 0;
			}
		}

		$this->_registry = Registry::getInstancia(); //22
		$this->_db = $this->_registry->_db; //22

		//$this->_db = new DataBase(); //22 //echo "en 1"  . '<br>';
		$this->_role = $this->getRole(); //echo "en 2"  . '<br>';
		$this->_permisos = $this->getPermisosRole(); //echo "en 3"  . '<br>';
		$this->compilarAcl();  //echo "en 4"  . '<br>';
	}

	public function compilarAcl()
	{
		//combinar los arreglos de los permisos del rol con los permisos de usuario
		$this->_permisos = array_merge(
			$this->_permisos,
			$this->getPermisosUsuario()
			); 
	}

	public function getRole()
	{
		//$this->_id = 1;
		//$a = "select * from usuarios where id = {$this->_id}";

		//echo $a;
		$role = $this->_db->query("select role from usuarios where id = {$this->_id}");
/*
		//error case
	if(!$role)
	{
  		die("Execute query error, because: ". $this->_db->errorInfo());
	}
		//success case
	else{
     //continue flow
		$role = $role->fetch();
		return $role['role'];
	}
*/
		$role = $role->fetch();
		return $role['role'];

	}

	public function getPermisosRoleId()
	{
		$ids = $this->_db->query("select permiso from permisos_role where role = '{$this->_role}'");

		$ids = $ids->fetchAll(PDO::FETCH_ASSOC);

		$id = array();
		
		for($i = 0; $i < count($ids); $i++){
			$id[] = $ids[$i]['permiso'];
		}
		return $id;
		
	}

	public function getPermisosRole()
	{

		//permisos del roll ya procesados
		//echo "select * from permisos_role where role = {$this->_role}";

		$permisos = $this->_db->query("select * from permisos_role where role = '{$this->_role}'");

		$permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
		$data = array();
		for($i = 0; $i < count($permisos); $i++){
			$key = $this->getPermisoKey($permisos[$i]['permiso']);
			if($key == ''){continue;}
			if($permisos[$i]['valor'] == 1){
				$v = true;
			} else { 
				$v = false;
			}

			$data[$key] = array(
				'key' => $key,
				'permiso' => $this->getPermisoNombre($permisos[$i]['permiso'] ),
				'valor' => $v,
				'heredado' => true,
				'id' => $permisos[$i]['permiso']
			);
		}
		return $data;
	}

	public function getPermisoKey($permisoID)
	{
		$permisoID = (int) $permisoID;
		//echo "<br> getPermsoKey: select `key` from permisos where id_permiso = {$permisoID}";
		$key = $this->_db->query("select `key` from permisos where id_permiso = {$permisoID}");

		$key = $key->fetch();

		return $key['key'];
	}

	public function getPermisoNombre($permisoID)
	{
		$permisoID = (int) $permisoID;
		$permiso = $this->_db->query("select permiso from permisos where id_permiso = {$permisoID}");

		$permiso = $permiso->fetch();

		return $permiso['permiso'];
	}


	public function getPermisosUsuario()
	{
		//retorna permisos del usuario
		$ids = $this->getPermisosRoleId();
		if(count($ids)){
			//echo 'aca';
			//echo "select * from permisos_usuario where usuario = {$this->_id} and permiso in (". implode(',',$ids) .')';

			$permisos = $this->_db->query("select * from permisos_usuario where usuario = {$this->_id} and permiso in (". implode(',',$ids) .')');
			

			$permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
		} else {
			//echo 'else';
			$permisos = array();
		}
		$data = array();

		//echo count($permisos);exit;

			
		for($i = 0; $i < count($permisos); $i++){
			$key = $this->getPermisoKey($permisos[$i]['permiso']);
			if($key == ''){continue;}
			if($permisos[$i]['valor'] == 1){
				$v = true;
			} else { 
				$v = false;
			}

			$data[$key] = array(
				'key' => $key,
				'permiso' => $this->getPermisoNombre($permisos[$i]['permiso'] ),
				'valor' => $v,
				'heredado' => false,
				'id' => $permisos[$i]['permiso']
			);
			/*

			if($i == 1){
				echo 'entro if';
				var_dump($data); exit;
			}
			*/

		}

		return $data;
	}

	public function getPermisos()
	{
		if(isset($this->_permisos) && count($this->_permisos))
			return $this->_permisos;
	}

	public function permiso($key)
	{
		if(array_key_exists($key, $this->_permisos)){
			if($this->_permisos[$key]['valor'] == true || $this->_permisos[$key]['valor'] == 1){
				return true;
			}
			return false;
		}
	}

	public function acceso($key)
	{
		if($this->permiso($key)){
			//Session::tiempo(); //para controlar tiempos. en este momento lo desabilito.
			return;
		}

		header('location:' . BASE_URL . 'error/access/5050');
		exit;
	}

}
