<?php
require_once "models/User.php";
class Login{
    // Controlador Principal
    public function main() {        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {            
            require_once "views/company/login.view.php";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $profile = new User(
                $_POST['correo_user'],
                $_POST['pass_user']
            );            
            $profile = $profile->login();             
            if ($profile) {                
                header("Location:?c=Dashboard");
            } else {                
                header("Location:?");                
            }
        }
    }
}