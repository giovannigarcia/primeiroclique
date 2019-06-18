<?php
session_start();
include('dbConecta.php');
 
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
<title>Acessando</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        
<?php
$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT usuario from users where usuario = '{$usuario}' and senha = '{$senha}'";
 
$result = mysqli_query($conn, $query);
 
$row = mysqli_num_rows($result);
 
if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	echo "<div class='aviso' >
              <h1>Acessando o Sistema</h1>
            </div><br>
          <center><p><i class='fa fa-spinner w3-spin' style='font-size:80px; color:green'></i></p></center>
          <meta http-equiv='refresh' content=2;url='inicio.php'>";
//	header('refresh=3;location:inicio.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	echo "<div class='alerta'>
            <h1>Acesso negado</h1>
          <h3>Usuário ou senha inválidos.</h3>
       </div>
       <meta http-equiv='refresh' content=2;url='index.php'>";
//	header('refresh=3;location:index.php');
	exit();
}
?>
    </body>
</html>
