<?php
include_once __DIR__ . '/auditing.php';
 class Message extends Auditing{
     private $id;
     private $message;
     private $chat_id;
     private $user_id;
    public function __construct($id, $message, $chat_id, $user_id, $created_by){
        parent::__construct($created_by);
        $this->id = $id;
        $this->message = $message;
        $this->chat_id = $chat_id;
        $this->user_id = $user_id;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;        
    }
    public function getMessage(){
        return $this->message;
    }
    public function setMessage($message){
        $this->message = $message;        
    }
    public function getChatId(){
        return $this->chat_id;
    }
    public function setChatId($chat_id){
        $this->chat_id = $chat_id;        
    }
    public function getUserId(){
        return $this->user_id;
    }
    public function setUserId($user_id){
        $this->user_id = $user_id;        
    }
 }
?>