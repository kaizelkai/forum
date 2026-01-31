<?php
    include_once __DIR__ . '/../../dto/chatdto.php';
    include_once __DIR__ . '/../../dto/categoriedto.php';
    $chatDTO = new ChatDTO();
    $chats = $chatDTO->readAll();
    
    $categorieDTO = new CategorieDTO();
    

    foreach ($chats as $chat) {
        $categorie = $categorieDTO->readById($chat->getCategorieId());
    ?>
    <div class="wid">
        <img src="assets/1.png" alt="logo"/>
        <div class="info">
            <?php
            echo '<h2><a href="index.php?for=chat&chat=' . $chat->getId() . '">' . $chat->getTitle() . '</a></h2>';
            echo '<h3>' . $categorie->getLabelle() . '</h3>';
            echo '<p>' . $chat->getContent() . '</p>';
            echo '<a href="index.php?for=detail&chat=' . $chat->getId() . '" class="plusInfo">En savoir plus</a>';
            ?>
        </div>
    </div>
<?php }?>