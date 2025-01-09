<?php 
include "../conexao-banco/conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>ADM BC - Resenhas</title>
</head>
<body>
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
    
</body>
</html>