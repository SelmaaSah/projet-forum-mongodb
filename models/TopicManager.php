<?php
require_once 'config/Manager.php';

class TopicManager extends Manager {
    public function create($title, $content, $userId, $pseudo) {
        $topic = [
            'title'      => htmlspecialchars($title),
            'content'    => htmlspecialchars($content),
            'user_id'    => $userId,
            'pseudo'     => $pseudo,
            'created_at' => new \MongoDB\BSON\UTCDateTime()
        ];
        return $this->insertOne('topic', $topic);
    }

    public function getAllTopics() {
        return $this->executeQuery('topic', [], ['sort' => ['created_at' => -1]]);
    }
}