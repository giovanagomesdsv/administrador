<?php
include "../conexao-banco/conexao.php"; 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $dado = $_GET['id'];

    $consulta = "SELECT * FROM escritor WHERE id_escritor = '$dado'";

    if($resultado = mysqli_query($conn, $consulta)) {
        while ($linha = mysqli_fetch_array($resultado)) {
            echo "
        <form action='alterar-autores.php?id={$linha['id_escritor']}' method='post'>
            <h1>ATUALIZAÇÃO DE AUTORES</h1>
    
            <label for='nome'>Nome:</label>
            <input type='text' name='nome' value='{$linha["nome"]}'>
    
            <label for='slug'>Slug:</label>
            <input type='text' name='slug' value='{$linha["slug"]}'>
    
            <label for='biografia'>Biografia:</label>
            <input type='text' name='biografia' value='{$linha["biografia"]}'>

            <label for='imagem'>Foto:</label>
            <input type='text' name='imagem' placeholder='URL' value='{$linha["foto_url"]}'>
    
            <input type='submit' value='Atualizar'>
    
            <a href='resenhistas.php'>Voltar</a>
        </form>
        ";

        }
    }
    ?>
    
</body>
</html>