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
    <link rel="stylesheet" href="styles/styleNavBar.css">
    <link rel="stylesheet" href="styles/styleInputTag.css">
    <link rel="stylesheet" href="styles/styleFooter.css">
    <link rel="stylesheet" href="styles/stylePostarLiteratura.css">
    <link rel="stylesheet" href="styles/styleMsgBox.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="scripts/retiraTransition.js"></script>
    <title>INBRIE - Postar literatura</title>
</head>
<body class="preload" id="preloadcontainer">
    <?php
        include('header.php');
    ?>
    <div class="post-container">
        <img class="logo-music" src="imagens/LeituraIcon.png">
        <h1>Literatura</h1>
        <p>Escreva um poema, fanfic, poesia, o que você quiser.<br> Faça sua história!</p>
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
                            <h2>Obra publicada com sucesso. <br> Você pode visualizá-la <a href=literatura.php?postID=$lastID> aqui </a>.</h2>
                        </div>
                    </div>
                    ";
                    unset($_SESSION['last_id']);
                    unset($_SESSION['post_ok']);
                }
            ?>
        <div class="form-container">
            <form method="POST" action="zActionsPHP/literaturaAction.php" enctype="multipart/form-data" onsubmit="return criarInputEditor(this)">
                <label for="titleinput">Título</label>
                <input type="text" name="titleinput" class="input-normal" id="titleinput" placeholder="Escreva aqui o título da sua história.">
                
                <label for="descinput">Descrição</label>
                <textarea type="text" name="descinput" class="input-normal" id="descinput" placeholder="Escreva aqui informações adicionais. Pode ser a sinopse, comentários do autor, contato."></textarea>
                
                <label>Editor</label>
                <div class="page-editor">
                    <div class="editor-buttons">
                        <button class="negrito-button" type="button">
                            <span class="tooltiptext botton">Negrito</span>
                            <i class="fas fa-bold"></i>
                        </button>
                        <button class="italico-button" type="button">
                            <span class="tooltiptext botton">Itálico</span>
                            <i class="fas fa-italic"></i>
                        </button>
                        <button class="underline-button" type="button">
                            <span class="tooltiptext  botton">Underline</span>
                            <i class="fas fa-underline"></i>
                        </button>
                        
                        <div class="separator-btn"></div>
                        
                        <button class="esquerda-button" type="button">
                            <span class="tooltiptext botton">Alinhar à esquerda</span>
                            <i class="fas fa-align-left"></i>
                        </button>
                        <button class="center-button" type="button">
                            <span class="tooltiptext botton">Centralizar</span>
                            <i class="fas fa-align-center"></i>
                        </button>
                        <button class="direita-button" type="button">
                            <span class="tooltiptext botton">Alinhar à direita</span>
                            <i class="fas fa-align-right"></i>
                        </button>
                        <button class="justificar-button" type="button">
                            <span class="tooltiptext botton">Justificar</span>
                            <i class="fas fa-align-justify"></i>
                        </button>
                        
                        <div class="separator-btn"></div>
                        <br><br>
                        
                        <button class="fonteNome-button" type="button">
                            <span class="tooltiptext">Mudar fonte</span>
                            <i class="fas fa-font"></i>
                        </button>
                        <select class="fonteNome">
                            <option>Arial</option>
                            <option>Comic Sans MS</option>
                            <option>Verdana</option>
                            <option>Times New Roman</option>
                        </select>
                        
                        <div class="separator-btn"></div>
                        
                        <button class="fonteTamanho-button" type="button">
                            <span class="tooltiptext">Mudar tamanho da fonte</span>
                            <i class="fas fa-font"></i>
                        </button>
                        <input type="number" class="fonteTamanho">
                        
                        <div class="separator-btn"></div>
                        
                        <button class="desfazer-button" type="button">
                            <span class="tooltiptext">Desfazer</span>
                            <i class="fas fa-undo"></i>
                        </button>
                    </div>
                    <div class="separator"></div>
                    <div class="content-editable" id="litescritura" name="litescritura" contenteditable="true">
                        Escreva aqui.
                    </div>
                </div>
                
                <label>Tags</label>
                <div class="tags-input">
                    <input type="hidden" name="postTags" id="postTags">
                </div>
                <input type="text" name="taginput" class="input-normal" id="taginput" placeholder="Marcações que facilitam a pesquisa da sua obra." autocomplete="off">
                
                <label>Miniatura</label>
                <div class="preview-container" title="Preview da miniatura">
                    <img src="imagens/defaultpreview.png" id="thumb-preview" class="defaultpreview">
                </div>
                <div class="input-file-container">
                    <input type="file" class="input-file" name="thumbinput" id="thumbinput" accept="image/*">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                viewBox="0 0 471.2 471.2" style="enable-background:new 0 0 471.2 471.2;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M457.7,230.15c-7.5,0-13.5,6-13.5,13.5v122.8c0,33.4-27.2,60.5-60.5,60.5H87.5c-33.4,0-60.5-27.2-60.5-60.5v-124.8
                            c0-7.5-6-13.5-13.5-13.5s-13.5,6-13.5,13.5v124.8c0,48.3,39.3,87.5,87.5,87.5h296.2c48.3,0,87.5-39.3,87.5-87.5v-122.8
                            C471.2,236.25,465.2,230.15,457.7,230.15z"/>
                            <path d="M159.3,126.15l62.8-62.8v273.9c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5V63.35l62.8,62.8c2.6,2.6,6.1,4,9.5,4
                            c3.5,0,6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1l-85.8-85.8c-2.5-2.5-6-4-9.5-4c-3.6,0-7,1.4-9.5,4l-85.8,85.8
                            c-5.3,5.3-5.3,13.8,0,19.1C145.5,131.35,154.1,131.35,159.3,126.15z"/>
                        </g>
                    </g>
                </svg>
                <span class="input-file-span">Enviar miniatura</span>
            </div>
            <div class="inline-input">
                <input type="submit" value="Postar" id="postarinput">
            </div>
        </form>
    </div>
</div>
    <?php
        include('footer.html');
    ?>
<script src="scripts/imagePreview.js"></script>
<script src="scripts/inputTag.js"></script>
<script src="scripts/pageEditor.js"></script>
<script src="scripts/criarEditor.js"></script>
</body>
</html>