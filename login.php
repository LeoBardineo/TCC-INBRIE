<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="imagens/IconInbrie.png" type="image" sizes="16x16">
    <link rel="stylesheet" href="styles/styleLogin.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>INBRIE - Login</title>
</head>
<body>
    <div class="login-container">
        <img src="imagens/logo-inbrie3-icon-trans.png" class="logo">
        <h1>Login</h1>
        <?php
        if(isset($_SESSION['nao_autenticado'])){
        echo"<div class='msg-box'>
            <div class='icon-box error-box'>
                <i class='fas fa-exclamation-triangle'></i>
            </div>
            <div class='text-box error-box'>
                <h1>Login mal-sucedido</h1>
                <h2>E-mail ou senha inválidos</h2>
            </div>
        </div>";
        unset($_SESSION['nao_autenticado']);
        }
        if(isset($_SESSION['nao_existe'])){
        echo"<div class='msg-box'>
            <div class='icon-box error-box'>
                <i class='fas fa-exclamation-triangle'></i>
            </div>
            <div class='text-box error-box'>
                <h1>Login mal-sucedido</h1>
                <h2>Usuário não existe</h2>
            </div>
        </div>";
        unset($_SESSION['nao_existe']);
        }
        ?>
        <div id="toAppend"></div>
        <form action="zActionsPHP/logarAction.php" method="POST" name="formLogin" onsubmit="return validaFormLogin(this)">
        <div>
            <i class="fas fa-user"></i>
            <input type="email" name="userEmail" id="userEmail" class="input-login" placeholder="E-mail" required>
        </div>
        <div>
            <i class="fas fa-lock"></i>
            <input type="password" name="userPass" id="userPass" class="input-login" placeholder="Senha" required>
        </div>
            <input type="submit" class="input-sub" value="Logar">
        </form>
        <div class="links-container">
            <a href="registro.php">Não está registrado?</a>
        </div>
    </div>
    <script src="scripts/verificaLogin.js"></script>
</body>
</html>