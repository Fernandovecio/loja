<?php
    require_once('repository/ClienteRepository.php');
    require_once('util/base64.php');
    require_once('util/upload.php');
    session_start();

    $id = filter_input(INPUT_POST, 'idCliente', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);

    $foto = converterBase64($_FILES['foto']);
    $arquivo = uploadArquivo($_FILES['arquivo']);


    if(fnUpdateCliente($id, $nome, $foto, $email, $cpf, $arquivo)) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na gravação";
    }
    
    $_SESSION['id'] = $id;
    $page = "formulario-edita-cliente.php";
    setcookie('notify', $msg, time() + 10, "loja/{$page}", 'localhost');
    header("location: {$page}");
    exit;