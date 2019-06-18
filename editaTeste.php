<?php
include("loginValida.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Editar Teste</title>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/navegacao2.css">
    </head>

    <body>

        <div class="destaque">
        <?php
        $nomeTeste = $_POST['nomeTeste'];
        $idTeste = $_POST['idTeste'];
        echo "<h3>Editar nome do teste: <em>".$idTeste." -  " . $nomeTeste . "</em></h3>";
        ?>
        </div>
     
        <ul class="navega">
          <li><a href="inicio.php" title="Retorna para o início"><i class="fa">&#xf015;</i> Inicio</a></li>
          <li><a href="meusTestes.php" title="Retorna para os Meus Testes">Meus testes</a></li>
          <li><a href="#" class="active">Editar teste</a></li>
          <a class="sair" href="logout.php" title="Encerra acesso"><i class="fa">&#xf08b;</i> Logout</a>
        </ul>
        
        <div class="inclusao">
        <div id='btnmeio'>
            <h4>Informe o novo nome do teste:</h4>
            
            <label>   
            <form method="POST" action="salvaEditaTeste.php" >
                <input type="text" name="nomeNovo" size="80" required value="<?php echo $nomeTeste ?>">
                <?php
                echo "<input value='" . $idTeste . "' name='idTeste' type='hidden'> " .
                "<input value='".$nomeTeste."' name='nomeTeste' type='hidden'>";
                ?> 
                <input type="submit" id="salva" value="  Salvar  ">
            </form>
            </label>
               
            <label>
                <input type="button" onclick="window.location.href='meusTestes.php';" value="Cancelar">
            </label>
               
        </div><br>
        </div>
        
    </body>
</html>