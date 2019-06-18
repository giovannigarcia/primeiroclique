<?php
//session_start();
include('loginValida.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Nova Tarefa</title>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script type="text/javascript">
            $(document).ready(function () {
                $("iframe").load(function () {
                    $(this).contents().on("mousedown, mouseup, click", function (e) {
                        var evt = e ? e : window.event;
                        var clickX = 0, clickY = 0;
                        //Para compatibilidade com versões anteriores do IE   
                        if ((evt.clientX || evt.clientY) && document.body && document.body.scrollLeft != null) {
                            clickX = evt.clientX + document.body.scrollLeft;
                            clickY = evt.clientY + document.body.scrollTop;
                        }
                        //Para o IE
                        if ((evt.clientX || evt.clientY) && document.compatMode == 'CSS1Compat' &&
                                document.documentElement && document.documentElement.scrollLeft != null) {
                            clickX = evt.clientX + document.documentElement.scrollLeft;
                            clickY = evt.clientY + document.documentElement.scrollTop;
                        }
                        if (evt.pageX || evt.pageY) {
                            clickX = evt.pageX;
                            clickY = evt.pageY;
                        }
                        alert("Coordenadas do Click detectado no iframe. " + ' X: ' + clickX + '  , Y: ' + clickY);
                    });
                });
            });
        </script>

        <script>
            function a() {
                document.getElementById("frame").src = document.getElementById("site").value;
            }
        </script>
        
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/navegacao2.css">
    </head>

    <body>

        <?php
        $nomeTeste = $_POST['nomeTeste'];
        $idTeste = $_POST['idTeste'];
        echo "<h3>Nova Tarefa para o Teste: <ins>" . $nomeTeste . "</ins></h3>";
        
        echo "<form id='myTarefas' action='minhasTarefas.php' method='POST'>".
                    "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>".
                    "<input value='" . $idTeste . "' name='idTeste' type='hidden'></form>";
        ?>
     
        <ul class="navega">
          <li><a href="inicio.php" title="Retorna para o início"><i class="fa">&#xf015;</i> Inicio</a></li>
          <li><a href="meusTestes.php" title="Retorna para os Meus Testes">Meus testes</a></li>
          <li><a href="javascript:document.getElementById('myTarefas').submit()" title="Retorna para as Minhas Tarefas">Minhas tarefas</a></li>
          <li><a href="#" class="active">Nova Tarefa</a></li>
          <a class="sair" href="logout.php" title="Encerra acesso"><i class="fa">&#xf08b;</i> Logout</a>
        </ul>

    <div class="center">
        <div class="inclusao">
            <form method="POST" action="salvaTarefa.php" >
                Descrição: <input type="text" name="descricao" style='width:85%;' required placeholder='Descreva a tarefa'><br>
                Link: <input type="text" id="site" name="link" style='width:70%;' required placeholder='Insira o endereço URL'>
                <?php
                echo "<input value='" . $idTeste . "' name='idTeste' type='hidden'> " .
                "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>";
                ?>                
                <input type="button" id="visualiza" value="visualizar" onclick="a()">
                <input type="submit" id="salva" value="Salvar">
               </form>
        </div>
       
            <iframe id="frame" src="" width="1200px" height="600px"></iframe>
    </div>
    
    </body>
</html>