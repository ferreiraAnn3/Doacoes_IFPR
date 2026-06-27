<?php 
    include "header.php"; 
    include "conexaoBD.php";

    // 1. Verifica se o usuário é Doador
    if(!isset($_SESSION['logado']) || $_SESSION['tipoPerfil'] != 'Doador'){
        header("Location: index.php");
        exit();
    }

   if(isset($_GET['id'])){
        $idItem = $_GET['id'];
        $idUsuario = $_SESSION['id_usuario'];

        // Busca o item garantindo que ele pertence ao usuário logado
        $sql = "SELECT * FROM item_doacao WHERE id_item = '$idItem' AND id_usuario = '$idUsuario'";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0){
            $item = mysqli_fetch_assoc($res);
        } else {
            echo "<div class='alert alert-danger text-center mt-5'>Item não encontrado ou sem permissão!</div>";
            include "footer.php";
            exit();
        }
    } else {
        header("Location: minhasDoacoes.php");
        exit();
    }
?>

<section class="py-5" style="margin-top: 80px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Editar Doação</h2>
                
                <form action="actionEditarDoacao.php" method="POST" class="was-validated" enctype="multipart/form-data">
                    
                    <input type="hidden" name="idItem" value="<?php echo $item['id_item']; ?>">
                    <input type="hidden" name="fotoAtual" value="<?php echo $item['foto']; ?>">

                    <div class="mb-3 text-center">
                        <p>Foto atual:</p>
                        <img src="<?php echo $item['foto']; ?>" class="img-thumbnail" style="max-width: 200px;">
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="file" class="form-control" id="foto" name="foto">
                        <label for="foto">Alterar foto (opcional)</label>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $item['titulo']; ?>" required>
                        <label for="titulo">Título</label>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <select class="form-select" id="categoria" name="categoria" required>
                            <option value="Alimentos" <?php if($item['categoria'] == "Alimentos") echo "selected"; ?>>Alimentos</option>
                            <option value="Vestuário" <?php if($item['categoria'] == "Vestuário") echo "selected"; ?>>Vestuário</option>
                            <option value="Brinquedos" <?php if($item['categoria'] == "Brinquedos") echo "selected"; ?>>Brinquedos</option>
                            <option value="Móveis" <?php if($item['categoria'] == "Móveis") echo "selected"; ?>>Móveis</option>
                        </select>
                        <label for="categoria">Categoria</label>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <textarea class="form-control" id="descricao" name="descricao" style="height: 100px" required><?php echo $item['descricao']; ?></textarea>
                        <label for="descricao">Descrição</label>
                    </div>
                    
                   <button type="submit" class="btn btn-warning w-100 mb-2">Salvar Alterações</button>

                    <a href="excluirDoacao.php?id=<?php echo $item['id_item']; ?>" 
                    class="btn btn-danger w-100" 
                    onclick="return confirm('Tem certeza que deseja excluir esta doação?');">
                    Excluir
                    </a>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include "footer.php" ?>