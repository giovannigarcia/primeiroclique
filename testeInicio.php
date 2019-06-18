<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    <title>Teste de primeiro click</title>
   
    <script type="text/javascript">
    function iniciar()
    {
        location.href = "testeTarefa.php";
    }
    </script>
    
    <link rel="stylesheet" href="css/estilos.css">    
    </head>


    <body>
            <center><img src="imagens/click.png"></img></center>
            <h1 class="titulo">Teste de primeiro clique</h1>
            <br>
        
        <?php
        $nomeTeste = $_GET['nomeTeste'];
        $idTeste = $_GET['idTeste'];
        
        include_once("dbConecta.php");
        $sql = "SELECT * FROM tarefa WHERE Teste_idTeste=" . $idTeste . "";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { 
                    $obj[] = $row["idTarefa"];
                }
                $idTarefa = $obj[0];
                $_SESSION['arrayTarefas'] = $obj;
                $_SESSION['idTarefa'] = $idTarefa;
                ?>
                
                <h2>Seja bem vindo</h2>
                <br>
            <div class='aviso'>    
                <h4>Procedimentos para realizar o teste</h4>
                <div style='margin: 0 30%; text-align: left;'>
                    <ol type='1'>
                    <li>Leia a descrição da tarefa</li>
                    <li>Clique no botão "Visualizar"</li>
                    <li>Aguarde a página carregar totalmente</li>
                    </ol>
                </div>
                
            </div>
                <br>
            <div class='center'>
                <form>                
                    <button type="button" class="botao corVerde" id='iniciaTeste' name="iniciar o teste" onclick="iniciar()">Iniciar o teste <i class="fa fa-caret-right"></i></button>
                </form>
            </div>
             <?php   
            }else{
                echo "<div class='alerta'><h4>Nenhuma Tarefa foi criada neste Teste</h4></div><br>".
                "<div id='btnmeio'>".
                "<button type='button' class='botao corVerm' onclick='javascript:window.close();'><i class='fa fa-times'></i> Fechar </button>".
                "</div>";
            }
     
        $_SESSION['idTeste'] = $idTeste;
    //    $_SESSION["nroTarefas"] = $arrlength;
        $_SESSION['idArray'] = 0;
        ?>
        
    </body>
</html>