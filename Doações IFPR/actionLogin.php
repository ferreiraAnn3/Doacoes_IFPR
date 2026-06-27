<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    include "conexaoBD.php"; 

    $emailUsuario = mysqli_real_escape_string($conn, $_POST['emailUsuario']); 
    $senhaUsuario = mysqli_real_escape_string($conn, $_POST['senhaUsuario']);

    $buscarLogin = "SELECT id_usuario, nome, email, tipoPerfil 
                    FROM usuarios 
                    WHERE email = '{$emailUsuario}' 
                    AND senha = md5('{$senhaUsuario}')";

    $efetuarLogin = mysqli_query($conn, $buscarLogin);

    if ($registro = mysqli_fetch_assoc($efetuarLogin)){

        session_regenerate_id(true);

        $_SESSION['id_usuario']   = $registro['id_usuario']; 
        $_SESSION['nomeUsuario']  = $registro['nome'];
        $_SESSION['emailUsuario'] = $registro['email'];
        $_SESSION['tipoPerfil']   = $registro['tipoPerfil'];
        $_SESSION['logado']       = true;

        // O controle de acesso será feito exclusivamente pela variável 'tipoPerfil'.

        header("Location: index.php");
        exit();
    }
    else{
        header("Location: formLogin.php?erroLogin=dadosInvalidos");
        exit();
    }
?>