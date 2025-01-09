<?php
include "../conexao-banco/conexao.php";

$id_disponibilizacao = $_POST['id-disponibilizacao'];
$resenhista = $_POST['resenhista'];
$data_emprestimo = $_POST['data-emprestimo'];
$data_fim = $_POST['data-fim'];
$observacoes = $_POST['observacoes'];


$query_resenhista = "SELECT id_autor_resenha FROM autor_resenha WHERE nome LIKE '%$resenhista%'";
$result_resenhista = $conn->query($query_resenhista);
if ($result_resenhista && $result_resenhista->num_rows > 0) {
    $row = $result_resenhista->fetch_assoc();
    $id_resenhista = $row['id_autor_resenha'];
} else {
    die("Resenhista não encontrado.");
}

$sql_code = "INSERT INTO  emprestimo (id_disponibilizacao,  id_autor_resenha,   data_emprestimo,   data_devolucao,  observacoes) VALUES ('$id_disponibilizacao', '$id_resenhista', '$data_emprestimo', '$data_fim', '$observacoes')";


if (mysqli_query($conn, $sql_code)) {
    echo '
    <script>
         window.alert("Dados inseridos com sucesso!");
         location.href="livros.php";
    </script>
    ';
} else {
    echo '
    <script>
         window.alert("Erro na inserção!");
         location.href="novoemprestimo.php";
    </script>
    ';
};
