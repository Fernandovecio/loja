<?php include('config.php'); ?>
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
      <legend>Cadastro de Cliente</legend>
      <form action="registraCliente.php" method="post" class="form" enctype="multipart/form-data">
        <div class="card col-4 offset-4">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Foto do cliente" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Foto do cliente</text>
          </svg>
        </div>
        <div class="mb-3 form-group">
          <label for="fotoId" class="form-label">Foto</label>
          <input type="file" name="foto" id="fotoId" class="form-control" >
          <div id="helperFoto" class="form-text">Importe a foto</div>
        </div>
        <div class="mb-3 form-group">
          <label for="nomeId" class="form-label">Nome</label>
          <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome" >
          <div id="helperNome" class="form-text">Informe o nome completo</div>
        </div>
        <div class="mb-3 form-group">
          <label for="emailId" class="form-label">E-mail</label>
          <input type="email" name="email" id="emailId" class="form-control" placeholder="Informe o e-mail" >
          <div id="helperEmail" class="form-text">Informe o e-mail</div>
        </div>
        <div class="mb-3 form-group">
          <label for="cpfId" class="form-label">CPF</label>
          <input type="number" name="cpf" id="cpfId" class="form-control" placeholder="Informe seu CPF" >
          <div id="helperCpf" class="form-text">Informe seu CPF</div>
        </div>
        <button type="submit" class="btn btn-dark">Enviar</button>
        <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>
      </form>
    </fieldset>
  </div>
  <?php include("rodape.php"); ?>
  <script src="js/base64.js"></script>
</body>
</html>