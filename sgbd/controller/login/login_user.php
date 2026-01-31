<?php
    include_once __DIR__ . '/../../dto/userdto.php';

    $login = $_POST['username']; // peut être username ou email
    $password = $_POST['password'];

    try {
        $userDto = new UserDto();

        // on cherche par username ou email
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $user = $userDto->getUserByEmail($login);
        } else {
            $user = $userDto->getUserByUsername($login);
        }

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header('Location: index.php?for=home');
            exit;
        } else {
            die("Identifiants incorrects");
        }

    } catch (PDOException $e) {
        die("Error login user: " . $e->getMessage());
    }
?>
