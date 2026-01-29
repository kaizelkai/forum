<?php include 'page/layout/header.php'; ?>
<main>
    <section class="s1">
        salut
    </section>
    <?php 
    $choix= $_GET["for"];
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
            echo "register_submission";
            include '../sgbd/controller/register/register_submission.php';
            break;
        
        default:
            include 'page/composent/section_content.php';
            break;
    }
     ?>
</main>
<?php #include 'page/layout/footer.php'; ?>