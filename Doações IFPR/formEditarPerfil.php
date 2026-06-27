<?php 
include "header.php"; 
include "conexaoBD.php";

$id = $_SESSION['id_usuario'];

// Consulta SQL corrigida: seleciona tudo necessário e garante o JOIN | gemini ajudou
$sql = "SELECT u.nome, u.email, u.telefone, u.tipoPerfil, v.horarioDisponibilidade, b.localColeta 
        FROM usuarios u 
        LEFT JOIN voluntario v ON u.id_usuario = v.id_usuario 
        LEFT JOIN beneficiario b ON u.id_usuario = b.id_usuario 
        WHERE u.id_usuario = '$id'";

$resultado = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($resultado);

if (!$dados) {
    $dados = ['nome' => '', 'email' => '', 'telefone' => '', 'tipoPerfil' => '', 'horarioDisponibilidade' => '', 'localColeta' => ''];
}

// Define a variável de tipo de forma segura
$tipo = $dados['tipoPerfil'] ?? '';
?>

<style>
    .fundo-degrade-verde {
        background: linear-gradient(135deg, #f0f7f0 0%, #c8e0c8 100%);
        min-height: 85vh; 
        padding-top: 155px; 
        padding-bottom: 50px;
    }
    
    .card-formulario {
        border-radius: 15px;
        border: none;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
        background-color: white;
    }
</style>
<div class="fundo-degrade-verde">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-formulario shadow">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4" style="color: #0b3d22; font-weight: bold;">Meu Perfil</h2>
                        
                        <?php if(isset($_GET['status']) && $_GET['status'] == 'sucesso'): ?>
                            <div class="alert alert-success text-center fw-bold">Perfil atualizado com sucesso!</div>
                        <?php endif; ?>

                        <form action="actionEditarPerfil.php" method="POST">
                            <div class="mb-3">
                                <label class="fw-bold">Nome:</label>
                                <input type="text" class="form-control" name="nome" value="<?php echo htmlspecialchars($dados['nome'] ?? ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Email:</label>
                                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($dados['email'] ?? ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Telefone:</label>
                                <input type="text" class="form-control" name="telefone" value="<?php echo htmlspecialchars($dados['telefone'] ?? ''); ?>">
                            </div>

                            <?php if($tipo == 'Doador' || $tipo == 'Beneficiario'): ?>
                                <div class="mb-3">
                                    <label class="fw-bold">Local de Coleta:</label>
                                    <input type="text" class="form-control" name="localColeta" value="<?php echo htmlspecialchars($dados['localColeta'] ?? ''); ?>">
                                </div>
                            <?php elseif($tipo == 'Voluntario'): ?>
                                <div class="mb-3">
                                    <label class="fw-bold">Horário de Disponibilidade:</label>
                                    <input type="text" class="form-control" name="horario" value="<?php echo htmlspecialchars($dados['horarioDisponibilidade'] ?? ''); ?>">
                                </div>
                            <?php endif; ?>

                            <button type="submit" class="btn btn-success w-100 mt-3 btn-lg" style="border-radius: 50px;">Salvar Alterações</button>                            
                            <div class="text-center mt-3">
                                <a href="actionExcluirPerfil.php" class="btn btn-outline-danger w-100" style="border-radius: 50px;" onclick="return confirm('ATENÇÃO: Tem certeza que deseja excluir sua conta definitivamente? Todos os seus dados serão apagados.')">
                                    <i class="bi bi-trash3-fill"></i> Excluir Minha Conta
                                </a>
                            </div>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>