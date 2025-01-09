<?php 
include "../conexao-banco/conexao.php";

$id = $_GET['id'];

$resenha = $_POST['resenha'];
$slug = $_POST['slug'];
$foto_url = $_POST['foto_url'];
$genero = $_POST['genero'];
$sinopse = $_POST['sinopse'];
$conteudo = $_POST['conteudo'];

$update = "UPDATE resenha SET titulo = '$resenha', slug = '$slug', foto_url = '$foto_url', genero = '$genero', sinopse = '$sinopse', conteudo = '$conteudo' WHERE id_resenha = '$id '";

if($resp = mysqli_query($conn, $update)) {
    echo '
    <script>
         window.alert("Dados atualizados com sucesso!");
         location.href="resenhas.php";
    </script>
    ';
} else {
    echo '
    <scrip>
       window.alert("Falha na atualização!");
       location.href="atualiza-formulario-resenha.php"
    </scrip>
    ';
}

?>