<?php
    include('conexaoDB.php');
    include('verificaLogin.php');
    header("Content-type: text/html; charset=utf-8");

    if(!$_POST['titleinput'] || !$_POST['descinput']){
        $_SESSION['campos_nulo'] = true;
        header('Location: ../postarFotografia.php');
        exit();
    }

    $userID = $_SESSION['usuarioID'];
    $postTitulo = mysqli_real_escape_string($conexao, trim($_POST['titleinput']));
    $postDesc = mysqli_real_escape_string($conexao, trim($_POST['descinput']));

    // Criação do Post geral
    $sql = "INSERT INTO posttipofotografia (id_usuario, postTitulo, postDescricao) VALUES ('$userID', '$postTitulo', '$postDesc')";
    $result = mysqli_query($conexao, $sql);

    if(!$result){
        echo "deu errado: ".mysqli_error($conexao);
        exit();
    }

    // Pega o ID do post criado
    $sql = "SELECT * FROM posttipofotografia ORDER BY postID DESC LIMIT 1;";
    $result = mysqli_query($conexao, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $lastID = $row['postID'];
    }

    // Cria o diretório do arquivo se não existir
    if(!is_dir("../arquivos/fotografia/$lastID")){
        mkdir("../arquivos/fotografia/$lastID");
    }

    $nomeImagens = $_FILES['image']['name'];
    $nomeTempImagens = $_FILES['image']['tmp_name'];

    foreach($nomeImagens as $index => $value){
        // Move o arquivo pro diretório criado
        $nomeImagem = $value['imageContent'];
        $imagemExt = explode('.', $nomeImagem);
        $imagemNovaExt = strtolower(end($imagemExt));
        $nomeImagemNova = uniqid('', true).".".$imagemNovaExt;
        $imagemCaminho = "../arquivos/fotografia/$lastID/$nomeImagemNova";
        $nomeTemp = $nomeTempImagens[$index]['imageContent'];
        move_uploaded_file($nomeTemp, $imagemCaminho);

        // Inserir
        $sql = "INSERT INTO postconteudofotografia (id_fotografiaPost, conteudoIndice, conteudoDiretorio) VALUES ('$lastID', '$index', '$imagemCaminho')";
        $result = mysqli_query($conexao, $sql);
        if(!$result){
            echo "deu errado: ".mysqli_error($conexao);
            exit();
        }
    }
    
    // Inserção das tags
    $postTags = $_POST['postTags'];
    $postTagsArray = explode(",", $postTags);
    foreach ($postTagsArray as $index => $value) {
        $sql = "INSERT INTO posttagfotografia (id_fotografiaPost, tag) VALUES ('$lastID', '$value')";
        $result = mysqli_query($conexao, $sql);
        if(!$result){
            echo "deu errado: ".mysqli_error($conexao);
            exit();
        }
    }

    $sql = "INSERT INTO posttagfotografia (id_fotografiaPost, tag) VALUES ('$lastID', '$postTitulo')";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo "deu errado: ".mysqli_error($conexao);
        exit();
    }

    $_SESSION['post_ok'] = true;
    $_SESSION['last_id'] = $lastID;
    header('Location: ../postarFotografia.php');
    exit();
?>