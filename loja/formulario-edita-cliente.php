<?php 
    include('config.php');
    require_once('repository/ClienteRepository.php'); 
    if(isset($_SESSION['id']))
    $id = $_SESSION['id'];
    $cliente = fnLocalizaClientePorId($id);
?>
<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Cadastro Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php include('navbar.php'); ?>
    <div class="col-6 offset-3">
        <fieldset>
            <legend>Edição do Cliente</legend>
            <form action="editaCliente.php" method="post" class="form">
                <div>
                <div class="card col-4 offset-4 text-center">
                    <img src="<?= $cliente->foto ?>" id="tenisId" class="rounded" alt="foto do usuário">
                </div>
                    <input type="hidden" name="idCliente" id="clienteId"value="<?= $cliente->id ?>">
                </div>
                <div class="mb-3 form-group">
                    <label for="nomeId" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome" value="<?= $cliente->nome ?>">
                    <div id="helperNome" class="form-text">Informe o nome completo</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="emailId" class="form-label">E-mail</label>
                    <input type="email" name="email" id="emailId" class="form-control" placeholder="Informe o e-mail" value="<?= $cliente->email ?>">
                    <div id="helperEmail" class="form-text">Informe o e-mail</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="cpfId" class="form-label">CPF</label>
                    <input type="text" name="cpf" id="cpfId" class="form-control" placeholder="Informe seu CPF" value="<?= $cliente->cpf ?>">
                    <div id="helperCpf" class="form-text">Informe seu CPF</div>
                </div>
                <button type="submit" class="btn btn-dark">Enviar</button>
                <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE['notify']) ? $_COOKIE ['notify'] : '' ?></div>
            </form>
        </fieldset>
    </div>

    <?php include('rodape.php'); ?>
    <script src="js/js64.js"></script>
  </body>
</html>
