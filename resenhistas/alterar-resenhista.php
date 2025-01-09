<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aaaaaaaaaaaaa</title>
</head>
<body>
<?php 
include "../conexao-banco/conexao.php";

$dado = $_GET['id'];

$nome = $_POST['nome'];
$pseudonimo = $_POST['pseudonimo']; 
$pontos = $_POST['pontos'];
$descricao = $_POST['descricao'];
$foto_url = $_POST['imagem'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$instagram = $_POST['instagram'];
$tiktok = $_POST['tiktok'];
$x_social  = $_POST['x'];

$update = "UPDATE autor_resenha SET nome='$nome', pseudonimo='$pseudonimo', pontos='$pontos', descricao='$descricao',  foto_url='$foto_url', endereco='$endereco', cidade='$cidade', estado='$estado', telefone='$telefone', email='$email', instagram='$instagram', tiktok='$tiktok', x_social='$x_social' WHERE id_autor_resenha = '$dado'";

if ($res = mysqli_query($conn, $update)) {
    echo '
    <script>
         window.alert("Dados atualizados com sucesso!");
         location.href="resenhistas.php";
    </script>
    ';
} else{
    echo '
    <script>
         window.alert("Falha ao atualizar! Tente novamente.");
         location.href="altera-formulario-resenhista.php";
    </script>
    ';
}
?>
</body>
</html>