<?php 
include "../conexao-banco/conexao.php";

$dado = $_GET['id'];

 $select = "SELECT resenha.id_resenha, resenha.slug, resenha.data_publicacao, resenha.titulo AS resenha, resenha.genero, resenha.visualizacao, autor_resenha.pseudonimo, livro.slug AS livro, escritor.nome, resenha.foto_url, resenha.conteudo, resenha.sinopse FROM resenha INNER JOIN autor_resenha ON resenha.id_autor_resenha = autor_resenha.id_autor_resenha INNER JOIN livro ON resenha.id_livro = livro.id_livro INNER JOIN escritor ON resenha.id_escritor = escritor.id_escritor WHERE id_resenha = '$dado'";

 if ($result = mysqli_query($conn, $select)) {

    while($res = mysqli_fetch_array($result)) {
        echo "
    <form method='POST' action='atualizar-resenha.php?id={$res['id_resenha']}'>
    <form action='atualizar-resenha.php' name='atualizaresenha' method='POST'>
    <h1>ATUALIZAR RESENHA</h1>
        <label for='livro'>Slug do livro:</label>
        <input type='text' name='livro' value='{$res['livro']}'>

        <label for='autor'>Autor:</label>
        <input type='text' name='autor' value='{$res['nome']}'>

        <label for='resenhista'>Resenhista:</label>
        <input type='text' name='resenhista' value='{$res['pseudonimo']}'>

        <label for='resenha'>Título da resenha:</label>
        <input type='text' name='resenha' value='{$res['resenha']}'>

        <label for='slug'>Slug :</label>
        <input type='text' name='slug' value='{$res['slug']}'>

        <label for='imagem'>Foto:</label>
        <input type='text' name='imagem' value='{$res['foto_url']}'>


        <label for='genero'>Gênero:</label>
        <select name='genero' required>
            <option value='{$res['genero']}'>Selecione...</option>
            <option value='Romance'> Romance</option>
            <option value='Fantasia e ficção'>Fantasia e ficção</option>
            <option value='Suspense e mistério'>Suspense e mistério</option>
            <option value='Terror'>Terror</option>
            <option value='Clássicos'>Clássicos</option>
            <option value='Aventura'>Aventura</option>
            <option value='Drama'>Drama</option>
        </select>

        <label for='sinopse'>Sinopse:</label>
        <input type='text' name='sinopse' value='{$res['sinopse']}'>

        <label for='conteudo'>Conteudo:</label>
        <input type='text' name='conteudo'value='{$res['conteudo']}'>

        <input type='submit' value='atualizar'>
        
        <a href='resenhas.php'>Voltar</a>

</form>

    ";

    }
    
}
?>