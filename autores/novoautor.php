<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de autores</title>
</head>
<body>
<form action="inserirnovoautor.php" enctype="multipart/form-data" method="POST" name="cadastroautores">
        <h1>CADASTRO DE AUTORES</h1>
           <label for="slug"> Slug:</label>
        <input type="text" name="slug" placeholder="nome-do-autor">

        <label for="nome">Nome:</label>
        <input type="text" name="nome">

        <label for="biografia">Biografia:</label>
        <input type="text" name="biografia">

        <label for="arquivo">Foto:</label>
        <input type="file" name="arquivo" placeholder="URL">

        <input type="submit" value="Cadastrar" name="cadastrar">
        <a href="autores.php">Voltar</a>
    </form>
</body>
</html>