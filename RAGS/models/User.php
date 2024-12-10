<?php

class User{
    /* -------- ATRIBUTOS ------- */
    private $dbh;
    private $codigo_usuario;
    private $nombres_user;
    private $last_name_user;
    private $cedula_user;
    private $correo_user;
    private $codigo_rol;
    private $pass_user;
    private $nombre_rol;
    private $codigo_ingreso;
    private $fecha_ingreso;
    private $hora_entrada_ingreso;
    private $hora_salida_ingreso;

    
  
    
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
    public function __construct8($codigo_usuario,$nombres_user,$last_name_user,$cedula_user,$correo_user,$codigo_rol,$pass_user){
        $this->codigo_usuario = $codigo_usuario;
        $this->nombres_user = $nombres_user;
        $this->last_name_user = $last_name_user;
        $this->cedula_user = $cedula_user;
        $this->correo_user = $correo_user;
        $this->codigo_rol = $codigo_rol;
        $this->pass_user = $pass_user;
    }

     // Contructor de ocho parametros
     public function __construct10($codigo_ingreso,$nombres_user,$last_name_user,$cedula_user,$correo_user,$codigo_rol,$pass_user,$fecha_ingreso,$hora_entrada_ingreso,$hora_salida_ingreso){
        $this->codigo_ingreso = $codigo_ingreso;
        $this->nombres_user = $nombres_user;
        $this->last_name_user = $last_name_user;
        $this->cedula_user = $cedula_user;
        $this->correo_user = $correo_user;
        $this->codigo_rol = $codigo_rol;
        $this->pass_user = $pass_user;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->hora_entrada_ingreso = $hora_entrada_ingreso;
        $this->hora_salida_ingreso = $hora_salida_ingreso;

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

    // Codigo Ingreso

    public function setCodigoIngreso($codigo_ingreso){
        $this->codigo_ingreso = $codigo_ingreso;
    }
    public function getCodigoIngreso(){
        return $this->codigo_ingreso;
    }

    // Fecha Ingreso

    public function setfechaIngreso($fecha_ingreso){
        $this->fecha_ingreso = $fecha_ingreso;
    }
    public function getfechaIngreso(){
        return $this->fecha_ingreso;
    }

    // Fecha de entrada

    public function setentradaIngreso($hora_entrada_ingreso){
        $this->hora_entrada_ingreso = $hora_entrada_ingreso;
    }
    public function getentradaIngreso(){
        return $this->hora_entrada_ingreso;
    }

    // Fecha de salida

    public function setsalidaIngreso($hora_salida_ingreso){
        $this->hora_salida_ingreso = $hora_salida_ingreso;
    }
    public function getsalidaIngreso(){
        return $this->hora_salida_ingreso;
    }



    // Persistencia a la base de datos

    // Roles
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

# RF07_CU07 - Actualizar Rol
public function updateRol(){
    try {
        $sql = 'UPDATE ROLES SET
                    codigo_rol = :rolCode,
                    nombre_rol = :rolName
                WHERE codigo_rol = :rolCode';
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
            $sql = 'DELETE FROM ROLES WHERE codigo_rol = :rolCode';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('rolCode', $rolCode);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Usuarios

    public function createUser(){
        try {
            $sql = 'INSERT INTO USUARIOS VALUES (:CodigoUser,:NombreUser,:LastNameUser,:CedulaUser,:CorreoUser,:RolCode,:PassUser,:RolName)';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('CodigoUser', $this->getCodigoUser());
            $stmt->bindValue('NombreUser', $this->getNombreUser());
            $stmt->bindValue('LastNameUser', $this->getLastNameUser());
            $stmt->bindValue('CedulaUser', $this->getCedulaUser());
            $stmt->bindValue('CorreoUser', $this->getCorreoUser());
            $stmt->bindValue('RolCode', $this->getRolCode());
            $stmt->bindValue('PassUser', $this->getPassUser());
            $stmt->bindValue('RolName', $this->getRolName());
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

     # RF05_CU05 - Consultar Uuarios
     public function readUsuarios(){
        try {
            $usuarioList = [];
            $sql = 'SELECT * FROM USUARIOS JOIN INGRESO JOIN ROLES';
            $stmt = $this->dbh->query($sql);
            foreach ($stmt->fetchAll() as $usuario) {
                $usuarioObj = new User;
                $usuarioObj->setCodigoUser($usuario['codigo_ingreso']);
                $usuarioObj->setNombreUser($usuario['nombres_user']);
                $usuarioObj->setLastNameUser($usuario['last_name_user']);
                $usuarioObj->setRolName($usuario['nombre_rol']);
                $usuarioObj->setCedulaUser($usuario['cedula_user']);
                $usuarioObj->setCorreoUser($usuario['correo_user']);
                $usuarioObj->setPassUser($usuario['pass_user']);
                $usuarioObj->setfechaIngreso($usuario['fecha_ingreso']);
                $usuarioObj->setentradaIngreso($usuario['hora_entrada_ingreso']);
                $usuarioObj->setsalidaIngreso($usuario['hora_salida_ingreso']);

                array_push($usuarioList, $usuarioObj);
            }
            return $usuarioList;
        } catch (Exception $e) {
            die($e->getMessage());
        }

}         
          # RF06_CU06 - Obtener el Rol por el código
    public function getUsuarioById($userCode){
        try {
            $sql = "SELECT * FROM USUARIOS JOIN INGRESO JOIN ROLES WHERE codigo_ingreso=:codigoIngreso";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('codigoIngreso', $userCode);
            $stmt->execute();
            $userDb = $stmt->fetch();
            $user = new User;
            $user->setCodigoUser($userDb['codigo_ingreso']);
            $user->setNombreUser($userDb['nombres_user']);
            $user->setLastNameUser($userDb['last_name_user']);
            $user->setRolName($userDb['nombre_rol']);
            $user->setCedulaUser($userDb['cedula_user']);
            $user->setCorreoUser($userDb['correo_user']);
            $user->setPassUser($userDb['pass_user']);
            $user->setfechaIngreso($userDb['fecha_ingreso']);
            $user->setentradaIngreso($userDb['hora_entrada_ingreso']);
            $user->setsalidaIngreso($userDb['hora_salida_ingreso']);
            return $user;
        } catch (Exception $e) {
            die($e->getMessage());
        }

}

    

}


?>

