<?php

interface Crud{
    public function create($obj);
    public function readById($id);
    public function readAll();
    public function update($obj);
    public function deleteById($id);
   
    public function search($keyword);
}

?>