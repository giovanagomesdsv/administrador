
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de parcerias</title>
</head>

<body>
    <form action="inserirnovaparceria.php" method="POST" name="cadastroparcerias">
        <h1>CADASTRO DE PARCERIAS</h1>
        <label for="cnpj">CNPJ:</label>
        <input type="text" name="cnpj">

        <label for="rg">(PARA ADM)RG:</label>
        <input type="text" name="rg">

        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario">

        <label for="senha">Senha:</label>
        <input type="password" name="senha">

        <label for="nome">Nome:</label>
        <input type="text" name="nome">

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" placeholder="Praça da República, 1572">

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade">

        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
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

        <label for="imagem">Foto:</label>
        <input type="text" name="imagem" placeholder="URL">

        <input type="submit" value="cadastrar">

        <a href="parcerias.php">Voltar</a>
    </form>
</body>

</html>