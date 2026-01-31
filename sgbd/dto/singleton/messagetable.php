<?php
    include_once __DIR__ . '/bdconnexion.php';
    try{
        $usertable = "CREATE TABLE IF NOT EXISTS messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        message TEXT NOT NULL,
        chat_id INT NOT NULL,
        user_id INT NOT NULL,
        created_at DATETIME NOT NULL,
        updated_at DATETIME,
        deleted_at DATETIME,
        created_by INT NOT NULL,
        updated_by INT,
        deleted_by INT
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo = ConnexionBD::getPdo();
    $pdo->exec($usertable);
    // echo "Table 'messages' créée ou déjà existante."; // Supprimé pour ne pas bloquer les headers
    }catch(PDOException $e){
        die('Erreur de création de la table : '.$e->getMessage());
    }
?>