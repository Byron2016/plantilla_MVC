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

        //$id = array();
        
        for($i = 0; $i < count($permisos); $i++){
            if($permisos[$i]['key'] == ''){continue;}
                $data[$permisos[$i]['key']] = array (
                    'key' => $permisos[$i]['key'],
                    'valor' => 'x',
                    'nombre' => $permisos[$i]['permiso'],
                    'id' => $permisos[$i]['id_permiso']
                    );
        }
        return $data;
    }

    public function getPermisosRole($roleID)
    {
        $data = array();

        //echo "get permisosrol select * from permisos_role where role = $roleID ". '<br>';

        $permisos = $this->_db->query("select * from permisos_role where role = $roleID");
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($permisos);
        
        for($i = 0; $i < count($permisos); $i++){
            $key = $this->getPermisoKey($permisos[$i]['permiso']);
            if($key  == ''){continue;}

            if($permisos[$i]['valor'] == 1){
                $v = 1;
            }
            else {
                $v = 0;
            }

            $data[$key] = array (
                    'key' => $key,
                    'valor' => $v,
                    'nombre' => $this->getPermisoNombre($permisos[$i]['permiso']),
                    'id' => $permisos[$i]['permiso']
                    );
        }
        //var_dump($data);
        $data = array_merge($this->getPermisosAll(), $data);
        //var_dump($data);
        return $data;
    }

    public function eliminarPermisoRole($roleID, $permisoID)
    {

        //echo "eliminapermisorole delete from permisos_role where role = $roleID and permiso = $permisoID ". '<br>';

        $this->_db->query("delete from permisos_role " . 
            "where role = $roleID and permiso = $permisoID ");
    }

    public function editarPermisosRole($roleID, $permisoID, $valor)
    {
        //echo "editapermisosrole replace into permisos_role set role = $roleID , permiso = $permisoID, valor ='$valor'". '<br>';
        $this->_db->query("replace into permisos_role " . 
            "set role = $roleID , permiso = $permisoID, valor ='$valor'");
    }

    public function getPermisoKey($permisoID)
    {
        $permisoID = (int) $permisoID;
        //echo "<br> getPermsoKey: select `key` from permisos where id_permiso = {$permisoID}";
        //echo "getPermisoKey select `key` from permisos where id_permiso = {$permisoID} ". '<br>';
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

    public function getPermisos()
    {
        $permisos = $this->_db->query("SELECT * FROM permisos");
        
        return $permisos->fetchAll(PDO::FETCH_ASSOC);
    }
}