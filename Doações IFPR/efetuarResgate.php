<?php 
    include "header.php"; 
    include "conexaoBD.php";

    // 1. Validação de Segurança: Apenas quem está logado pode resgatar
    if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
        header("Location: formLogin.php");
        exit();
    }

    $idUsuario = $_SESSION['id_usuario'];

    // 2. Verifica se o ID do item foi enviado
    if(isset($_GET['id'])){
        $idItem = $_GET['id'];

        // Busca dados do item para confirmar se ainda está disponível
        $sqlItem = "SELECT titulo, foto FROM item_doacao WHERE id_item = '$idItem' AND status = 'disponivel'";
        $resItem = mysqli_query($conn, $sqlItem);

        if(mysqli_num_rows($resItem) > 0){
            $item = mysqli_fetch_assoc($resItem);
            $titulo = $item['titulo'];
            $foto = $item['foto'];

            // Define data e hora
            date_default_timezone_set('America/Sao_Paulo');
            $dataResgate = date('Y-m-d');
            $horaResgate = date('H:i:s');

            // 3. Inserir na tabela de pedidos
            $inserirPedido = "INSERT INTO pedido_doacao (id_item, id_usuario, data, status) 
                              VALUES ('$idItem', '$idUsuario', '$dataResgate', 'solicitado')";

            // 4. Atualizar o status do item para 'doado'
            $atualizarStatus = "UPDATE item_doacao SET status = 'doado' WHERE id_item = '$idItem'";

            if(mysqli_query($conn, $inserirPedido) && mysqli_query($conn, $atualizarStatus)){
                echo "
                <div class='container' style='padding-top: 100px;'>
                    <div class='row justify-content-center'>
                        <div class='col-md-8 text-center'>
                            <div class='alert alert-success shadow'>
                                <h4> Solicitação realizada com sucesso!</h4>
                                <p>Você solicitou o item: <strong>$titulo</strong></p>
                            </div>
                            <img src='$foto' style='width:300px; border-radius:10px;' class='shadow-sm mb-3'>
                            <br>
                            <a href='index.php' class='btn btn-primary'>Continuar Navegando</a>
                        </div>
                    </div>
                </div>";
            } else {
                echo "<div class='alert alert-danger text-center mt-5'>Erro ao processar sua solicitação: " . mysqli_error($conn) . "</div>";
            }
        } else {
            echo "<div class='alert alert-warning text-center mt-5'>Este item não está mais disponível ou não foi encontrado.</div>";
        }
    } else {
        header("Location: index.php");
    }
?>

<?php include "footer.php" ?>