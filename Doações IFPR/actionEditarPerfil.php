<?php
session_start();
include "conexaoBD.php";

// Agora, como salvamos 'id_usuario' lá no login, isso vai funcionar:
if (!isset($_SESSION['id_usuario'])) {
    die("Erro: Você não está logado.");
}

$id = $_SESSION['id_usuario']; // Agora ele recebe o valor corretamente
// ... resto do seu código
// Sanitização para segurança
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$telefone = mysqli_real_escape_string($conn, $_POST['telefone']);

// 1. Update na tabela comum
$sqlUser = "UPDATE usuarios SET nome='$nome', email='$email', telefone='$telefone' WHERE id_usuario='$id'";
mysqli_query($conn, $sqlUser);

// 2. Update nas tabelas específicas usando IF para saber qual tabela atualizar
$tipo = $_SESSION['tipoPerfil'];

if ($tipo == 'Doador') {
    $local = mysqli_real_escape_string($conn, $_POST['localColeta']);
    mysqli_query($conn, "UPDATE doador SET localColeta='$local' WHERE id_usuario='$id'");
} elseif ($tipo == 'Voluntario') {
    $horario = mysqli_real_escape_string($conn, $_POST['horario']);
    mysqli_query($conn, "UPDATE voluntario SET horarioDisponibilidade='$horario' WHERE id_usuario='$id'");
} elseif ($tipo == 'Beneficiario') {
    $local = mysqli_real_escape_string($conn, $_POST['localColeta']);
    mysqli_query($conn, "UPDATE beneficiario SET localColeta='$local' WHERE id_usuario='$id'");
}

header("Location: formEditarPerfil.php?status=sucesso");
?>