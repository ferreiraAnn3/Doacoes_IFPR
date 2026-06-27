<?php 
    include "header.php"; 
    include "conexaoBD.php";

    // Habilita exibição de erros apenas para depuração durante o desenvolvimento
    error_reporting(E_ALL);

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $erroPreenchimento = false;

        $nomeUsuario = filtrar_entrada($_POST["nomeUsuario"]);
        $dataNasc    = filtrar_entrada($_POST["dataNascimentoUsuario"]);
        $telefone    = filtrar_entrada($_POST["telefone"]);
        $email       = filtrar_entrada($_POST["emailUsuario"]);
        $tipoPerfil  = filtrar_entrada($_POST["tipoPerfil"]);
        
        $localColeta       = !empty($_POST["localColeta"]) ? filtrar_entrada($_POST["localColeta"]) : "Não informado";
        $horarioVoluntario = !empty($_POST["horarioVoluntario"]) ? filtrar_entrada($_POST["horarioVoluntario"]) : "Não informado";

        $mensagemHTML = "";

        // VALIDAÇÃO DE SENHA
        if(empty($_POST["senhaUsuario"]) || $_POST["senhaUsuario"] != $_POST["confirmarSenhaUsuario"]){
            $mensagemHTML = "<div class='alert alert-danger shadow-sm border-0'><i class='bi bi-exclamation-triangle-fill me-2'></i>As senhas não conferem ou estão vazias! <a href='formUsuario.php' class='alert-link'>Voltar</a></div>";
            $erroPreenchimento = true;
        } else {
            $senhaUsuario = md5($_POST["senhaUsuario"]); // Segurança básica
        }

        if (!$erroPreenchimento) {
            // Inicia uma transação para garantir que o usuário não seja criado sem o perfil
            mysqli_begin_transaction($conn);

            try {
                $sqlUser = "INSERT INTO usuarios (nome, email, senha, telefone, tipoPerfil, dataNascimento)
                            VALUES ('$nomeUsuario', '$email', '$senhaUsuario', '$telefone', '$tipoPerfil', '$dataNasc')";
                
                mysqli_query($conn, $sqlUser);
                $ultimoId = mysqli_insert_id($conn);

                if ($tipoPerfil == "Doador") {
                    $sqlPerfil = "INSERT INTO doador (id_usuario, localColeta) VALUES ('$ultimoId', '$localColeta')";
                } elseif ($tipoPerfil == "Voluntario") {
                    $sqlPerfil = "INSERT INTO voluntario (id_usuario, horarioDisponibilidade) VALUES ('$ultimoId', '$horarioVoluntario')";
                } else {
                    $sqlPerfil = "INSERT INTO beneficiario (id_usuario, localColeta) VALUES ('$ultimoId', '$localColeta')";
                }

                mysqli_query($conn, $sqlPerfil);
                mysqli_commit($conn); 

                $mensagemHTML = "
                    <i class='bi bi-check-circle-fill text-success mb-3' style='font-size: 5rem;'></i>
                    <h1 class='fw-bold' style='color: #0b3d22;'>Cadastro Realizado!</h1>
                    <a href='formLogin.php' class='btn btn-success btn-lg px-5 rounded-pill fw-bold shadow-sm'>Fazer Login</a>
                ";

            } catch (Exception $e) {
                mysqli_rollback($conn); 
                $mensagemHTML = "<div class='alert alert-danger shadow-sm border-0'><i class='bi bi-x-circle-fill me-2'></i>Erro ao cadastrar: " . $e->getMessage() . " <a href='formUsuario.php' class='alert-link'>Tentar novamente</a></div>";
            }
        }
?>

    <style>
        .bg-gradient-verde-claro {
            background: linear-gradient(135deg, #f0f7f0 0%, #c8e0c8 100%);
            min-height: calc(100vh - 200px); 
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <section class="bg-gradient-verde-claro" style="margin-top: 70px; padding: 50px 0;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow border-0 rounded-4 p-5 bg-white">
                        <?php echo $mensagemHTML; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
    } else {
        header("Location: formUsuario.php");
    }

    function filtrar_entrada($dado){
        return htmlspecialchars(stripslashes(trim($dado)));
    }
?>
<?php include "footer.php" ?>