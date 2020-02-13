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
    <link rel="stylesheet" href="styles/stylePesquisar.css">
    <link rel="stylesheet" href="styles/styleInputTag.css">
    <link rel="stylesheet" href="styles/styleNavBar.css">
    <link rel="stylesheet" href="styles/styleMsgBox.css">
    <link rel="stylesheet" href="styles/styleFooter.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="scripts/retiraTransition.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>INBRIE - Pesquisar</title>
</head>
<body class="preload" id="preloadcontainer">
    <?php
        include('header.php');
        if(isset($_GET['organizeExplore'], $_GET['showExplore'], $_GET['searchTag'])){
            $organizeExplore = $_GET['organizeExplore'];
            $showExplore = $_GET['showExplore'];
            $searchTag = $_GET['searchTag'];
        }else{
            $organizeExplore = "MaisRecentes";
            $showExplore = "ilustracao";
            $searchTag = "";
        }
    ?>
    <div class="container-pesquisar">
        <div class="title-container-pesquisar">
            <h1>Pesquisar</h1>
        </div>
        <form class="container-form-pesquisar" action="pesquisar.php" method="GET">
            <div class="input-container-pesquisar">
                <input type="search" name="searchTag" id="searchTag" placeholder="Digite aqui uma tag ou título..." value="<?php echo $searchTag; ?>">
                <div class="container-icon-search">
                    <i class="fas fa-search"></i>
                    <input type="submit" value="">
                </div>
            </div>
        <div class="separador-horizontal"></div>
        <div class="options-pesquisar">
            <div class="select-option-organizar">
                <p>Organizar por:</p>
                <select name="organizeExplore" id="organizeExplore">
                    <option value="MaisRecentes"
                    <?php echo $organizeExplore=="MaisRecentes" ? "selected" : ""; ?>>Mais recentes</option>
                    <option value="MenosRecentes"
                    <?php echo $organizeExplore=="MenosRecentes" ? "selected" : ""; ?>>Menos recentes</option>
                    <option value="MaisCurtidos"
                    <?php echo $organizeExplore=="MaisCurtidos" ? "selected" : ""; ?>>Mais curtidos</option>
                    <option value="MenosCurtidos"
                    <?php echo $organizeExplore=="MenosCurtidos" ? "selected" : ""; ?>>Menos curtidos</option>
                </select>
            </div>
            <div class="select-option-show">
                <p>Mostrar:</p>
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
            </div>
            <input class="apply-filtro" type="submit" value="Aplicar">
        </form>
    </div>
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
                
                $sql = "SELECT postID, postTitulo, postDescricao FROM $tableTipo, $tableTag WHERE $tableTag.$id_post = $tableTipo.postID AND $tableTag.tag LIKE '%$searchTag%' GROUP BY postID;";
                
                if($organizeExplore == "MaisRecentes" || $organizeExplore == "MenosRecentes"){
                    $sql = "SELECT postID, postTitulo, postDescricao FROM $tableTipo, $tableTag WHERE $tableTag.$id_post = $tableTipo.postID AND $tableTag.tag LIKE '%$searchTag%' GROUP BY postID $orderBY;";
                }else{
                    $sql = "SELECT postID, postTitulo, postDescricao, COUNT(curtidaTipo) AS numCurtida FROM $tableTipo, $tableCurtida, $tableTag WHERE $tableCurtida.$id_post = $tableTipo.postID AND $tableTag.$id_post = $tableTipo.postID AND $tableTag.tag LIKE '%$searchTag%' GROUP BY $tableTipo.postID ORDER BY numCurtida $orderBY";
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
                    echo "<br><br><br><br><h1>Nenhuma postagem encontrada.</h1><br><br><br><br><br>";
                }
            ?>
        </div>
    </div>
    <?php
        include('footer.html');
    ?>
</body>
</html>