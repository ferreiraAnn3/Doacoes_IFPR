<?php
    session_start(); 

    session_unset(); // Apaga as variáveis da sessão
    session_destroy(); // Destrói a sessão

    header("Location: formLogin.php"); // Redireciona o usuário para o formulário de Login
    exit();
?>