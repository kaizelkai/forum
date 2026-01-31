<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "=== TEST DE CONNEXION MYSQL ===\n\n";

// Inclusion de la classe de connexion
include_once __DIR__ . '/sgbd/dto/singleton/bdconnexion.php';

echo "1️⃣ Test de connexion à MySQL...\n";
try {
    $pdo = ConnexionBD::getPdo();
    echo "✅ Connexion réussie à MySQL\n\n";
} catch (PDOException $e) {
    echo "❌ Erreur de connexion : " . $e->getMessage() . "\n";
    exit;
}

echo "2️⃣ Vérification de la base de données 'forum_db'...\n";
try {
    $stmt = $pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'forum_db'");
    $result = $stmt->fetch();
    if ($result) {
        echo "✅ Base de données 'forum_db' existe\n\n";
    } else {
        echo "❌ Base de données 'forum_db' n'existe pas\n\n";
    }
} catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage() . "\n";
}

echo "3️⃣ Vérification de la table 'users'...\n";
try {
    $stmt = $pdo->query("SHOW TABLES LIKE 'users'");
    $result = $stmt->fetch();
    if ($result) {
        echo "✅ Table 'users' existe\n\n";
    } else {
        echo "❌ Table 'users' n'existe pas\n\n";
    }
} catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage() . "\n";
}

echo "4️⃣ Affichage de la structure de la table 'users'...\n";
try {
    $stmt = $pdo->query("DESCRIBE users");
    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($columns)) {
        echo "✅ Colonnes trouvées :\n";
        foreach ($columns as $col) {
            echo "  - " . $col['Field'] . " (" . $col['Type'] . ")\n";
        }
        echo "\n";
    } else {
        echo "❌ Aucune colonne trouvée\n\n";
    }
} catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage() . "\n";
}

echo "5️⃣ Affichage des utilisateurs enregistrés...\n";
try {
    $stmt = $pdo->query("SELECT id, username, email, created_at FROM users WHERE deleted_at IS NULL");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($users)) {
        echo "✅ " . count($users) . " utilisateur(s) trouvé(s) :\n";
        foreach ($users as $user) {
            echo "  - ID: " . $user['id'] . ", Username: " . $user['username'] . ", Email: " . $user['email'] . ", Créé: " . $user['created_at'] . "\n";
        }
        echo "\n";
    } else {
        echo "⚠️  Aucun utilisateur enregistré pour le moment\n\n";
    }
} catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage() . "\n";
}

echo "=== TEST TERMINÉ ===\n";
?>
