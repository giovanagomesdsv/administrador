<?php
include "conexao-banco/conexao.php";

if (isset($_POST['passe']) && isset($_POST['usuario']) && isset($_POST['senha'])) {

    if (strlen($_POST['usuario']) == 0) {
        echo "Preencha seu usuário";
    } else if (strlen($_POST['passe']) == 0) {
        echo "Preencha seu passe";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        $passe = $conn->real_escape_string($_POST['passe']);
        $usuario = $conn->real_escape_string($_POST['usuario']);
        $senha = $_POST['senha'];

        // Consulta SQL
        $sql_code = "SELECT * FROM parceria WHERE rg = '$passe' AND usuario = '$usuario'";
        $sql_query = $conn->query($sql_code) or die("Falha na consulta: " . $conn->error);

        if ($sql_query->num_rows == 1) {
            $usuario_db = $sql_query->fetch_assoc();

            // Debug para verificar senha
            // echo "Senha no banco: {$usuario_db['senha']}<br>";
            // echo "Senha enviada: $senha";

            if (password_verify($senha, $usuario_db['senha'])) {
                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['rg'] = $usuario_db['rg'];
                $_SESSION['usuario'] = $usuario_db['usuario'];
                $_SESSION['nome'] = $usuario_db['nome'];

                header("Location: home.php");
                exit();
            } else {
                echo "Falha ao logar! Senha incorreta.";
            }
        } else {
            echo "Falha ao logar! Passe ou usuário incorretos.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="login.css">
    <title>Administrador BC - Login</title>
</head>

<body>
<div class="container" id="container">

    <div class="form-container sign-in">
        <form action="" method="POST" name="form1">
            <h1>Entrar</h1>
            <input type="text" name="passe" placeholder="Passe">
            <input type="text" name="usuario" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <button class="btn">Entrar</button>
        </form>
    </div>

    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-right">
                <h1>Olá, você está acessando o site Administrador do BIBLIÓFILOS Community!</h1>
                <p>É necessário que um administrador já cadastrado realize o cadastro de um novo colaborador.</p>
            </div>
        </div>
    </div>
</div>




</body>

</html>