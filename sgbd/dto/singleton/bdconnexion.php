<?php

class ConnexionBD {
    private static $pdo = null;
    private static $host = "127.0.0.1";
    private static $port = 3306;
    private static $user = "root";
    private static $password = "4564";
    private static $dbname = "forum_db";

    public static function getPdo() {
        if (self::$pdo === null) {
            try {
                // Connexion sans base
                $pdo = new PDO(
                    "mysql:host=" . self::$host . ";port=" . self::$port,
                    self::$user,
                    self::$password,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );

                // Création base
                $pdo->exec("
                    CREATE DATABASE IF NOT EXISTS " . self::$dbname . "
                    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
                ");

                // Connexion AVEC base
                self::$pdo = new PDO(
                    "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname . ";charset=utf8mb4",
                    self::$user,
                    self::$password,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );

            } catch (PDOException $e) {
                die("Erreur connexion BD : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>