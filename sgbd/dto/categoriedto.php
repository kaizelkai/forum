<?php
include_once __DIR__ . '/singleton/bdconnexion.php';
include_once __DIR__ . '/singleton/categorietable.php';
include_once __DIR__ . '/../model/categorie.php';
include_once __DIR__ . '/../service/categorieservice.php';

class CategorieDTO implements CategorieService {
    private $CREATE_CATEGORIE = "INSERT INTO categories (labelle, created_by, created_at, updated_at, deleted_at, updated_by, deleted_by) VALUES (:labelle, :createdBy, :createdAt, :updatedAt, :deletedAt, :updatedBy, :deletedBy)";

    #private $CREATE_CATEGORIE = "INSERT INTO categories (labelle, created_by, created_at, updated_at, deleted_at, created_by, updated_by, deleted_by) VALUES (:labelle, :createdBy, :createdAt, :updatedAt, :deletedAt, :createdBy, :updatedBy, :deletedBy)";
    private $READ_CATEGORIE_BY_ID = "SELECT * FROM categories WHERE id = :id AND deleted_at IS NULL";
    private $UPDATE_CATEGORIE_BY_ID = "UPDATE categories SET labelle = :labelle WHERE id = :id AND deleted_at IS NULL";
    private $DELETE_CATEGORIE_BY_ID = "UPDATE categories SET deleted_by = :deletedBy, deleted_at = :deletedAt WHERE id = :id AND deleted_at IS NULL";
    private $READ_ALL_CATEGORIE = "SELECT * FROM categories WHERE deleted_at IS NULL";
    private $SEARCH_CATEGORIE_BY_KEYWORD = "SELECT * FROM categories WHERE labelle LIKE :keyword AND deleted_at IS NULL";
    private $FIND_BY_LABELLE = "SELECT * FROM categories WHERE labelle = :labelle AND deleted_at IS NULL";
    
    private $pdo;

    public function __construct() {
        $this->pdo = ConnexionBD::getPdo();
    }

    public function create($categorie) {
        $stmt = $this->pdo->prepare($this->CREATE_CATEGORIE);
        return $stmt->execute([
            'labelle' => $categorie->getLabelle(),
            'createdBy' => $categorie->getCreatedBy(),
            'updatedBy' => $categorie->getUpdatedBy(),
            'deletedBy' => $categorie->getDeletedBy(),
            'createdAt' => $categorie->getCreatedAt(),
            'updatedAt' => $categorie->getUpdatedAt(),
            'deletedAt' => $categorie->getDeletedAt()
        ]);
    }


    public function readById($id) {
        $stmt = $this->pdo->prepare($this->READ_CATEGORIE_BY_ID);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Categorie($row['id'], $row['labelle'], $row['created_by']);
        }
        return null;
    }

    public function update($categorie) {
        $stmt = $this->pdo->prepare($this->UPDATE_CATEGORIE_BY_ID);
        $stmt->execute([
            'labelle' => $categorie->getLabelle(),
            'id' => $categorie->getId()
        ]);
        return $stmt->rowCount() > 0;
    }

    public function deleteById($id) {
        $stmt = $this->pdo->prepare($this->DELETE_CATEGORIE_BY_ID);
        $stmt->execute([
            'deletedBy' => 1, // Assuming system user
            'deletedAt' => date('Y-m-d H:i:s'),
            'id' => $id
        ]);
        return $stmt->rowCount() > 0;
    }

    public function search($keyword){
        $stmt = $this->pdo->prepare($this->SEARCH_CATEGORIE_BY_KEYWORD);
        $stmt->execute(['keyword' => "%$keyword%"]);
        return $stmt;
    }
    public function readAll() {
        $stmt = $this->pdo->prepare($this->READ_ALL_CATEGORIE);
        $stmt->execute();
        $categories = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = new Categorie($row['id'], $row['labelle'], $row['created_by']);
        }
        return $categories;
    }

        public function findByLabelle($labelle) {
        $stmt = $this->pdo->prepare($this->FIND_BY_LABELLE);
        $stmt->execute(['labelle' => $labelle]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Categorie($row['id'], $row['labelle'], $row['created_by']);
        }
        return null;
    }
}
    
?>