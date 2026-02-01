
<?php
    include_once __DIR__ . '/bdconnexion.php';
    try{
        $categorietable = "CREATE TABLE IF NOT EXISTS categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        labelle VARCHAR(50) NOT NULL UNIQUE,
        created_at DATETIME NOT NULL,
        updated_at DATETIME,
        deleted_at DATETIME,
        created_by INT NOT NULL,
        updated_by INT,
        deleted_by INT
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo = ConnexionBD::getPdo();
    $pdo->exec($categorietable);
    // echo "Table 'categories' créée ou déjà existante."; // Supprimé pour ne pas bloquer les headers
    }catch(PDOException $e){
        die('Erreur de création de la table : '.$e->getMessage());
    }
?>