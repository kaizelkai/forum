<?php
    include_once __DIR__ . '/../../dto/userdto.php';
    include_once __DIR__ . '/../../model/user.php';
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['password_confirmation'];
    
    if ($password !== $passwordConfirmation) {
        die("Passwords do not match.");
    }
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        $userDto = new UserDto();
        $user = new User(
            $username,
            $email,
            $hashedPassword,
            1
        );
        if ($userDto->exists($email)) {
            die("Email already exists.");
        }
        if ($userDto->existsUsername($username)) {
            die("Username already exists.");
        }

        $userDto->create($user);
        header('Location: index.php?for=login');
    } catch (PDOException $e) {
        die("Error registering user: " . $e->getMessage());
    }
?>