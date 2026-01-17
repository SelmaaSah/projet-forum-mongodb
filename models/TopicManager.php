<?php
require_once 'config/Manager.php';

class TopicManager extends Manager {
   public function create($title, $content, $userId, $pseudo) {
    $topic = [
        'title'      => $title, 
        'content'    => $content,
        'user_id'    => $userId,
        'pseudo'     => $pseudo,
        'created_at' => new \MongoDB\BSON\UTCDateTime()
    ];
    return $this->insertOne('topic', $topic);
}

        public function getAllTopics($sortOrder = 'newest') {
        
        $direction = ($sortOrder === 'oldest') ? 1 : -1;

        return $this->executeQuery('topic', [], ['sort' => ['created_at' => $direction]]);
    }
    public function getById($topicId) {
        $result = $this->executeQuery('topic', ['_id' => new MongoDB\BSON\ObjectId($topicId)]);
        return !empty($result) ? $result[0] : null;
}
}
