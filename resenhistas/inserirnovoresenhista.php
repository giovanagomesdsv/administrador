<?php
include "../conexao-banco/conexao.php";
                  
$nome = $_POST['nome'];
$pseudonimo = $_POST['pseudonimo'];
$descricao = $_POST['descricao'];
$endereco = $_POST['endereco'];                    
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];                          
$telefone = $_POST['telefone'];                
$email = $_POST['email'];
$instagram = $_POST['instagram'];                          
$tiktok = $_POST['tiktok'];                                 
$x_social  = $_POST['x'];                               

if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error'])
        die("Falha ao enviar arquivo");

    if ($arquivo['size'] > 2097152) 
        die("Arquivo muito grande! Max: 2MB");


        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != 'png')
       die("Tipo de arquivo não aceito!");

       $path = $novoNomeDoArquivo . "." . $extensao;

       $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
}

$sql_code = "INSERT INTO autor_resenha ( nome, pseudonimo, descricao, endereco, cidade, estado, telefone, email, instagram, tiktok, x_social,  path) VALUES ( '$nome', '$pseudonimo', '$descricao', '$endereco', '$cidade', '$estado', '$telefone', '$email', '$instagram', '$tiktok', '$x_social', '$path')";


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