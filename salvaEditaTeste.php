<link rel="stylesheet" href="css/estilos.css">   
<?php
include_once("dbConecta.php");
        $idTeste = $_POST['idTeste'];
        $nomeTeste = $_POST['nomeTeste'];
        $nomeNovo = $_POST['nomeNovo'];
    //   echo "id: ".$idTeste." - nome: ".$nomeTeste." - novo: ". $nomeNovo."";
        $sql = "UPDATE teste SET nomeTeste = '$nomeNovo' WHERE idTeste = $idTeste";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='aviso'>".
                "<strong>O nome do teste <ins>".$nomeTeste."</ins> foi alterado para: <ins>".$nomeNovo."</ins></strong>".
                "</div><br>".
                 "<div class='center'>".
                 "<input type='button' onclick=\"window.location.href='meusTestes.php';\" value='Retornar para Meus Testes'>".
                 "</div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
?>