<?php
require_once 'models/TopicManager.php';

class TopicController {
    public function create() {
        // Sécurité : si pas connecté, redirection
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $manager = new TopicManager();
                $manager->create(
                    $_POST['title'], 
                    $_POST['content'], 
                    $_SESSION['user_id'], 
                    $_SESSION['pseudo']
                );
                header('Location: index.php');
                exit;
            }
        }
        require 'views/topic/createTopic.php';
    }
    
}