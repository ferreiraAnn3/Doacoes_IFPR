<?php
session_start();
include "conexaoBD.php";

// Verifica se está logado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: formLogin.php");
    exit();
}

$id = $_SESSION['id_usuario'];
$tipo = $_SESSION['tipoPerfil'];

mysqli_query($conn, "DELETE FROM item_doacao WHERE id_usuario = '$id'");

if ($tipo == 'Doador') {
    mysqli_query($conn, "DELETE FROM doador WHERE id_usuario = '$id'");
} elseif ($tipo == 'Voluntario') {
    mysqli_query($conn, "DELETE FROM voluntario WHERE id_usuario = '$id'");
} elseif ($tipo == 'Beneficiario') {
    mysqli_query($conn, "DELETE FROM beneficiario WHERE id_usuario = '$id'");
}

mysqli_query($conn, "DELETE FROM usuarios WHERE id_usuario = '$id'");

session_unset();
session_destroy();

// Redirecionador para a página inicial com um alerta javascript
echo "<script>
        alert('Sua conta e todos os seus dados foram excluídos com sucesso.');
        window.location.href = 'index.php';
      </script>";
exit();
?>