<link rel="stylesheet" href="css/estilos.css">   
<?php
include_once("dbConecta.php");
        $idTeste = $_POST['idTeste'];
        $nomeTeste = $_POST['nomeTeste'];

        $sql = "DELETE FROM teste WHERE idTeste = $idTeste";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='aviso'><strong>O teste <ins>".$nomeTeste."</ins> foi excluído com sucesso</strong><br></div>".
                 "<div id='btnmeio'>".
                 "<form action='meusTestes.php'><input type='submit' value='Retornar para Meus Testes'>".
                 "</form></div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
?>