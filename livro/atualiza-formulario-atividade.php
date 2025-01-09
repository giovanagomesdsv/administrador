<?php
include "../conexao-banco/conexao.php"; 
$dado = $_GET['id'];

$select = "SELECT id_disponibilizacao, forma_disponibilizacao, disponibilizacao_livro.estado, data_inicio, data_fim, especif_disponibilizacao, livro.titulo, parceria.nome FROM disponibilizacao_livro INNER JOIN livro ON disponibilizacao_livro.id_livro = livro.id_livro INNER JOIN parceria ON disponibilizacao_livro.cnpj = parceria.cnpj  WHERE id_disponibilizacao ='$dado'";

if ($result = mysqli_query($conn, $select)) {

    while($res = mysqli_fetch_array($result)) {
        echo "
    <form method='POST' action='atualiza-atividade.php?id={$res['id_disponibilizacao']}'>
    <label for='livro'> Nome do livro:</label>
    <input type='text' name='livro' value='{$res['titulo']}'>

    <label for='parceria'>Parceria:</label>
    <input type='text' name='parceria' value='{$res['nome']}'>

    <label for='form-disponibilizacao'>Forma de disponibilização:</label>
    <select name='form-disponibilizacao' required>
        <option value='{$res['forma_disponibilizacao']}' selected>{$res['forma_disponibilizacao']}</option>
        <option value='Emprestado'>Emprestado</option>
        <option value='Doado'>Doado</option>
        <option value='Parceria'>Parceria</option>
        <option value='Compra'>Compra</option>
    </select>

    <label for='data-inicio'>Data de início:</label>
    <input type='date' name='data-inicio' value='{$res['data_inicio']}'>

    <label for='data-fim'>Data de fim:</label>
    <input type='date' name='data-fim' value='{$res['data_fim']}'>

    <label for='especif_disponibilizacao'>Especificação da disponibilização:</label>
    <input type='text' name='especif_disponibilizacao' value='{$res['especif_disponibilizacao']}'>

    <label for='estado'>Estado:</label>
    <select name='estado' required>
        <option value='{$res['estado']}' selected>{$res['estado']}</option>
        <option value='DISPONÍVEL'>DISPONÍVEL</option>
        <option value='INDISPONÍVEL'>INDISPONÍVEL</option>
    </select>

    <input type='submit' value='Atualizar'>
</form>

    ";

    }
    
}
?>