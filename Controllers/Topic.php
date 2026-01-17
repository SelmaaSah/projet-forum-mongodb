<?php
require_once 'models/TopicManager.php';
require_once 'models/MessageManager.php';

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
    public function show() {
    if (!isset($_GET['id'])) { header('Location: index.php'); exit; }
    
    $topicId = $_GET['id'];
    $topicManager = new TopicManager();
    $messageManager = new MessageManager();

  
    $topic = $topicManager->getById($topicId);
    $messages = $messageManager->getByTopic($topicId);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
        if (!empty($_POST['content'])) {
            $parentId = !empty($_POST['parent_id']) ? $_POST['parent_id'] : null;
            
            $messageManager->create(
                $topicId, 
                $_POST['content'], 
                $_SESSION['user_id'], 
                $_SESSION['pseudo'], 
                $parentId
            );
            header("Location: index.php?action=showTopic&id=$topicId");
            exit;
        }
    }
    
    require 'views/topic/showTopic.php';
}
}?>
