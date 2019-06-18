<?php
include("loginValida.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mapa de Calor</title>

        <style>
            #heatmapContainerWrapper { width:100%; height:100%; position:absolute; }
            #heatmapContainer { width:100%; height:1000%; }
            iframe { position:absolute; left:0; top:0; padding:0px; width:1200px; height:100%; min-height:600px;}
        </style>
        
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
         <script language="Javascript" type="text/javascript">
         
            function iframeAutoHeight(altura){
                if(navigator.appName.indexOf("Internet Explorer")>-1){ //ie sucks
                    var func_temp = function(){
                        var val_temp = altura.contentWindow.document.body.scrollHeight + 15
                        altura.style.height = val_temp + "px";
                    }
                    setTimeout(function() { func_temp() },100) //ie sucks
                }else{
                    var val = altura.contentWindow.document.body.parentNode.offsetHeight + 15
                    altura.style.height= val + "px";
                }    
            }
            
        </script>
        
     </head>
    <body>
      <div class="center">
          <label>
        <?php
        $idTarefa = $_POST["idTarefa"];
        $descricao = $_POST["descricao"];
        $link = $_POST["link"];
        echo "<h3>Mapa de calor da Tarefa: " . $idTarefa . " - <ins>". $descricao ."</ins></h3>";
        ?>
        </label>
        <label style="float: auto;">
        <button  class="botao corVerm" onclick="javascript:window.close();" title="Fechar o Mapa de Calor"><i class="fa">&#xf00d;</i> Fechar</button>
        </label>
        </div>
          
            <div id="heatmapContainerWrapper">
                <div id="heatmapContainer">
                </div>
                
        <?php
        echo "<iframe name='frame' src='".$link."' onload='iframeAutoHeight(this)' ></iframe>";
            
        include_once("dbConecta.php");
        $sql = "SELECT * FROM resultado WHERE Tarefa_idTarefa=" . $idTarefa . "";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<script type='text/javascript'>
                window.onload = function() {  
                var heatmap = h337.create({
                  container: document.getElementById('heatmapContainer'),
                  maxOpacity: .2,
                  radius: 40,
                  blur: .75,
                  backgroundColor: 'white'  //'rgba(0, 0, 58, 0.96)'
                });";
            while ($row = $result->fetch_assoc()) {
               echo " 
                  var x = " . $row['coordX'] . ";
                  var y = " . $row['coordY'] . ";
                  heatmap.addData({ x: x, y: y, value: 1 });";
              } echo "}</script>";
        } else {
            echo "<div class='aviso'><br>".
            "<h4>Mapa ainda não disponível.</h4>".
            "<br><br><p><b>Nenhum click foi cadastrado</b></p>".
            "</div><br>";
        } 
        ?>
 
        <script src='js/heatmap.js'></script>
        
    </div>
   
    </body>
</html>