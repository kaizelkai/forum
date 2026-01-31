<?php
include_once __DIR__ . '/auditing.php';
class Chat extends Auditing {
    private $id;
    private $title;
    private $content;
    private $userId;
    private $categorieId;

    public function __construct($id, $title, $content, $userId, $categorieId, $createdBy) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->userId = $userId;
        $this->categorieId = $categorieId;
        parent::__construct($createdBy);
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getContent() {
        return $this->content;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function getUserId() {
        return $this->userId;
    }
    public function setUserId($userId) {
        $this->userId = $userId;
    }
    public function getCategorieId() {
        return $this->categorieId;
    }
    public function setCategorieId($categorieId) {
        $this->categorieId = $categorieId;
    }
}
?>