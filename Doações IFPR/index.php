<!DOCTYPE html>
<html lang="pt-br">

<?php include 'header.php'; ?>

    <body class="home page-top">
    <!-- Masthead-->
    <!--Adiconei uma leve sombra sob a foo de fundo para melhor enxergar as infoemacoes-->
    <header class="masthead"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets/img/fundo.png');">
        <div class="container">
            <div class="masthead-subheading">Doações IFPR</div>
            <div class="masthead-heading text-uppercase">Colabore e faça a vida de outra pessoa mais feliz!</div>
            <!--Gemini me ensinou que o comando !important força a ele aplicar o que eu quero ao invés do que é nativo do código dele, 
            facilitou pois não precisei ficar procurando a cor de um elemento, por exemplo, em um código enorme pra mudar ela-->
            <a class="btn btn-primary btn-xl text-uppercase" style="background-color: #00873E !important;"
                href="#cadastro"><Cadastre-se></Cadastre-se></a>
        </div>
    </header>

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
                                <div class="portfolio-caption-heading">Seja voluntário</div>
                                <div class="portfolio-caption-subheading text-muted">Vista o traje e a alegria</div>
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
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/papai noel.jpg"
                                        alt="Papai Noel" />
                                    <p>Procuramos voluntários para auxiliar no carregamento e na distribuição das doações nas comunidades. 
                                        Você fará parte da equipe que garante que os itens cheguem em segurança às famílias cadastradas no projeto.</p>
                                    <ul class="list-inline">
                                        <li><strong>Data:</strong> Conforme cronograma de entregas</li>
                                        <li><strong>Requisito:</strong> Disposição, responsabilidade, empatia e amor</li>
                                    </ul>

                                    <button class="btn btn-success btn-xl text-uppercase me-2 btn-participar"
                                        data-bs-dismiss="modal" data-missao="Papai Noel" type="button">
                                        <i class="fas fa-check me-1"></i> Quero Participar
                                    </button>

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

                                    <button class="btn btn-success btn-xl text-uppercase me-2 btn-participar"
                                        data-bs-dismiss="modal" data-missao="Oficina" type="button">
                                        <i class="fas fa-check me-1"></i> Quero Participar
                                    </button>

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

                                    <button class="btn btn-success btn-xl text-uppercase me-2 btn-participar"
                                        data-bs-dismiss="modal" data-missao="Recreacao" type="button">
                                        <i class="fas fa-check me-1"></i> Quero Participar
                                    </button>

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


        <!-- Historia-->
        <section class="page-section" id="historia">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Educação e Solidariedade</h2>
                    <h3 class="section-subheading text-muted" style="font-size: 1.5rem;">Educação que transforma,
                        solidariedade que une</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid"
                                src="assets/img/historia/ifpr.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <!--IFPR-->
                            <div class="timeline-heading">
                                <h4>IFPR Telêmaco Borba</h4>
                                <h3 class="section-heading" style="font-size: 1rem; color: grey;">Desde 2010
                                    transformando
                                    vidas</h3>
                            </div>
                            <div class="timeline-body">
                                <p>O Campus Telêmaco Borba nasceu com a missão de levar educação
                                    pública,
                                    gratuita
                                    e de qualidade para a região dos Campos Gerais. Formamos profissionais, mas acima de
                                    tudo, formamos
                                    cidadãos conscientes.</p>
                            </div>
                        </div>
                    </li>


                    <!--Projetos de extensão-->
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid"
                                src="assets/img/historia/projetodeextensao.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Além da sala de aula...</h4>
                                <h3 class="section-heading" style="font-size: 1rem; color: grey;">Extensão e Comunidade
                                </h3>
                            </div>
                            <div class="timeline-body">
                                <p>Acreditamos que a tecnologia e o conhecimento devem servir à
                                    sociedade.
                                    Através de projetos de extensão, o IFPR busca quebrar os muros da instituição e
                                    impactar
                                    positivamente a realidade local.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <!--Doações-->
                        <div class="timeline-image"><img class="rounded-circle img-fluid"
                                src="assets/img/historia/seja voluntario.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Doações</h4>
                                <h3 class="section-heading" style="font-size: 1rem; color: grey;">IFPR e Comunidade</h3>
                            </div>
                            <div class="timeline-body">
                                <p>O Instituto abriu as portas para ser o ponto central de
                                    arrecadação,
                                    unindo comércio local, estudantes e moradores em uma única corrente do bem pelo
                                    nosso
                                    município.</p>
                            </div>
                        </div>
                    </li>

                    <li class="timeline-inverted">
                        <div class="timeline-image" style="background-color: #00873E;">
                            <h4>
                                Faça parte
                                <br />
                                da nossa
                                <br />
                                da História!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>


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

        <!-- Doações-->
        <section class="page-section" style="background-color: #eaecd1;" id="cadastro">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Cadastre-se</h2>
                    <h3 class="section-subheading text-muted">Faça o cadastro para prosseguir</h3>
                </div>

                <form id="formDoacao" novalidate>
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Seu Nome Completo *"
                                    required />
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" id="telefone" type="tel" placeholder="Seu WhatsApp "
                                    required />
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-control form-select" id="bairro" required
                                    style="height: 3.5rem; color: #6c757d;">
                                    <option value="" selected disabled>Selecione seu Bairro*</option>
                                    <option value="Centro">Centro</option>
                                    <option value="Cem Casas">Cem Casas</option>
                                    <option value="Monte Alegre">Monte Alegre</option>
                                    <option value="Socomim">Socomim</option>
                                    <option value="Jardim Bandeirantes">Jardim Bandeirantes</option>
                                    <option value="Area Rural">Área Rural</option>
                                    <option value="Outro">Outro (Descreva na mensagem)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <select class="form-control form-select" id="tipoDoacao" required
                                    style="height: 3.5rem; color: #6c757d;">
                                    <option value="" selected disabled>O que você vai doar? *</option>
                                    <option value="Brinquedos">Brinquedos</option>
                                    <option value="Roupas">Roupas</option>
                                    <option value="Alimentos">Alimentos</option>
                                    <option value="Dinheiro">Contribuição em Dinheiro (Pix)</option>
                                    <option value="Mix">Vários itens</option>
                                </select>
                            </div>
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message"
                                    placeholder="Detalhes da doação (Ex: 1 boneca, 2kg de arroz)..."
                                    required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <p id="mensagemDoacao" style="font-weight: bold; margin-bottom: 15px;"></p>

                        <button class="btn btn-primary btn-xl text-uppercase" id="btnEnviar" type="submit"
                            style="background-color: #00873E !important;">
                            <i class="fas fa-paper-plane me-2"></i> Confirmar Doação
                        </button>
                    </div>
                </form>
            </div>
        </section>
        <!--queria que o formulario de voluntários aparecesse só pra quem apertasse no botão e a is me ensinou o d-none-->
        <section class="page-section" id="voluntario" style="display: none; background-color: #fff0f0;">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase text-danger">Seja um Herói Voluntário</h2>
                    <h3 class="section-subheading text-muted">Inscreva-se para atuar na Logística, Triagem ou no Acolhimento das famílias.</h3>
                </div>

                <form id="formVoluntario" novalidate>
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-8 mx-auto">
                            <div class="form-group mb-3">
                                <input class="form-control" id="nomeVoluntario" type="text" placeholder="Nome*"
                                    required />
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" id="zapVoluntario" type="tel" placeholder="WhatsApp "
                                    required />
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-control form-select" id="missaoVoluntario" required
                                    style="height: 3.5rem; color: #6c757d;">
                                    <option value="" selected disabled>Qual missão você escolheu nos cards acima? *
                                    </option>
                                    <option value="Voluntário">Equipe de Logística e Entregas</option>
                                    <option value="Organização">Equipe de Triagem e Organização</option>
                                    <option value="Acolhimento">Equipe de Acolhimento e Cadastro</option>
                                </select>
                            </div>

                            <div class="text-center mt-4">
                                <p id="mensagemVoluntario" style="font-weight: bold; margin-bottom: 15px;"></p>

                                <button class="btn btn-primary btn-xl text-uppercase" type="submit"
                                    style="background-color: #C62828 !important; border: none;">
                                    <i class="fas fa-star me-2"></i> Confirmar Inscrição
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>


<?php include 'footer_principal.php'; ?>

</body>

</html>