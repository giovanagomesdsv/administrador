<?php
include "../conexao-banco/conexao.php";

$livro = $_POST['livro'];
$parceria = $_POST['parceria'];
$form_disponibilizacao = $_POST['form-disponibilizacao'];
$data_inicio = $_POST['data-inicio'];
$data_fim = $_POST['data-fim'];
$especif_disponibilizacao = $_POST['especif_disponibilizacao'];

$query_livro = "SELECT id_livro FROM livro WHERE titulo LIKE '%$livro%'";
$result_livro = $conn->query($query_livro);
if ($result_livro && $result_livro->num_rows > 0) {
    $row = $result_livro->fetch_assoc();
    $id_livro = $row['id_livro'];
} else {
    die("Livro não encontrado.");
}

$query_parceria = "SELECT cnpj FROM parceria WHERE nome LIKE '%$parceria%'";
$result_parceria = $conn->query($query_parceria);
if ($result_parceria && $result_parceria->num_rows > 0) {
    $row = $result_parceria->fetch_assoc();
    $cnpj = $row['cnpj'];
} else {
    die("Parceria não encontrada.");
}

$sql_code = "INSERT INTO disponibilizacao_livro (id_livro, cnpj, forma_disponibilizacao, data_inicio,data_fim, especif_disponibilizacao) VALUES ( ' $id_livro', '$cnpj', '$form_disponibilizacao', '$data_inicio', '$data_fim', '$especif_disponibilizacao')";


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
         location.href="novadisponibilizacao.php";
    </script>
    ';
};
