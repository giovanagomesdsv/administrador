<?php
include "../conexao-banco/conexao.php";
                  
$nome = $_POST['nome'];
$pseudonimo = $_POST['pseudonimo'];
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


$sql_code = "INSERT INTO autor_resenha ( nome, pseudonimo, descricao, endereco, cidade, estado, telefone, email, instagram, tiktok, x_social,  foto_url) VALUES ( '$nome', '$pseudonimo', '$descricao', '$endereco', '$cidade', '$estado', '$telefone', '$email', '$instagram', '$tiktok', '$x_social', '$foto_url')";


if (mysqli_query($conn, $sql_code)) {
    echo '
    <script>
         window.alert("Dados inseridos com sucesso!");
         location.href="resenhistas.php";
    </script>
    ';
} else {
    echo '
    <script>
         window.alert("Erro na inserção!");
         location.href="novoresenhista.php";
    </script>
    ';
};
?>