<?php
include "../conexao-banco/conexao.php";

$dado = $_GET['id'];
$estado = $_POST['estado'];
$data_emprestimo = $_POST['data_emprestimo'];
$data_devolucao = $_POST['data_devolucao'];
$observacoes = $_POST['observacoes'];

// Atualizando o estado no banco
$consulta = "UPDATE emprestimo SET estado_emprestimo = '$estado', data_emprestimo= '$data_emprestimo', data_devolucao='$data_devolucao', observacoes='$observacoes'  WHERE id_emprestimo = '$dado'";

if (mysqli_query($conn, $consulta)) {
    echo "
    <script>
        alert('Estado atualizado com sucesso!');
        window.location.href = 'livros.php';
    </script>";
} else {
    echo "
    <script>
        alert('Erro ao atualizar o estado!');
        window.location.href = 'atualiza-emprestimo-estado.php';
    </script>";
}
?>
