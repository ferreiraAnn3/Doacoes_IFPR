<?php
    $hostBD   = "localhost"; // Define o local do servidor de BD
    $userBD   = "root"; // Define o usuário do BD (Padrão: root)
    $senhaBD  = ""; // Define a senha do BD (Padrão: "" [Em branco])
    $database = "doacoes_ifpr"; // Define com qual base será realizada a conexão

    // Estabelece a conexão com o BD
    $conn = mysqli_connect($hostBD, $userBD, $senhaBD, $database);

    // Verifica se há erro na conexão
    if(!$conn){
        // O die() mata a execução do script caso o banco falhe, impedindo que o resto do site carregue quebrado
        die("<p>Erro crítico ao conectar à base de dados <strong>$database</strong>: " . mysqli_connect_error() . "</p>");
    }

    // Força o padrão UTF-8 para garantir que acentos (ç, ã, é) venham corretos do banco de dados
    mysqli_set_charset($conn, "utf8mb4");
