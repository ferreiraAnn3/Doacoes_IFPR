<?php 
    include "header.php"; 
    include "conexaoBD.php";

    // 1. Proteção: Apenas Beneficiários logados podem ver esta página
    if(!isset($_SESSION['logado']) || strpos($_SESSION['tipoPerfil'], 'Beneficiario') === false){
        header("Location: index.php");
        exit();
    }

    $idUsuario = $_SESSION['id_usuario'];
?>

<section class="py-5" style="margin-top: 80px;">
    <div class="container">
        <h2 class="mb-4"><i class="bi bi-bag-check"></i> Meus Resgates e Pedidos</h2>
        
        <table class="table table-hover shadow-sm mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Item</th>
                    <th>Foto</th>
                    <th>Data do Pedido</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // JOIN para pegar o título e a foto direto da tabela de itens
                $sql = "SELECT p.*, i.titulo, i.foto 
                        FROM pedido_doacao p 
                        JOIN item_doacao i ON p.id_item = i.id_item 
                        WHERE p.id_usuario = '$idUsuario' 
                        ORDER BY p.data DESC";
                
                $res = mysqli_query($conn, $sql);

                if(mysqli_num_rows($res) > 0){
                    while($pedido = mysqli_fetch_assoc($res)){
                        
                        // Lógica de status atualizada
                        $status = $pedido['status'];
                        if ($status == 'solicitado') {
                            $statusBadge = 'bg-warning text-dark';
                            $textoStatus = 'Solicitado';
                        } elseif ($status == 'entregue' || $status == 'concluido') {
                            $statusBadge = 'bg-success';
                            $textoStatus = 'Recebido';
                        } else {
                            $statusBadge = 'bg-secondary';
                            $textoStatus = ucfirst($status);
                        }
                        
                        echo "<tr>
                                <td class='align-middle fw-bold'>{$pedido['titulo']}</td>
                                <td><img src='{$pedido['foto']}' style='width:60px; height:60px; object-fit:cover; border-radius:5px;'></td>
                                <td class='align-middle'>" . date('d/m/Y', strtotime($pedido['data'])) . "</td>
                                <td class='align-middle'>
                                    <span class='badge $statusBadge'>$textoStatus</span>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center py-4'>Você ainda não realizou nenhum pedido de doação.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-outline-primary">Ver mais itens disponíveis</a>
        </div>
    </div>
</section>

<?php include "footer.php" ?>