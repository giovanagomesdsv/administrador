<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cadastrar.php">
    <label for="Status">Status:</label>
        <select name="status" id="Status" required>
            <option value=""></option>
            <option value="1">ATIVO</option>
            <option value="0">DESATIVADO</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>