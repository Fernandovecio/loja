<?php 
    include('config.php'); 
    require_once('repository/ClienteRepository.php'); 
    
    $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

?>
<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="col-6 offset-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Data cadastro</th>
                    <th colspan="2">Gerenciar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(fnLocalizaClientePorNome($nome) as $cliente): ?>
                <tr>
                   <td><?= $cliente->id ?></td> 
                   <td><?= $cliente->nome ?></td>
                   <td><?= $cliente->email ?></td> 
                   <td><?= $cliente->cpf ?></td> 
                   <td><?= $cliente->created_at ?></td> 
                   <td><a href="#" onclick="gerirUsuario(<?= $cliente->id ?>, 'edit');">Editar</a></td> 
                   <td><a onclick="return confirm('Deseja realmente excluir?') ? gerirUsuario(<?= $cliente->id ?>, 'del') : '';" href="#">Excluir</a></td> 
                </tr>
                <?php endforeach; ?>
            </tbody>
            <?php if(isset($notificacao)) : ?>
            <tfoot>
                <tr>
                    <td colspan="7"><?= $_COOKIE['notify'] ?></td>
                </tr>
            </tfoot>
            <?php endif; ?>
        </table>
    </div>
    <?php include("rodape.php"); ?>
    <script>
        window.post = (data) => {
            return fetch(
                'set-session.php',
                {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(data)
                }
            )
            .then(response => {
                console.log(`Requisição completa! Resposta:`, response);
            });
        }

        function gerirUsuario(id, action) {
            
            post({data : id});

            url = 'excluirCliente.php';
            if(action === 'edit')
                url = 'formulario-edita-cliente.php';
            
            window.location.href = url;
        }
    </script>
    <div class="content">
            <?php foreach(fnLocalizaClientePorNome($nome) as $cliente): ?>
                <div class="card">
                    <div class="topCard">
                        <h2 class="title">Nome: <td><?= $cliente->nome ?></td></h2>
                        <span class="secondText">Email: <td><?= $cliente->email ?></td></span>
                    </div>
                    <div class="mediaCard">
                    <img src="<?= $cliente->foto ?>" >
                    </div>
                    <div clas="bottomCard">
                        <p class="bottomText">CPF: <td><?= $cliente->cpf ?></td></p>
                        <div class="actionsCard"></div>   
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
  </body>
</html>