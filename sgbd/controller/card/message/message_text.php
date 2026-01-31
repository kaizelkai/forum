<?php
    include_once __DIR__ . '/../../../dto/messagedto.php';
    include_once __DIR__ . '/../../../dto/userdto.php';

    $messageDTO = new MessageDTO();
    $messages = $messageDTO->readAll();
    $userDTO = new UserDTO();

    foreach ($messages as $message) {
        $user = $userDTO->readById($message->getUserId());
        ?>
        
        <?php
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $message->getUserId()) {
            ?>
            <div class="chatuser">
                <p><?php echo htmlspecialchars($message->getMessage()); ?></p>
            <div class="infouser">
                <img src="assets/1.png" alt="" srcset="">
                <div class="userp">
                    <h4><?php echo htmlspecialchars($user->getUsername()); ?></h4>
                    <p><?php echo htmlspecialchars($message->getCreatedAt()); ?></p>
                </div>
                
            </div>
        </div>
        <?php
        }
        else {
            ?>
            <div class="chat">
                <p><?php echo htmlspecialchars($message->getMessage()); ?></p>
            <div class="infouser">
                <img src="assets/1.png" alt="" srcset="">
                <div class="userp">
                    <h4><?php echo htmlspecialchars($user->getUsername()); ?></h4>
                    <p><?php echo htmlspecialchars($message->getCreatedAt()); ?></p>
                </div>
                
            </div>
        </div>
        <?php
        }
    }
?>
