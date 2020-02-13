<?php
//ordem pro delete
//tag curtida comentario conteudo tipo
    include('../conexaoDB.php');

    $postID = $_POST['postID'];
    $sql = "DELETE FROM posttagmusica WHERE id_musicaPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM postcurtidamusica WHERE id_musicaPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM postcomentariomusica WHERE id_musicaPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM postconteudomusica WHERE id_musicaPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM posttipomusica WHERE postID = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    header('Location: ../../explorar.php');
?>