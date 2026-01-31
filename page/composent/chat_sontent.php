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
    
    <div class="messagecontent">
        <?php
            include 'sgbd/controller/card/message/message_text.php';
        ?>

        <div class="chatmedia">
            <img class="imgchat" src="assets/2.jpg" alt="" srcset="">
            <div class="infouser">
                <img src="assets/1.png" alt="" srcset="">
                <div class="userp">
                    <h4>Kamao</h4>
                    <p>25/12/2025 à 12h35</p>
                </div>
            </div>
        </div>

        <div class="chatusermedia">
            <img class="imgchat" src="assets/2.jpg" alt="" srcset="">
            <div class="infouser">
                <img src="assets/1.png" alt="" srcset="">
                <div class="userp">
                    <h4>Kamao</h4>
                    <p>25/12/2025 à 12h35</p>
                </div>
            </div>
        </div>

        <div class="chatusermedia">
            <video class="imgchat" src="assets/6.mp4" controls srcset=""></video>
            <div class="infouser">
                <img src="assets/1.png" alt="" srcset="">
                <div class="userp">
                    <h4>Kamao</h4>
                    <p>25/12/2025 à 12h35</p>
                </div>
            </div>
        </div>
        <div class="chatmedia">
            <video class="imgchat" src="assets/6.mp4" controls srcset=""></video>
            <div class="infouser">
                <img src="assets/1.png" alt="" srcset="">
                <div class="userp">
                    <h4>Kamao</h4>
                    <p>25/12/2025 à 12h35</p>
                </div>
            </div>
        </div>
        
    </div>
    <form action="/index.php?for=addnewmessage_submission&chat=<?php echo $_GET['chat']; ?>" method="post">
        <textarea name="message" id="message" ></textarea>
        <input type="submit" value="Publier" id="publier">
    </form>
</section>