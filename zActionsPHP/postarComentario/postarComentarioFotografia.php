<?php
    include('../conexaoDB.php');
    $postID = $_POST['postID'];
    $usuarioLogadoID = $_POST['usuarioLogadoID'];
    $comentarioConteudo = mysqli_real_escape_string($conexao, trim($_POST['comentarioConteudo']));


    $sql = "INSERT INTO postcomentariofotografia (id_fotografiaPost, id_usuario, comentarioConteudo) VALUES ('$postID', '$usuarioLogadoID', '$comentarioConteudo')";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
    }

    header("Location: ../../fotografia.php?postID=$postID");
?>