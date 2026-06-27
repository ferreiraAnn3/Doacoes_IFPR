<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$primeiroNome = "";
$tipoPerfil = "";

if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
    $nomeUsuario  = $_SESSION['nomeUsuario'];
    $tipoPerfil   = $_SESSION['tipoPerfil']; 
    $nomeCompleto = explode(' ', $nomeUsuario);
    $primeiroNome = $nomeCompleto[0];
}

$paginaAtual = basename($_SERVER['PHP_SELF']);
$corNavbar = ($paginaAtual != 'index.php') ? 'bg-dark' : '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Doações IFPR</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logos/icon.png" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

   <style>
    #mainNav {
        padding: 1.5rem 0;
        transition: all 0.3s ease;
    }
    .bg-dark { 
        background-color: #212529 !important; 
        padding: 1rem 0 !important;
    }
    .dropdown-menu {
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        border-radius: 10px;
        margin-top: 10px;
    }
    .dropdown-item {
        padding: 10px 20px !important;
        font-weight: 500;
        color: #333 !important;
    }
    .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #28a745 !important; 
    }
    .navbar-nav .nav-link {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
    }
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top <?php echo $corNavbar; ?>" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="assets/img/logos/logobranca.png" alt="Logo IFPR" style="height: 50px;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
            Menu <i class="fas fa-bars ms-1"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php#cartinhas">Cartinhas</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#portfolio">Fábrica de Sorrisos</a></li>
                <li class="nav-item"><a class="nav-link" href="sobreNos.php">Sobre nós</a></li>
                
                <?php if(isset($_SESSION['logado'])): ?>
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' data-bs-toggle='dropdown'>
                            <i class='bi bi-person-circle'></i> Olá, <?php echo $primeiroNome; ?>
                        </a>
                        <ul class='dropdown-menu'>
                            <?php if($tipoPerfil == 'Doador') echo "<li><a class='dropdown-item' href='formDoacao.php'>Cadastrar Doação</a></li><li><a class='dropdown-item' href='minhasDoacoes.php'>Minhas Doações</a></li>"; ?>
                            <?php if(strpos($tipoPerfil, 'Beneficiario') !== false) echo "<li><a class='dropdown-item' href='meusPedidos.php'>Meus Resgates</a></li>"; ?>
                            <?php if($tipoPerfil == 'Voluntario') echo "<li><a class='dropdown-item' href='gerenciarDoacoes.php'>Painel do Voluntário</a></li>"; ?>
                            <li><a class="dropdown-item" href="formEditarPerfil.php">MEU PERFIL</a></li>
                            <li><hr class='dropdown-divider'></li>
                            <li><a class='dropdown-item' href='logout.php'>Sair</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class='nav-item'><a class='nav-link fw-bold' href='formLogin.php'>Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>