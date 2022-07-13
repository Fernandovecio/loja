<?php

    require_once('repository/ClienteRepository.php');
    require_once('util/base64.php');
    require_once('util/upload.php');

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    
    $foto = converterBase64($_FILES['foto']);
    $arquivo = uploadArquivo($_FILES['arquivo']);

    if(empty($nome) || empty($email) || empty($cpf) || empty($foto) || empty($arquivo) ) {
        $msg = "Preencher todos os campos primeiro.";
    } else {
        if(fnAddCliente($nome, $foto, $email, $cpf, $arquivo)) {
            $msg = "Sucesso ao gravar";
        } else {
            $msg = "Falha na gravação";
        }
    }
    
    $page = "formulario-cadastro-cliente.php";
    setcookie('notify', $msg, time() + 10, "loja/{$page}", 'localhost');
    header("location: {$page}");
    exit;