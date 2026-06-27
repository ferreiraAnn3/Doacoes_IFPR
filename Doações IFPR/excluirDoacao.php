<?php
session_start();
include "conexaoBD.php";

// 1. Segurança: Verificações básicas
if(!isset($_SESSION['logado']) || !isset($_GET['id'])){
    header("Location: index.php");
    exit();
}

$idItem = $_GET['id'];
$idUsuarioLogado = $_SESSION['id_usuario'];

// 2. DELETE com segurança (WHERE id_usuario garante que ele só apague o dele)
$sql = "DELETE FROM item_doacao WHERE id_item = '$idItem' AND id_usuario = '$idUsuarioLogado'";

if(mysqli_query($conn, $sql)) {
    // Sucesso
    echo "<script>alert('Doação excluída com sucesso!'); window.location.href='minhasDoacoes.php';</script>";
} else {
    // Erro (provavelmente porque o item já tem um pedido feito, o que é bom, o banco protege)
    echo "<script>alert('Erro: Não foi possível excluir. Este item pode já ter sido solicitado.'); window.location.href='minhasDoacoes.php';</script>";
}
?>