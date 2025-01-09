<?php
include "protecao.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>ADM BC - Home</title>
</head>

<body>
    <div class="barra">
        <h4>Bem Vindo, <?php echo $_SESSION['nome']; ?> </h4>
    </div>
    <header>
        <a href="#">Home</a>
        <a href="parceria/parcerias.php">Parcerias</a>
        <a href="resenhistas/resenhistas.php">Resenhistas</a>
        <a href="autores/autores.php">Autores</a>
        <a href="livro/livros.php">Livros</a>
        <a href="resenha/resenhas.php">Resenhas</a>
        <a href="precificacao/precificacao.php">Precificação</a>
        <a href="logout.php"><i class='bx bx-log-out'></i></a>
    </header>

</body>

</html>