<?php
    require_once('repository/ClienteRepository.php');
    $nome = filter_input(INPUT_POST, 'nomeCliente', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: listagem-de-clientes.php?nome={$nome}");
    exit;