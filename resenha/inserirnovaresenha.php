<?php
include "../conexao-banco/conexao.php";

$slug_livro = $_POST['slug-livro'];
$escritor = $_POST['autor'];
$autor_resenha = $_POST['resenhista'];
$titulo = $_POST['resenha'];
$slug = $_POST['slug'];
$foto_url = $_POST['imagem'];
$genero = $_POST['genero'];
$sinopse = $_POST['sinopse'];
$conteudo = $_POST['conteudo'];


// Busca o ID do escritor
$query_escritor = "SELECT id_escritor FROM escritor WHERE nome = '$escritor'";
$result_escritor = $conn->query($query_escritor);
if ($result_escritor && $result_escritor->num_rows > 0) {
    $row = $result_escritor->fetch_assoc();
    $id_escritor = $row['id_escritor'];
} else {
    die("Escritor não encontrado.");
}

// Busca o ID do livro
$query_livro = "SELECT id_livro FROM livro WHERE slug LIKE '%$slug_livro%'";
$result_livro = $conn->query($query_livro);
if ($result_livro && $result_livro->num_rows > 0) {
    $row = $result_livro->fetch_assoc();
    $id_livro = $row['id_livro'];
} else {
    die("Livro não encontrado.");
}


// Busca o ID do autor da resenha
$query_resenhista = "SELECT id_autor_resenha FROM autor_resenha WHERE pseudonimo = '$autor_resenha'";
$result_resenhista = $conn->query($query_resenhista);
if ($result_resenhista && $result_resenhista->num_rows > 0) {
    $row = $result_resenhista->fetch_assoc();
    $id_autor_resenha = $row['id_autor_resenha'];
} else {
    die("Resenhista não encontrado.");
}

// Inserção da resenha no banco de dados
$inserir = "INSERT INTO resenha (id_livro, id_escritor, id_autor_resenha, titulo, slug, foto_url, genero, sinopse, conteudo) 
            VALUES ('$id_livro', '$id_escritor', '$id_autor_resenha', '$titulo', '$slug', '$foto_url', '$genero', '$sinopse', '$conteudo')";

if (mysqli_query($conn, $inserir)) {
    echo '
    <script>
         window.alert("Dados inseridos com sucesso!");
         location.href="resenhas.php";
    </script>
    ';
} else {
    echo '
    <script>
         window.alert("Erro na inserção!");
         location.href="novoresenha.php";
    </script>
    ';
}

// Fecha a conexão
$conn->close();
?>
