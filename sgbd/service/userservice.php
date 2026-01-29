<?php
interface UserService extends Crud {
    public function findByUsername($username);
    public function findByEmail($email);
}
?>