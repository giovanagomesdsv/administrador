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

    <title>ADM BC - Livrarias</title>
</head>

<body>
    <header>
        Adiministrador BC
    </header>
 <!--   <nav class="sidebar" id="sidebar"> 
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
            <li>
                <a href="../home.php">
                    <i class='bx bx-home-alt-2'></i>
                    <span class="link_name">Home</span>
                </a>
            </li>
            <li class="fix">
                <a href="livrarias.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Livrarias</span>
                </a>
            </li>
            <li>
                <a href="../resenhistas/resenhistas.php">
                    <i class='bx bx-user-pin'></i>
                    <span class="link_name">Resenhistas</span>
                </a>
            </li>
            <li>
                <a href="../livro/livros.php">
                    <i class='bx bx-book-bookmark'></i>
                    <span class="link_name">Livros</span>
                </a>
            </li>
            <li>
                <a href="../usuarios/usuarios.php">
                    <i class='bx bx-book-content'></i>
                    <span class="link_name">Usuarios</span>
                </a>
            </li>
            <li class="sair">
                <a href="../logout.php"><i class='bx bx-log-out'></i></a>
            </li>
        </ul>
    </nav>-->

<!--CADASTRAR LIVRARIA-->
    <div>
        <a href="cadastrarlivraria.php">Cadastrar livraria</a>
    </div>

<!--EXIBE OS CARDS DAS LIVRARIAS-->
    <div>
        <?php
        $consulta = "SELECT 
    liv_nome,liv_cidade,liv_estado,liv_endereco, liv_email,liv_foto, liv_telefone, livrarias.liv_id,
    COUNT(livrarias_livros.liv_livro_id) AS total_livros 
FROM 
    livrarias
LEFT JOIN 
    livrarias_livros
ON 
    livrarias.liv_id =  livrarias_livros.liv_id
GROUP BY 
    liv_nome,liv_cidade,liv_estado,liv_endereco, liv_email,liv_foto

";

        if ($resp_consulta = mysqli_query($conn, $consulta)) {

            while ($registro = mysqli_fetch_array($resp_consulta)) {
                // Mensagem personalizada para o WhatsApp
                $mensagem = urlencode("Olá, aqui fala a admiistradora do site Bibliófilos community, gostaria de solicitar mais informações sobre sua livraria/ movimentações no nosso site!");

                echo "
            <div>
                <a href=\"https://wa.me/{$registro['liv_telefone']}?text=$mensagem\" target=\"_blank\">
                    <img style=\"border:1px solid blue;\" src=\"{$registro['path']}\" alt=\"Imagem da Livraria\">
                </a>
                <p>{$registro['liv_nome']}</p>
                <p>{$registro['liv_email']}</p>
                <div>{$registro['total_livros']}</div>
                  <a href='altera-formulario-parceria.php?id={$registro['liv_id']}'><div class=\"bx bxs-edit-alt\"></div></a>
            </div>
            ";
            }
        }
        ?>
        <div class="busca">
            <form action="" method="GET">
                <input type="text" name="busca" placeholder="Busque as parcerias...">
                <button type="submit">Pesquisar</button>
            </form>
        </div>

        <div class="pesquisa">
            <?php
            if (!isset($_GET['busca']) || empty($_GET['busca'])) {
                echo "<div class='resultados'></div>";
            } else {

                // Proteção contra SQL Injection
                $pesquisa = $conn->real_escape_string($_GET['busca']);

                // Query de busca
                $sql_code = "SELECT parceria.nome AS parceria_nome, 
                                                     parceria.cnpj, 
                                                     parceria.email, 
                                     livro.titulo AS livro_titulo, 
                                                     livro.genero, 
                                                     livro.estoque, 
                                                     livro.data_publicacao,
                                                     livro.visualizacoes,
                                                     livro.preco 
                                                 FROM parceria
                                   LEFT JOIN livro ON parceria.cnpj = livro.cnpj
                             WHERE parceria.nome LIKE '%$pesquisa%' 
                                OR parceria.cnpj LIKE '%$pesquisa%'
                                OR livro.titulo LIKE '%$pesquisa%'
                                OR livro.preco LIKE '%$pesquisa%'
                                 OR livro.visualizacoes LIKE '%$pesquisa%'";
                $sql_query = $conn->query($sql_code) or die("Erro ao consultar: " . $conn->error);

                if ($sql_query->num_rows == 0) {
                    echo "<div class='resultados'><h3>Nenhum resultado encontrado!</h3></div>";
                } else {
                    // Mostrar resultados
                    echo "<div class='resultados'>
                            <table>
                                <thead>
                                    <tr class='resultado-item'>
                                        <th><strong>Nome</strong></th>
                                        <th><strong>CNPJ</strong></th>
                                        <th><strong>E-mail</strong></th>
                                        <th><strong>Data Publicação</strong></th>
                                        <th><strong>Livro</strong></th>
                                        <th><strong>Gênero</strong></th>
                                        <th><strong>Preço</strong></th>
                                        <th><strong>Estoque</strong></th>
                                    </tr>
                                </thead>
                                <tbody>"; // Início do corpo da tabela

                    while ($dados = $sql_query->fetch_assoc()) {
                        echo "
                            <tr class='resultado-item'>
                                <td>{$dados['parceria_nome']}</td>
                                <td>{$dados['cnpj']}</td>
                                <td>{$dados['email']}</td>
                                <td>{$dados['data_publicacao']}</td>
                                <td>{$dados['livro_titulo']}</td>
                                <td>{$dados['genero']}</td>
                                <td>{$dados['preco']}</td>
                                <td>{$dados['estoque']}</td>
                            </tr>";
                    }

                    echo "</tbody>
                        </table>
                    </div>";
                }
            }
            ?>
        </div>

    </div>

    <script src="../script.js"></script>
</body>

</html>