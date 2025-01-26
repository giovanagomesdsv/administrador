<?php
include "../conexao-banco/conexao.php";

$cnpj = $_POST['cnpj'];
$rg = $_POST['rg'];
$usuario = $_POST['usuario'];
$senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$instagram = $_POST['instagram'];
$tiktok = $_POST['tiktok'];
$x_social  = $_POST['x'];

// pegando passado por parâmetro
$dado = $_GET['id'];

$alteracao = "UPDATE parceria SET cnpj='$cnpj', rg='$rg', usuario='$usuario', senha='$senha', nome='$nome', endereco='$endereco', cidade='$cidade', estado='$estado', telefone='$telefone', email='$email', instagram='$instagram', tiktok='$tiktok', x_social='$x_social' WHERE cnpj='$dado'";

if ($resultado = mysqli_query($conn, $alteracao)) {
    echo '
    <script>
         window.alert("Dados atualizados com sucesso!");
         location.href="parcerias.php";
    </script>
    ';
} else{
    echo '
    <script>
         window.alert("Falha ao atualizar! Tente novamente.");
         location.href="altera-formulario-parceria.php";
    </script>
    ';
}
?>