<?php
    include_once __DIR__ . '/../../dto/messagedto.php';
    include_once __DIR__ . '/../../model/message.php';

    $messageContent = $_POST['message'];
    $chatId = $_GET['chat']; // Assuming chat_id is passed as a GET parameter
    $userId = $_SESSION['user_id']; // Assuming user_id is stored in session    

    if (empty($messageContent) || empty($chatId) || !isset($userId)) {
        header("Location: index.php?for=login");
        exit();
    }

    $message = new Message(null, $messageContent, $chatId, $userId, 1); // Using 1 as placeholder for created_by
    $messageDTO = new MessageDTO();
    $success = $messageDTO->create($message);

    if ($success) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        die("Error adding message.");
    }
?>