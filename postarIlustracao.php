<?php
    include('zActionsPHP/verificaLogin.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="imagens/IconInbrie.png" type="image" sizes="16x16">
    <link rel="stylesheet" href="styles/stylePostarIlustracao.css">
    <link rel="stylesheet" href="styles/styleInputTag.css">
    <link rel="stylesheet" href="styles/styleNavBar.css">
    <link rel="stylesheet" href="styles/styleFooter.css">
    <link rel="stylesheet" href="styles/styleMsgBox.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="scripts/retiraTransition.js"></script>
    <title>INBRIE - Postar ilustração</title>
</head>
<body class="preload" id="preloadcontainer">
    <?php
        include('header.php');
    ?>
    <div class="post-container">
        <img class="logo-music" src="imagens/ilustracaoIcon.png">
        <h1>Ilustração</h1>
        <p>Rabisque um esboço, desenhe um personagem, pinte um cenário. <br> Publique suas ilustrações!</p>
        <div class="form-container">
            <?php
                if(isset($_SESSION['campos_nulo'])){
                    echo "
                    <div class='msg-box'>
                        <div class='icon-box error-box'>
                            <i class='fas fa-exclamation-triangle'></i>
                        </div>
                        <div class='text-box error-box'>
                            <h1>Ocorreu um erro.</h1>
                            <h2>Campo(s) nulo(s).</h2>
                        </div>
                    </div>
                    ";
                    unset($_SESSION['campos_nulo']);
                }

                if(isset($_SESSION['inserirpost_erro'])){
                    echo "
                    <div class='msg-box'>
                        <div class='icon-box error-box'>
                            <i class='fas fa-exclamation-triangle'></i>
                        </div>
                        <div class='text-box error-box'>
                            <h1>Ocorreu um erro.</h1>
                            <h2>Ocorreu um erro ao inserir</h2>
                        </div>
                    </div>
                    ";
                    unset($_SESSION['inserirpost_erro']);
                }

                if(isset($_SESSION['post_ok'])){
                    $lastID = $_SESSION['last_id'];
                    echo "
                    <div class='msg-box'>
                        <div class='icon-box sucess-box'>
                            <i class='fas fa-exclamation-triangle'></i>
                        </div>
                        <div class='text-box sucess-box'>
                            <h1>Publicação feita.</h1>
                            <h2>Obra publicada com sucesso. <br> Você pode visualizá-la <a href=ilustracao.php?postID=$lastID> aqui </a>.</h2>
                        </div>
                    </div>
                    ";
                    unset($_SESSION['last_id']);
                    unset($_SESSION['post_ok']);
                }
            ?>
            <form method="POST" action="zActionsPHP/ilustracaoAction.php" enctype="multipart/form-data" accept-charset="utf-8">
                <label for="titleinput">Título</label>
                <input type="text" name="titleinput" class="input-normal" id="titleinput" placeholder="Escreva aqui o título das ilustrações.">

                <label for="descinput">Descrição</label>
                <textarea type="text" name="descinput" class="input-normal" id="descinput" placeholder="Escreva aqui a informações adicionais. Pode ser o equipamento utilizado, a paleta de cores usada, inspirações."></textarea>

                <label>Imagens</label>
                <div class="allimage-container" id="imagecontainer">
                </div>
                <button class="new-image">
                    <input type="file" name="new-ilust" id="new-ilust" class="input-newimage" accept="image/*">
                    <i class="fas fa-plus-circle"></i>&nbsp;
                    Nova imagem
                </button>

                <label>Tags</label>
                <div class="tags-input">
                    <input type="hidden" name="postTags" id="postTags">
                </div>
                <input type="text" name="taginput" class="input-normal" id="taginput" placeholder="Marcações que facilitam a pesquisa da sua obra." autocomplete="off">
                <div class="inline-input">
                    <input type="submit" value="Postar" id="postarinput">
                </div>
            </form>
        </div>
    </div>
    <?php
        include('footer.html');
    ?>
    <script src="scripts/inputTag.js"></script>
    <script src="scripts/novaImagem.js"></script>
</body>
</html>