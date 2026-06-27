<?php 
    include "header.php"; 
    include "conexaoBD.php";

    if(!isset($_SESSION['logado']) || $_SESSION['tipoPerfil'] != 'Doador'){
        header("Location: index.php");
        exit();
    }

    if(isset($_GET['id'])){
        $idItem = $_GET['id'];
        $idUsuario = $_SESSION['id_usuario'];

        $sqlItem = "UPDATE item_doacao SET status = 'concluido' 
                    WHERE id_item = '$idItem' AND id_usuario = '$idUsuario'";
        
        $sqlPedido = "UPDATE pedido_doacao SET status = 'entregue' WHERE id_item = '$idItem'";

        if(mysqli_query($conn, $sqlItem) && mysqli_query($conn, $sqlPedido)){
            echo "<script>alert('Entrega confirmada com sucesso! Obrigado por ajudar.'); 
                  window.location.href='minhasDoacoes.php';</script>";
        } else {
            echo "Erro ao confirmar entrega: " . mysqli_error($conn);
        }
    }
?>