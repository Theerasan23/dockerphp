<?php 

    require_once __DIR__ . '/vendor/autoload.php';
    require_once "controller/connection_secure.php";
    
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__ . '/');
    $dotenv->load();
    $db = new Database();

?>

<?php require_once "view/header.php";  ?>

<?php require_once "controller/layout.php"; ?>

<?php require_once "view/footer.php"; ?>

