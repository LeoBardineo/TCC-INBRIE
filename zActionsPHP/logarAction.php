<?php
session_start();
header("Content-type: text/html; charset=utf-8");
include('conexaoDB.php');

$userEmail = mysqli_real_escape_string($conexao, trim($_POST['userEmail']));
$userPassword = mysqli_real_escape_string($conexao, trim($_POST['userPass']));

$query = "SELECT usuarioID, usuarioNome, usuarioSenha, usuarioFotoPerfil FROM usuario WHERE usuarioEmail = '$userEmail'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

if($row==1){
    while($row = mysqli_fetch_assoc($result)){
        if(password_verify($userPassword, $row['usuarioSenha'])){
            // Login bem sucedido
            $_SESSION['usuarioID'] = $row['usuarioID'];
            $_SESSION['usuarioNome'] = $row['usuarioNome'];
            $_SESSION['usuarioFotoPerfil'] = $row['usuarioFotoPerfil'];
            header('Location: ../index.php');
            exit;
        }else{
            // Login mal sucedido - senha não compativel
            $_SESSION['nao_autenticado'] = true;
            header('Location: ../login.php');
            exit();
        }
    }
}else{
    // Login mal sucedido - não retornou resultado
    $_SESSION['nao_existe'] = true;
    header('Location: ../login.php');
    mysqli_close($conexao);
}
?>