<?php

class registroModel extends Model
{
    public function __construc()
    {
    	parent::__construc();
    }

    public function verificarUsuario($usuario)
    {
    	$id = $this->_db->query(
    			"select id,codigo from usuarios where usuario = '$usuario'"
    		);

    	return $id->fetch();
    	
    }

    public function verificarEmail($email)
    {
    	$id = $this->_db->query(
    			"select id from usuarios where email = '$email'"
    		);

    	if ($id->fetch()) 
    	{
    		return true;
    	}

    	return false;
    }

    public function registrarUsuario($nombre, $usuario, $password, $email)
    {
        $random = rand(17825984, 99999999);

        $clave = Hash::getHash('sha1', $password, HASH_KEY);

        //$fecha =  now();

        //$sql= "insert into usuarios values" . "(null, '$nombre', '$usuario', '$clave', '$email', 'usuario', 0, now(), $random)";
        //echo $sql;




    	$this->_db->prepare(
    			"insert into usuarios values" .
    			"(null, :nombre, :usuario, :pass, :email, 'usuario', 0, now(), :codigo)"
    			)
    			->execute(array(
    				':nombre' => $nombre,
    				':usuario' => $usuario,
    				':pass' => Hash::getHash('sha1', $password, HASH_KEY),
    				':email' => $email,
                    ':codigo' => $random
    				));

    }

    public function getUsuario($id, $codigo)
    {
        //echo ("select * from usuarios where id = $id and codigo =$codigo");
        $usuario = $this ->_db->query("select * from usuarios where id = $id and codigo =$codigo");
        
        return $usuario->fetch();
    }

    public function activarUsuario($id, $codigo)
    {
        //echo ("update usrios set estado = 1   where id= $id and codigo = '$codigo'");
        $this->_db->query(
            "update usuarios set estado = 1 " .
            "where id= $id and codigo = '$codigo'"
            );

    }
}
?>
