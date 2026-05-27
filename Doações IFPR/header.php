<?php

    error_reporting(0); //Desabilita alertas de erros de execução
    session_start();

    if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){ //Verifica se há sessão ativa
        $idUsuario    = $_SESSION['idUsuario']; //Armazenar as variáveis de sessão em variáveis PHP
        $nomeUsuario  = $_SESSION['nomeUsuario'];
        $emailUsuario = $_SESSION['emailUsuario'];
        $nivelUsuario = $_SESSION['nivelUsuario'];

        $nomeCompleto = explode(' ', $nomeUsuario); //Usa a função explode para fragmentar o nome do usuário
        $primeiroNome = $nomeCompleto[0]; //Armazena na variável o primeiro [0] fragmento do nome do usuário
    }

?>

    <!DOCTYPE html>
    <html lang="pt-br">
        <?php
            //Configura o fuso horário para America/São Paulo
            date_default_timezone_set('America/Sao_Paulo');
        ?>
        <head>
                <style>
            #mainNav {
                position: fixed !important;
                top: 0;
                width: 100%;
                transition: none !important;
                z-index: 1000;
            }

            /* Página inicial */
            body.home #mainNav {
                background-color: transparent !important;
            }

            /* Outras páginas */
            body:not(.home) #mainNav {
                background-color: #212529 !important;
            }

            body {
                background: linear-gradient(180deg, #ffffff 0%, #b8dbbb 100%);
                background-attachment: fixed; 
                min-height: 100vh;
                margin: 0;
            }


            
        </style>


            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Doações IFPR</title>
            <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="assets/img/logos/icon.png" />
            <!-- Font Awesome icons (free version)-->
            <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
            <!-- Google fonts-->
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
            <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="css/styles.css" rel="stylesheet" />
            <!--Pacote de icones | bootstrap icons-->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

            <style>
                    .rancho-regular {
                        font-family: "Rancho", cursive;
                        font-weight: 400;
                        font-style: normal;
                        font-size: 2rem;
                    }
            </style>
    </head>
        

    <body>
            <!-- Barra de navegação-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php#page-top"><img src="assets/img/logos/logobranca.png" alt="Logo IFPR"
                        style="height: 50px; width: auto;" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php#cartinhas">Cartinhas</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#portfolio">Fábrica de Sorrisos</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#historia">Nossa História</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#doar">O que doar?</a></li>
                        
                        <?php
                            
                            if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){ 
                                
                                echo "
                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' id='navbarDropdown' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                            <i class='bi bi-person-circle'></i> Olá, $primeiroNome
                                        </a>
                                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                            <li><a class='dropdown-item' href='formAnuncio.php' style='color: #212529; text-transform: none;'>Cadastrar Doação</a></li>
                                            <li><hr class='dropdown-divider' /></li>
                                            <li><a class='dropdown-item' href='#!' style='color: #212529; text-transform: none;'>Meus Resgates</a></li>
                                            <li><hr class='dropdown-divider' /></li>
                                            <li><a class='dropdown-item' href='logout.php' style='color: #212529; text-transform: none;'>Sair</a></li>
                                        </ul>
                                    </li>
                                ";

                            } else {
                                // SE NÃO TIVER SESSÃO, MOSTRA BOTÕES PADRÕES
                                echo "
                                    <li class='nav-item'><a class='nav-link' href='index.php#cadastro'>Cadastre-se</a></li>
                                    <li class='nav-item'><a class='nav-link' href='formLogin.php' title='Acessar o Sistema' style='color: #ffffff; font-weight: bold;'>Login</a></li>
                                ";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    
