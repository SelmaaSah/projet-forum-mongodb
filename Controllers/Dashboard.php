<?php
require_once 'models/TopicManager.php';

class DashboardController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $pseudo = $_SESSION['pseudo'];
        $manager = new TopicManager(); 

        // Requête 1 : Sujets de l'utilisateur avec nb de commentaires
        $pipeline1 = [
            ['$match' => ['pseudo' => $pseudo]],
            ['$lookup' => [
                'from' => 'message', 
                'localField' => '_id',
                'foreignField' => 'topic_id',
                'as' => 'comments'
            ]],
            ['$project' => [
                'title' => 1,
                'count' => ['$size' => '$comments']
            ]]
        ];
        $userTopics = $manager->executeAggregate('topic', $pipeline1);

        require 'views/dashboard/index.php';
    }
}