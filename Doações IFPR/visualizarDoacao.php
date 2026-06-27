<?php
    include "header.php";
    include "conexaoBD.php";

    if(isset($_GET['idItem'])){
        $idItem = $_GET['idItem'];

        // QUERY buscando o item e os dados do doador associado
        $buscarItem = "SELECT i.*, u.nome 
                       FROM item_doacao i
                       INNER JOIN usuarios u ON i.id_usuario = u.id_usuario
                       WHERE i.id_item = '$idItem'";

        $resItem = mysqli_query($conn, $buscarItem);

        if(mysqli_num_rows($resItem) > 0){
            $item = mysqli_fetch_assoc($resItem);
            
            $idItem         = $item['id_item'];
            $titulo         = $item['titulo'];
            $descricao      = $item['descricao'];
            $categoria      = $item['categoria'];
            $foto           = $item['foto'];
            $data           = $item['data_cadastro'];
            $hora           = $item['hora_cadastro'];
            $status         = $item['status'];
            $nomeDoador     = $item['nome'];
        } else {
            echo "<div class='alert alert-danger text-center mt-5'>Item não encontrado!</div>";
            include "footer.php";
            exit();
        }
    } else {
        echo "<div class='alert alert-danger text-center mt-5'>ID do item não informado!</div>";
        include "footer.php";
        exit();
    }
?>

<style>
    .img-doacao-principal { width: 100%; max-height: 500px; object-fit: contain; }
    .card-relacionado { transition: transform 0.2s ease; }
    .card-relacionado:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
</style>

<section class="py-5" style="margin-top: 50px;">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="img-doacao-principal mb-5 mb-md-0 <?php if($status == 'doado') echo 'imagem-finalizada'; ?>"
                     src="<?php echo htmlspecialchars($foto); ?>"
                     alt="<?php echo htmlspecialchars($titulo); ?>" />
            </div>
            <div class="col-md-6">
                <div class="small mb-1">Categoria: <?php echo htmlspecialchars($categoria); ?></div>
                <h1 class="display-5 fw-bolder"><?php echo htmlspecialchars($titulo); ?></h1>
                <p class="lead mt-3"><?php echo htmlspecialchars($descricao); ?></p>
                <p class="text-muted">
                    Doado por <strong><?php echo htmlspecialchars($nomeDoador); ?></strong><br>
                    Disponibilizado em <?php echo date('d/m/Y', strtotime($data)); ?>
                </p>

                <?php
                    if($status == 'disponivel'){
                        if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
                            // Se for o dono do item, pode editar
                            if($_SESSION['id_usuario'] == $item['id_usuario']){
                                echo "<a href='formEditarDoacao.php?id=$idItem' class='btn btn-outline-warning btn-lg mt-3'><i class='bi bi-pencil'></i> Editar Doação</a>";
                            } 
                            // Se for beneficiário, pode solicitar
                            elseif(strpos($_SESSION['tipoPerfil'], 'Beneficiario') !== false){
                                echo "<a href='efetuarResgate.php?id=$idItem' class='btn btn-success btn-lg mt-3'><i class='bi bi-heart-fill'></i> Solicitar Doação</a>";
                            }
                        } else {
                            echo "<a href='formLogin.php' class='btn btn-outline-dark btn-lg mt-3'>Acesse para solicitar este item</a>";
                        }
                    } else {
                        echo "<button class='btn btn-secondary btn-lg mt-3' disabled>Item já Doado</button>";
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5">
        <h3 class="mb-4">Outros itens em <?php echo $categoria; ?></h3>
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-4">
            <?php
                $sqlRel = "SELECT * FROM item_doacao WHERE categoria = '$categoria' AND id_item != '$idItem' AND status = 'disponivel' LIMIT 4";
                $resRel = mysqli_query($conn, $sqlRel);
                while($rel = mysqli_fetch_assoc($resRel)){
                    echo "
                    <div class='col mb-4'>
                        <div class='card h-100 card-relacionado'>
                            <img src='{$rel['foto']}' class='card-img-top' style='height: 150px; object-fit: cover;'>
                            <div class='card-body text-center'>
                                <h6 class='fw-bold'>{$rel['titulo']}</h6>
                                <a href='visualizarDoacao.php?idItem={$rel['id_item']}' class='btn btn-sm btn-outline-primary'>Ver</a>
                            </div>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </div>
</section>

<?php include "footer.php" ?>