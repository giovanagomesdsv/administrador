
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['rg'])) {
    die(" Faça login para acessar.<br><a href='index.php'>Logar</a>");
}
?>

