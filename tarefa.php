<?php
//session_start();
include('loginValida.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tarefa</title>
        
       <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script type="text/javascript">
            $(document).ready(function () {
                $("iframe").load(function () {
                    $(this).contents().on("mousedown, mouseup, click", function (e) {
                        var evt = e ? e : window.event;
                   //     var elem = ee ? ee : attr('id');
                        var clickX = 0, clickY = 0;
                        var elemento = "";
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
                     elemento = e.target.id;
                     location.replace("https://primeiroclique.000webhostapp.com/salvaClick.php?x="+clickX+"&y="+clickY+"&idTarefa="+idTarefa+"&elemento="+elemento+"&idTeste="+idTeste+"&nomeTeste="+nomeTeste);
                  //  location.replace("salvaClick.php?x="+clickX+"&y="+clickY+"&idTarefa="+idTarefa);
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
        $idTeste = $_POST['idTeste'];
        $nomeTeste = $_POST['nomeTeste'];
        $idTarefa = $_POST['idTarefa'];
        echo "<script>".
                "var idTarefa = '".$idTarefa."';".
                "var idTeste = '".$idTeste."';".
                "var nomeTeste = '".$nomeTeste."';".
             "</script>";
        
        echo "<form id='myTarefa' action='minhasTarefas.php' method='POST'>".
                    "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>".
                    "<input value='" . $idTeste . "' name='idTeste' type='hidden'></form>";
                    
        echo "<h3>Tarefa <ins>".$idTarefa."</ins> do Teste <ins>".$nomeTeste."</ins></h3>";
            
        ?>
     
        <ul class="navega">
            <li><a href="inicio.php" title="Retorna para o Início"><i class="fa">&#xf015;</i> Inicio</a></li>
          <li><a href="meusTestes.php" title="Retorna para os Meus Testes">Meus testes</a></li>
          <li><a href="javascript:document.getElementById('myTarefa').submit()" title="Retorna para as Minhas Tarefas">Minhas tarefas</a></li>
          <li><a href="#" class="active">Tarefa</a></li>
          <a class="sair" href="logout.php" title="Encerrar acesso"><i class="fa">&#xf08b;</i> Logout</a>
        </ul>
        
         <div class='center'>
        <?php
        include_once("dbConecta.php");
        $sql = "SELECT * FROM tarefa WHERE  Teste_idTeste=" . $idTeste . " AND idTarefa=" . $idTarefa . "";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<strong style='width:80%;'>" . $row["descricao"] . "<strong><br>";
            echo "<input type='text' disabled id='site' style='width:70%;' value='" . $row["link"] . "'>";
        }
        ?>
        <input type="button" id="visualiza" value="Visualizar a página" onclick="a()" >
        
        <iframe id='frame' width='1200px' height='600px' src='' sandbox="allow-same-origin allow-scripts"></iframe>
       </div>
       
    </body>
</html>