<?php
include_once __DIR__ . '/crud.php';
interface CategorieService extends Crud {
    public function findByLabelle($labelle);
}
?>