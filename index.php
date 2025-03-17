<?php
session_start();
include "conexao-banco/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email']) && isset($_POST['senha'])) {
    
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if (empty($email)) {
        echo "Preencha seu e-mail.";
    } elseif (empty($senha)) {
        echo "Preencha sua senha.";
    } else {
        // Consulta segura usando Prepared Statements
        $sql_code = "SELECT * FROM usuarios WHERE usu_email = ?";
        $stmt = $conn->prepare($sql_code);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario_db = $result->fetch_assoc();

            if (password_verify($senha, $usuario_db['usu_senha'])) {
                $_SESSION['id'] = $usuario_db['usu_id'];
                $_SESSION['nome'] = $usuario_db['usu_nome'];

                header("Location: home.php");
                exit();
            } else {
                echo "Falha ao logar! Senha incorreta.";
            }
        } else {
            echo "Falha ao logar! E-mail incorreto.";
        }

        $stmt->close();
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
            <input type="text" name="email" placeholder="E-mail">
            <input type="password" name="senha" placeholder="Senha">
            <a href="" style="color: #fff">Esqueci a senha</a>
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
