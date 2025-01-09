<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de resenhas</title>
</head>

<body>
    <form action="inserirnovaresenha.php" name="cadastroresenhas" method="POST">
        <h1>CADASTRO DE RESENHAS</h1>
        <label for="slug-livro">Slug do livro:</label>
        <input type="text" name="slug-livro">

        <label for="autor">Autor:</label>
        <input type="text" name="autor">

        <label for="resenhista">Pseudônimo:</label>
        <input type="text" name="resenhista">

        <label for="resenha">Título da resenha:</label>
        <input type="text" name="resenha" placeholder="RESENHA: nome do livro - autor">

        <label for="slug">Slug do livro:</label>
        <input type="text" name="slug" placeholder="RESENHA:nome-do-livro-autor" required>


        <label for="imagem">Foto:</label>
        <input type="text" name="imagem" placeholder="URL">


        <label for="genero">Gênero:</label>
        <select name="genero" required>
            <option value="">Selecione...</option>
            <option value="Romance"> Romance</option>
            <option value="Fantasia e ficção">Fantasia e ficção</option>
            <option value="Suspense e mistério">Suspense e mistério</option>
            <option value="Terror">Terror</option>
            <option value="Clássicos">Clássicos</option>
            <option value="Aventura">Aventura</option>
            <option value="Drama">Drama</option>
        </select>

        <label for="sinopse">Sinopse:</label>
        <input type="text" name="sinopse">

        <label for="conteudo">Conteudo:</label>
        <input type="text" name="conteudo">

        <input type="submit" value="cadastrar">

        <a href="resenhas.php">Voltar</a>
    </form>

</body>

</html>