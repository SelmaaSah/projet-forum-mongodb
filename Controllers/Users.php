<?php
require_once 'models/UserManager.php';

class UsersController {

    
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                $manager = new UserManager();
                $manager->inscription($_POST['pseudo'], $_POST['password']);
                
                header('Location: index.php?action=login'); 
                exit;
            }
        }
        require 'views/auth/inscription.php';
    }

    public function login() {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                
                $manager = new UserManager();
                $user = $manager->connexion($_POST['pseudo'], $_POST['password']);

                if ($user) {
                    
                    $_SESSION['user_id'] = (string)$user->_id;
                    $_SESSION['pseudo'] = $user->pseudo;

                    header('Location: index.php');
                    exit;
                } else {
                    $error = "Mauvais identifiant ou mot de passe.";
                }
            }
        }
        require 'views/auth/connexion.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
?>
