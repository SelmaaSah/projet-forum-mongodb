<?php
// index.php
session_start();
require_once 'config/Manager.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch($action) {
    
    case 'register':
        require_once 'controllers/Users.php';
        $controller = new UsersController();
        $controller->register();
        break;

    case 'login':
        require_once 'controllers/Users.php';
        $controller = new UsersController();
        $controller->login();
        break;

    //  Déconnexion ---
    case 'logout':
        require_once 'controllers/Users.php';
        $controller = new UsersController();
        $controller->logout();
        break;

    default:
        require 'views/partials/header.php';
        
        if (isset($_SESSION['pseudo'])) {
            echo "<h2>Bonjour " . $_SESSION['pseudo'] . " !</h2>";
            echo "<p>Vous êtes connecté.</p>";
            echo "<a href='index.php?action=logout'>Se déconnecter</a>";
        } else {
            echo "<h2>Bienvenue Visiteur</h2>";
            echo "<p>Veuillez vous <a href='index.php?action=login'>connecter</a>.</p>";
        }
        
        require 'views/partials/footer.php';
        break;
}
?>
