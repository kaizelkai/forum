<section class="s2">
    <?php
        include_once __DIR__ . '/../../sgbd/dto/chatdto.php';
        $title = $_GET['chat'] ?? 'Chat';
        $chat=new ChatDTO();
        $chatdata=$chat->readById($title);
    ?>
    <div class="titreh">
        <h2 class="titre"><?php echo htmlspecialchars($chatdata->getTitle()); ?></h2>
    </div>

    <div class="detailcontent">
        <img class="detailImg" src="assets/B.jpeg" alt="" srcset="">
        <p class="detail">
            <?php echo htmlspecialchars($chatdata->getContent()); ?>
        </p>
    </div>
</section>