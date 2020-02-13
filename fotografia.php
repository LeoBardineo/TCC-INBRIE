<?php
    include('zActionsPHP/conexaoDB.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/stylePost.css">
    <link rel="icon" href="imagens/IconInbrie.png" type="image" sizes="16x16">
    <link rel="stylesheet" href="styles/styleInputTag.css">
    <link rel="stylesheet" href="styles/styleNavBar.css">
    <link rel="stylesheet" href="styles/styleMsgBox.css">
    <link rel="stylesheet" href="styles/styleFooter.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="scripts/retiraTransition.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>INBRIE - Fotografia</title>
</head>
<body class="preload" id="preloadcontainer">
    <?php
        include('header.php');
        if(isset($_SESSION['usuarioID'])){
            $usuarioLogadoID = $_SESSION['usuarioID'];
            $usuarioLogadoNome = $_SESSION['usuarioNome'];
            $fotoUsuarioLogado = $_SESSION['usuarioFotoPerfil'];
            $caminhoFotoUsuarioLogado = substr($fotoUsuarioLogado, 3);
        }
        
        if(!isset($_GET['postID'])){
            header('Location: error404.php');
            exit;
        }

        $postID = $_GET['postID'];
        $sql = "SELECT id_usuario, postTitulo, postDescricao FROM posttipofotografia WHERE postID = $postID";
        $result = mysqli_query($conexao, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id_usuario = $row['id_usuario'];
                $postTitulo = $row['postTitulo'];
                $postDescricao = $row['postDescricao'];
            }
        }else{
            header('Location: error404.php');
            exit;
        }

        $sql = "SELECT usuarioNome, usuarioBio, usuarioFotoPerfil FROM usuario WHERE usuarioID = $id_usuario";
        $result = mysqli_query($conexao, $sql) or header('Location: explorar.php');
        while($row = mysqli_fetch_assoc($result)){
            $usuarioNome = $row['usuarioNome'];
            $usuarioBio = $row['usuarioBio'];
            $usuarioFotoPerfil = $row['usuarioFotoPerfil'];
        }
        $usuarioCaminhoFoto = substr($usuarioFotoPerfil, 3);
    ?>
    <input type="hidden" style="display: none;" id="postID" name="postID" value="<?php echo $postID; ?>">
    <div class="publicacao-container">
        <div class="row-content-container">
            <div class="artista-container">
                <h2>Artista</h2>
                <div>
                    <div class="profile-img-artista" style="background-image: url('<?php echo $usuarioCaminhoFoto; ?>')"></div>
                </div>
                <h1><?php echo $usuarioNome;  ?></h1>
                <p><?php echo $usuarioBio; ?></p>
                <a href="perfil.php?usuarioID=<?php echo $id_usuario; ?>">Visitar perfil</a>
            </div>
        </div>
        <div class="row-content-container">
            <div class="content-container">
                <div class="title-content-container">
                <?php
                if(isset($_SESSION['usuarioID'])){ 
                    if($usuarioLogadoID == $id_usuario){
                        echo "<form method='POST' action='zActionsPHP/excluirPost/excluirFotografia.php' class='btn-excluir-post'>
                            <input type='hidden' name='postID' id='postID' value='$postID'>
                            <i class='fas fa-trash-alt'></i>
                            <input type='submit' value=''>
                        </form>";
                    }
                }
                    ?>
                    <h1><?php echo $postTitulo; ?></h1>
                    <p><?php echo $postDescricao; ?></p>
                </div>
                <div class="separador-horizontal"></div>
                <div class="img-content-container">
                    <?php
                        $sql = "SELECT conteudoIndice, conteudoDiretorio FROM postconteudofotografia WHERE id_fotografiaPost = $postID ORDER BY conteudoIndice ASC";
                        $result = mysqli_query($conexao, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $conteudoIndice = $row['conteudoIndice'];
                            $conteudoDiretorio = $row['conteudoDiretorio'];
                            $imagemCaminho = substr($conteudoDiretorio, 3);
                            echo "<img class='content-image' src='"; echo $imagemCaminho; echo "'>";
                        }
                    ?>
                </div>
                <div class="tags-container">
                    <?php
                        $sql = "SELECT tag FROM posttagfotografia WHERE id_fotografiaPost = $postID";
                        $result = mysqli_query($conexao, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $tag = $row['tag'];
                            echo "
                            <span class='tag'>
                                <i class='fas fa-tag'></i>
                                <span class='tagtext'>$tag</span>
                            </span>
                            ";
                        }
                    ?>                    
                </div>
                <div class="info-post">
                    <?php
                        $sql = "SELECT COUNT(*) AS numLikes FROM postcurtidafotografia WHERE id_fotografiaPost = $postID AND curtidaTipo = 1";
                        $result = mysqli_query($conexao, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $numLikes = $row['numLikes'];
                        }

                        $sql = "SELECT COUNT(*) AS numDeslikes FROM postcurtidafotografia WHERE id_fotografiaPost = $postID AND curtidaTipo = 0";
                        $result = mysqli_query($conexao, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $numDeslikes = $row['numDeslikes'];
                        }
                    ?>
                    <h2><?php echo $numLikes; ?> curtida<?php echo $numLikes>1 || $numLikes==0 ? "s" : "" ?></h2>
                    <h2><?php echo $numDeslikes; ?> descurtida<?php echo $numDeslikes>1 || $numDeslikes==0 ? "s" : "" ?></h2>
                </div>
            </div>
            <div class="buttons-container">
                <form method="POST" action="zActionsPHP/like/likeFotografia.php">
                <input type="hidden" id="usuarioLogadoID" name="usuarioLogadoID" style="display: none;" value="<?php if(isset($_SESSION['usuarioID'])){ echo $usuarioLogadoID; } ?>">
                <input type="hidden" id="postID" name="postID" style="display: none;" value="<?php echo $postID; ?>">
                <?php
                if(isset($_SESSION['usuarioID'])){
                    $sql = "SELECT curtidaTipo FROM postcurtidafotografia WHERE id_fotografiaPost = $postID AND id_usuario = $usuarioLogadoID";
                    $result = mysqli_query($conexao, $sql);
                    if(mysqli_num_rows($result) > 0){// o usuário já realizou alguma ação sobre o post
                        while($row = mysqli_fetch_array($result)){
                            $curtidaTipo = $row['curtidaTipo'];
                            if($curtidaTipo == 1){ // se ele já curtiu
                                echo '<button class="activelikebutton" id="likebtn" type="submit"><i class="fas fa-thumbs-up"></i></button>'; //já curtido
                            }else{// se ele descurtiu
                                echo '<button class="likebutton" id="likebtn" type="submit"><i class="fas fa-thumbs-up"></i></button>'; //não curtido ainda
                            }
                        }
                    }else{// o usuário fez nada ainda
                        echo '<button class="likebutton" id="likebtn" type="submit"><i class="fas fa-thumbs-up"></i></button>'; //não curtido ainda
                    }
                }else{
                    echo "<h2 class='link-4-login'><a class='link-for-login' href='login.php'>Logue aqui</a> para curtir ou descurtir.</h2>";
                }
                ?>
                </form>
                <form method="POST" action="zActionsPHP/like/deslikeFotografia.php">
                <input type="hidden" id="usuarioLogadoID" name="usuarioLogadoID" style="display: none;" value="<?php if(isset($_SESSION['usuarioID'])){  echo $usuarioLogadoID; } ?>">
                <input type="hidden" id="postID" name="postID" style="display: none;" value="<?php echo $postID; ?>">
                <?php
                if(isset($_SESSION['usuarioID'])){ 
                    $sql = "SELECT curtidaTipo FROM postcurtidafotografia WHERE id_fotografiaPost = $postID AND id_usuario = $usuarioLogadoID";
                    $result = mysqli_query($conexao, $sql);
                    if(mysqli_num_rows($result) > 0){// o usuário já realizou alguma ação sobre o post
                        while($row = mysqli_fetch_array($result)){
                            $curtidaTipo = $row['curtidaTipo'];
                            if($curtidaTipo == 0){ // se ele já descurtiu
                                echo '<button class="activedeslikebutton" id="deslikebtn" type="submit"><i class="fas fa-thumbs-down"></i></button>'; //já descurtido
                            }else{// se ele descurtiu
                                echo '<button class="deslikebutton" id="deslikebtn" type="submit"><i class="fas fa-thumbs-down"></i></button>'; //não descurtido ainda
                            }
                        }
                    }else{// o usuário fez nada ainda
                        echo '<button class="deslikebutton" id="deslikebtn" type="submit"><i class="fas fa-thumbs-down"></i></button>'; //não descurtido ainda
                    }
                }
                ?>
                </form>
            </div>
            <div class="separador-horizontal"></div>


            <?php
                $sql = "SELECT COUNT(*) AS numComment FROM postcomentariofotografia WHERE id_fotografiaPost = $postID";
                $result = mysqli_query($conexao, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $numComment = $row['numComment'];
                }
            ?>
            <div class="comments-container">
                <h1>Comentários (<?php echo $numComment; ?>)</h1>
                <div class="insert-comment-container">
                    <div class="comment-img-container">
                        <div class="comment-profile-img" style="background-image: url('<?php if(isset($_SESSION['usuarioID'])){  echo $caminhoFotoUsuarioLogado; } ?>')"></div>
                    </div>
                    <form action="zActionsPHP/postarComentario/postarComentarioFotografia.php" method="post" class="send-comment-container">
                    <?php
                    if(isset($_SESSION['usuarioID'])){ 
                    echo"    <input type='hidden' id='usuarioLogadoID' name='usuarioLogadoID' style='display: none;' value='$usuarioLogadoID'>
                        <input type='hidden' id='postID' name='postID' style='display: none;' value='$postID'>
                        <h2 id='usuarioLogadoNome'>$usuarioLogadoNome</h2>
                        <textarea name='comentarioConteudo' id='comentarioConteudo' placeholder='Escreva um comentário...'></textarea>
                        <input type='submit' value='Comentar' id='btncomment'>";
                    }else{
                        echo "<h2><a class='link-for-login' href='login.php'>Logue aqui</a> para comentar.</h2>";
                    }
                    ?>
                    </form>
                </div>
                <h1 id="preSendComment"></h1>
                <div id="allComentsContainer" class="all-comments-container">
                <?php
                    $sql = "SELECT usuario.usuarioFotoPerfil, usuario.usuarioNome, postcomentariofotografia.comentarioID, postcomentariofotografia.comentarioConteudo, postcomentariofotografia.comentarioData FROM usuario, postcomentariofotografia WHERE usuario.usuarioID = postcomentariofotografia.id_usuario AND postcomentariofotografia.id_fotografiaPost = $postID  ORDER BY comentarioData DESC;";
                    $result = mysqli_query($conexao, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $usuarioComentarioNome = $row['usuarioNome'];
                            $comentarioID = $row['comentarioID'];
                            $comentarioConteudo = $row['comentarioConteudo'];
                            $comentarioData = $row['comentarioData'];
                            $comentarioDataNovo = date("d/m/Y", strtotime($comentarioData));
                            $comentarioHorario = substr($comentarioData, 11);
                            $comentarioHorarioNovo = date_format(date_create($comentarioHorario), 'H \h\o\r\a\s \e i \m\i\n\u\t\o\s');
                            $usuarioComentarioFotoPerfil = $row['usuarioFotoPerfil'];
                            $usuarioComentarioFotoPerfilNovo = substr($usuarioComentarioFotoPerfil, 3);
                            echo "
                            <div class='sended-comment-container'>
                                <div class='comment-img-container'>";
    
                                echo '
                                    <div class="comment-profile-img" style="background-image: url('; echo $usuarioComentarioFotoPerfilNovo; echo ')" id="asdasdds"></div>';
    
                                    echo "
                                </div>
                                <form method='get' class='send-comment-container' action='zActionsPHP/excluirComentario/excluirComentarioFotografia.php?comentarioID='$comentarioID'&postID='$postID'>
                                    <input type='hidden' id='usuarioLogadoID' name='usuarioLogadoID' style='display: none;' value='"; if(isset($_SESSION['usuarioID'])){  echo $usuarioLogadoID; } echo "'>";
                                    echo "<input type='hidden' id='id_usuario' name='id_usuario' style='display: none;' value='"; echo $id_usuario;
                                    echo "'>";
                                    echo "<input type='hidden' id='comentarioID' name='comentarioID' style='display: none;' value='"; echo $comentarioID;
                                    echo "'>";
                                    echo "<input type='hidden' id='postID' name='postID' style='display: none;' value='"; echo $postID;
                                    echo "'>";
                                    echo "
                                    <div class='nomeUsuarioComentario'>
                                        <h2>$usuarioComentarioNome</h2>";
                                if(isset($_SESSION['usuarioID'])){ 
                                    if($usuarioLogadoID == $id_usuario){
                                        echo "<div class='input-container-comment'>";
                                        echo "<i class='fas fa-trash-alt'></i>";
                                        echo "<input type='submit' value='excluir'>";
                                        echo "</div>";
                                    }
                                }
                                    echo "
                                    </div>
                                    <p class='comment-paragraph'>$comentarioConteudo</p>
                                    <p class='comment-data'>Data de envio: $comentarioDataNovo as $comentarioHorarioNovo</p>
                                </form>
                            </div>  
                            ";
                        }
                    }else{
                        echo "<br><h1>Nenhum comentário.</h1>";
                    }
                ?>
            </div>
            </div>
        </div>
    </div>
    <?php
        include('footer.html');
    ?>
</body>
</html>