<?php
    include('../conexaoDB.php');

    $postID = $_POST['postID'];
    $usuarioLogadoID = $_POST['usuarioLogadoID'];

    $sql = "SELECT curtidaTipo FROM postcurtidailustracao WHERE id_ilustracaoPost = $postID AND id_usuario = $usuarioLogadoID";
    $result = mysqli_query($conexao, $sql);
    if(mysqli_num_rows($result) > 0){// o usuário já realizou alguma ação sobre o post
        while($row = mysqli_fetch_array($result)){
            $curtidaTipo = $row['curtidaTipo'];
            if($curtidaTipo == 1){ // se ele já curtiu
                // deletar curtida
                $sql = "DELETE FROM postcurtidailustracao WHERE id_ilustracaoPost = $postID AND id_usuario = $usuarioLogadoID";
                $result = mysqli_query($conexao, $sql);
                if(!$result){
                    echo mysqli_error($conexao);
                }
                header("Location: ../../ilustracao.php?postID=$postID");
            }else{// se ele descurtiu
                // update pra curtida (1)
                $sql = "UPDATE postcurtidailustracao SET curtidaTipo = 1 WHERE id_ilustracaoPost = $postID AND id_usuario = $usuarioLogadoID";
                $result = mysqli_query($conexao, $sql);
                if(!$result){
                    echo mysqli_error($conexao);
                }
                header("Location: ../../ilustracao.php?postID=$postID");
            }
        }
    }else{// o usuário fez nada ainda
        // inserir curtir
        $sql = "INSERT INTO postcurtidailustracao (id_ilustracaoPost, id_usuario, curtidaTipo) VALUES ($postID, $usuarioLogadoID, 1)";
        $result = mysqli_query($conexao, $sql);
        if(!$result){
            echo mysqli_error($conexao);
        }
        header("Location: ../../ilustracao.php?postID=$postID");
    }

?>