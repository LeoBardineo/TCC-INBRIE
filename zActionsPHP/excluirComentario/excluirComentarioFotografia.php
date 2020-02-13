<?php
    include('../conexaoDB.php');

    $comentarioID = $_GET['comentarioID'];
    $postID = $_GET['postID'];

    $sql = "DELETE FROM postcomentariofotografia WHERE comentarioID = $comentarioID";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo mysqli_error($conexao);
        exit;
    }

    header("Location: ../../fotografia.php?postID=$postID");
?>