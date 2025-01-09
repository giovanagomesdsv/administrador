<?php 
include "../conexao-banco/conexao.php";

$dado = $_GET['id'];

$consulta = "SELECT * FROM emprestimo WHERE id_emprestimo = '$dado'";

if ($result = mysqli_query($conn, $consulta)) {

    while($res = mysqli_fetch_array($result)) {
        echo "
    <form method='POST' action='atualiza-estado.php?id={$res['id_emprestimo']}'>
       <label for='estado'>Estado</label>
        <select name='estado' required>
            <option value='{$res['estado_emprestimo']}' selected>{$res['estado_emprestimo']}</option>
            <option value='Inativo'>Inativo (livro devolvido)</option>
        </select>

        <label for='data_emprestimo'>Data de empréstimo:</label>
        <input type='date' name='data_emprestimo' value='{$res['data_emprestimo']}'>

        <label for='data_devolucao'>Data de devolução:</label>
        <input type='date' name='data_devolucao' value='{$res['data_devolucao']}'>

        <label for='observacoes'>Observações:</label>
        <input type='text' name='observacoes' value='{$res['observacoes']}'>

        <input type='submit' value='Atualizar'>
    </form>
    ";
    } 
}
?>
