<?php
    // verifica se o usuario esta logado
    session_start();
    //olha se existe a variavel de sessao email, se nao existir redireciona para a pagina de login
    if (!isset($_SESSION['email'])) {
        header("Location: /index.php");
    }
?>