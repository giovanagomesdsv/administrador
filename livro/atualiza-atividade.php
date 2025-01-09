<?php 
include "../conexao-banco/conexao.php";

$dado = $_GET['id'];

$form_disponibilizacao = $_POST['form-disponibilizacao'];
$data_inicio = $_POST['data-inicio'];
$data_fim = $_POST['data-fim'];
$especif_disponibilizacao = $_POST['especif_disponibilizacao'];
$estado = $_POST['estado'];

$update = "UPDATE disponibilizacao_livro SET estado='$estado', forma_disponibilizacao='$form_disponibilizacao', data_inicio='$data_inicio', data_fim='$data_fim', especif_disponibilizacao='$especif_disponibilizacao' WHERE id_disponibilizacao = '$dado'";

if ($resp = mysqli_query($conn, $update)) {
    echo "
    <script>
      window.alert('atividade atualizada com sucesso!');
      location.href = 'livros.php';
    </script>
    ";
} else {
    echo "
    <script>
      window.alert('Erro na atualização!');
      location.href = 'atualiza-formulario-atividade.php';
    </script>
    ";
}
?>