<?php
session_start();
// Vider toutes les variables de session
$_SESSION = [];

// Détruire la session
session_destroy();

// Supprimer le cookie de session (sécurité)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Redirection vers login
header("Location: index.php?for=login");
exit;
