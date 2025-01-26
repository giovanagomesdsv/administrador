<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de resenhistas</title>
</head>
<body>
<form action="inserirnovoresenhista.php" enctype="multipart/form-data" method="POST" name="cadastroresenhista">
        <h1>CADASTRO DE RESENHISTAS</h1>
        <label for="nome">Nome:</label>
        <input type="text" name="nome">

        <label for="pseudonimo">Pseudonimo:</label>
        <input type="text" name="pseudonimo">

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao">

        <label for="arquivo">Selecione uma imagem</label>
        <input type="file" name="arquivo" >

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco">

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade">

        <label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
            <option value="">Selecione...</option>
            <option value="SP">SP</option>
            <option value="MG">MG</option>
            <option value="RJ">RJ</option>
        </select>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" placeholder="5511987543211">

        <label for="email">E-mail:</label>
        <input type="email" name="email">

        <label for="instagram">Instagram:</label>
        <input type="text" name="instagram" placeholder="URL">

        <label for="tiktok">Tik Tok:</label>
        <input type="text" name="tiktok" placeholder="URL">

        <label for="x">x:</label>
        <input type="text" name="x" placeholder="URL">

        <input type="submit" value="cadastrar">

        <a href="resenhistas.php">Voltar</a>
    </form>
</body>
</html>