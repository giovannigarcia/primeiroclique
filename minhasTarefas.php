<?php
//session_start();
include('loginValida.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Minhas Tarefas</title>
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/tabela1.css">
        <link rel="stylesheet" href="css/navegacao2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <?php
        $idTeste = $_POST["idTeste"];
        $nomeTeste = $_POST["nomeTeste"];
        echo "<h3>Minhas Tarefas do Teste: <ins>" . $nomeTeste . "</ins></h3>";
        ?>
        
        <ul class="navega">
        <li><a href="inicio.php" title="Retorna para o início"><i class="fa">&#xf015;</i> Inicio</a></li>
          <li><a href="meusTestes.php" title="Retorna para os Meus Testes">Meus testes</a></li>
          <li><a href="#" class="active">Minhas tarefas</a></li>
          <a class="sair" href="logout.php" title="Encerra acesso"><i class="fa">&#xf08b;</i> Logout</a>
        </ul>
        
        <?php
        echo "<form action='novaTarefa.php' method='POST' id='tarefaNova'>" .
        "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>" .
        "<input value='" . $idTeste . "' name='idTeste' type='hidden'>" .
        "</form>";
        ?>
        <button class="botao corVerde" onClick="document.getElementById('tarefaNova').submit();"><i class="fa">&#xf067;</i>  Criar nova Tarefa</button>
        <br><br>
        
            <?php
            include_once("dbConecta.php");
            $sql = "SELECT * FROM tarefa WHERE Teste_idTeste=" . $idTeste . "";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table class='tabela2'>".
                "<tr>".
                    "<th></th>".
                    "<th>Nº</th>".
                    "<th>Descrição da tarefa</th>".
                    "<th>Tarefa</th>".
                    "<th>Resultado</th>".
                    "<th>Mapa de calor</th>".
                "</tr>";
                while ($row = $result->fetch_assoc()) {                   
                    echo 
                    "<td style='width:80px;'><label>".
                    "<form action='deletaTarefa.php' id:delTest name:deletarTarefa method='POST' >" .     
                    "<input  value='" . $row['idTarefa'] . "' name='idTarefa' type='hidden'>" .
                    "<input  value='" . $row['descricao'] . "' name='descricao' type='hidden'>" .
                    "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>" .
                    "<input value='" . $idTeste . "' name='idTeste' type='hidden'>" .
                   "<button class='btn btn-circle' title='Deletar'><i class='fa'>&#xf1f8;</i></button></form>".
                   "</label>". 
                    "<label><form action='editaTarefa.php' id:editTar name:editarTarefa method='POST' >" .     
                    "<input  value='" . $row['idTarefa'] . "' name='idTarefa' type='hidden'>" .
                    "<input  value='" . $row['descricao'] . "' name='descricao' type='hidden'>" .
                     "<input  value='" . $row['link'] . "' name='link' type='hidden'>" .
                    "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>" .
                    "<input value='" . $idTeste . "' name='idTeste' type='hidden'>" .
                   "<button class='btn btn-circle'title='Editar'><i class='fa'>&#xf044;</i></button></form>".
                   "</label></td>".
                    "<td>".
                    "<form action='tarefa.php' method='POST'>" .
                    "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>" .
                    "<input value='" . $idTeste . "' name='idTeste' type='hidden'>" .
                    "<input  value='" . $row["link"] . "' name='link' type='hidden'>" .
                    "<input  value='" . $row["idTarefa"] . "' name='idTarefa' size='5' readonly style='border:0px; background-color:transparent;'>" .
                    "</td>".
                    "<td>".
                    "<input  value='" . $row['descricao'] . "' name='descricao' size='100' readonly style='border:0px; background-color:transparent;'>" .
                    "</td>".
                    "<td>".
                    "<input id='btntab' type='submit' value='   Abrir   ' name='abrir' title='Abrir a Tarefa'></form>".
                    "</td>".
                    "<td>".
                    "<form action='resultado.php' method='POST'>" .
                    "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>" .
                    "<input value='" . $idTeste . "' name='idTeste' type='hidden'>" .
                    "<input  value='" . $row["idTarefa"] . "' name='idTarefa' type='hidden'>" .
                    "<input  value='" . $row['descricao'] . "' name='descricao' type='hidden'>".
                    "<input  value='" . $row["link"] . "' name='link' type='hidden'>" .
                    "<input id='btntab' type='submit' value='Consultar' name='resultado' title='Ver os resultados'></form>".
                    "</td>".
                    "<td>".
                    "<form action='mapaCalor.php' method='POST' target='_black'>" .
                    "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>" .
                    "<input value='" . $idTeste . "' name='idTeste' type='hidden'>" .
                    "<input  value='" . $row["idTarefa"] . "' name='idTarefa' type='hidden'>" .
                    "<input  value='" . $row['descricao'] . "' name='descricao' type='hidden'>".
                    "<input  value='" . $row["link"] . "' name='link' type='hidden'>" .
                    "<input id='btntab' type='submit' value='Visualizar' name='mapa' title='Ver o mapa de calor'></form>" .
                    "</td></tr>";
                }
            } else {
                echo "<div class='alerta'>Nenhuma Tarefa cadastrada</div>";
            }
             echo "</table>";
            ?>

    </body>
</html>