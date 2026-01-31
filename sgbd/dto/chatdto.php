<?php
include_once __DIR__ . '/singleton/bdconnexion.php';
include_once __DIR__ . '/singleton/chattable.php';
include_once __DIR__ . '/../model/chat.php';
include_once __DIR__ . '/../service/chatservice.php';
class ChatDTO implements ChatService {
 
    private $CREATE_CHAT = "INSERT INTO chat (title, content, user_id, categorie_id, created_by, created_at, updated_at, deleted_at, updated_by, deleted_by) VALUES (:title, :content, :userId, :categorieId, :createdBy, :createdAt, :updatedAt, :deletedAt, :updatedBy, :deletedBy)";
    private $READ_CHAT_BY_ID = "SELECT * FROM chat WHERE id = :id AND deleted_at IS NULL";
    private $READ_ALL_CHATS = "SELECT * FROM chat  WHERE deleted_at IS NULL ORDER BY created_at DESC";
    private $UPDATE_CHAT = "UPDATE chat SET title = :title, content = :content, user_id = :userId, categorie_id = :categorieId, updated_at = :updatedAt, updated_by = :updatedBy WHERE id = :id  AND deleted_at IS NULL";
    private $DELETE_CHAT_BY_ID = "UPDATE chat SET deleted_by = :deletedBy, deleted_at = :deletedAt WHERE id = :id AND deleted_at IS NULL";

    private $SEARCH_USER = "SELECT * FROM chat WHERE (content LIKE :keyword OR title LIKE :keyword) AND deleted_at IS NULL";

    private $pdo;
        
    public function __construct(){
        $this->pdo = ConnexionBD::getPdo();
    }

    public function create($obj){
        $stmt = $this->pdo->prepare($this->CREATE_CHAT);
        $stmt->execute([
            'title' => $obj->getTitle(),
            'content' => $obj->getContent(),
            'userId' => $obj->getUserId(),
            'categorieId' => $obj->getCategorieId(),
            'createdAt' => $obj->getCreatedAt(),
            'createdBy' => $obj->getCreatedBy(),
            'updatedAt' => $obj->getUpdatedAt(),
            'updatedBy' => $obj->getUpdatedBy(),
            'deletedAt' => null,
            'deletedBy' => null
        ]);
    }

    public function readById($id){
        $stmt = $this->pdo->prepare($this->READ_CHAT_BY_ID);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Chat(
                $row['id'],
                $row['title'],
                $row['content'],
                $row['user_id'],
                $row['categorie_id'],
                $row['created_by'],
                $row['updated_by'],
                $row['deleted_by'],
                $row['created_at'],
                $row['updated_at'],
                $row['deleted_at']
            );
        }
        return null;
    }

    public function readAll(){
        $stmt = $this->pdo->prepare($this->READ_ALL_CHATS);
        $stmt->execute();
        $chats = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $chats[] = new Chat(
                $row['id'],
                $row['title'],
                $row['content'],
                $row['user_id'],
                $row['categorie_id'],
                $row['created_by'],
                $row['updated_by'],
                $row['deleted_by'],
                $row['created_at'],
                $row['updated_at'],
                $row['deleted_at']
            );
        }
        return $chats;
    }

    public function update($obj){
        $stmt = $this->pdo->prepare($this->UPDATE_CHAT);
        $stmt->execute([
            'title' => $obj->getTitle(),
            'content' => $obj->getContent(),
            'user_id' => $obj->getUserId(),
            'categorie_id' => $obj->getCategorieId(),
            'updated_at' => $obj->getUpdatedAt(),
            'updated_by' => $obj->getUpdatedBy(),
            'id' => $obj->getId()
        ]);
    }

    public function deleteById($id){
        $stmt = $this->pdo->prepare($this->DELETE_CHAT_BY_ID);
        $stmt->execute([
            'deletedBy' => 1, // Assuming system user
            'deletedAt' => date('Y-m-d H:i:s'),
            'id' => $id
        ]);
    }   

    public function search($keyword){
        $stmt = $this->pdo->prepare($this->SEARCH_USER);
        $stmt->execute(['keyword' => "%$keyword%"]);
        return $stmt;
    }

    public function findByTitle($title) {
        $stmt = $this->pdo->prepare("SELECT * FROM chat WHERE title = :title AND deleted_at IS NULL");
        $stmt->execute(['title' => $title]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Chat(
                $row['id'],
                $row['title'],
                $row['content'],
                $row['user_id'],
                $row['categorie_id'],
                $row['created_by'],
                $row['updated_by'],
                $row['deleted_by'],
                $row['created_at'],
                $row['updated_at'],
                $row['deleted_at']
            );
        }
        return null;
    }

}
?>