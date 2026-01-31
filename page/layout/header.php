<header>
    <div class="logo">
        <img src="assets/1.png" alt="logo">
    </div>
    <div class="navBar">
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">CONTACT</a></li>
                <li><a href="index.php?for=categorie">ADD CATEGORY</a></li>
                <li><a href="index.php?for=addnewchat">ADD NEW CHAT</a></li>

            </ul>
        </nav>
        <?php session_start(); ?>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a class="button" href="index.php?for=logout">Logout</a>
        <?php else: ?>
            <a class="button" href="index.php?for=login">Se connecter</a>
        <?php endif; ?>
    </div>
</header>