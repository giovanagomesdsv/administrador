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

    $consulta = "SELECT resenha, id_livro FROM livro WHERE id_livro = ' $dado'";

    if ($resposta = mysqli_query($conn, $consulta)) {
        while($linha = mysqli_fetch_array($resposta)) {
            echo "
             <form action='atualizar-estado.php?id={$linha['id_livro']}' method='POST'>
               <label for='estado'>Estado:</label>
               <select name='estado' required>
                    <option value=''>{$linha['resenha']}</option>
                    <option value='Possui'>Possui</option>
               </select>

               <input type='submit' value='Atualizar'>
             </form>
            ";
        }
    }


    ?>

   
</body>
</html>