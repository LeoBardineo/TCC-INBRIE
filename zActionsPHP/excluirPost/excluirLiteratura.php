<?php
//ordem pro delete
//tag curtida comentario conteudo tipo
    include('../conexaoDB.php');

    $postID = $_POST['postID'];
    $sql = "DELETE FROM posttagliteratura WHERE id_literaturaPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM postcurtidaliteratura WHERE id_literaturaPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM postcomentarioliteratura WHERE id_literaturaPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM postconteudoliteratura WHERE id_literaturaPost = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    $sql = "DELETE FROM posttipoliteratura WHERE postID = $postID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    header('Location: ../../explorar.php');
?>