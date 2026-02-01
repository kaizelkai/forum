<?php
include_once __DIR__ . '/crud.php';
interface UserService extends Crud {
    public function findByUsername($username);
    public function findByEmail($email);
    public function exists($email);
    public function existsUsername($username);
    public function getUserByEmail($email);
    public function getUserByUsername($username);
}
?>