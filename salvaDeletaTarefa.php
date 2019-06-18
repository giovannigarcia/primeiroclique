<link rel="stylesheet" href="css/estilos.css">   
<?php
include_once("dbConecta.php");
        $idTeste = $_POST['idTeste'];
        $nomeTeste = $_POST['nomeTeste'];
        $idTarefa = $_POST['idTarefa'];
        $descricao = $_POST['descricao'];

        $sql = "DELETE FROM tarefa WHERE idTarefa = $idTarefa";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='aviso'>".
                "<form id='myTarefas' action='minhasTarefas.php' method='POST'>".
                "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>".
                "<input value='" . $idTeste . "' name='idTeste' type='hidden'>".
                "<br><strong>A tarefa <ins>".$descricao."</ins> foi excluída com sucesso</strong>".
                "<br></div>".
                "<div id='btnmeio'>".
                "<input type='submit' value='Retornar para Minhas Tarefas'>".
                "</form></div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
?>