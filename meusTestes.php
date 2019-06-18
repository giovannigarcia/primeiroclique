<?php
//session_start();
include('loginValida.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Meus Testes</title>

        <script >
            function toggle(obj) {
                var el = document.getElementById(obj);
                if (el.style.display !== "none") {
                    el.style.display = 'none';
                } else {
                    el.style.display = '';
                }
            }
        </script>
        
         <link rel="stylesheet" href="css/estilos.css">
         <link rel="stylesheet" href="css/tabela1.css">
         <link rel="stylesheet" href="css/navegacao2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        
       <h3 > Meus Testes de Primeiro Clique</h3>
        
        <ul class="navega">
        <li><a href="inicio.php" title="Retorna para o Início"><i class="fa">&#xf015;</i> Inicio</a></li>
        <li><a href="#" class="active">Meus testes</a></li>
        <a class="sair" href="logout.php" title="Encerra acesso"><i class="fa">&#xf08b;</i> Logout</a>
        </ul>
        
        <p><button class="botao corVerde" onclick="toggle('novoteste');"><i class="fa">&#xf067;</i>  Criar novo Teste</button></p>

        <div class="inclusao" id="novoteste" style="display:none">
            <p><i style="font-size:24px" class="fa">&#xf0a6;</i><mark>Clique novamente no botão para fechar</mark></p>
            <div id="btnmeio">
            <form action="salvaTeste.php" method="POST">
                Novo teste: 
                <input type="text" name="none" size="80" required placeholder="Digite o nome do teste">
                <input type="submit" name="salvar" value="Salvar">
            </form>
            </div>
        </div>
        
        <?php
            include_once("dbConecta.php");
            $sql = "SELECT * FROM teste";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {   
                echo "<table>".
               "<tr>".
                    "<th></th>".
                    "<th>Nº</th>".
                    "<th>Nome do teste</th>".
                    "<th>Tarefas</th>".
                    "<th>Link do teste</th>".
                    "<th>Teste</th>".
                "</tr>";
                while ($row = $result->fetch_assoc()) {
                    $idTeste = $row['idTeste'];
                    $nomeTeste = $row['nomeTeste'] ;
                    echo 
                     "<td><label><form action='deletaTeste.php' id:delTest name:deletarTeste method='POST' >" .     
                    "<input  value='" . $row['idTeste'] . "' name='idTeste' type='hidden'>" .
                    "<input  value='" . $row['nomeTeste'] . "' name='nomeTeste' type='hidden'>" .
                   "<button class='btn btn-circle' title='Deletar'><i class='fa'>&#xf1f8;</i></button></form></label>".
                    "<label><form action='editaTeste.php' id:editTest name:editarTeste method='POST' >" .     
                    "<input  value='" . $row['idTeste'] . "' name='idTeste' type='hidden'>" .
                    "<input  value='" . $row['nomeTeste'] . "' name='nomeTeste' type='hidden'>" .
                   "<button class='btn btn-circle'title='Editar'><i class='fa'>&#xf044;</i></button></form></label></td>".
                    "<td><form action='minhasTarefas.php' method='POST'>" .     
                    "<input  value='" . $row['idTeste'] . "' name='idTeste' size='5' readonly style='border:0px; background-color:transparent;'></td>" .
                    "<td><input  value='" . $row['nomeTeste'] . "' name='nomeTeste' size='50' readonly style='border:0px; background-color:transparent;'></td>" .
                    "<td><input id='btntab' type='submit' value='Acessar' name='acessar' title='Acessa as Tarefas'></form></td>".
                     "<td><input  value='https://primeiroclique.000webhostapp.com/testeInicio.php?idTeste=" . $row['idTeste'] . "' name='linkIdTeste' size='55' readonly style='border:0px; background-color:transparent;'></td>" .
                    "<td><form action='testeInicio.php' method='GET' target='_black'>" .     
                    "<input  value='" . $row['idTeste'] . "' name='idTeste' type='hidden'>" .
                    "<input  value='" . $row['nomeTeste'] . "' name='nomeTeste' type='hidden'>" .
                    "<input id='btntab' type='submit' value='Abrir' title='Abre o Teste'></form></td></tr>";
                }               
            } else {
                echo "<div class='alerta'>Nenhum Teste cadastrado</div>";
            }
             echo "</table>";
            ?>
 
      
    </body>
</html>