<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de disponibilização</title>
</head>
<body>
<form action="inserirnovadisponibilizacao.php" method="POST" name="cadastrodisponibilizacao">
        <h1>CADASTRO DE DISPONIBILIZAÇÃO</h1>
           <label for="livro"> Nome do livro:</label>
        <input type="text" name="livro">

        <label for="parceria">Parceria:</label>
        <input type="text" name="parceria">

        <label for="form-disponibilizacao">Forma de disponibilização:</label>
        <select name="form-disponibilizacao" id="form-disponibilizacao" required>
            <option value="">Selecione...</option>
            <option value="Emprestado">Emprestado</option>
            <option value="Doado">Doado</option>
            <option value="Parceria">Parceria</option>
            <option value="Compra">Compra</option>
        </select>

        <label for="data-inicio">Data de início:</label>
        <input type="date" name="data-inicio">

        <label for="data-fim">Data de fim:</label>
        <input type="date" name="data-fim">

        <label for="especif_disponibilizacao">Especificação da disponibilização:</label>
        <input type="text" name="especif_disponibilizacao">

        <input type="submit" value="Cadastrar" name="cadastrar">
        <a href="livros.php">Voltar</a>
    </form>
</body>
</html>