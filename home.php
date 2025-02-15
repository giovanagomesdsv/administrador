<?php
include "protecao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="geral.css">

    <title>ADM BC - Home</title>

</head>
<style>

</style>
<body>
    <header>
        Adiministrador BC
    </header>
    <nav class="sidebar" id="sidebar"> 
        <div class="nome">
            <div class="logo_name">Bem Vindo, <br> <?php echo $_SESSION['nome']; ?>!</div>
            <div class="menu" id="menu">
                <i class="bx bx-menu"></i>
            </div>

        </div>
        <ul class="nav-list">
            <li class="fix">
                <a href="home.php">
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
            <li class="sair">
                <a href="logout.php"><i class='bx bx-log-out'></i></a>
            </li>
        </ul>
    </nav>
    <main>
            <div class="img-box">
                <img src="19197393.jpg" alt="">
            </div>

            <div class="liquid-shape">
                <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" id="blobSvg">
                    <!--dur é o rempo que vai levar pra mudar de um para outro-->
                    <path  fill="#fff">
                        <animate attributeName="d"  dur="20000ms" 
                        repeatCount="indefinite" values="M433,306.5Q385,363,337,416.5Q289,470,216.5,451.5Q144,433,121,369Q98,305,83.5,244.5Q69,184,116,142Q163,100,223,82Q283,64,325.5,107.5Q368,151,424.5,200.5Q481,250,433,306.5Z;
                        
                        M448.5,313Q400,376,345.5,428.5Q291,481,227,440.5Q163,400,94.5,365.5Q26,331,40.5,255Q55,179,108,137.5Q161,96,223.5,69.5Q286,43,336.5,89Q387,135,442,192.5Q497,250,448.5,313Z;
                        
                        M421,319.5Q415,389,352.5,431.5Q290,474,223,443.5Q156,413,116,363Q76,313,54,242Q32,171,85,113.5Q138,56,208.5,70Q279,84,333,109.5Q387,135,407,192.5Q427,250,421,319.5Z;
                        
                        M417,322Q422,394,353,418.5Q284,443,210.5,444.5Q137,446,89,386Q41,326,70,260.5Q99,195,125.5,137.5Q152,80,220.5,53.5Q289,27,343,77Q397,127,404.5,188.5Q412,250,417,322Z;
                        
                        M438.58482,322Q422,394,351.94708,411.65603Q281.89416,429.31207,208.39416,439.23541Q134.89416,449.15875,109.00544,379.68249Q83.11672,310.20623,69.47354,244.70623Q55.83036,179.20623,99.70351,122.75915Q143.57666,66.31207,213.12957,64.55564Q282.68249,62.79921,362.47898,75.94708Q442.27547,89.09495,448.72255,169.54748Q455.16964,250,438.58482,322Z;
                        
                        M455.5,323Q424,396,350.5,399.5Q277,403,213,413.5Q149,424,113.5,368Q78,312,78,249.5Q78,187,102,111.5Q126,36,206,41Q286,46,360.5,70.5Q435,95,461,172.5Q487,250,455.5,323Z;

                        M433,306.5Q385,363,337,416.5Q289,470,216.5,451.5Q144,433,121,369Q98,305,83.5,244.5Q69,184,116,142Q163,100,223,82Q283,64,325.5,107.5Q368,151,424.5,200.5Q481,250,433,306.5Z;
                        
                        "></animate>
                    </path>
                  </svg>
            </div>
    </main>
    <script src="script.js"></script>
</body>

</html>