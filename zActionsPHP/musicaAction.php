<?php
    include('conexaoDB.php');
    include('verificaLogin.php');
    header("Content-type: text/html; charset=utf-8");

     if(!$_POST['titleinput'] || !$_POST['descinput']){
         $_SESSION['campos_nulo'] = true;
         header('Location: ../postarMusica.php');
         exit();    
     }

     $userID = $_SESSION['usuarioID'];
     $postTitulo = mysqli_real_escape_string($conexao, trim($_POST['titleinput']));
     $postDesc = mysqli_real_escape_string($conexao, trim($_POST['descinput']));
     $tipoMusica = $_POST['typeinput'];
     $generoMusica = $_POST['genreinput'];

    // Criação do Post geral
     $sql = "INSERT INTO posttipomusica (id_usuario, postTitulo, postDescricao, tipoMusica, generoMusica) VALUES ('$userID', '$postTitulo', '$postDesc', '$tipoMusica', '$generoMusica')";
     $result = mysqli_query($conexao, $sql);

     if(!$result){
         $_SESSION['inserirpost_erro'] = true;
         header('Location: ../postarMusica.php');
         exit();    
     }

    // Pega o ID do post criado
     $sql = "SELECT * FROM posttipomusica ORDER BY postID DESC LIMIT 1;";
     $result = mysqli_query($conexao, $sql);
     while($row = mysqli_fetch_assoc($result)){
         $lastID = $row['postID'];
     }

    // Cria o diretório do arquivo se não existir
     if(!is_dir("../arquivos/musica/$lastID")){
         mkdir("../arquivos/musica/$lastID");
     }

    // Thumbnail
     $nomeThumb = $_FILES['thumbinput']['name'];
     $nomeTempThumb = $_FILES['thumbinput']['tmp_name'];
    
     $imagemExt = explode('.', $nomeThumb);
     $imagemNovaExt = strtolower(end($imagemExt));
     $nomeImagemNova = uniqid('', true).".".$imagemNovaExt;
     $imagemCaminho = "../arquivos/musica/$lastID/$nomeImagemNova";
     move_uploaded_file($nomeTempThumb, $imagemCaminho);
    
     $sql = "UPDATE posttipomusica SET miniaturaDiretorio = '$imagemCaminho' WHERE postID = $lastID";
     $result = mysqli_query($conexao, $sql);
    
     if(!$result){
         echo mysqli_error($conexao);
         exit();    
     }

    // Tracks
      $nomeTracks = $_FILES['track']['name'];
      $nomeTempTracks = $_FILES['track']['tmp_name'];
      $tituloTracks = $_POST['track'];

      foreach($nomeTracks as $index => $value){
        // Move o arquivo pro diretório criado
          $nomeImagem = $value['trackContent'];
          $trackExt = explode('.', $nomeImagem);
          $trackNovaExt = strtolower(end($trackExt));
          $nomeTrackNova = uniqid('', true).".".$trackNovaExt;
          $trackCaminho = "../arquivos/musica/$lastID/$nomeTrackNova";
          $nomeTemp = $nomeTempTracks[$index]['trackContent'];
          move_uploaded_file($nomeTemp, $trackCaminho);

        // Titulo da musica
          $tituloTrack = $tituloTracks[$index]['titleTrack'];

        // Inserir
          $sql = "INSERT INTO postconteudomusica (id_musicaPost, conteudoIndice, conteudoTitulo, conteudoDiretorio) VALUES ('$lastID', '$index', '$tituloTrack', '$trackCaminho')";
          $result = mysqli_query($conexao, $sql);
          if(!$result){
              echo "deu errado: ".mysqli_error($conexao);
          }
      }
       
    // Inserção das tags
    $postTags = $_POST['postTags'];
    $postTagsArray = explode(",", $postTags);
    foreach ($postTagsArray as $index => $value) {
        $sql = "INSERT INTO posttagmusica (id_musicaPost, tag) VALUES ('$lastID', '$value')";
        $result = mysqli_query($conexao, $sql);
        if(!$result){
            echo "deu errado: ".mysqli_error($conexao);
            exit();
        }
    }

    $sql = "INSERT INTO posttagmusica (id_musicaPost, tag) VALUES ('$lastID', '$postTitulo')";
    $result = mysqli_query($conexao, $sql);
    if(!$result){
        echo "deu errado: ".mysqli_error($conexao);
        exit();
    }

     $_SESSION['post_ok'] = true;
     $_SESSION['last_id'] = $lastID;
     header('Location: ../postarMusica.php');
     exit();
?>