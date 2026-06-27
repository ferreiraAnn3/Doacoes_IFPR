<?php 
    include "header.php"; 
    include "conexaoBD.php"; 

    // Verifica se o formulário foi enviado via POST 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        // Apenas Doadores podem processar esta ação
        if(!isset($_SESSION['logado']) || $_SESSION['tipoPerfil'] != 'Doador'){
            die("<div class='container mt-5'><div class='alert alert-danger text-center shadow-sm'>
                 <i class='bi bi-shield-lock-fill' style='font-size: 2rem;'></i><br>
                 <strong>Erro de Segurança:</strong> Você não tem permissão para cadastrar itens.
                 </div></div>");
        }

        $idUsuario = $_SESSION['id_usuario'];

        // Variáveis de controle e fuso horário
        $erroPreenchimento = false;
        date_default_timezone_set('America/Sao_Paulo');
        $dataCadastro = date("Y-m-d");
        $horaCadastro = date("H:i:s");

        // Filtra e valida os dados de texto 
        $titulo    = filtrar_entrada($_POST["titulo"]);
        $categoria = filtrar_entrada($_POST["categoria"]);
        $descricao = filtrar_entrada($_POST["descricao"]);

        if(empty($titulo) || empty($categoria) || empty($descricao)){
            echo "<div class='alert alert-warning text-center mt-5'>Todos os campos de texto são obrigatórios!</div>";
            $erroPreenchimento = true;
        }

        // Upload da Foto
        $diretorio = "assets/img/"; 
        
        $fotoNome = time() . "_" . basename($_FILES['foto']['name']);
        $caminhoFoto = $diretorio . $fotoNome; 
        
        $tipoDaImagem = strtolower(pathinfo($caminhoFoto, PATHINFO_EXTENSION));
        $erroUpload = false;

        if($_FILES["foto"]["size"] != 0){
            if($_FILES["foto"]["size"] > 5000000){
                echo "<div class='alert alert-warning text-center mt-5'>A foto deve ter no máximo 5MB!</div>";
                $erroUpload = true;
            }
            if(!in_array($tipoDaImagem, ["jpg", "jpeg", "png", "webp"])){
                echo "<div class='alert alert-warning text-center mt-5'>Formatos aceitos: JPG, JPEG, PNG ou WEBP!</div>";
                $erroUpload = true;
            }
            if(!move_uploaded_file($_FILES["foto"]["tmp_name"], $caminhoFoto)){
                echo "<div class='alert alert-warning text-center mt-5'>Erro ao salvar a foto na pasta. Verifique as permissões.</div>";
                $erroUpload = true;
            }
        } else {
            echo "<div class='alert alert-warning text-center mt-5'>O envio de uma foto do item é obrigatório!</div>";
            $erroUpload = true;
        }

        // Se não houver erros, realiza a inserção no Banco de Dados
        if(!$erroPreenchimento && !$erroUpload){
            
            $inserirDoacao = "INSERT INTO item_doacao (id_usuario, titulo, descricao, categoria, status, foto, data_cadastro, hora_cadastro) 
                              VALUES ('$idUsuario', '$titulo', '$descricao', '$categoria', 'disponivel', '$caminhoFoto', '$dataCadastro', '$horaCadastro')";

            if(mysqli_query($conn, $inserirDoacao)){
                echo "<div class='container mt-5 mb-5' style='margin-top: 150px !important;'>";            
                echo "<div class='alert alert-success text-center shadow-sm p-4'>
                    <i class='bi bi-check-circle-fill' style='font-size: 2rem;'></i><br>
                    <h4 class='mt-2'>Ação Concluída!</h4>
                    <p class='mb-0'>Seu item foi cadastrado com sucesso e já está disponível para doação.</p>
                </div>";
                        
                echo "<div class='text-center'>
                        <img src='$caminhoFoto' style='height: 250px; object-fit: cover; border-radius: 10px;' class='img-thumbnail shadow'>
                      </div>";
                
                echo "<div class='row justify-content-center mt-4'>
                        <div class='col-md-6'>
                            <table class='table table-bordered text-center shadow-sm'>
                                <tr><th class='bg-light w-50'>ITEM</th><td>$titulo</td></tr>
                                <tr><th class='bg-light w-50'>CATEGORIA</th><td>$categoria</td></tr>
                                <tr><th class='bg-light w-50'>STATUS</th><td><span class='badge bg-success'>Disponível</span></td></tr>
                            </table>
                        </div>
                      </div>";
                
                echo "<div class='text-center mt-4'>
                        <a href='formDoacao.php' class='btn btn-outline-dark me-2'><i class='bi bi-plus-lg'></i> Cadastrar Novo Item</a>
                        <a href='index.php' class='btn btn-success'><i class='bi bi-house'></i> Voltar à Vitrine</a>
                      </div>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-danger text-center mt-5'>Erro crítico no banco de dados: " . mysqli_error($conn) . "</div>";
            }
        }
    } else {
        echo "<script>window.location.href='formDoacao.php';</script>";
        exit();
    }

    // Função de tratamento de dados 
    function filtrar_entrada($dado){
        return htmlspecialchars(stripslashes(trim($dado)));
    }
?>

<?php include "footer.php" ?>