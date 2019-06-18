<?
include("loginValida.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Deletar Teste</title>
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
        echo "<h4>Deletar o teste: ".$idTeste." - " . $nomeTeste . "</h4>";
        ?>
        </div>
        
        <ul class="navega">
            <li><a href="inicio.php"><i class="fa">&#xf015;</i> Inicio</a></li>
          <li><a href="meusTestes.php" title="Retorna para os Meus Testes">Meus testes</a></li>
          <li><a href="#" class="active">Deletar teste</a></li>
          <a class="sair" href="logout.php"><i class="fa">&#xf08b;</i> Logout</a>
        </ul>

            <div id='btnmeio'>
                <h3>Você deseja deletar o teste?</h3>
                
                <label>
                    <form method="POST" action="salvaDeletaTeste.php" >
                    <?php
                    echo "<input value='" . $idTeste . "' name='idTeste' type='hidden'> " .
                    "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>";
                    ?>
                    <input type="submit" id="deleta" value="Sim">
                   </form>
                </label>
                
                <label>
                    <input type="button" onclick="window.location.href='meusTestes.php';" value="Não">
                </label>
                
            </div>
       
    </body>
</html>