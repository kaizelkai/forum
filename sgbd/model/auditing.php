<?php

class Auditing {
    private $created_at;
    private $updated_at;
    private $deleted_at;
    private $created_by;
    private $updated_by;
    private $deleted_by;
    public function __construct($created_by) {
        $this->created_at = date('Y-m-d H:i:s');
        $this->created_by = $created_by;
        $this->updated_at = null;
        $this->deleted_at = null;
        $this->updated_by = null;
        $this->deleted_by = null;
    }
    
    
    public function getCreatedAt() {
        return $this->created_at;
    }
    public function getUpdatedAt() {
        return $this->updated_at;
    }
    public function getDeletedAt() {
        return $this->deleted_at;
    }
    public function getCreatedBy() {
        return $this->created_by;
    }
    public function getUpdatedBy() {
        return $this->updated_by;
    }
    public function getDeletedBy() {
        return $this->deleted_by;
    }

    public function setCreated($created_by) {
        $this->created_at = date('Y-m-d H:i:s');
        $this->created_by = $created_by;
    }
    
    public function setUpdated($updated_by) {
        $this->updated_at = date('Y-m-d H:i:s');
        $this->updated_by = $updated_by;
    }
    public function setDeleted($deleted_by) {
        $this->deleted_at = date('Y-m-d H:i:s');
        $this->deleted_by = $deleted_by;
    }


}