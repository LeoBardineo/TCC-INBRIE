<?php
    include('../conexaoDB.php');

    $comentarioID = $_GET['comentarioID'];
    $postID = $_GET['postID'];

    $sql = "DELETE FROM postcomentarioilustracao WHERE comentarioID = $comentarioID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    header("Location: ../../ilustracao.php?postID=$postID");
?>