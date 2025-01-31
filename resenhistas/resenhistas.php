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
    <title>ADM BC - Resenhistas</title>
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
            <li class="fix">
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
        <a href="novoresenhista.php">Adicionar novo resenhista</a>
    </div>
    <div>

        <?php
        // Consulta que obtém informações dos resenhistas e total de resenhas
        $consulta = "
            SELECT 
                ar.id_autor_resenha,
                ar.nome,
                ar.pseudonimo,
                ar.email,
                ar.path,
                ar.pontos,
                ar.telefone,
                COUNT(r.id_resenha) AS total_resenhas
            FROM 
                autor_resenha ar
            LEFT JOIN 
                resenha r 
            ON 
                ar.id_autor_resenha = r.id_autor_resenha
            GROUP BY 
                ar.id_autor_resenha, ar.nome, ar.pseudonimo, ar.email, ar.path, ar.pontos
        ";

        if ($resp_consulta = mysqli_query($conn, $consulta)) {

            while ($linha = mysqli_fetch_array($resp_consulta)) {
                $mensagem = urlencode("Olá, aqui fala a admiistradora do site Bibliófilos community!");

                echo "
            <div>
                <div>
                    <a href=\"https://wa.me/{$linha['telefone']}?text=$mensagem\" target=\"_blank\"><img src='{$linha['path']}' alt='Foto do Resenhista'></a>
                    <h3>{$linha['nome']}</h3>
                    <p><strong>Pseudônimo:</strong> {$linha['pseudonimo']}</p>
                    <p><strong>Email:</strong> {$linha['email']}</p>
                </div>
                <div>
                    <p><strong>Pontos:</strong> {$linha['pontos']}</p>
                    <p><strong>Total de Resenhas:</strong> {$linha['total_resenhas']}</p>
                </div>
                <div>
                    <a href='altera-formulario-resenhista.php?id={$linha['id_autor_resenha']}'>
                        <div class=\"bx bxs-edit-alt\"></div>
                    </a>
                </div>
            </div>
            ";
            }
        } else {
            echo "<p>Erro ao executar a consulta: " . mysqli_error($conn) . "</p>";
        }
        ?>

    </div>
    <script src="../script.js"></script>
</body>

</html>