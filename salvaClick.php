<link rel="stylesheet" href="css/estilos.css">   
<?php
include_once("dbConecta.php");
$x = $_GET['x'];
$y = $_GET['y'];
$elemento = $_GET['elemento'];
$idTarefa = $_GET['idTarefa'];
$idTeste = $_GET['idTeste'];
$nomeTeste = $_GET['nomeTeste'];
//echo "X: $x Y:  $y - Elemeto:  $elemento  - idTarefa:  $idTarefa - nome teste:  $nomeTeste - id: $idTeste<br>";

$sql = "INSERT INTO resultado (coordX, coordY, elementoClick, Tarefa_idTarefa) VALUES ('$x','$y','$elemento','$idTarefa')";
if ($conn->query($sql) === TRUE) {
    echo "<div class='aviso'>"
    . "<br><strong>Tarefa foi realizada e os dados cadastradados</strong><br>"
    . "</div>";
 // header("Refresh: 3; url = meusTestes.php");
 
 ?>
    <div class='center'><br>
    <input type=button onclick="javascript:document.getElementById('myTarefas').submit()"; value='Retornar para Minhas Tarefas'>
    </div>
   <?php
   echo "<form action='minhasTarefas.php' method='POST' id='myTarefas'>" .
        "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>" .
        "<input value='" . $idTeste . "' name='idTeste' type='hidden'>".
       // "<input type='submit' value='Retorna para Minhas Tarefas'>".
    "</form></div>" ;
 
 //  echo "<div class='centro'><a href='meusTestes.php'><button class='botao'>Retorna aos Meus Testes</button></a></div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>