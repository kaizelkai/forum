<?php
    include_once __DIR__ . '/../../dto/chatdto.php';
    include_once __DIR__ . '/../../model/chat.php';

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $userId = $_SESSION['user_id'] ?? null; // ID de l'utilisateur admin ou système
    $categorieId = htmlspecialchars($_POST['categorie_id']); // ID de la catégorie par défaut
    $createdBy = $userId; // ID de l'utilisateur admin ou système

    if (!empty($title) && !empty($content) && isset($userId) && !empty($categorieId)) {
        $chat = new Chat(null, $title, $content, $userId, $categorieId, $createdBy);
        $chatDTO = new ChatDTO();
        $chatDTO->create($chat);

        header("Location: index.php?for=home");
        exit();
    } else {
        header("Location: index.php?for=login");
        exit();
    }
?>