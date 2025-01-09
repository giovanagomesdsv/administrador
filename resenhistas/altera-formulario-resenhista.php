<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar parceria</title>
</head>
<body>
<?php
include "../conexao-banco/conexao.php";

// Pega o ID passado por parâmetro na URL
$dado = $_GET['id']; 


$consulta = "SELECT * FROM autor_resenha WHERE id_autor_resenha='$dado'";

// Executa a consulta
if ($res = mysqli_query($conn, $consulta)) {
    // Itera pelos registros retornados
    while ($linha = mysqli_fetch_array($res)) {
echo "
        <form action='alterar-resenhista.php?id={$linha['id_autor_resenha']}' method='post'>
            <h1>ATUALIZAÇÃO DE RESENHISTAS</h1>
    
            <label for='nome'>Nome:</label>
            <input type='text' name='nome' value='{$linha["nome"]}'>
    
            <label for='pseudonimo'>Pseudônimo:</label>
            <input type='text' name='pseudonimo' value='{$linha["pseudonimo"]}'>
    
            <label for='pontos'>Pontos:</label>
            <input type='number' name='pontos' value='{$linha["pontos"]}'>
    
            <label for='descricao'>Descrição:</label>
            <input type='text' name='descricao' value='{$linha["descricao"]}'>

            <label for='imagem'>Foto:</label>
            <input type='text' name='imagem' placeholder='URL' value='{$linha["foto_url"]}'>
    
            <label for='endereco'>Endereço:</label>
            <input type='text' name='endereco' value='{$linha["endereco"]}'>
    
            <label for='cidade'>Cidade:</label>
            <input type='text' name='cidade' value='{$linha["cidade"]}'>
    
            <label for='estado'>Estado:</label>
            <select name='estado' id='estado' required>
                <option value=''>Selecione...</option>
                <option value='SP' " . ($linha['estado'] == 'SP' ? 'selected' : '') . ">SP</option>
                <option value='MG' " . ($linha['estado'] == 'MG' ? 'selected' : '') . ">MG</option>
                <option value='RJ' " . ($linha['estado'] == 'RJ' ? 'selected' : '') . ">RJ</option>
            </select>
    
            <label for='telefone'>Telefone:</label>
            <input type='text' name='telefone' value='{$linha["telefone"]}'>
    
            <label for='email'>E-mail:</label>
            <input type='email' name='email' value='{$linha["email"]}'>
    
            <label for='instagram'>Instagram:</label>
            <input type='text' name='instagram' placeholder='URL' value='{$linha["instagram"]}'>
    
            <label for='tiktok'>Tik Tok:</label>
            <input type='text' name='tiktok' placeholder='URL' value='{$linha["tiktok"]}'>
    
            <label for='x'>x:</label>
            <input type='text' name='x' placeholder='URL' value='{$linha["x_social"]}'>
    
            <input type='submit' value='Atualizar'>
    
            <a href='resenhistas.php'>Voltar</a>
        </form>
        ";

    }
} else {
    // Mostra o erro caso a consulta falhe
    echo "Erro na consulta: " . mysqli_error($conn);
}
?>

</body>
</html>

