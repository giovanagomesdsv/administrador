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

if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error'])
        die("Falha ao enviar arquivo");

    if ($arquivo['size'] > 2097152) 
        die("Arquivo muito grande! Max: 2MB");


        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
        $pasta = "img-parceria/";

    if($extensao != "jpg" && $extensao != 'png')
       die("Tipo de arquivo não aceito!");

       $path =  $novoNomeDoArquivo . "." . $extensao;

       $caminho =  $pasta . $novoNomeDoArquivo . "." . $extensao;

       $deu_certo = move_uploaded_file($arquivo["tmp_name"],  $caminho);
}

$sql_code = "INSERT INTO parceria (cnpj, rg, usuario, senha, nome, endereco, cidade, estado, telefone, email, instagram, tiktok, x_social, path) VALUES ('$cnpj', '$rg', '$usuario', '$senha', '$nome', '$endereco', '$cidade', '$estado', '$telefone', '$email', '$instagram', '$tiktok', '$x_social', '$path')";


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