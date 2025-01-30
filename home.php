<?php
include "protecao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/geral.css">
    <title>ADM BC - Home</title>
</head>

<body>
    <header>
        Adiministrador BC
    </header>
    <nav class="sidebar">
        <div class="nome">
            <div class="logo_name">Bem Vindo, <?php echo $_SESSION['nome']; ?></div>
            <i class="bx bx-menu"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="#">
                    <i class='bx bx-home-alt-2'></i>
                    <span class="link_name">Home</span>
                </a>
            </li>
            <li>
                <a href="parceria/parcerias.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Parcerias</span>
                </a>
            </li>
            <li>
                <a href="resenhistas/resenhistas.php">
                    <i class='bx bx-user-pin'></i>
                    <span class="link_name">Resenhistas</span>
                </a>
            </li>
            <li>
                <a href="autores/autores.php">
                    <i class='bx bx-book-reader'></i>
                    <span class="link_name">Autores</span>
                </a>
            </li>
            <li>
                <a href="livro/livros.php">
                    <i class='bx bx-book-bookmark'></i>
                    <span class="link_name">Livros</span>
                </a>
            </li>
            <li>
                <a href="resenha/resenhas.php">
                    <i class='bx bx-book-content'></i>
                    <span class="link_name">Resenhas</span>
                </a>
            </li>
            <li>
                <a href="precificacao/precificacao.php">
                    <i class='bx bxs-badge-dollar'></i>
                    <span class="link_name">Precificação</span>
                </a>
            </li>
            <a href="logout.php"><i class='bx bx-log-out'></i></a>
        </ul>
    </nav>
    <main>
        <div class="barra">
            <h4> </h4>
        </div>
    </main>

</body>

</html>