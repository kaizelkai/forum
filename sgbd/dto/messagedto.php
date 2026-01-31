<?php
    include_once __DIR__ . '/singleton/bdconnexion.php';
    include_once __DIR__ . '/singleton/messagetable.php';
    include_once __DIR__ . '/../model/message.php';
    include_once __DIR__ . '/../service/messageservice.php';

    class MessageDTO implements MessageService {
        
        private $CREATE_MESSAGE = "INSERT INTO messages (message, chat_id, user_id, created_by, created_at, updated_at, deleted_at, updated_by, deleted_by) VALUES (:message, :chatId, :userId, :createdBy, :createdAt, :updatedAt, :deletedAt, :updatedBy, :deletedBy)";
        private $READ_MESSAGE_BY_ID = "SELECT * FROM messages WHERE id = :id AND deleted_at IS NULL";
        private $UPDATE_MESSAGE_BY_ID = "UPDATE messages SET message = :message, chat_id = :chatId, user_id = :userId, updated_at = :updatedAt, updated_by = :updatedBy WHERE id = :id AND deleted_at IS NULL";
        private $DELETE_MESSAGE_BY_ID = "UPDATE messages SET deleted_by = :deletedBy, deleted_at = :deletedAt WHERE id = :id AND deleted_at IS NULL";
        private $READ_ALL_MESSAGES = "SELECT * FROM messages WHERE deleted_at IS NULL ORDER BY created_at DESC";
        private $FIND_BY_CHAT_ID = "SELECT * FROM messages WHERE chat_id = :chatId AND deleted_at IS NULL ORDER BY created_at DESC";

        private $SEARCH_MESSAGE_BY_KEYWORD = "SELECT * FROM messages WHERE message LIKE :keyword AND deleted_at IS NULL";

        private $pdo;

        public function __construct() {
            $this->pdo = ConnexionBD::getPdo();
        }

        public function create($message) {
            $stmt = $this->pdo->prepare($this->CREATE_MESSAGE);
            return $stmt->execute([
                'message' => $message->getMessage(),
                'chatId' => $message->getChatId(),
                'userId' => $message->getUserId(),
                'createdBy' => $message->getCreatedBy(),
                'updatedBy' => $message->getUpdatedBy(),
                'deletedBy' => $message->getDeletedBy(),
                'createdAt' => $message->getCreatedAt(),
                'updatedAt' => $message->getUpdatedAt(),
                'deletedAt' => $message->getDeletedAt()
            ]);
        }
        public function readById($id) {
            $stmt = $this->pdo->prepare($this->READ_MESSAGE_BY_ID);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return new Message($row['id'], $row['message'], $row['chat_id'], $row['user_id'], $row['created_by']);
            }
            return null;
        }
        public function update($message) {
            $stmt = $this->pdo->prepare($this->UPDATE_MESSAGE_BY_ID);
            $stmt->execute([
                'message' => $message->getMessage(),
                'chatId' => $message->getChatId(),
                'userId' => $message->getUserId(),
                'updatedAt' => $message->getUpdatedAt(),
                'updatedBy' => $message->getUpdatedBy(),
                'id' => $message->getId()
            ]);
            return $stmt->rowCount() > 0;
        }
        public function deleteById($id) {
            $stmt = $this->pdo->prepare($this->DELETE_MESSAGE_BY_ID);
            $stmt->execute([
                'deletedBy' => 1, // Assuming system user
                'deletedAt' => date('Y-m-d H:i:s'),
                'id' => $id
            ]);
            return $stmt->rowCount() > 0;    
        }
        public function readAll() {
            $stmt = $this->pdo->prepare($this->READ_ALL_MESSAGES);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array_map(function($row) {
                return new Message($row['id'], $row['message'], $row['chat_id'], $row['user_id'], $row['created_by']);
            }, $rows);
        }
        public function findByChatId($chatId) {
            $stmt = $this->pdo->prepare($this->FIND_BY_CHAT_ID);
            $stmt->execute(['chatId' => $chatId]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array_map(function($row) {
                return new Message($row['id'], $row['message'], $row['chat_id'], $row['user_id'], $row['created_by']);
            }, $rows);
        }
        public function search($keyword) {
            $stmt = $this->pdo->prepare($this->SEARCH_MESSAGE_BY_KEYWORD);
            $stmt->execute(['keyword' => "%$keyword%"]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array_map(function($row) {
                return new Message($row['id'], $row['message'], $row['chat_id'], $row['user_id'], $row['created_by']);
            }, $rows);
        }

        
    }
?>