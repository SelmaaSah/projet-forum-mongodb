<?php

session_start();
require_once 'config/Manager.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch($action) {
    case 'myDashboard':
        require_once 'controllers/Dashboard.php';
        $controller = new DashboardController();
        $controller->index();
        break;

    case 'showTopic':
        require_once 'controllers/Topic.php';
        $controller = new TopicController();
        $controller->show();
        break;

    case 'createTopic':
        require_once 'controllers/Topic.php';
        $controller = new TopicController();
        $controller->create();
        break;

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

    case 'logout':
        require_once 'controllers/Users.php';
        $controller = new UsersController();
        $controller->logout();
        break;

    default:
        require 'views/partials/header.php';
        require_once 'models/TopicManager.php';
        
        echo "<section class='msg-default'>";
        if (isset($_SESSION['pseudo'])) {
            echo "<h2>Bonjour " . htmlspecialchars($_SESSION['pseudo']) . " !</h2>";
            echo "<br><a href='index.php?action=createTopic' class='btn-primary' style='background:#6c63ff'>+ Créer un nouveau sujet</a><br><br>";
           
            $topicManager = new TopicManager();
            $topics = $topicManager->getAllTopics();
            
            echo "<h3>Sujets récents</h3>";
            foreach ($topics as $t) {
                echo "<div style='border:1px solid #eee; padding:1rem; margin-top:1rem; text-align:left; border-radius:8px;'>";
                echo "<strong>" . htmlspecialchars($t->title) . "</strong><br>";
                echo "<small>Par " . htmlspecialchars($t->pseudo) . "</small><br><br>";
                
                echo "<a href='index.php?action=showTopic&id=" . $t->_id . "' class='btn-primary' >Voir et répondre</a>";
                
                echo "</div>";
            }
            
        } else {
            echo "<h2>hello Visiteur</h2>";
            echo "<p>Veuillez vous <a href='index.php?action=login' class='msg-success'>connecter</a> pour voir et créer des sujets.</p>";
        }
        echo "</section>";
        
        require 'views/partials/footer.php';
        break;
}
?>
