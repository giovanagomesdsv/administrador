<?php
    $dado = $_GET['id'];
    $avaliar = $_POST['avaliar'];

    $UPDATE = "UPDATE RESENHAS SET resenha_status = ? WHERE id= '$dado'";

?>?>