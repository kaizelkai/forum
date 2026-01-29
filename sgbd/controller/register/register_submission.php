<?php
    include_once __DIR__ . '../dto/userdto.php';

    try {
        $userDto = new UserDto();
        $user = new User(
            null,
            $_POST['username'],
            $_POST['email'],
            $_POST['password'],
            null,
            1
        );
        $userDto->create($user);
        echo "User registered successfully!";
        header('Location: index.php?for=login');
    } catch (PDOException $e) {
        die("Error registering user: " . $e->getMessage());
    }
    

?>