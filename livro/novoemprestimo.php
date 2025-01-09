<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de emprestimos</title>
</head>

<body>
    <form action="inserirnovoemprestimo.php" method="POST" name="cadastroemprestimos">
        <h1>CADASTRO DE EMPRESTIMOS</h1>

        <label for="id-disponibilizacao">ID da disponibilização:</label>
        <input type="number" name="id-disponibilizacao">

        <label for="resenhista">Resenhista:</label>
        <input type="text" name="resenhista">

        <label for="data-emprestimo">Data de empréstimo:</label>
        <input type="date" name="data-emprestimo">

        <label for="data-fim">Data de devolução:</label>
        <input type="date" name="data-fim">

        <label for="observacoes">Observações:</label>
        <input type="text" name="observacoes">

        <input type="submit" value="Cadastrar" name="cadastrar">
        <a href="livros.php">Voltar</a>
    </form>
</body>

</html>