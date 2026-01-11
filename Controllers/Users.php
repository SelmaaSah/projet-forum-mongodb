<?php
require_once 'models/UserManager.php';

class UsersController {

    // inscription
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                $manager = new UserManager();
                // verifier ici si le pseudo existe déjà avant d'inscrire
                $manager->inscription($_POST['pseudo'], $_POST['password']);
                
                // redirection vers la page de connexion après inscription
                header('Location: index.php?action=login'); 
                exit;
            }
        }
        require 'views/inscription.php';
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
        require 'views/connexion.php';
    }

    // DÉCONNEXION 
    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
?>
