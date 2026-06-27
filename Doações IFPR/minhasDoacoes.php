<?php 
include "header.php";
include "conexaoBD.php";

// Proteção: Apenas doadores logados entram aqui
if (!isset($_SESSION['logado']) || $_SESSION['tipoPerfil'] != 'Doador') {
    header("Location: index.php");
    exit();
}

$idUsuario = $_SESSION['id_usuario'];

// =========================================================================
// PROCESSAMENTO DO CRUD (EXCLUIR E CONFIRMAR ENTREGA)
// Isso evita a criação de actionExcluirDoacao.php e actionConfirmarEntrega.php
// =========================================================================
if(isset($_GET['acao']) && isset($_GET['id'])) {
    $acao = $_GET['acao'];
    $idItem = (int)$_GET['id']; // Segurança básica

    if($acao == 'excluir') {
        // O "AND id_usuario" garante que o doador só apague o próprio item
        $sqlDelete = "DELETE FROM item_doacao WHERE id_item = $idItem AND id_usuario = '$idUsuario'";
        mysqli_query($conn, $sqlDelete);
        
        // Recarrega a página para limpar a URL e atualizar a lista
        header("Location: minhasDoacoes.php");
        exit();
    }
    elseif($acao == 'confirmar') {
        $sqlUpdate = "UPDATE item_doacao SET status = 'concluido' WHERE id_item = $idItem AND id_usuario = '$idUsuario'";
        mysqli_query($conn, $sqlUpdate);
        
        header("Location: minhasDoacoes.php");
        exit();
    }
}
// =========================================================================

// Consulta: Busca os itens deste doador (Read do CRUD)
$sql = "SELECT * FROM item_doacao WHERE id_usuario = '$idUsuario' ORDER BY data_cadastro DESC";
$resultado = mysqli_query($conn, $sql);
?>

<section class="py-5" style="margin-top: 100px;">
    <div class="container">
        <h2 class="mb-4">Minhas Doações Cadastradas</h2>
        
        <div class="row">
            <?php 
            if (mysqli_num_rows($resultado) > 0) {
                while($item = mysqli_fetch_assoc($resultado)) { 
                    // Cores do badge por status
                    $badgeClass = ($item['status'] == 'disponivel') ? 'bg-success' : 
                                  (($item['status'] == 'doado') ? 'bg-warning text-dark' : 'bg-secondary');
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?php echo $item['foto']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item['titulo']; ?></h5>
                                <p class="card-text text-muted"><?php echo mb_strimwidth($item['descricao'], 0, 80, "..."); ?></p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Categoria:</strong> <?php echo $item['categoria']; ?></li>
                                    <li class="list-group-item"><strong>Status:</strong> <span class="badge <?php echo $badgeClass; ?>"><?php echo ucfirst($item['status']); ?></span></li>
                                </ul>
                            </div>
                            
                            <div class="card-footer bg-transparent border-top-0 text-center">
                                <?php if($item['status'] == 'disponivel'): ?>
                                    <a href="formEditarDoacao.php?id=<?php echo $item['id_item']; ?>" class="btn btn-sm btn-warning">Editar</a>
                                    
                                    <a href="minhasDoacoes.php?acao=excluir&id=<?php echo $item['id_item']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Excluir este item?')">Excluir</a>
                                
                                <?php elseif($item['status'] == 'doado'): ?>
                                    <div class="alert alert-info py-1 small">Aguardando confirmação de entrega</div>
                                    
                                    <a href="minhasDoacoes.php?acao=confirmar&id=<?php echo $item['id_item']; ?>" 
                                       class="btn btn-success btn-sm w-100" 
                                       onclick="return confirm('Confirma que o item foi entregue ao beneficiário?')">
                                       <i class="bi bi-check-lg"></i> Confirmar Entrega
                                    </a>

                                <?php elseif($item['status'] == 'concluido'): ?>
                                    <span class="badge bg-secondary p-2 w-100"><i class="bi bi-heart-fill"></i> Doação Concluída</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php } 
            } else {
                echo "<div class='col-12 text-center py-5'>
                        <p class='lead'>Você ainda não cadastrou nenhum item para doação.</p>
                        <a href='formDoacao.php' class='btn btn-success btn-lg'><i class='bi bi-plus-circle'></i> Cadastrar primeiro item</a>
                      </div>";
            }
            ?>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>