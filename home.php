<?php
include "protecao.php";
include "conexao-banco/conexao.php";
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
               <div class="linhavaliar">
                <p>AVALIAR</p>
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
        <div class="avaliar">
           <?php
            $sql = 'SELECT resenha_titulo, res_nome_fantasia, resenha_id, livro_foto FROM RESENHAS INNER JOIN RESENHISTAS ON resenhistas.res_id = resenhas.res_id INNER JOIN LIVROS ON resenhas.livro_id = livroS.livro_id WHERE resenha_status = 0';

            if ($result = mysqli_query($conn, $sql)) {
                while ($resposta = mysqli_fetch_array($result)) {
                    echo "
    <div>
        <div>
            <img src='../administrador/imagens/livros/{$resposta['livro_foto']}' alt=''>
        </div>
        <div>
            <p>{$resposta['resenha_titulo']}</p>
            <p>{$resposta['res_nome_fantasia']}</p>
        </div>
        <div>
           <a href='avaliar.php?id={$resposta['resenha_id']}'>
              <button>Avaliar</button>
           </a>
        </div>
    </div>
                    ";
                }
            }

             ?>
        </div>
       
     
    </main>
    
    <script src="script.js"></script>

</body>

</html>