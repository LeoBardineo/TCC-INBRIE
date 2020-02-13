<?php
    session_start();
    include('conexaoDB.php');

    $options = [ 'cost' => 10 ];
    $userName = mysqli_real_escape_string($conexao, trim($_POST['userName']));
    $userEmail = mysqli_real_escape_string($conexao, trim($_POST['userEmail']));
    $userPassword = mysqli_real_escape_string($conexao, trim($_POST['userPass']));
    $usuarioBio = mysqli_real_escape_string($conexao, trim($_POST['usuarioBio']));
    $passwordHashed = password_hash($userPassword, PASSWORD_DEFAULT, $options);
    
    $file = $_FILES['thumbinput'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Verifica se o userName existe
    $sql = "SELECT COUNT(*) AS total FROM usuario WHERE usuarioNome = '$userName'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['usuario_existe'] = true;
        header('Location: ../registro.php');
        exit;
    }
    // Verifica se o userEmail existe
    $sql = "SELECT COUNT(*) AS total FROM usuario WHERE usuarioEmail = '$userEmail'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['email_existe'] = true;
        header('Location: ../registro.php');
        exit;
    }
    
    // Tratamento do profilePic
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($fileActualExt, $allowed) == false){ // Verifica extensão
        $_SESSION['ext_errada'] = true;
        header('Location: ../registro.php');
        exit;
    }

    if($fileSize > 5242880){ // Verifica o tamanho do arquivo | 5 MB em Bytes
        $_SESSION['arq_grande'] = true;
        header('Location: ../registro.php');
        exit;
    }

    if($fileError !== 0){ // Verifica se tem erro ao upar
        $_SESSION['erro_upload'] = true;
        header('Location: ../registro.php');
        exit;
    }
    $fileNameNew = uniqid('', true).".".$fileActualExt;
    $fileDestination = '../imagens/profilePics/'.$fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);

    $sql = "INSERT INTO usuario (usuarioNome, usuarioBio, usuarioEmail, usuarioSenha, usuarioFotoPerfil) VALUES ('$userName', '$usuarioBio', '$userEmail', '$passwordHashed','$fileDestination');";

    if($conexao->query($sql)){
        $_SESSION['status_cadastro'] = true;
        header('Location: ../registro.php');
        exit;
    }
?>