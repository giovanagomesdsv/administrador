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

    <title>ADM BC - Usuarios</title>
</head>

<body>
<header>
        Adiministrador BC
    </header>
    
    <main>
<!--Botão de cadastro de usuário-->
      <div>
         <a href="cadastrarusuario.php">Cadastrar usuário</a>
      </div>

<!-- BARRA DE PESQUISA ----------------------------------------------------------------------------------------------------------------------------------------------------------------->
       <div class="busca">
            <form action="" method="GET">
                <input type="text" name="busca" placeholder="Busque os usuários...">
                <button type="submit">Pesquisar</button>
            </form>
        </div>

        <div> <!-- DIV DA CAIXA ONDE DENTRO APARECERÁ OS CARDS DO RESULTADO DA BUSCA-->
            <?php
            if (!isset($_GET['busca']) || empty($_GET['busca'])) {
                echo "<div class='resultados'></div>";
            } else {

                // Proteção contra SQL Injection
                $pesquisa = $conn->real_escape_string($_GET['busca']);

                // Query de busca
                $sql_code = "SELECT usu_nome, usu_id FROM usuarios WHERE usu_nome LIKE '%$pesquisa%' ";
                $sql_query = $conn->query($sql_code) or die("Erro ao consultar: " . $conn->error);

                if ($sql_query->num_rows == 0) {
                    echo "<div class='resultados'><h3>Nenhum resultado encontrado!</h3></div>";
                } else {
                    while ($dados = $sql_query->fetch_assoc()) {
                        echo "
                        <div>
                         <p>Usuário: {$row['usu_nome']}</p>
                         <p>Id: {$row['usu_id']}</p>
                          <a href='editarusuario.php?id={$row['usu_id']}'><div class=\"bx bxs-edit-alt\"></div></a>
                       </div>
                     ";
                    }
                }
            }
            ?>
        </div>

        <div>
            <?php
              $consulta = "SELECT usu_nome, usu_id FROM usuarios ";  

              if ($card = mysqli_query($conn, $consulta)) {
                while ($row = mysqli_fetch_array($card)) {
                    echo "
                       <div>
                         <p>Usuário: {$row['usu_nome']}</p>
                         <p>Id: {$row['usu_id']}</p>
                         <a href='editarusuario.php?id={$row['usu_id']}'><div class=\"bx bxs-edit-alt\"></div></a>
                       </div>
                    ";
                }
              }
            ?>
        </div>

        <div>
            <p>Usuário: </p>
            <p>Id: </p>
        </div>

    </main>
   
    <script src="../script.js"></script>
</body>

</html>