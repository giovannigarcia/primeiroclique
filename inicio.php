<?php
//session_start();
include('loginValida.php');
?>

<!DOCTYPE html>
<html>
    <head>
<title>Teste de primeiro click</title>
   
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    </head>
    <body>
            <div class="box">
            <center><img src="imagens/click.png"></img></center>
            <h1 class="titulo">Teste de primeiro clique</h1>
            <a href='meusTestes.php'><button class='botao corVerde'>Acessar Meus Testes</button></a>
            <br>
            <a href="logout.php"><button class='botao corVerm'><i class="fa">&#xf08b;</i>Sair</button></a>
            </div>
            
    </body>
</html>