<link rel="stylesheet" href="css/estilos.css">   
<?php
include_once("dbConecta.php");
 
        $nomeTeste = $_POST['none'];
        $sql = "INSERT INTO teste(nomeTeste)VALUES('$nomeTeste')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='aviso'>".
                "<strong>Novo teste cadastrado como: <ins>".$nomeTeste."</ins></strong>".
                "</div><br>".
                 "<div class='center'>".
                 "<input type=button onclick=window.location.href='meusTestes.php'; value='Retornar para Meus Testes'>".
                 "</div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
?>
