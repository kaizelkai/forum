<?php
include_once __DIR__ . '/crud.php';
interface ChatService extends Crud {
    public function findByTitle($title);

}
?>