<!DOCTYPE html>
<html lang="pt-br">

<?php
include 'header.php';
include 'conexaoBD.php';
?>

    <body class="home page-top">
    <!-- Masthead-->
    <!--Adiconei uma leve sombra sob a foo de fundo para melhor enxergar as infoemacoes-->
    <header class="masthead"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('assets/img/fundo.png');">

    <div class="container">


            <div class="masthead-subheading mb-3">
                Doações IFPR
            </div>

            <div class="masthead-heading text-uppercase mb-4">
                Colabore e faça a vida de outra pessoa mais feliz!
            </div>

            <p class="fs-5 text-white mb-4">
                Conectamos doadores, voluntários e famílias para transformar
                solidariedade em impacto real na comunidade.
            </p>

          <div class="d-flex justify-content-center gap-3 flex-wrap">

                <?php if (!isset($_SESSION['id_usuario'])): ?>
                    <a class="btn btn-success btn-xl text-uppercase" href="cadastroUsuario.php">
                        Quero Ajudar
                    </a>
                <?php else: ?>
                    <a class="btn btn-primary btn-xl text-uppercase" href="formDoacao.php">
                        Cadastrar doação
                    </a>
                <?php endif; ?>

            </div>

            </div>

        </div>

    </div>

</header>

        <section class="py-5 border-bottom" style="background:#FFFBF0;">        <div class="row text-center g-4">
                <!-- Item 1 (Adicionado o ícone bi-box-seam) -->
                <div class="col-6 col-md-3">
                    <i class="bi bi-box-seam text-success mb-2" style="font-size: 2.5rem;"></i>
                    <h2 class="fw-bold text-success mb-0">100+</h2>
                    <p class="text-muted small text-uppercase">Itens Arrecadados</p>
                </div>
                <!-- Item 2 -->
                <div class="col-6 col-md-3">
                    <i class="bi bi-people-fill text-success mb-2" style="font-size: 2.5rem;"></i>
                    <h2 class="fw-bold text-success mb-0">120+</h2>
                    <p class="text-muted small text-uppercase">Famílias Atendidas</p>
                </div>
                <!-- Item 3 -->
                <div class="col-6 col-md-3">
                    <i class="bi bi-heart-fill text-success mb-2" style="font-size: 2.5rem;"></i>
                    <h2 class="fw-bold text-success mb-0">50+</h2>
                    <p class="text-muted small text-uppercase">Voluntários</p>
                </div>
                <!-- Item 4 -->
                <div class="col-6 col-md-3">
                    <i class="bi bi-award-fill text-success mb-2" style="font-size: 2.5rem;"></i>
                    <h2 class="fw-bold text-success mb-0">100%</h2>
                    <p class="text-muted small text-uppercase">Solidariedade</p>
                </div>
            </div>
        </div>
    </section>
    
        <?php
            // Recebe o valor do filtro via método GET
            $filtroDoacao = $_GET['statusDoacao'] ?? 'todos';

            // Query
            if($filtroDoacao == 'todos'){
                $listarDoacoes = "SELECT id_item, titulo, categoria, status, foto FROM item_doacao";
            }
            elseif($filtroDoacao == 'disponivel'){
                $listarDoacoes = "SELECT id_item, titulo, categoria, status, foto FROM item_doacao WHERE status='disponivel'";
            }
            else{
                $listarDoacoes = "SELECT id_item, titulo, categoria, status, foto FROM item_doacao WHERE status='doado'";
            }

            $res = mysqli_query($conn,$listarDoacoes);
        ?>

    <style>

        .card-link{
            text-decoration:none;
            color:inherit;
        }

        .card-hover{
            border:none;
            border-radius:18px;
            overflow:hidden;
            position:relative;
            transition:.35s;
            box-shadow:0 8px 20px rgba(0,0,0,.08);
        }

        .card-hover:hover{
            transform:translateY(-8px);
            box-shadow:0 18px 35px rgba(0,0,0,.18);
        }

        .card-img-top{
            height:240px;
            object-fit:cover;
            transition:.4s;
        }

        .card-hover:hover .card-img-top{
            transform:scale(1.08);
        }

        .card-body{
            padding:1.5rem;
        }

        .card-body h5{
            min-height:55px;
        }

        .card-overlay{
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:240px;
            background:rgba(25,135,84,.88);
            color:white;
            display:flex;
            justify-content:center;
            align-items:center;
            opacity:0;
            transition:.3s;
            font-size:1.1rem;
            font-weight:bold;
        }

        .card-hover:hover .card-overlay{
            opacity:1;
        }

        .badge{
            padding:8px 15px;
            font-size:.85rem;
            border-radius:30px;
        }

        .faixa-finalizado{
            position:absolute;
            top:18px;
            right:-35px;
            width:140px;
            background:#198754;
            color:white;
            text-align:center;
            transform:rotate(35deg);
            padding:6px;
            font-size:.75rem;
            font-weight:bold;
            z-index:100;
        }

        .imagem-finalizada{
            filter:grayscale(100%);
            opacity:.75;
        }

        .titulo-vitrine{
            font-size:2.4rem;
            font-weight:bold;
            color:#198754;
        }

        .subtitulo-vitrine{
            color:#6c757d;
            font-size:1.1rem;
        }

        .filtro-card{
            border:none;
            border-radius:15px;
            box-shadow:0 5px 18px rgba(0,0,0,.08);
        }

        .btn-success{
            border-radius:10px;
        }

        </style>

<section class="py-5" style="background:#FFFBF0;">

    <div class="container px-4 px-lg-5">

        <div class="text-center mb-5">

            <span class="badge bg-success mb-3 px-3 py-2 fs-6">
                 Faça uma boa ação
            </span>

            <h2 class="titulo-vitrine">
                Vitrine de Doações
            </h2>

            <p class="subtitulo-vitrine">
                Escolha um item disponível
            </p>

        </div>

        <div class="card filtro-card mb-5">

            <div class="card-body">

                <form method="get">

                    <div class="row align-items-end">

                        <div class="col-md-9">

                            <label class="fw-bold mb-2">
                                Filtrar Itens
                            </label>

                            <select name="statusDoacao" class="form-select">

                                <option value="todos" <?php if($filtroDoacao=="todos") echo "selected"; ?>>
                                    Todas as doações
                                </option>

                                <option value="disponivel" <?php if($filtroDoacao=="disponivel") echo "selected"; ?>>
                                    Somente disponíveis
                                </option>

                                <option value="doado" <?php if($filtroDoacao=="doado") echo "selected"; ?>>
                                    Somente doados
                                </option>

                            </select>

                        </div>

                        <div class="col-md-3 d-grid">

                            <button class="btn btn-success">
                                <i class="bi bi-funnel"></i>
                                Aplicar Filtro
                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <?php
            $totalDoacoes = mysqli_num_rows($res);
        ?>

        <div class="text-center mb-5">

            <h5>
                Encontramos

                <span class="badge bg-success fs-6">
                    <?php echo $totalDoacoes; ?>
                </span>

                itens cadastrados.
            </h5>

        </div>

        <div class="row gx-4 gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">

            <?php

            if(mysqli_num_rows($res) > 0){

                while($doacao = mysqli_fetch_assoc($res)){

                    $fotoItem = !empty($doacao['foto'])
                        ? $doacao['foto']
                        : "assets/img/sem-foto.png";

            ?>

                <div class="col">

                    <a class="card-link"
                       href="visualizarDoacao.php?idItem=<?php echo $doacao['id_item']; ?>">

                        <div class="card h-100 card-hover">

                            <?php
                                if($doacao['status'] == "doado"){
                                    echo "<div class='faixa-finalizado'>DOADO</div>";
                                }
                            ?>

                            <div class="card-overlay">
                                <i class="bi bi-search-heart me-2"></i>
                                Ver Detalhes
                            </div>

                            <img
                                class="card-img-top <?php if($doacao['status']=="doado") echo "imagem-finalizada"; ?>"
                                src="<?php echo htmlspecialchars($fotoItem); ?>"
                                alt="<?php echo htmlspecialchars($doacao['titulo']); ?>"
                            >

                            <div class="card-body text-center">

                                <h5 class="fw-bold">
                                    <?php echo htmlspecialchars($doacao['titulo']); ?>
                                </h5>

                                <div class="mb-4">

                                    <span class="badge bg-secondary">
                                        <?php echo htmlspecialchars($doacao['categoria']); ?>
                                    </span>

                                </div>

                                <div class="d-grid">

                                    <button class="btn btn-success">
                                        <i class="bi bi-box2-heart"></i>
                                        Ver Doação
                                    </button>

                                </div>

                            </div>

                        </div>

                    </a>

                </div>

            <?php

                }

            } else {

                echo "<div class='alert alert-warning text-center w-100'>
                        Nenhum item encontrado.
                      </div>";

            }

            ?>

        </div>

    </div>

</section>
    <!--Cartinhass-->
    <section class="page-section" id="cartinhas" style="background-color: #FFFBF0;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Escreva uma carta</h2>
                <h3 class="section-subheading text-muted fs-4">Deixe uma mensagem de carinho e esperança para as famílias contempladas pelo projeto!
                </h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <!--Troquei o span por uma div, por conselho da IA, por ser mais fácil de manipular, a div é mais flexivel-->
                    <div class="rounded-circle bg-danger d-flex justify-content-center align-items-center mx-auto mb-4"
                        style="width: 8rem; height: 8rem;">
                        <i class="bi bi-envelope-paper-heart-fill bg-danger text-white" style="font-size: 4rem;"></i>
                    </div>
                    <h4 class="my-3">Escreva com Amor</h4>
                    <p class="text-muted">Escreva uma pequena carta que será entregue junto com as doações para uma
                        família
                        contemplada do projeto.</p>
                </div>
                <div class="col-md-4">
                    <div class="rounded-circle bg-danger d-flex justify-content-center align-items-center mx-auto mb-4"
                        style="width: 8rem; height: 8rem;">
                        <i class="bi-geo-alt-fill bg-danger text-white" style="font-size: 4rem;"></i>
                    </div>

                    <h4 class="my-3">Ponto de Entrega</h4>
                    <p class="text-muted">Deposite sua cartinha na caixa coletora localizada na portaria do IFPR
                        Telêmaco Borba junto com a sua doação.</p>

                    <div class=" p-3 rounded border mb-5 mt-5" style="background-color: #e1eac8;">
                        <p class="small fw-bold text-dark mb-2">
                            <i class="bi bi-pin-map-fill text-danger"></i>
                            Rodovia PR 160 – km 19,5 <br> Jardim Bandeirantes – Telêmaco Borba PR <br> CEP 84.269-090 |
                            Fone: (42)3127-9227
                        </p>
                        <a href="https://www.google.com.br/maps/place/IFPR+Campus+Tel%C3%AAmaco+Borba/@-24.3368111,-50.6589843,17.49z/data=!4m6!3m5!1s0x94e982ea5bf894ab:0xd8a9d8e17c62247a!8m2!3d-24.3374316!4d-50.6567214!16s%2Fg%2F11dfsn7gbd?hl=pt-BR&entry=ttu&g_ep=EgoyMDI1MTExNi4wIKXMDSoASAFQAw%3D%3D"
                            target="_blank" class="btn btn-outline-dark btn-sm">
                            <i class="bi bi-map"></i> Ver no Google Maps
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rounded-circle bg-danger d-flex justify-content-center align-items-center mx-auto mb-4"
                        style="width: 8rem; height: 8rem;">
                        <i class="bi bi-gift-fill text-white" style="font-size: 4rem;"></i>
                    </div>
                    <h4 class="my-3">Entrega Mágica</h4>
                    <p class="text-muted">Nossos voluntários entregarão sua mensagem junto com os presentes para as
                        famílias cadastradas.</p>
                </div>

            </div>
        </div>
        </div>
        </div>

        <!--Fábrica de Sorrisoss-->
        <!--o efeito do rover não estava funcionando porque o nome que estava no css para estilização era portfolio e eu tinha mudado o id para "fábrica"-->
        <section class="page-section" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Fábrica de Sorrisos</h2>
                    <h3 class="section-subheading text-muted">Doe seu tempo para mais precisa.</h3>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#modalMagia1">
                                <div class="portfolio-hover" style="background-color: #2f9e41;">
                                    <div class="portfolio-hover-content"><i class="fas fa-heart fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/seja voluntario.png" alt="Papai Noel" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Logistica Solidária</div>
                                <div class="portfolio-caption-subheading text-muted">Faça pate do processo</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#modalMagia2">
                                <div class="portfolio-hover" style="background-color: #2f9e41;">
                                    <div class="portfolio-hover-content"><i class="fas fa-tools fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/brinquedo2.jpg" alt="Oficina" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Oficina de Restauração e Reparos</div>
                                <div class="portfolio-caption-subheading text-muted">Dê uma nova vida aos itens doados
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#modalMagia3">
                                <div class="portfolio-hover" style="background-color: #2f9e41;">
                                    <div class="portfolio-hover-content"><i class="fas fa-smile fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/historias.jpg" alt="Recreação" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Contos e Brincadeiras</div>
                                <div class="portfolio-caption-subheading text-muted">Um ambiente acolhedor para os pequenos.</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Portfolio Modals-->
        <!--Papai Noel-->
        <div class="portfolio-modal modal fade" id="modalMagia1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/logos/logoX.png"
                            alt="Close modal" style="width: 100%; height: auto;" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Logística Solidária</h2>
                                    <p class="item-intro text-muted">Faça a doação chegar a quem precisa.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/voluntario.png"
                                        alt="voluntário" />
                                    <p>Procuramos voluntários para auxiliar no carregamento e na distribuição das doações nas comunidades. 
                                        Você fará parte da equipe que garante que os itens cheguem em segurança às famílias cadastradas no projeto.</p>
                                    <ul class="list-inline">
                                        <li><strong>Data:</strong> Conforme cronograma de entregas</li>
                                        <li><strong>Requisito:</strong> Disposição, responsabilidade, empatia e amor</li>
                                    </ul>

                                    <a class="btn btn-success btn-xl text-uppercase" href="cadastroUsuario.php">
                                        <i class="fas fa-check me-1"></i> Quero Participar
                                    </a>

                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-times me-1"></i> Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="portfolio-modal modal fade" id="modalMagia2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/logos/logoX.png"
                            alt="Close modal" style="width: 100%; height: auto;" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Oficina de Restauração e Reparos</h2>
                                    <p class="item-intro text-muted">Transforme o velho em novo.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/brinquedo2.jpg"
                                        alt="Oficina" />
                                    <p>Muitas doações chegam precisando de pequenos reparos. Se você tem habilidade manual, 
                                        ajude-nos a consertar brinquedos, higienizar itens, dar pequenos pontos em roupas ou realizar 
                                        manutenções simples para que tudo chegue em perfeito estado às famílias.</p>
                                    <ul class="list-inline">
                                        <li><strong>Local:</strong> Lab de Artes do IFPR</li>
                                        <li><strong>Requisito:</strong> Habilidade manual básica e boa vontade</li>
                                    </ul>

                                    <a class="btn btn-success btn-xl text-uppercase" href="cadastroUsuario.php">
                                        <i class="fas fa-check me-1"></i> Quero Participar
                                    </a>

                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-times me-1"></i> Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="portfolio-modal modal fade" id="modalMagia3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/logos/logoX.png"
                            alt="Close modal" style="width: 100%; height: auto;" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Recreação e Acolhimento</h2>
                                    <p class="item-intro text-muted">Um ambiente acolhedor para os pequenos.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/historias.jpg"
                                        alt="Recreação" />
                                    <p>Enquanto os pais retiram as doações ou realizam o cadastro, precisamos de 
                                        voluntários para organizar atividades lúdicas, leitura de histórias e brincadeiras para as 
                                        crianças, criando um ambiente seguro e acolhedor.</p>
                                    <ul class="list-inline">
                                        <li><strong>Data:</strong> Dias de entrega ou triagem</li>
                                        <li><strong>Requisito:</strong> Gostar de crianças e criatividade</li>
                                    </ul>

                                    <a class="btn btn-success btn-xl text-uppercase" href="cadastroUsuario.php">
                                        <i class="fas fa-check me-1"></i> Quero Participar
                                    </a>

                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-times me-1"></i> Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


       


        <!--O que doar-->
        <section class="page-section" id="roupas" style="padding: 6rem 0;">
            <div class="container" style="background-color: #FFFBF0">
                <div class="text-center mb-5">
                    <h2 class="section-heading text-uppercase">O Que Doar?</h2>
                    <h3 class="section-subheading text-muted">Além de tempo, doe brinquedos novos ou usados em bom estado para fazer a alegria das crianças.</h3>
                </div>

                <div class="row text-center">

                    <div class="col-md-4">
                        <span class="fa-stack fa-4x mb-4">
                            <i class="fas fa-circle fa-stack-2x text-danger"></i>
                            <i class="fas fa-tshirt fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Roupas e Agasalhos</h4>
                        <p class="text-muted">Roupas infantis e adultas em bom estado, calçados e cobertores limpos.</p>
                    </div>

                    <div class="col-md-4" id="doar">
                        <span class="fa-stack fa-4x mb-4">
                            <i class="fas fa-circle fa-stack-2x text-danger"></i>
                            <i class="fas fa-utensils fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Alimentos</h4>
                        <p class="text-muted">Cestas básicas, leite, e itens não perecíveis.</p>
                    </div>

                    <div class="col-md-4">
                        <span class="fa-stack fa-4x mb-4">
                            <i class="fas fa-circle fa-stack-2x text-danger"></i>
                            <i class="fas fa-gamepad fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Brinquedos</h4>
                        <p class="text-muted">Brinquedos novos ou usados em bom estado.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        
<?php include 'footer.php'; ?>

</body>

</html>