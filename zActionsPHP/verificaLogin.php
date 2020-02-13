<?php
    session_start();
    if(!$_SESSION['usuarioID']){
        header('Location: login.php');
        exit;
    }
?>