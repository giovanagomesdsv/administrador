<?php
include "../conexao-banco/conexao.php";

$slug = $_POST['slug'];
$nome = $_POST['nome'];
$biografia = $_POST['biografia'];
$foto_url = $_POST['imagem'];   
                            


$sql_code = "INSERT INTO escritor ( slug, nome, biografia, foto_url) VALUES ( '$slug', '$nome', '$biografia', '$foto_url')";


if (mysqli_query($conn, $sql_code)) {
    echo '
    <script>
         window.alert("Dados inseridos com sucesso!");
         location.href="autores.php";
    </script>
    ';
} else {
    echo '
    <script>
         window.alert("Erro na inserção!");
         location.href="novorautor.php";
    </script>
    ';
};
?>