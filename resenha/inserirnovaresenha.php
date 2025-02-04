<?php
include "../conexao-banco/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $slug_livro = $_POST['slug-livro'];
    $escritor = $_POST['autor'];
    $autor_resenha = $_POST['resenhista'];
    $titulo = $_POST['resenha'];
    $slug = $_POST['slug'];
    $genero = $_POST['genero'];
    $sinopse = $_POST['sinopse'];
    $conteudo = $_POST['conteudo'];

    // Verifica se a imagem foi enviada
    if (isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];
    
        if ($arquivo['error'])
            die("Falha ao enviar arquivo");
    
        if ($arquivo['size'] > 2097152) 
            die("Arquivo muito grande! Max: 2MB");

    
            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    
        if($extensao != "jpg" && $extensao != 'png')
           die("Tipo de arquivo não aceito!");
    
           $path = $novoNomeDoArquivo . "." . $extensao;
    
           $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
    }
    // Busca o ID do escritor
    $query_escritor = "SELECT id_escritor FROM escritor WHERE nome = ?";
    $stmt_escritor = $conn->prepare($query_escritor);
    $stmt_escritor->bind_param("s", $escritor);
    $stmt_escritor->execute();
    $result_escritor = $stmt_escritor->get_result();
    if ($result_escritor->num_rows > 0) {
        $id_escritor = $result_escritor->fetch_assoc()['id_escritor'];
    } else {
        die("Escritor não encontrado.");
    }
    $stmt_escritor->close();

    // Busca o ID do livro
    $query_livro = "SELECT id_livro FROM livro WHERE slug LIKE ?";
    $stmt_livro = $conn->prepare($query_livro);
    $like_slug_livro = "%$slug_livro%";
    $stmt_livro->bind_param("s", $like_slug_livro);
    $stmt_livro->execute();
    $result_livro = $stmt_livro->get_result();
    if ($result_livro->num_rows > 0) {
        $id_livro = $result_livro->fetch_assoc()['id_livro'];
    } else {
        die("Livro não encontrado.");
    }
    $stmt_livro->close();

    // Busca o ID do autor da resenha
    $query_resenhista = "SELECT id_autor_resenha FROM autor_resenha WHERE pseudonimo = ?";
    $stmt_resenhista = $conn->prepare($query_resenhista);
    $stmt_resenhista->bind_param("s", $autor_resenha);
    $stmt_resenhista->execute();
    $result_resenhista = $stmt_resenhista->get_result();
    if ($result_resenhista->num_rows > 0) {
        $id_autor_resenha = $result_resenhista->fetch_assoc()['id_autor_resenha'];
    } else {
        die("Resenhista não encontrado.");
    }
    $stmt_resenhista->close();

    // Insere os dados na tabela resenha
    $inserir = "INSERT INTO resenha (id_livro, id_escritor, id_autor_resenha, titulo, slug, resenha.path, genero, sinopse, conteudo) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_inserir = $conn->prepare($inserir);
    $stmt_inserir->bind_param("iiissssss", $id_livro, $id_escritor, $id_autor_resenha, $titulo, $slug, $path, $genero, $sinopse, $conteudo);
    if ($stmt_inserir->execute()) {
        echo "<script>alert('Resenha inserida com sucesso!'); location.href='resenhas.php';</script>";
    } else {
        echo "<script>alert('Erro ao inserir a resenha: " . $stmt_inserir->error . "'); location.href='novoresenha.php';</script>";
    }
    $stmt_inserir->close();
}

$conn->close();
?>
