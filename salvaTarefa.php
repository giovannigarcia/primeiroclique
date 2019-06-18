<link rel="stylesheet" href="css/estilos.css">   
<?php
include_once("dbConecta.php");
$idTeste = $_POST['idTeste'];
$nomeTeste = $_POST['nomeTeste'];
$descricao = $_POST['descricao'];
$link = $_POST['link'];
$sql = "INSERT INTO tarefa(descricao, link, Teste_idTeste) VALUES ('$descricao','$link', '$idTeste')";
if ($conn->query($sql) === TRUE) {
    echo "<div class='aviso'>".
    "<strong>Nova Tarefa cadastradada</strong>".
    "<br></div><br>" .
    "<div class='center'>".
    "<form action='minhasTarefas.php' method='POST'>" .
    "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>" .
    "<input value='" . $idTeste . "' name='idTeste' type='hidden'>" .
    " <input type='submit' name='retorna' value='Retornar para Minhas Tarefas'>" .
    "</form></div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>