<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Meus Testes</title>
         <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body> 
        
<?php

if (!isset($_SESSION['usuario'])){
    echo "<div class='alerta'>
            <h1><i class='fa'>&#xf071;</i> Acesso negado</h1>
          <h3>Realize Login para acessar o sistema.</h3>
       </div>
       <meta http-equiv='refresh' content=3;url='index.php'>";
	exit();
}
?>

    </body>
</html>