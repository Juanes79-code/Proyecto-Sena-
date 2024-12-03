<?php

class User{
    /* -------- ATRIBUTOS ------- */
    private $dbh;
    private $codigo_usuario;
    private $nombres_user;
    private $last_name_user;
    private $cedula_user;
    private $correo_user;
    private $cargo_user;
    private $codigo_rol;
    private $pass_user;
  
    
    /* --------- MÉTODOS --------- */ 
    
    /* Sobrecarga de constructores */
    public function __construct(){
        try {
            $this->dbh = DataBase::connection();
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        
    }
    public function __construct2($codigo_rol,$pass_user){        
        $this->codigo_rol = $codigo_rol;
        $this->pass_user = $pass_user;        
    }

    public function setRolCode($codigo_rol){
        $this->codigo_rol = $codigo_rol;
    }
    public function getRolCode(){
        return $this->codigo_rol;
    }
}
?>