<?php
session_start();
?>

<link rel="stylesheet" href="css/estilos.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php

$x = $_GET['x'];
$y = $_GET['y'];
$elemento = $_GET['elemento'];
$idTarefa = $_SESSION['idTarefa'];

include_once("dbConecta.php"); 
$sql = "INSERT INTO `resultado` (`coordX`, `coordY`, `elementoClick`, `Tarefa_idTarefa`) VALUES ('$x','$y','$elemento', '$idTarefa')";
    if ($conn->query($sql) === TRUE) {
 //   echo "<div class='aviso'>".
 //       "<br><strong>Tarefa foi realizada e os dados cadastradados</strong><br><br>".
 //       "</div>";
 //       verificaProximo();
        
       echo "<meta http-equiv='refresh' content=0;url='testeTransicao.php'>";
//	header('location:testeTransicao.php');
	exit();
        
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

  function verificaProximo(){

        $_SESSION['idArray'] = $_SESSION['idArray']+1;
        $arrlength = count($_SESSION['arrayTarefas']); 
        if($_SESSION['idArray'] < $arrlength){
                $idTarefa = $_SESSION['arrayTarefas'][$_SESSION['idArray']];
                $_SESSION['idTarefa'] = $idTarefa;
                echo "<h3>CONTINUA TESTE<h3>";
                echo "<a href='testeTarefa.php'><button class='botao corVerde'>Continuar <i class='fa'> &#xf054;</i></button></a>";
        //      header("Refresh: 12; url = testeTarefa.php");
        } else{
            echo "<h3>TERMINA TESTE<h3>";
            echo "<a href='testeFim.php'><button class='botao corVerm'>Finalizar <i class='fa'> &#xf00d;</i></button></a>";
       //    header("Refresh: 12; url = testeFim.php");
        }
 }
 
?>