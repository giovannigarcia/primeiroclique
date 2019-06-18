<!DOCTYPE html>
<html>
    <head>
<title>Teste de primeiro click</title>

    <script type="text/javascript">
    function fechar()
    {
        window.opener = window;
        window.close("#");
    }
    </script>
    
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>


    <body>
            <center><img src="imagens/click.png"></img></center>
            <h1 class="titulo">Teste de primeiro clique</h1>
            <br>
            
            <div class="destaque">
            <h2>OBRIGADO PELA SUA PARTICIPAÇÃO</h2>
            </div><br>
            
            <div id="btnmeio">
            <label>
            <form>                
                <button type="button" class="botao corVerm" id='fecha' name="Encerrar o teste" onclick="fechar()"><i class="fa fa-close"></i> Sair do Teste</button>
            </form>
            </label>
            </div>
            
    </body>
</html>