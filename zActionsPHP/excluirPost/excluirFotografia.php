<?php
//ordem pro delete
//tag curtida comentario conteudo tipo
    include('../conexaoDB.php');

    $postID = $_POST['postID'];
    $sql = "DELETE FROM posttagfotografia WHERE id_fotografiaPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM postcurtidafotografia WHERE id_fotografiaPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM postcomentariofotografia WHERE id_fotografiaPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM postconteudofotografia WHERE id_fotografiaPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM posttipofotografia WHERE postID = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    header('Location: ../../explorar.php');
?>