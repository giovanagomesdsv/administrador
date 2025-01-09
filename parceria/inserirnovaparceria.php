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
$foto_url = $_POST['imagem']; 

$sql_code = "INSERT INTO parceria (cnpj, rg, usuario, senha, nome, endereco, cidade, estado, telefone, email, instagram, tiktok, x_social, foto_url) VALUES ('$cnpj', '$rg', '$usuario', '$senha', '$nome', '$endereco', '$cidade', '$estado', '$telefone', '$email', '$instagram', '$tiktok', '$x_social', '$foto_url')";


if (mysqli_query($conn, $sql_code)) {
    echo '
    <script>
         window.alert("Dados inseridos com sucesso!");
         location.href="parcerias.php";
    </script>
    ';
} else {
    echo '
    <script>
         window.alert("Erro na inserção!");
         location.href="parcerias.php";
    </script>
    ';
};
?>