<?php
    include_once __DIR__ . '/../../dto/categoriedto.php';
    include_once __DIR__ . '/../../model/categorie.php';

    $labelle = htmlspecialchars($_POST['labelle']);
    $createdBy = 1; // ID de l'utilisateur admin ou système

    if (!empty($labelle)) {
        $categorie = new Categorie(null, $labelle, $createdBy);
        $categorieDTO = new CategorieDTO();
        $categorieDTO->create($categorie);

        header("Location: index.php?for=home");
        exit();
    } else {
        header("Location: index.php?for=homevvvvvvv");
        exit();
    }
?>