<?php
require_once 'config/Manager.php';

class MessageManager extends Manager {
    public function create($topicId, $content, $userId, $pseudo, $parentId = null) {
        $message = [
            'topic_id'   => new MongoDB\BSON\ObjectId($topicId),
            'parent_id'  => $parentId ? new MongoDB\BSON\ObjectId($parentId) : null,
            'content'    => htmlspecialchars($content),
            'user_id'    => $userId,
            'pseudo'     => $pseudo,
            'created_at' => new \MongoDB\BSON\UTCDateTime()
        ];
       
        return $this->insertOne('message', $message); 
    }

    public function getByTopic($topicId) {
        
        return $this->executeQuery('message', 
            ['topic_id' => new MongoDB\BSON\ObjectId($topicId)], 
            ['sort' => ['created_at' => 1]]
        );
    }
}