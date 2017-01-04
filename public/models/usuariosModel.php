<?php

class usuariosModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function getUsuarios()
    {
    	$usuarios = $this_>_db->query("select u.*, r.role from usaurios u, roles r where u.role = r.id_role");
    	return $usuarios->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getUsuario($usuarioID)
    {
    	$usuarios = $this_>_db->query("select u.*, r.role from usaurios u, roles r where u.role = r.id_role and u.id = $usuarioID");
    	return $usuarios->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getPermisosUsuario($usuarioID)
    {
    	$acl = new ACL($usuarioID);
    	return $acl->getPermisos();

    }

    public function getPermisosRole($usuarioID)
    {
    	$acl = new ACL($usuarioID);
    	return $acl->getPermisosRole();

    }

    public function eliminarPermiso($usuarioID, $permisoID)
    {
    	$this_>_db->query("delete from permisos_usuario where usuario = $usuarioID and permiso = $permisoID");

    }

    public function editarPermiso(($usuarioID, $permisoID, $valor)
    {
    	$this_>_db->query("replace into ermisos_usuario set usuario = $usuarioID, permiso = $permisoID, valor = '$valor'");
    }

}