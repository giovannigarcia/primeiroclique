<?php
include("loginValida.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Deletar Tarefa</title>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/navegacao2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <div class="alerta">
        <?php
        $nomeTeste = $_POST['nomeTeste'];
        $idTeste = $_POST['idTeste'];
        $idTarefa = $_POST['idTarefa'];
        $descricao = $_POST['descricao'];
        
        echo "<h4>Deletar a tarefa: ".$idTarefa." - ". $descricao ."</h4>";
        ?>
        </div>
        
        <ul class="navega">
          <li><a href="inicio.php" title="Retorna para o início"><i class="fa">&#xf015;</i> Inicio</a></li>
          <li><a href="meusTestes.php" title="Retorna para os Meus Testes">Meus testes</a></li>
          <li><a href="javascript:document.getElementById('myTarefas').submit()" title="Retorna para as Minhas Tarefas">Minhas tarefas</a></li>
          <li><a href="#" class="active">Deletar tarefa</a></li>
          <a class="sair" href="logout.php" title="Encerra acesso"><i class="fa">&#xf08b;</i> Logout</a>
        </ul>

            <div id='btnmeio'>
                <h3>Você deseja deletar a tarefa?</h3>
                
                <label>
                    <form method="POST" action="salvaDeletaTarefa.php" >
                    <?php
                    echo "<input value='" . $idTarefa . "' name='idTarefa' type='hidden'> " .
                    "<input value='" . $descricao . "' name='descricao' type='hidden'>".
                    "<input value='" . $idTeste . "' name='idTeste' type='hidden'> " .
                    "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>";
                    ?>
                    <input type="submit" id="deleta" value="Sim">
                   </form>
                </label>
                
                <label>
                      
              <form id='myTarefas' action='minhasTarefas.php' method='POST'>
              <?php
              echo "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>".
                    "<input value='" . $idTeste . "' name='idTeste' type='hidden'>";
              ?>
                    <input type="submit" id="cancela" value="Não">
                    </form>
          <!--          <input type="button" onclick="window.location.href='meusTestes.php';" value="Não"> -->
                </label>
                
            </div>
       
    </body>
</html>