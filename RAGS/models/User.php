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

    // Constructor de 2 parámetros (inicio sesión)
    public function __construct0(){}

    // Constructor de 2 parámetros (inicio sesión)
    public function __construct2($correo_user,$pass_user){        
        $this->user_email = $user_email;
        $this->user_pass = $user_pass;        
    }

    // Constructor de 8 parámetros (Obj de toda la clase)
    public function __construct8($rol_code,$user_code,$user_name,$user_lastname,$user_id,$user_email,$user_pass,$user_status){
        $this->rol_code = $rol_code;        
        $this->user_code = $user_code;
        $this->user_name = $user_name;
        $this->user_lastname = $user_lastname;
        $this->user_id = $user_id;
        $this->user_email = $user_email;
        $this->user_pass = $user_pass;
        $this->user_status = $user_status;
    }
    // Constructor de 9 parámetros (Obj de toda la clase)
    public function __construct9($rol_code,$rol_name,$user_code,$user_name,$user_lastname,$user_id,$user_email,$user_pass,$user_status){
        $this->rol_code = $rol_code;
        $this->rol_name = $rol_name;
        $this->user_code = $user_code;
        $this->user_name = $user_name;
        $this->user_lastname = $user_lastname;
        $this->user_id = $user_id;
        $this->user_email = $user_email;
        $this->user_pass = $user_pass;
        $this->user_status = $user_status;
    }


    /* Métodos Setters y Getters */
    
    // Código del rol
    public function setRolCode($rol_code){
        $this->rol_code = $rol_code;
    }
    public function getRolCode(){
        return $this->rol_code;
    }
    // Nombre del rol
    public function setRolName($rol_name){
        $this->rol_name = $rol_name;
    }
    public function getRolName(){
        return $this->rol_name;
    }
    // Código del Usuario
    public function setUserCode($user_code){
        $this->user_code = $user_code;
    }
    public function getUserCode(){
        return $this->user_code;
    }
    // Nombre del Usuario
    public function setUserName($user_name){
        $this->user_name = $user_name;
    }
    public function getUserName(){
        return $this->user_name;
    }
    // Apellido del Usuario
    public function setUserLastName($user_lastname){
        $this->user_lastname = $user_lastname;
    }
    public function getUserLastName(){
        return $this->user_lastname;
    }
    // Identificación del Usuario
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }
    public function getUserId(){
        return $this->user_id;
    }
    // Email del Usuario
    public function setUserEmail($user_email){
        $this->user_email = $user_email;
    }
    public function getUserEmail(){
        return $this->user_email;
    }
    // Contraseña del Usuario
    public function setUserPass($user_pass){
        $this->user_pass = $user_pass;
    }
    public function getUserPass(){
        return $this->user_pass;
    }
    // Estado del Usuario
    public function setUserStatus($user_status){
        $this->user_status = $user_status;
    }
    public function getUserStatus(){
        return $this->user_status;
    }
    
    /* Métodos Persistencia a la Base de datos */
    # RF01_CU01 - Iniciar Sesión
    public function login(){
        try {
            $sql = 'SELECT * FROM USERS
                    WHERE user_email = :userEmail AND user_pass = :userPass';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('userEmail', $this->getUserEmail());
            $stmt->bindValue('userPass', sha1($this->getUserPass()));
            $stmt->execute();
            $userDb = $stmt->fetch();
            if ($userDb) {
                $user = new User(
                    $userDb['rol_code'],                    
                    $userDb['user_code'],
                    $userDb['user_name'],
                    $userDb['user_lastname'],
                    $userDb['user_id'],
                    $userDb['user_email'],
                    $userDb['user_pass'],
                    $userDb['user_state']
                );
                return $user;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    # RF04_CU04 - Registrar Rol
    public function createRol(){
        try {
            $sql = 'INSERT INTO ROLES VALUES (:rolCode,:rolName)';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('rolCode', $this->getRolCode());
            $stmt->bindValue('rolName', $this->getRolName());
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
                $rolObj->setRolCode($rol['rol_code']);
                $rolObj->setRolName($rol['rol_name']);
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
            $sql = "SELECT * FROM ROLES WHERE rol_code=:rolCode";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('rolCode', $rolCode);
            $stmt->execute();
            $rolDb = $stmt->fetch();
            $rol = new User;
            $rol->setRolCode($rolDb['rol_code']);
            $rol->setRolName($rolDb['rol_name']);
            return $rol;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    # RF07_CU07 - Actualizar Rol
    public function updateRol(){
        try {
            $sql = 'UPDATE ROLES SET
                        rol_code = :rolCode,
                        rol_name = :rolName
                    WHERE rol_code = :rolCode';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('rolCode', $this->getRolCode());
            $stmt->bindValue('rolName', $this->getRolName());
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    # RF08_CU08 - Eliminar Rol
    public function deleteRol($rolCode){
        try {
            $sql = 'DELETE FROM ROLES WHERE rol_code = :rolCode';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('rolCode', $rolCode);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>