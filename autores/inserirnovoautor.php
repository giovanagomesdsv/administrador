<?php
include "../conexao-banco/conexao.php";

$slug = $_POST['slug'];
$nome = $_POST['nome'];
$biografia = $_POST['biografia'];
                            
if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error'])
        die("Falha ao enviar arquivo");

    if ($arquivo['size'] > 2097152) 
        die("Arquivo muito grande! Max: 2MB");


        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
        $pasta = "img-autores/";

    if($extensao != "jpg" && $extensao != 'png')
       die("Tipo de arquivo não aceito!");

       $path =  $novoNomeDoArquivo . "." . $extensao;
       $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;

       $deu_certo = move_uploaded_file($arquivo["tmp_name"],  $caminho);
}

$sql_code = "INSERT INTO escritor ( slug, nome, biografia, path) VALUES ( '$slug', '$nome', '$biografia', '$path')";


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