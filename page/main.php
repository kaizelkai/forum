<?php include 'page/layout/header.php'; ?>
<main>
    <section class="s1">
        salut
    </section>
    <?php 
    // Traiter register_submission AVANT tout contenu HTML
    $choix= $_GET["for"] ?? 'home';
    switch ($choix) {
        case 'home':
            include 'page/composent/section_content.php';
            break;
        
        case 'chat':
            include 'page/composent/chat_sontent.php';
            break;
        
        case 'detail':
            include 'page/composent/datail_content.php';
            break;

        case 'register':
            include 'page/composent/auth/register.php';
            break;

        case 'register_submission':
            include 'sgbd/controller/register/register_submission.php';
            break;

        case 'login':
            include 'page/composent/auth/login.php';
            break;

        case 'login_user':
            include 'sgbd/controller/login/login_user.php';
            break;

        case 'logout':
            include 'sgbd/controller/logout/logout.php';
            break;

        case 'categorie':
            include 'page/composent/admin/categorie.php';
            break; 
            
        case 'categorie_submission':
            include 'sgbd/controller/admin/categorie_submission.php';
            break;
            
        case 'addnewchat':
            include 'page/composent/admin/addnewchat.php';
            break;
            
        case 'addnewchat_submission':
            include 'sgbd/controller/admin/chat_submission.php';
            break;

        case 'addnewmessage_submission':
            include 'sgbd/controller/message/addnewmessage_submission.php';
            break;
        
        default:
            include 'page/composent/section_content.php';
            break;
    }

     ?>
</main>
<?php #include 'page/layout/footer.php'; ?>