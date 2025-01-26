<?php 
 include "conexao-banco/conexao.php";

 if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error'])
        die("Falha ao enviar arquivo");

    if ($arquivo['size'] > 2097152) 
        die("Arquivo muito grande! Max: 2MB");

        $pasta = "arquivos/";

        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != 'png')
       die("Tipo de arquivo não aceito!");

       $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

       $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

       if($deu_certo) {
        $conn->query("INSERT INTO arquivo (upload) VALUES ('$path')") or die($conn->error);
        echo "<p>Arquivo enviado com sucesso! Para acessa-lo, clique aqui: <a target='_blank' href=\"arquivos/$novoNomeDoArquivo.$extensao\">clique aqui</a></p>";
       } else  
         echo "<p>Falha ao enviar arquivo!</p>";

        
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de arquivos</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="POST">
        <label for="arquivo">Selecione o arquivo</label>
        <input type="file" name="arquivo">
        <button type="submit">Enviar arquivo</button>
    </form>
</body>
</html>