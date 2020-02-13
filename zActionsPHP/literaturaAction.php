<?php
    include('conexaoDB.php');
    include('verificaLogin.php');
    header("Content-type: text/html; charset=utf-8");

    if(!$_POST['titleinput'] || !$_POST['descinput']){
        $_SESSION['campos_nulo'] = true;
        header('Location: ../postarLiteratura.php');
        exit();
    }

    $userID = $_SESSION['usuarioID'];
    $postTitulo = mysqli_real_escape_string($conexao, trim($_POST['titleinput']));
    $postDesc = mysqli_real_escape_string($conexao, trim($_POST['descinput']));
    $textoEscrito = mysqli_real_escape_string($conexao, trim($_POST['textoEscrito']));

    $sql = "INSERT INTO posttipoliteratura (id_usuario, postTitulo, postDescricao) values ('$userID', '$postTitulo', '$postDesc');";
    $result = mysqli_query($conexao, $sql);
    
    if(!$result){
        echo mysqli_error($conexao);
        exit();    
    }

    $sql = "SELECT * FROM posttipoliteratura ORDER BY postID DESC LIMIT 1;";
    $result = mysqli_query($conexao, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $lastID = $row['postID'];
    }

    // Cria o diretório do arquivo se não existir
    if(!is_dir("../arquivos/literatura/$lastID")){
        mkdir("../arquivos/literatura/$lastID");
    }

    $nomeThumb = $_FILES['thumbinput']['name'];
    $nomeTempThumb = $_FILES['thumbinput']['tmp_name'];
    
    $imagemExt = explode('.', $nomeThumb);
    $imagemNovaExt = strtolower(end($imagemExt));
    $nomeImagemNova = uniqid('', true).".".$imagemNovaExt;
    $imagemCaminho = "../arquivos/literatura/$lastID/$nomeImagemNova";
    move_uploaded_file($nomeTempThumb, $imagemCaminho);
    
    $sql = "UPDATE posttipoliteratura SET miniaturaDiretorio = '$imagemCaminho' WHERE postID = $lastID";
    $result = mysqli_query($conexao, $sql);
    
    if(!$result){
        echo mysqli_error($conexao);
        exit();    
    }

    $sql = "INSERT INTO postconteudoliteratura (id_literaturaPost, conteudoIndice, conteudo) VALUES ('$lastID', 1, '$textoEscrito')";
    $result = mysqli_query($conexao, $sql);
    
    if(!$result){
        echo mysqli_error($conexao);
        exit();    
    }
   
    // Inserção das tags
    $postTags = $_POST['postTags'];
    $postTagsArray = explode(",", $postTags);
    foreach ($postTagsArray as $index => $value) {
        $sql = "INSERT INTO posttagliteratura (id_literaturaPost, tag) VALUES ('$lastID', '$value')";
        $result = mysqli_query($conexao, $sql);
        if(!$result){
            echo "deu errado: ".mysqli_error($conexao);
            exit();
        }
    }

    $sql = "INSERT INTO posttagliteratura (id_literaturaPost, tag) VALUES ('$lastID', '$postTitulo')";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo "deu errado: ".mysqli_error($conexao);
        exit();
    }

    $_SESSION['post_ok'] = true;
    $_SESSION['last_id'] = $lastID;
    header('Location: ../postarLiteratura.php');
    exit();
?>