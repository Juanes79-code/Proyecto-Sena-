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
    private $nombre_rol;
  
    
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
    public function __construct2($correo_user,$pass_user){        
        $this->correo_user = $correo_user;
        $this->pass_user = $pass_user;        
    }
    
    // Contructor de ocho parametros
    public function __construct8($codigo_usuario,$nombres_user,$last_name_user,$cedula_user,$correo_user,$cargo_user,$codigo_rol,$pass_user){
        $this->codigo_usuario = $codigo_usuario;
        $this->nombres_user = $nombres_user;
        $this->last_name_user = $last_name_user;
        $this->cedula_user = $cedula_user;
        $this->correo_user = $correo_user;
        $this->cargo_user = $cargo_user;
        $this->codigo_rol = $codigo_rol;
        $this->pass_user = $pass_user;
    }

    // Setters y Geeters

    // Codigo usuario
    public function setCodigoUser($codigo_usuario){
        $this->codigo_usuario = $codigo_usuario;
    }

    public function getCodigoUser(){
        return $this->codigo_usuario;
    }

    // Nombre usuario
    public function setNombreUser($nombres_user){
        $this->nombres_user = $nombres_user;
    }

    public function getNombreUser(){
        return $this->nombres_user;
    }

    // Apellido usuario
    
    public function setLastNameUser($last_name_user){
        $this->last_name_user = $last_name_user;
    }

    public function getLastNameUser(){
        return $this->last_name_user;
    }

    // Cedula usuario
    public function setCedulaUser($cedula_user){
        $this->cedula_user = $cedula_user;
    }

    public function getCedulaUser(){
        return $this->cedula_user;
    }

    // Correo usuario

    public function setCorreoUser($correo_user){
        $this->correo_user = $correo_user;
    }

    public function getCorreoUser(){
        return $this->correo_user;
    }

    // Cargo usuario
    
    public function setCargoUser($cargo_user){
        $this->cargo_user = $cargo_user;
    }
    
    public function getCargoUser(){
        return $this->cargo_user;
    }

    // Codigo rol

    public function setRolCode($codigo_rol){
        $this->codigo_rol = $codigo_rol;
    }

    public function getRolCode(){
        return $this->codigo_rol;
    }

    // Contraseña usuario

    public function setPassUser($pass_user){
        $this->pass_user = $pass_user;
    }

    public function getPassUser(){
        return $this->pass_user;
    }

     // Nombre del rol

     public function setRolName($nombre_rol){
        $this->nombre_rol = $nombre_rol;
    }
    public function getRolName(){
        return $this->nombre_rol;
    }

    // Persistencia a la base de datos
    public function login(){
        try {
            $sql = 'SELECT * FROM USUARIOS
                    WHERE correo_user = :userEmail AND pass_user = :userPass';            
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('userEmail', $this->getCorreoUser());
            $stmt->bindValue('userPass', sha1($this->getPassUser()));
            $stmt->execute();
            $userDb = $stmt->fetch();            
            if ($userDb) {
                $user = new User(
                    $userDb['codigo_usuario'],                    
                    $userDb['nombres_user'],
                    $userDb['last_name_user'],
                    $userDb['cedula_user'],
                    $userDb['correo_user'],
                    $userDb['cargo_user'],
                    $userDb['codigo_rol'],
                    $userDb['pass_user']
                );
                return $user;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

        // Registrar Rol
    public function createRol(){
            try {
                $sql = 'INSERT INTO ROLES VALUES (:rolCode,:RolName)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('RolName', $this->getRolName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

          # RF05_CU05 - Consultar Roles
    public function readRoles(){
        try {
            $rolList = [];
            $sql = 'SELECT * FROM ROLES';
            $stmt = $this->dbh->query($sql);
            foreach ($stmt->fetchAll() as $rol) {
                $rolObj = new User;
                $rolObj->setRolCode($rol['codigo_rol']);
                $rolObj->setRolName($rol['nombre_rol']);
                array_push($rolList, $rolObj);
            }
            return $rolList;
        } catch (Exception $e) {
            die($e->getMessage());
        }

}

    # RF06_CU06 - Obtener el Rol por el código
    public function getRolById($rolCode){
        try {
            $sql = "SELECT * FROM ROLES WHERE codigo_rol=:rolCode";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('rolCode', $rolCode);
            $stmt->execute();
            $rolDb = $stmt->fetch();
            $rol = new User;
            $rol->setRolCode($rolDb['codigo_rol']);
            $rol->setRolName($rolDb['nombre_rol']);
            return $rol;
        } catch (Exception $e) {
            die($e->getMessage());
        }

}
}

?>

