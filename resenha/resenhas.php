<?php
include "../conexao-banco/conexao.php";

include "../protecao.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="../geral.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>ADM BC - Resenhas</title>
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
            <li >
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
            <li>
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
            <li class="fix">
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
        <a href="novaresenha.php">Adicionar nova resenha</a>
    </div>
    <div>
        <?php
        $select = "SELECT resenha.id_resenha, resenha.data_publicacao, resenha.titulo, resenha.genero, resenha.visualizacao, autor_resenha.pseudonimo FROM resenha INNER JOIN autor_resenha ON resenha.id_autor_resenha = autor_resenha.id_autor_resenha ORDER BY data_publicacao desc";

        if ($resp = mysqli_query($conn, $select)) {
            echo "<div>
            <table>
                <thead>
                    <tr>
                        <th><strong>Data</strong></th>
                        <th><strong>Nome</strong></th>
                        <th><strong>Resenhista</strong></th>
                        <th><strong>Gênero</strong></th>
                        <th><strong>Visualizações</strong></th>
                    </tr>
                </thead>
                <tbody>";

            while ($linha = mysqli_fetch_array($resp)) {
                echo "
                    <tr class='resultado-item'>
                        <td>{$linha['data_publicacao']}</td>
                        <td>{$linha['titulo']}</td>
                         <td>{$linha['pseudonimo']}</td>
                        <td>{$linha['genero']}</td>
                        <td>{$linha['visualizacao']}</td>
                        <td><a href='atualiza-formulario-resenha.php?id={$linha['id_resenha']}'>
                           <div class='bx bxs-edit-alt'></div>
                        </a></td>
                    </tr>";
            }

            echo "</tbody>
                </table>
            </div>";
        }
        ?>
    </div>

    <script src="../script.js"></script>
</body>

</html>