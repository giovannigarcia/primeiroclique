<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
<title>Teste de primeiro click</title>

          <meta name="viewport" content="width=device-width, initial-scale=1">
          
    <link rel="stylesheet" href="css/estilos.css">

  <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
    <script>
        $(document).ready(function(){
          $("#myBtn").click(function(){
            $("#myModal").modal();
          });
        });
    </script>
  
  <style>
  .modal-header, h4, .close {
    background-color: #5cb85c;
    color:white !important;
    text-align: center;
    font-size: 36px;
  }
  .modal-footer {
    background-color: #f9f9f9;
  }
  </style>
    </head>
    <body>
            <div class="box">
            <center><img src="imagens/click.png"></img></center>
            <h1 class="titulo">Teste de primeiro clique</h1>
            <button id="myBtn" class='botao corVerde'>Acessar</button>
            </div>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action='login.php' method="POST">
            <div class="form-group">
              <label for="usuario"><span class="glyphicon glyphicon-user"></span> Usuário</label>
              <input type="text" class="form-control" name="usuario" required placeholder="Entre com o nome de Usuário">
            </div>
            <div class="form-group">
              <label for="senha"><span class="glyphicon glyphicon-eye-open"></span> Senha</label>
              <input type="password" class="form-control" name="senha" requerid placeholder="Entre com sua Senha">
            </div>            
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Acessar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>

        </div>
      </div>
      
    </div>
  </div> 
</div>
 
    </body>
</html>