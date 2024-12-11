<?php
require_once "models/User.php";
class Login{
    // Controlador Principal
    public function main() {        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $profile = new User(
                $_POST['user_email'],
                $_POST['user_pass']
            );            
            $profile = $profile->login();
            print_r($profile);
            if ($profile) {                
                header("Location:?c=Dashboard");
            } else {                
                header("Location:?");                
            }
        }
    }
}