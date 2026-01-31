<?php
    include_once __DIR__ . '/../service/userservice.php';
    include_once __DIR__ . '/singleton/bdconnexion.php';
    include_once __DIR__ . '/singleton/usertable.php';
    class UserDto implements UserService{
        private $CREATE_USER = "INSERT INTO users (username, email, password, profile_url, created_at, updated_at, deleted_at, created_by, updated_by, deleted_by) VALUES (:username, :email, :password, :profileUrl, :createdAt, :updatedAt, :deletedAt, :createdBy, :updatedBy, :deletedBy)";
        private $READ_USER_BY_ID = "SELECT * FROM users WHERE id = :id AND deleted_at IS NULL";
        private $READ_ALL_USERS = "SELECT * FROM users WHERE deleted_at IS NULL";
        private $UPDATE_USER = "UPDATE users SET username = :username, email = :email, password = :password, profile_url = :profileUrl, updated_by = :updatedBy, updated_at = :updatedAt WHERE id = :id AND deleted_at IS NULL";
        private $DELETE_USER_BY_ID = "UPDATE users SET deleted_by = :deletedBy, deleted_at = :deletedAt WHERE id = :id AND deleted_at IS NULL"; 
        
        private $SEARCH_USER = "SELECT * FROM users WHERE (username LIKE :keyword OR email LIKE :keyword) AND deleted_at IS NULL";
        private $FIND_BY_USERNAME = "SELECT * FROM users WHERE username = :username AND deleted_at IS NULL";
        private $FIND_BY_EMAIL = "SELECT * FROM users WHERE email = :email AND deleted_at IS NULL";
        
        private $pdo;
        
        public function __construct(){
            $this->pdo = ConnexionBD::getPdo();
        }
        
        public function create($obj){
            $stmt = $this->pdo->prepare($this->CREATE_USER);
            $stmt->execute([
                'username' => $obj->getUsername(),
                'email' => $obj->getEmail(),
                'password' => $obj->getPassword(),
                'profileUrl' => $obj->getProfileUrl(),
                'createdBy' => $obj->getCreatedBy(),
                'updatedBy' => $obj->getUpdatedBy(),
                'deletedBy' => $obj->getDeletedBy(),
                'createdAt' => $obj->getCreatedAt(),
                'updatedAt' => $obj->getUpdatedAt(),
                'deletedAt' => $obj->getDeletedAt()
            ]);
        }
        public function readById($id){
            $stmt = $this->pdo->prepare($this->READ_USER_BY_ID);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return new User(
                    $row['username'],
                    $row['email'],
                    $row['password'],
                    $row['created_by'],
                    $row['id'],
                    $row['profile_url']
                );
            }
            return null;
        }
        public function readAll(){
            $stmt = $this->pdo->prepare($this->READ_ALL_USERS);
            $stmt->execute();
            $users = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $users[] = new User(
                    $row['username'],
                    $row['email'],
                    $row['password'],
                    $row['created_by'],
                    $row['id'],
                    $row['profile_url']
                );
            }
            return $users;
        }
        public function update($obj){
            $stmt = $this->pdo->prepare($this->UPDATE_USER);
            $stmt->execute([
                'username' => $obj->getUsername(),
                'email' => $obj->getEmail(),
                'password' => $obj->getPassword(),
                'profileUrl' => $obj->getProfileUrl(),
                'updatedBy' => $obj->getUpdatedBy(),
                'updatedAt' => $obj->getUpdatedAt(),
                'id' => $obj->getId()
            ]);
        }
        
        public function deleteById($id){
            $stmt = $this->pdo->prepare($this->DELETE_USER_BY_ID);
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
        public function findByUsername($username){
            $stmt = $this->pdo->prepare($this->FIND_BY_USERNAME);
            $stmt->execute(['username' => $username]);
            return $stmt;
        }
        public function findByEmail($email){
            $stmt = $this->pdo->prepare($this->FIND_BY_EMAIL);
            $stmt->execute(['email' => $email]);
            return $stmt;
        }

        public function exists($email){
            $stmt = $this->pdo->prepare($this->FIND_BY_EMAIL);
            $stmt->execute(['email' => $email]);
            return $stmt->rowCount() > 0;
        }
        public function existsUsername($username){
            $stmt = $this->pdo->prepare($this->FIND_BY_USERNAME);
            $stmt->execute(['username' => $username]);
            return $stmt->rowCount() > 0;
        }

        public function getUserByUsername($username){
            $stmt = $this->pdo->prepare($this->FIND_BY_USERNAME);
            $stmt->execute(['username' => $username]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getUserByEmail($email){
            $stmt = $this->pdo->prepare($this->FIND_BY_EMAIL);
            $stmt->execute(['email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>