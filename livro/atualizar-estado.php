<?php 
include "../conexao-banco/conexao.php";

$dado = $_GET['id'];

$resenha = $_POST['estado'];

$consulta = "UPDATE livro SET resenha='$resenha' WHERE id_livro = '$dado'";

if($resp = mysqli_query($conn, $consulta)) {
    echo '
    <script>
         window.alert("Dados atualizados com sucesso!");
         location.href="livros.php";
    </script>
    ';
} else {
    echo '
    <scrip>
       window.alert("Falha na inserção!");
       location.href="atualiza-formulario-estado.php"
    </scrip>
    ';
}
?>