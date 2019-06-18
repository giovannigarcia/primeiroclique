<?php
session_start();
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
                     location.replace("https://primeiroclique.000webhostapp.com/testeTarefaSalva.php?x="+clickX+"&y="+clickY+"&idTarefa="+idTarefa+"&elemento="+elemento);
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

    </head>
    <body>
        <h3>Teste de primeiro clique</h3>

         <?php
        $idTeste = $_SESSION["idTeste"];
        $idTarefa = $_SESSION['idTarefa'];
        echo  "<script>var idTarefa = '".$idTarefa."';</script>";
        include_once("dbConecta.php");
        $sql = "SELECT * FROM tarefa WHERE  Teste_idTeste=" . $idTeste . " AND idTarefa=" . $idTarefa . "";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            echo
                "<div class='destaque'>".
                "<strong>".$row["descricao"]."   </strong>".
                "<input id='site' size='160px' value='".$row["link"]."' type='hidden' readonly style='border:0px;'>";
        }
        echo "<input type='button' id='visualiza' value='Visualizar a página' onclick='a()' >".
            "<a href='https://primeiroclique.000webhostapp.com/testeTransicao.php'><button id='btn' class='botao corVerde'> Próximo <i class='fa fa-chevron-right'></i></button></a>";
        ?>
        </div><br>
        <div class='center'>
        <iframe id='frame' src="" width='1200px' height='600px' sandbox='allow-same-origin allow-scripts'></iframe>
        </div>
        <?php    
        } else{
            echo "<div class='alerta'><h4>Nenhuma Tarefa foi criada neste Teste</h4></div><br>".
                "<div id='btnmeio'>".
                "<a href='#' class='botao2' onclick='javascript:window.close();'>Fechar</a></div>";
        }
       ?>

    </body>
</html>