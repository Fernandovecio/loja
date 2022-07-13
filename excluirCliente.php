<?php

    require_once('repository/ClienteRepository.php');
    session_start();

    if(fnDeleteCliente($_SESSION['id'])) {
        $msg = "Sucesso ao apagar";
    } else {
        $msg = "Falha ao apagar";
    }

    unset($_SESSION['id']);

    $page = "listagem-de-clientes.php";
    setcookie('notify', $msg, time() + 10, "/loja/{$page}", 'localhost');
    header("location: {$page}");
    exit;