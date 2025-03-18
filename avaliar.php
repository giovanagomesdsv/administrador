<?php
include "conexao-banco/conexao.php";
  $dado = $_GET['id'];

  $SELECT = "SELECT  resenha_id, resenha_titulo,resenha_texto, livro_sinopse, res_nome_fantasia FROM resenhas INNER JOIN LIVROS on resenhas.livro_id = livros.livro_id INNER JOIN RESENHISTAS ON resenhistas.res_id = resenhas.res_id WHERE resenha_id= '$dado';
";

  if ($resp = mysqli_query($conn, $SELECT)) {
   while( $row = mysqli_fetch_array($resp) ){
    echo "
               

    <!DOCTYPE html>
<html lang='pt-br'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>RESENHA: {$row['resenha_titulo']}</title>
</head>
<body>
<h2>{$row['resenha_titulo']}</h2>
<p>{$row['livro_sinopse']}</p>
<p>{$row['resenha_texto']}</p>
<p>{$row['res_nome_fantasia']}</p>

<form action='enviar-avaliacao.php?id={$dado}' method='post'>
        <select name='avaliar' required>
            <option value=''>Avaliar</option>
            <option value='1'>Reprovada</option>
            <option value='3'>Corrigir</option>
            <option value='2'>Aprovada</option>
        </select>
        <input type='submit' value='enviar'>
  </form>

</body>
</html>

";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>