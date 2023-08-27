<?php require_once "validador_acesso.php"?>
<!--escolhendo o require_once pq é de suma importancía que hája um fatal erro ou que venha 100% se ela não puder ser realizada a aplicação ñ vai poder ser acessado
(once pq a autenticação será so uma vez) 
-->
<?php 
  $chamados = [];

  $arquivo = fopen('arquivo.hd', 'r');
  while(!feof($arquivo)){
    $registro = fgets($arquivo);
    $chamados[] = $registro;

  }

  fclose($arquivo);

?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <ul class="navbar-nav">
        <li class="navbar-item">
          <a href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <div class="card mb-3 bg-light">
              <?php
                foreach($chamados as $chamado){ 
                  $chamado_dado = explode('#', $chamado);

                    if($_SESSION['perfil_id'] == 2){
                      
                      if($_SESSION['id'] != $chamado_dado[0]){
                        continue;
                      }
                    }

                  if(count($chamado_dado) < 3){
                    continue;
                  } ?>

                <div class="card-body">
                  <h5 class="card-title"><?= $chamado_dado[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dado[2] ?></h6>
                  <p class="card-text"><?= $chamado_dado[3] ?></p>
                </div>
                
              <?php } ?>
              </div>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="abrir_chamado.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>