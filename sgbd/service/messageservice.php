<?php
include_once __DIR__ . '/crud.php';
interface MessageService extends Crud {
    public function findByChatId($chat_id);
}
?>