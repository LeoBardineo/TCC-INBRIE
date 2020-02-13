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
    <link rel="stylesheet" href="styles/styleRegistrar.css">
    <link rel="stylesheet" href="styles/styleMsgBoxRegistro.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>INBRIE - Registrar</title>
</head>
<body>
    <div class="register-container">
        <h1>Registrar</h1>
        <h2>Insira suas informações abaixo</h2>
        <?php
        if(isset($_SESSION['usuario_existe'])){
            echo'<div class="msg-box">
                <div class="icon-box error-box">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="text-box error-box">
                    <h1>Registro mal-sucedido</h1>
                    <h2>O nome de usuário digitado já existe.</h2>
                </div>
            </div>';
            unset($_SESSION['usuario_existe']);
        }

        if(isset($_SESSION['email_existe'])){
            echo'<div class="msg-box">
                <div class="icon-box error-box">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="text-box error-box">
                    <h1>Registro mal-sucedido</h1>
                    <h2>O e-mail digitado já existe.</h2>
                </div>
            </div>';
            unset($_SESSION['email_existe']);
        }

        if(isset($_SESSION['ext_errada'])){
            echo'<div class="msg-box">
                <div class="icon-box error-box">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="text-box error-box">
                    <h1>Registro mal-sucedido</h1>
                    <h2>A foto escolhida tem a extensão errada.</h2>
                </div>
            </div>';
            unset($_SESSION['ext_errada']);
        }

        if(isset($_SESSION['arq_grande'])){
            echo'<div class="msg-box">
                <div class="icon-box error-box">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="text-box error-box">
                    <h1>Registro mal-sucedido</h1>
                    <h2>A foto enviada é muito grande, o limite é 5 MB.</h2>
                </div>
            </div>';
            unset($_SESSION['arq_grande']);
        }

        if(isset($_SESSION['erro_upload'])){
            echo'<div class="msg-box">
                <div class="icon-box error-box">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="text-box error-box">
                    <h1>Registro mal-sucedido</h1>
                    <h2>Ocorreu um erro ao upar a foto.</h2>
                </div>
            </div>';
            unset($_SESSION['erro_upload']);
        }

        if(isset($_SESSION['status_cadastro'])){
            echo'<div class="msg-box">
                <div class="icon-box sucess-box">
                    <i class="fas fa-check"></i>
                </div>
                <div class="text-box sucess-box">
                    <h1>Registro bem-sucedido</h1>
                    <h2>O cadastro foi realizado com sucesso.<br>Você pode realizar o login <b><a href="login.php">aqui.</a></b></h2>
                </div>
            </div>';
            unset($_SESSION['status_cadastro']);
        }
        ?>
        <div id="toAppend"></div>
        <form action="zActionsPHP/registrarAction.php" method="POST" enctype="multipart/form-data"  name="formRegistro" onsubmit="return validaFormRegistro(this)">
        <div id="tabsContainer" class="tabs-container">
            <div id="tabOne" class="tab1">
                <div class="left-side">
                    <div class="input-container">
                        <input type="text" name="userName" id="userName" class="input-register" placeholder="Nome de usuário" autocomplete="off" required>
                        <input type="email" name="userEmail" id="userEmail" class="input-register" placeholder="E-mail" autocomplete="off" required>
                        <input type="password" name="userPass" id="userPass" class="input-register" placeholder="Senha" autocomplete="off" required>
                        <input type="password" name="confirmPass" id="confirmPass" class="input-register" autocomplete="off" placeholder="Confirmar senha" required>
                        <label class="checkbox-container">Eu permito que o INBRIE compartilhe minhas obras nas redes sociais.
                            <input type="checkbox" required>
                            <span class="checkmark"></span>
                          </label>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="right-side">
                    <div class="profile-img">
                        <div class="preview-container" title="Preview da foto">
                                <img src="imagens/defaultpreview.png" id="thumb-preview" class="defaultpreview">
                        </div>
                        <div class="input-file-container">
                                <input type="file" class="input-file" name="thumbinput" id="thumbinput" accept="image/*" required>
                                <i class="fas fa-upload"></i>
                                <span class="input-file-span">Enviar foto de perfil</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabTwo" class="tab2" style="display: none;">
                <label class="lbl-input" for="usuarioBio">Bio</label>
                <textarea name="usuarioBio" id="usuarioBio" class="textarea-register" placeholder="Bio"></textarea>
            </div>
        </div>
        <div class="dots-container">
            <div class="dot active" id="dotObrigatorio" onclick="formObrigatorio()"></div>
            <div class="dot" id="dotOpcional" onclick="formOpcional()"></div>
        </div>
        <div class="submit-container">
            <input type="submit" class="input-sub" value="Registrar conta">
            <a href="login.php">Já tenho uma conta</a>
        </div>
    </form>
    </div>
    <script src="scripts/btnNextForm.js"></script>
    <script src="scripts/imagePreview.js"></script>
    <script src="scripts/verificaRegistro.js"></script>
</body>
</html>