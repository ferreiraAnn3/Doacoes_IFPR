<?php
session_start();
include "conexaoBD.php";

// Apenas o doador deve conseguir confirmar
if(isset($_GET['id_pedido'])) {
    $idPedido = $_GET['id_pedido'];
    
    // Atualiza o status do pedido para 'concluido'
    $sql = "UPDATE pedido_doacao SET status = 'concluido' WHERE id_pedido = '$idPedido'";
    
    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Entrega confirmada! O beneficiário será notificado.'); window.location.href='minhasDoacoes.php';</script>";
    }
}
?>