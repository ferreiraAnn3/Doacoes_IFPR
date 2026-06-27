<?php 
    include "header.php"; 
    include "conexaoBD.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $erroPreenchimento = false;
        $erroUpload        = false;

        // Validação básica do ID
        if(empty($_POST['idItem'])){
            die("<div class='alert alert-warning text-center'>Item não identificado!</div>");
        }
        $idItem = filtrar_entrada($_POST['idItem']);
        $idUsuario = $_SESSION['id_usuario']; // ID de quem está logado

        // Filtra os novos dados
        $titulo    = filtrar_entrada($_POST["titulo"]);
        $categoria = filtrar_entrada($_POST["categoria"]);
        $descricao = filtrar_entrada($_POST["descricao"]);
        $fotoAtual = filtrar_entrada($_POST['fotoAtual']);

        if(empty($titulo) || empty($categoria) || empty($descricao)){
            echo "<div class='alert alert-warning text-center'>Campos de texto são obrigatórios!</div>";
            $erroPreenchimento = true;
        }

        // Lógica de Foto (apenas se o usuário subir uma nova)
        if($_FILES["foto"]["size"] != 0){
            $diretorio    = "assets/img/";
            $fotoNome     = time() . "_" . basename($_FILES['foto']['name']);
            $fotoSalva    = $diretorio . $fotoNome;
            
            if(!move_uploaded_file($_FILES["foto"]["tmp_name"], $fotoSalva)){
                echo "<div class='alert alert-danger text-center'>Erro ao mover nova foto!</div>";
                $erroUpload = true;
            }
        } else {
            $fotoSalva = $fotoAtual; // Mantém a foto anterior
        }

        if(!$erroPreenchimento && !$erroUpload){
            // UPDATE: Note que não editamos mais o 'valor'
            $editarDoacao = "UPDATE item_doacao 
                             SET foto = '$fotoSalva', 
                                 titulo = '$titulo', 
                                 categoria = '$categoria', 
                                 descricao = '$descricao' 
                             WHERE id_item = '$idItem' AND id_usuario = '$idUsuario'";

            if(mysqli_query($conn, $editarDoacao)){
                echo "
                <div class='container mt-5 text-center'>
                    <div class='alert alert-success'><strong>DOAÇÃO</strong> editada com sucesso!</div>
                    <img src='$fotoSalva' style='width:200px' class='img-thumbnail'>
                    <br><br>
                    <a href='minhasDoacoes.php' class='btn btn-primary'>Voltar para Minhas Doações</a>
                </div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Erro ao editar: " . mysqli_error($conn) . "</div>";
            }
        }
    } else {
        header("location:minhasDoacoes.php");
    }

    function filtrar_entrada($dado){
        return htmlspecialchars(stripslashes(trim($dado)));
    }
?>
<?php include "footer.php" ?>