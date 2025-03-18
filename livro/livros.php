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

    <title>ADM BC - Livros</title>
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
               <div class="linhavaliar">
                <p>AVALIAR</p>
               </div>
        </div>
        <ul class="nav-list">
            <li >
                <a href="home.php">
                    <i class='bx bx-home-alt-2'></i>
                    <span class="link_name">Home</span>
                </a>
            </li>
            <li>
                <a href="livrarias/livrarias.php">
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
            <li class="fix">
                <a href="livro/livros.php">
                    <i class='bx bx-book-bookmark'></i>
                    <span class="link_name">Livros</span>
                </a>
            </li>
            <li>
                <a href="usuarios/usuarios.php">
                    <i class='bx bx-book-content'></i>
                    <span class="link_name">Usuarios</span>
                </a>
            </li>
            <li class="sair">
                <a href="logout.php"><i class='bx bx-log-out'></i></a>
            </li>
        </ul>
    </nav>
    <h2>Livros para resenhas</h2>
    <div>
        <?php
        $consulta = "SELECT 
    livro.titulo, 
    livro.genero, 
    livro.resenha, 
    parceria.nome, 
    parceria.email, 
    livro.data_publicacao, 
    livro.id_livro
FROM 
    livro 
LEFT JOIN 
    parceria 
ON 
    livro.cnpj = parceria.cnpj 
WHERE 
    livro.resenha = 'não possui' 
    AND (livro.genero = 'clássicos' OR livro.genero = 'terror' OR livro.genero = 'suspense e mistério' OR livro.genero = 'romance' OR livro.genero = 'fantasia e ficção' OR livro.genero = 'aventura' OR livro.genero = 'drama')
ORDER BY livro.data_publicacao asc;";

        if ($tabela = mysqli_query($conn, $consulta)) {
            echo "<div>
            <table>
                <thead>
                    <tr>
                        <th><strong>Livro</strong></th>
                        <th><strong>Gênero</strong></th>
                        <th><strong>Parceria</strong></th>
                        <th><strong>E-mail</strong></th>
                        <th><strong>Data</strong></th>
                    </tr>
                </thead>
                <tbody>"; // Início do corpo da tabela

            while ($linha = mysqli_fetch_array($tabela)) {
                echo "
                <tr class='resultado-item'>
                    <td>{$linha['titulo']}</td>
                    <td>{$linha['genero']}</td>
                    <td>{$linha['nome']}</td>
                    <td>{$linha['email']}</td>
                    <td>{$linha['data_publicacao']}</td>
                    <td><a href='atualiza-formulario-estado.php?id={$linha['id_livro']}'>
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
    <div>
        <a href="novadisponibilizacao.php">Nova disponibilização</a>
    </div>
    <div>
        <?php
        $consulta = "SELECT parceria.nome, disponibilizacao_livro.id_disponibilizacao, disponibilizacao_livro.estado, livro.titulo, disponibilizacao_livro.forma_disponibilizacao, disponibilizacao_livro.especif_disponibilizacao, disponibilizacao_livro.data_inicio, disponibilizacao_livro.data_fim FROM disponibilizacao_livro INNER JOIN livro ON disponibilizacao_livro.id_livro = livro.id_livro INNER JOIN parceria on livro.cnpj = parceria.cnpj WHERE disponibilizacao_livro.estado = 'DISPONÍVEL' ORDER BY disponibilizacao_livro.data_fim asc ";

        if ($resp = mysqli_query($conn, $consulta)) {
            echo "<div class='resultados'>
                            <table>
                                <thead>
                                    <tr>
                                        
                                        <th><strong>ID</strong></th>
                                        <th><strong>Parceria</strong></th>
                                        <th><strong>Livro</strong></th>
                                        <th><strong>forma</strong></th>
                                        <th><strong>Especificação</strong></th>
                                        <th><strong>Data início</strong></th>
                                        <th><strong>Data Fim</strong></th>
                                    </tr>
                                </thead>
                                <tbody>";

            while ($linha = mysqli_fetch_array($resp)) {

                echo "
                            <tr class='resultado-item'>
                                <td>{$linha['id_disponibilizacao']}</td>
                                <td>{$linha['nome']}</td>
                                <td>{$linha['titulo']}</td>
                                <td>{$linha['forma_disponibilizacao']}</td>
                                <td>{$linha['especif_disponibilizacao']}</td>
                                <td>{$linha['data_inicio']}</td>
                                <td>{$linha['data_fim']}</td>
                                <td><a href='atualiza-formulario-atividade.php?id={$linha['id_disponibilizacao']}'>
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
    <div>
        <a href="novoemprestimo.php">Novo empréstimo</a>
    </div>
    <div>
        <?php
        $consulta = "SELECT 
    parceria.nome AS nome_parceria,
    emprestimo.id_emprestimo, 
    emprestimo.observacoes,
    autor_resenha.nome AS nome_autor_resenha, 
    autor_resenha.pseudonimo,
    autor_resenha.telefone AS cllr,
    livro.slug AS nome_livro, 
    emprestimo.data_emprestimo, 
    emprestimo.data_devolucao 
FROM 
    emprestimo 
INNER JOIN 
    autor_resenha 
ON 
    emprestimo.id_autor_resenha = autor_resenha.id_autor_resenha
INNER JOIN 
    disponibilizacao_livro 
ON 
    emprestimo.id_disponibilizacao = disponibilizacao_livro.id_disponibilizacao
INNER JOIN 
    parceria 
ON 
    disponibilizacao_livro.cnpj = parceria.cnpj
INNER JOIN 
    livro 
ON 
    disponibilizacao_livro.id_livro = livro.id_livro
WHERE 
    estado_emprestimo = 'Ativo'   ORDER BY EMPRESTIMO.data_devolucao asc
";

        if ($resp = mysqli_query($conn, $consulta)) {
            echo "<div class='resultados'>
            <table>
                <thead>
                    <tr>
                        
                        <th><strong>PARCERIA</strong></th>
                        <th><strong>LIVRO</strong></th>
                        <th><strong>RESENHISTA</strong></th>
                        <th><strong>PSEUDÔNIMO</strong></th>
                        <th><strong>TELEFONE</strong></th>
                        <th><strong>DATA INÍCIO</strong></th>
                        <th><strong>DATA FIM</strong></th>
                        <th><strong>OBSERVAÇÕES</strong></th>
                    </tr>
                </thead>
                <tbody>";
            while ($linha = mysqli_fetch_array($resp)) {
                echo "
                <tr class='resultado-item'>
                    <td>{$linha['nome_parceria']}</td>
                    <td>{$linha['nome_livro']}</td>
                    <td>{$linha['nome_autor_resenha']}</td>
                    <td>{$linha['pseudonimo']}</td>
                    <td>{$linha['cllr']}</td>
                    <td>{$linha['data_emprestimo']}</td>
                    <td>{$linha['data_devolucao']}</td>
                    <td>{$linha['observacoes']}</td>
                    <td><a href='atualiza-emprestimo-estado.php?id={$linha['id_emprestimo']}'>
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