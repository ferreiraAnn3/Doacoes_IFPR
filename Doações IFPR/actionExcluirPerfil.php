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

// 1. Limpa os itens de doação do usuário (se ele for doador, evita erro de chave estrangeira)
mysqli_query($conn, "DELETE FROM item_doacao WHERE id_usuario = '$id'");

// 2. Apaga o registro da tabela específica do perfil
if ($tipo == 'Doador') {
    mysqli_query($conn, "DELETE FROM doador WHERE id_usuario = '$id'");
} elseif ($tipo == 'Voluntario') {
    mysqli_query($conn, "DELETE FROM voluntario WHERE id_usuario = '$id'");
} elseif ($tipo == 'Beneficiario') {
    mysqli_query($conn, "DELETE FROM beneficiario WHERE id_usuario = '$id'");
}

// 3. Apaga o usuário da tabela principal
mysqli_query($conn, "DELETE FROM usuarios WHERE id_usuario = '$id'");

// 4. Destrói a sessão para deslogar a pessoa do sistema
session_unset();
session_destroy();

// 5. Redireciona para a página inicial com um alerta javascript
echo "<script>
        alert('Sua conta e todos os seus dados foram excluídos com sucesso.');
        window.location.href = 'index.php';
      </script>";
exit();
?>