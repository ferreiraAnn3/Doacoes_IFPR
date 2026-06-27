<?php 
    include "header.php"; 

    // Validação de segurança
    if(!isset($_SESSION['logado']) || $_SESSION['tipoPerfil'] != 'Doador'){
        echo "<script>
                alert('Acesso restrito! Apenas Doadores podem cadastrar itens.'); 
                window.location.href='index.php';
              </script>";
        exit();
    }
?>

<style>
    /* Degradê padrão do projeto */
    .bg-gradient-verde-claro {
        background: linear-gradient(135deg, #f0f7f0 0%, #c8e0c8 100%);
        min-height: 80vh; 
        padding: 100px 0; /* Padding superior para compensar a navbar */
    }
</style>

<section class="bg-gradient-verde-claro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-4 p-5 bg-white">
                    <h2 class="fw-bold mb-4 text-center" style="color: #0b3d22;">Cadastrar Doação</h2>
                    
                    <form action="actionDoacao.php" method="POST" class="was-validated" enctype="multipart/form-data">
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="titulo" placeholder="Título" name="titulo" required>
                            <label for="titulo">O que você está doando?</label>
                        </div>
            
                        <div class="mb-3">
                            <label for="foto" class="form-label text-muted ms-2">Foto do Item</label>
                            <input type="file" class="form-control" id="foto" name="foto" required>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="categoria" name="categoria" required>
                                <option value="" disabled selected>Selecione...</option>
                                <option value="Alimentos">Alimentos</option>
                                <option value="Vestuário">Vestuário</option>
                                <option value="Brinquedos">Brinquedos</option>
                                <option value="Móveis">Móveis</option>
                                <option value="Outros">Outros</option>
                            </select>
                            <label for="categoria">Categoria</label>
                        </div>

                        <div class="form-floating mb-4">
                            <textarea class="form-control" id="descricao" placeholder="Descrição" name="descricao" style="height: 120px" required></textarea>
                            <label for="descricao">Detalhes do item (estado, tamanho, etc.)</label>
                        </div>

                        <button type="submit" class="btn btn-success w-100 btn-lg rounded-pill fw-bold shadow-sm">
                            <i class=" me-2"></i> Cadastrar Doação
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>