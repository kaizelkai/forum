<?php
include_once __DIR__ . '/auditing.php';
class Categorie extends Auditing{
    private $id;
    private $labelle;

    public function __construct($id, $labelle, $createdBy) {
        $this->id = $id;
        $this->labelle = $labelle;
        parent::__construct($createdBy);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getLabelle() {
        return $this->labelle;
    }

    public function setLabelle($labelle) {
        $this->labelle = $labelle;
    }
}
?>