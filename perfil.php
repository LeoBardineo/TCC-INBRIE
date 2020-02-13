<?php
    session_start();
    include('zActionsPHP/conexaoDB.php');
    if(!$_GET['usuarioID']){
        header('Location: error404.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="imagens/IconInbrie.png" type="image" sizes="16x16">
    <link rel="stylesheet" href="styles/stylePerfil.css">
    <link rel="stylesheet" href="styles/styleInputTag.css">
    <link rel="stylesheet" href="styles/styleNavBar.css">
    <link rel="stylesheet" href="styles/styleMsgBox.css">
    <link rel="stylesheet" href="styles/styleFooter.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="scripts/retiraTransition.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>INBRIE - Perfil</title>
</head>
<body class="preload" id="preloadcontainer">
    <?php
        include('header.php');
        if(isset($_GET['showExplore'], $_GET['usuarioID'])){
            $organizeExplore = "MaisRecentes";
            $showExplore = $_GET['showExplore'];
            $usuarioID = $_GET['usuarioID'];
        }else{
            $organizeExplore = "MaisRecentes";
            $showExplore = "ilustracao";
            $usuarioID = $_GET['usuarioID'];
        }

        $sql = "SELECT usuarioNome, usuarioBio, usuarioFotoPerfil, usuarioDataRegistro FROM usuario WHERE usuarioID = $usuarioID;";
        $result = mysqli_query($conexao, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $usuarioNome = $row['usuarioNome'];
                $usuarioBio = $row['usuarioBio'];
                $usuarioFotoPerfil = $row['usuarioFotoPerfil'];
                $usuarioFotoPerfil = substr($usuarioFotoPerfil, 3);
                $usuarioDataRegistro = $row['usuarioDataRegistro'];
                $usuarioDataRegistro = date("d/m/Y", strtotime($usuarioDataRegistro));
    
                $sqlFotografia = "SELECT COUNT(*) AS contadorPostFotografia FROM posttipofotografia WHERE id_usuario = $usuarioID";
                $resultFotografia = mysqli_query($conexao, $sqlFotografia);
                while($contadorPostFotografia = mysqli_fetch_assoc($resultFotografia)){
                    $contadorPost = $contadorPostFotografia['contadorPostFotografia'];
                }
    
                $sqlIlustracao = "SELECT COUNT(*) AS contadorPostIlustracao FROM posttipoilustracao WHERE id_usuario = $usuarioID";
                $resultIlustracao = mysqli_query($conexao, $sqlIlustracao);
                while($contadorPostIlustracao = mysqli_fetch_assoc($resultIlustracao)){
                    $contadorPost = $contadorPost + $contadorPostIlustracao['contadorPostIlustracao'];
                }
                
                $sqlLiteratura = "SELECT COUNT(*) AS contadorPostLiteratura FROM posttipoliteratura WHERE id_usuario = $usuarioID";
                $resultLiteratura = mysqli_query($conexao, $sqlLiteratura);
                while($contadorPostLiteratura = mysqli_fetch_assoc($resultLiteratura)){
                    $contadorPost = $contadorPost + $contadorPostLiteratura['contadorPostLiteratura'];
                }
    
                $sqlMusica = "SELECT COUNT(*) AS contadorPostMusica FROM posttipomusica WHERE id_usuario = $usuarioID";
                $resultMusica = mysqli_query($conexao, $sqlMusica);
                while($contadorPostMusica = mysqli_fetch_assoc($resultMusica)){
                    $contadorPost = $contadorPost + $contadorPostMusica['contadorPostMusica'];
                }
            }
        }else{
            header('Location: error404.php');
            exit;
        }
    ?>
    <div class="artista-perfil-container">
        <div class="artista-perfil-img" style="background-image: url('<?php echo $usuarioFotoPerfil; ?>')"></div>
        <div class="title-perfil">
            <h1><?php echo $usuarioNome; ?></h1><br>
            <p><?php echo $usuarioBio; ?></p>
        </div>
        <div class="info-perfil">
            <p>Conta criada em: <?php echo $usuarioDataRegistro; ?></p>
            <p>Número de postagens: <?php echo $contadorPost; ?></p>
        </div>
    </div>
    <div class="post-container-perfil">
        <h1 class="h1-pub">Publicações</h1>
        <form class="inline-select" action="perfil.php" method="GET">
            <input type="hidden" id="usuarioID" name="usuarioID" value=<?php echo $usuarioID; ?>>
            <label for="showExplore">Mostrar:</label>
                <select name="showExplore" id="showExplore">
                <option value="ilustracao" 
                <?php echo $showExplore=="ilustracao" ? "selected" : ""; ?>>Ilustração</option>
                <option value="fotografia" 
                <?php echo $showExplore=="fotografia" ? "selected" : ""; ?>>Fotografia</option>
                <option value="literatura" 
                <?php echo $showExplore=="literatura" ? "selected" : ""; ?>>Literatura</option>
                <option value="musica"
                <?php echo $showExplore=="musica" ? "selected" : ""; ?>>Música</option>
            </select>
            <input class="apply-filtro" type="submit" value="Aplicar filtro">
        </form>
        <?php

                $tableTipo = "posttipo$showExplore";
                $tableConteudo = "postconteudo$showExplore";
                $tableCurtida = "postcurtida$showExplore";
                $tableTag = "posttag$showExplore";
                $tableComentario = "postcomentario$showExplore";

                $id_post = "id_".$showExplore."Post";

                if($organizeExplore == "MaisRecentes"){
                    $orderBY = "ORDER BY $tableTipo.postData DESC";

                }else if($organizeExplore == "MenosRecentes"){
                    $orderBY = "ORDER BY $tableTipo.postData ASC";

                }else if($organizeExplore == "MaisCurtidos"){
                    $orderBY = "DESC";

                }else if($organizeExplore == "MenosCurtidos"){
                    $orderBY = "ASC";

                }    
                
                $sql = "SELECT postID, postTitulo, postDescricao FROM $tableTipo, $tableTag WHERE $tableTag.$id_post = $tableTipo.postID AND $tableTipo.id_usuario = $usuarioID GROUP BY postID;";
                
                if($organizeExplore == "MaisRecentes" || $organizeExplore == "MenosRecentes"){
                    $sql = "SELECT postID, postTitulo, postDescricao FROM $tableTipo, $tableTag WHERE $tableTag.$id_post = $tableTipo.postID AND  $tableTipo.id_usuario = $usuarioID GROUP BY postID $orderBY;";
                }else{
                    $sql = "SELECT postID, postTitulo, postDescricao, COUNT(curtidaTipo) AS numCurtida FROM $tableTipo, $tableCurtida, $tableTag WHERE $tableCurtida.$id_post = $tableTipo.postID AND $tableTag.$id_post = $tableTipo.postID AND  $tableTipo.id_usuario = $usuarioID GROUP BY $tableTipo.postID ORDER BY numCurtida $orderBY";
                }
                $result = mysqli_query($conexao, $sql);
                if(mysqli_num_rows($result) > 0){
                    echo "
                    <div class='content-container-pesquisar'>";
                    while($row = mysqli_fetch_assoc($result)){
                        $postID = $row['postID'];
                        $postTitulo = $row['postTitulo'];
                        $postDescricao = $row['postDescricao'];

                        if($showExplore == "literatura"){
                            echo "<div class='lit-box'>";
                        }else{
                            echo "<div class='box-pesquisar'>";
                        }
                        if($showExplore == "fotografia" || $showExplore == "ilustracao"){
                            $sqlPegarMinuatura = "SELECT conteudoDiretorio FROM $tableConteudo WHERE conteudoIndice = 1 AND $id_post = $postID";
                            $resultMiniatura = mysqli_query($conexao, $sqlPegarMinuatura);
                            while($miniatura = mysqli_fetch_assoc($resultMiniatura)){
                                $conteudoDiretorio = $miniatura['conteudoDiretorio'];
                                $conteudoDiretorio = substr($conteudoDiretorio, 3);
                            }
                            echo "
                                <div class='preview-post-pesquisar' style='background-image:url(".$conteudoDiretorio.")'></div>
                            ";
                        }else if($showExplore == "literatura" || $showExplore == "musica"){
                            $sqlPegarMinuatura = "SELECT miniaturaDiretorio FROM $tableTipo WHERE postID = $postID";
                            $resultMiniatura = mysqli_query($conexao, $sqlPegarMinuatura);
                            while($miniatura = mysqli_fetch_assoc($resultMiniatura)){
                                $conteudoDiretorio = $miniatura['miniaturaDiretorio'];
                                $conteudoDiretorio = substr($conteudoDiretorio, 3);
                            }
                            if($showExplore == "literatura"){
                                echo "
                                <div class='lit-preview' style='background-image:url(".$conteudoDiretorio.")'></div>
                                ";
                            }
                            if($showExplore == "musica"){
                                echo "
                                <div class='music-preview' style='background-image:url(".$conteudoDiretorio.")'></div>
                                ";
                            }
                        }
                        echo "
                            <div class='title-post-pesquisar'>
                                <h2>$postTitulo</h2>
                                <p>$postDescricao</p>
                            </div>
                            <div class='tags-input'>";

                        $sql2 = "SELECT tag FROM $tableTag WHERE $id_post = $postID";
                        $result2 = mysqli_query($conexao, $sql2);
                        while($row2 = mysqli_fetch_assoc($result2)){
                            $tag = $row2['tag'];
                            echo "
                                <span class='tag'>
                                    <i class='fas fa-tag'></i>
                                    <span class='tagtext'>$tag</span>
                                </span>
                                ";
                        }

                        $sql3 = "SELECT COUNT(*) AS numLikes FROM $tableCurtida WHERE $id_post = $postID AND curtidaTipo = 1";
                        $result3 = mysqli_query($conexao, $sql3);
                        while($row3 = mysqli_fetch_assoc($result3)){
                            $numLikes = $row3['numLikes'];
                        }
                        
                        $sql4 = "SELECT COUNT(*) AS numDeslikes FROM $tableCurtida WHERE $id_post = $postID AND curtidaTipo = 0";
                        $result4 = mysqli_query($conexao, $sql4);
                        while($row4 = mysqli_fetch_assoc($result4)){
                            $numDeslikes = $row4['numDeslikes'];
                        }

                        $sql5 = "SELECT COUNT(*) AS numComment FROM $tableComentario WHERE $id_post = $postID";
                        $result5 = mysqli_query($conexao, $sql5);
                        while($row5 = mysqli_fetch_assoc($result5)){
                            $numComment = $row5['numComment'];
                        }

                        echo "
                        </div>
                        <div class = 'link-view-pub-container'>
                        ";

                        switch ($showExplore) {
                            case 'fotografia':
                            echo "<a target='_blank' class='view-pub-link' href='fotografia.php?postID=$postID'><p>Ver publicação</p></a>";
                                break;

                            case 'ilustracao':
                            echo "<a target='_blank' class='view-pub-link' href='ilustracao.php?postID=$postID'><p>Ver publicação</p></a>";
                                break;

                            case 'musica':
                            echo "<a target='_blank' class='view-pub-link' href='musica.php?postID=$postID'><p>Ver publicação</p></a>";
                                break;

                            case 'literatura':
                            echo "<a target='_blank' class='view-pub-link' href='literatura.php?postID=$postID'><p>Ver publicação</p></a>";
                                break;
                        }

                        echo "
                        </div>
                            <div class='info-post-container'>
                                <p> $numLikes &nbsp;&nbsp;&nbsp;<i class='fas fa-thumbs-up'></i></p>
                                <p> $numDeslikes &nbsp;&nbsp;&nbsp;<i class='fas fa-thumbs-down'></i></p>
                                <p> $numComment &nbsp;&nbsp;&nbsp;<i class='fas fa-comment'></i></p>
                            </div>
                        </div>
                        ";
                    }
                }else{
                    echo "<br><br><br><br><h1 style='color: white;'>Nenhuma postagem encontrada.</h1><br><br><br><br><br>";
                }
            ?>
        <?php
        // echo '
        // <div class="content-container-pesquisar">
        //     <div class="box-pesquisar">
        //         <div class="preview-post-pesquisar" style="background-image: url()"></div>
        //         <div class="title-post-pesquisar">
        //             <h2>Nome da publicação</h2>
        //             <p>Descrição da publicação aqui e etc etc etc bloablabala.</p>
        //         </div>
        //         <div class="tags-input">
        //             <span class="tag">
        //                 <i class="fas fa-tag"></i>
        //                 <span class="tagtext">tag</span>
        //             </span>
        //         </div>
        //         <div class="link-view-pub-container">
        //             <a target="_blank" href="#" class="view-pub-link">Ver publicação</a>
        //         </div>
        //         <div class="info-post-container">
        //             <p>X&nbsp;&nbsp;&nbsp;<i class="fas fa-thumbs-up"></i></p>
        //             <p>X&nbsp;&nbsp;&nbsp;<i class="fas fa-thumbs-down"></i></p>
        //             <p>X&nbsp;&nbsp;&nbsp;<i class="fas fa-comment"></i></p>
        //         </div>
        //     </div>
        // ';
        ?>
        </div>
    </div>
    <?php
        include('footer.html');
    ?>
</body>
</html>