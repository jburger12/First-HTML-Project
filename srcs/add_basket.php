<?php  session_start(); ?>
<?PHP
$_SESSION['nb_articles']++;
$_SESSION['basket'][] = $_GET['train'];
echo "<meta http-home='refresh' content='0,url=basket.php'>";
?>
