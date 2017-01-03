<?php

class aclModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function getRole($roleID)
    {
    	$role = $this->_db->query("select * from roles where id_role =$roleID");
    	return $role->fetch();
    }

    public function getRoles()
    {
    	$role = $this->_db->query("select * from roles ");
        return $role->fetchAll();
    }

    public function getPermisosAll()
    {
    	$permisos = $this->_db->query("select * from permisos");
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);

        $id = array();
        
        for($i = 0; $i < count($permisos); $i++){
            if($permisos[$i]['key'] == ''){continue;}
                $data[$permisos[$i]['key(array)']]
        }
        return $id;
    }

    public function getPermisosRole($roleID)
    {
        $sql = "insert into ciudades values (null, '$ciudad', $pais)";
        //return $sql;
        $paises = $this->_db->query("insert into ciudades values (null, '$ciudad', $pais)");
    }

    public function eliminarPermisoRole($roleID, $permisoID)
    {
        $sql = "insert into ciudades values (null, '$ciudad', $pais)";
        //return $sql;
        $paises = $this->_db->query("insert into ciudades values (null, '$ciudad', $pais)");
    }

    public function editarPermisosRole($roleID, $permisoID, $valor)
    {
        $sql = "insert into ciudades values (null, '$ciudad', $pais)";
        //return $sql;
        $paises = $this->_db->query("insert into ciudades values (null, '$ciudad', $pais)");
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
}