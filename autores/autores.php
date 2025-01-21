<?php
include "../conexao-banco/conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>ADM BC - Autores</title>
</head>

<body>
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
        escritor.foto_url, 
        COUNT(resenha.id_escritor) AS total_resenhas 
    FROM escritor 
    LEFT JOIN resenha ON escritor.id_escritor = resenha.id_escritor 
     WHERE escritor.nome LIKE '%$pesquisa%'
    GROUP BY escritor.id_escritor, escritor.nome, escritor.foto_url
                            ";

            $sql_consulta = $conn->query($code) or die("Erro ao consultar: " . $conn->error);

            if ($sql_consulta ->num_rows == 0) {
                echo "<div class='resultados'><h3>Nenhum resultado encontrado!</h3></div>";
            } else {
                while ($linha = mysqli_fetch_array($sql_consulta)) {
                    echo "
                    <div>
                       <div>
                          <img src='{$linha['foto_url']}'>
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
        escritor.foto_url, 
        COUNT(resenha.id_escritor) AS total_resenhas 
    FROM escritor 
    LEFT JOIN resenha ON escritor.id_escritor = resenha.id_escritor 
    GROUP BY escritor.id_escritor, escritor.nome, escritor.foto_url";

    if ($resposta = mysqli_query($conn, $consulta)) {

        while ($linha = mysqli_fetch_array($resposta)) {
            echo "
            <div>
               <div>
                  <img src='{$linha['foto_url']}'>
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

   

</body>

</html>