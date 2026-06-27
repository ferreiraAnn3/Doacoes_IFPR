<?php 
    include "header.php"; 
    include "conexaoBD.php";

    // Proteção: Apenas Voluntários podem acessar
    if(!isset($_SESSION['logado']) || $_SESSION['tipoPerfil'] != 'Voluntario'){
        header("Location: index.php");
        exit();
    }
?>

<section class="py-5" style="margin-top: 80px;">
    <div class="container">
        <h2>Gerenciamento de Doações</h2>
        <p class="text-muted">Painel exclusivo para monitoramento de itens.</p>
        
        <table class="table table-hover mt-4 shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Foto</th>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT i.*, u.nome AS nome_doador 
                        FROM item_doacao i 
                        JOIN usuarios u ON i.id_usuario = u.id_usuario 
                        ORDER BY i.data_cadastro DESC";
                $res = mysqli_query($conn, $sql);

                if(mysqli_num_rows($res) > 0){
                    while($item = mysqli_fetch_assoc($res)){
                        echo "<tr>
                                <td><img src='{$item['foto']}' style='width:50px; height:50px; object-fit:cover;'></td>
                                <td>{$item['titulo']}</td>
                                <td>{$item['categoria']}</td>
                                <td><span class='badge bg-info'>{$item['status']}</span></td>
                                <td>" . date('d/m/Y', strtotime($item['data_cadastro'])) . "</td>
                                <td>
                                    <a href='visualizarDoacao.php?idItem={$item['id_item']}' class='btn btn-sm btn-primary'>Ver</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Nenhuma doação cadastrada no sistema.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>

<?php include "footer.php" ?>