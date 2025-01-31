<?php
include "../conexao-banco/conexao.php";

include "../protecao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <link rel="stylesheet" href="../geral.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>ADM BC - Autores</title>
</head>

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
            <li>
                <a href="../home.php">
                    <i class='bx bx-home-alt-2'></i>
                    <span class="link_name">Home</span>
                </a>
            </li>
            <li>
                <a href="../parceria/parcerias.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Parcerias</span>
                </a>
            </li>
            <li>
                <a href="../resenhistas/resenhistas.php">
                    <i class='bx bx-user-pin'></i>
                    <span class="link_name">Resenhistas</span>
                </a>
            </li>
            <li class="fix">
                <a href="../autores/autores.php">
                    <i class='bx bx-book-reader'></i>
                    <span class="link_name">Autores</span>
                </a>
            </li>
            <li>
                <a href="../livro/livros.php">
                    <i class='bx bx-book-bookmark'></i>
                    <span class="link_name">Livros</span>
                </a>
            </li>
            <li>
                <a href="../resenha/resenhas.php">
                    <i class='bx bx-book-content'></i>
                    <span class="link_name">Resenhas</span>
                </a>
            </li>
            <li>
                <a href="../precificacao/precificacao.php">
                    <i class='bx bxs-badge-dollar'></i>
                    <span class="link_name">Precificação</span>
                </a>
            </li>
            <li class="sair">
                <a href="../logout.php"><i class='bx bx-log-out'></i></a>
            </li>
        </ul>
    </nav>
    <div>
        <a href="novoautor.php">Adicionar novo autor</a>
    </div>

    <div class="pesquisar">
        <form action="" method="GET">
            <input type="text" name="busca" placeholder="Busque os autores...">
            <button type="submit">Pesquisar</button>
        </form>
    </div>

    <div class="autores">
        <?php
        if (!isset($_GET['busca']) || empty($_GET['busca'])) {
            echo "<div class='resultado'></div>";
        } else {
            $pesquisa = $conn->real_escape_string($_GET['busca']);

            $code = "SELECT 
        escritor.id_escritor, 
        escritor.nome, 
        escritor.path, 
        COUNT(resenha.id_escritor) AS total_resenhas 
    FROM escritor 
    LEFT JOIN resenha ON escritor.id_escritor = resenha.id_escritor 
     WHERE escritor.nome LIKE '%$pesquisa%'
    GROUP BY escritor.id_escritor, escritor.nome, escritor.path
                            ";

            $sql_consulta = $conn->query($code) or die("Erro ao consultar: " . $conn->error);

            if ($sql_consulta->num_rows == 0) {
                echo "<div class='resultados'><h3>Nenhum resultado encontrado!</h3></div>";
            } else {
                while ($linha = mysqli_fetch_array($sql_consulta)) {
                    echo "
                    <div>
                       <div>
                          <img src='{$linha['path']}'>
                          <p>{$linha['nome']}</p>
                       </div>
                       <div>
                          <p>{$linha['total_resenhas']}</p>
                       </div>
                       <a href='altera-formulario-autores.php?id={$linha['id_escritor']}'>
                          <div class=\"bx bxs-edit-alt\"></div>
                       </a>
                    </div>";
                }
            }
        }



        ?>
    </div>

    <?php
    $consulta = "SELECT 
        escritor.id_escritor, 
        escritor.nome, 
        escritor.path, 
        COUNT(resenha.id_escritor) AS total_resenhas 
    FROM escritor 
    LEFT JOIN resenha ON escritor.id_escritor = resenha.id_escritor 
    GROUP BY escritor.id_escritor, escritor.nome, escritor.path";

    if ($resposta = mysqli_query($conn, $consulta)) {

        while ($linha = mysqli_fetch_array($resposta)) {
            echo "
            <div>
               <div>
                  <img src='{$linha['path']}'>
                  <p>{$linha['nome']}</p>
               </div>
               <div>
                  <p>{$linha['total_resenhas']}</p>
               </div>
               <a href='altera-formulario-autores.php?id={$linha['id_escritor']}'>
                  <div class=\"bx bxs-edit-alt\"></div>
               </a>
            </div>";
        }
    } else {
        echo "<p>Erro ao executar a consulta: " . mysqli_error($conn) . "</p>";
    }
    ?>


    <script src="../script.js"></script>

</body>

</html>