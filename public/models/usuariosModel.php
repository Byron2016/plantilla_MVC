<?php

class usuariosModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function getUsuarios()
    {
        //echo "select u.*, r.role from usuarios u, roles r where u.role = r.id_role";
    	$usuarios = $this->_db->query("select u.*, r.role from usuarios u, roles r where u.role = r.id_role");
    	return $usuarios->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getUsuario($usuarioID)
    {
        //echo "select u.*, r.role from usuarios u, roles r where u.role = r.id_role and u.id = $usuarioID"; exit;
    	$usuarios = $this->_db->query("select u.*, r.role from usuarios u, roles r where u.role = r.id_role and u.id = $usuarioID");
    	return $usuarios->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getPermisosUsuario($usuarioID)
    {
        //echo "en getPermisosUsuario de usauriosModel" . '<br>'; //exit;
    	$acl = new ACL($usuarioID);
        //echo "en acl6", exit;
    	return $acl->getPermisos();

    }

    public function getPermisosRole($usuarioID)
    {
    	$acl = new ACL($usuarioID);
    	return $acl->getPermisosRole();

    }

    public function eliminarPermiso($usuarioID, $permisoID)
    {
        //echo "delete from permisos_usuario where usuario = $usuarioID and permiso = $permisoID";
    	$this->_db->query("delete from permisos_usuario where usuario = $usuarioID and permiso = $permisoID");

    }

    public function editarPermiso($usuarioID, $permisoID, $valor)
    {
        //echo "replace into permisos_usuario set usuario = $usuarioID, permiso = $permisoID, valor = '$valor'"; //exit;
    	$this->_db->query("replace into permisos_usuario set usuario = $usuarioID, permiso = $permisoID, valor = '$valor'");
    }

}