<?php
    session_start();
    include('zActionsPHP/conexaoDB.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="imagens/IconInbrie.png" type="image" sizes="16x16">
    <link rel="stylesheet" href="styles/styleNavBar.css">
    <link rel="stylesheet" href="styles/styleFooter.css">
    <link rel="stylesheet" href="styles/styleError404.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="scripts/retiraTransition.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>INBRIE - Página não encontrada</title>
</head>
<body class="preload" id="preloadcontainer">
    <?php
        include('header.php');
    ?>
    <div class="container">
        <h1>Erro</h1>
        <p>Desculpe, mas a página na qual você estava procurando não foi encontrada.</p>
        <a href="explorar.php">Descubra novas artes</a>
    </div>
    <?php
        include('footer.html');
    ?>
</body>
</html>