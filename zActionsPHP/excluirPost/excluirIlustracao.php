<?php
//ordem pro delete
//tag curtida comentario conteudo tipo
    include('../conexaoDB.php');

    $postID = $_POST['postID'];
    $sql = "DELETE FROM posttagilustracao WHERE id_ilustracaoPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM postcurtidailustracao WHERE id_ilustracaoPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM postcomentarioilustracao WHERE id_ilustracaoPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM postconteudoilustracao WHERE id_ilustracaoPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM posttipoilustracao WHERE postID = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    header('Location: ../../explorar.php');
?>