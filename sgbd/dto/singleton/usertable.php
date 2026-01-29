<?php
    try{
        $usertable = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        profile_url VARCHAR(255),
        created_at DATETIME NOT NULL,
        updated_at DATETIME,
        deleted_at DATETIME,
        created_by INT NOT NULL,
        updated_by INT,
        deleted_by INT
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo = ConnexionBD::getPdo();
    $pdo->exec($usertable);
    echo "Table 'users' créée ou déjà existante.";
    }catch(PDOException $e){
        die('Erreur de création de la table : '.$e->getMessage());
    }
?>