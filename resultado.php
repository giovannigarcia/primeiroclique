<?php
//session_start();
include('loginValida.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resultado</title>
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/tabela2.css">
        <link rel="stylesheet" href="css/paginacao.css">
        <link rel="stylesheet" href="css/navegacao2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        include_once("dbConecta.php");
        
        if (isset($_POST["idTarefa"])){
        $idTarefa = $_POST["idTarefa"];
        $descricao = $_POST["descricao"];
        $link = $_POST["link"];
            $nomeTeste = $_POST["nomeTeste"];
            $idTeste = $_POST["idTeste"];
        
        $_SESSION["idTarefa"] = $idTarefa;
        $_SESSION["descricao"] = $descricao;
        $_SESSION["link"] = $link;
            $_SESSION["idTeste"] = $idTeste;
            $_SESSION["nomeTeste"] = $nomeTeste;
        }else{
        $idTarefa = $_SESSION["idTarefa"];
        $descricao = $_SESSION["descricao"];
        $link = $_SESSION["link"];
            $idTeste = $_SESSION["idTeste"];
            $nomeTeste = $_SESSION["nomeTeste"];
        }
       
       echo "<h3>Resultado da tarefa: ".$idTarefa." - ".$descricao."</h3>";
        
        echo "<form id='myTarefas' action='minhasTarefas.php' method='POST'>".
                    "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>".
                    "<input value='" . $idTeste . "' name='idTeste' type='hidden'></form>";
        
         echo "<form action='mapaCalor.php' method='POST' id='mapaCalor' target='_blank'>" .
                    "<input value='" . $nomeTeste . "' name='nomeTeste' type='hidden'>" .
                    "<input value='" . $idTeste . "' name='idTeste' type='hidden'>" .
                    "<input  value='" . $idTarefa . "' name='idTarefa' type='hidden'>" .
                    "<input  value='" . $descricao . "' name='descricao' type='hidden'>".
                    "<input  value='" . $link . "' name='link' type='hidden'></form>";
        ?>
        
         <ul class="navega">
          <li><a href="inicio.php" title="Retorna para o início"><i class="fa">&#xf015;</i> Inicio</a></li>
          <li><a href="meusTestes.php" title="Retorna para os Meus Testes">Meus testes</a></li>
          <li><a href="javascript:document.getElementById('myTarefas').submit()" title="Retorna para as Minhas Tarefas">Minhas tarefas</a></li>
          <li><a href="#" class="active">Resultado</a></li>
          <li><a href="javascript:document.getElementById('mapaCalor').submit()" title="Visualiza mapa de calor">Mapa de Calor</a></li>
          <a class="sair" href="logout.php"><i class="fa" title="Encerra acesso">&#xf08b;</i> Logout</a>
        </ul>

        <?php
        echo "<p style='text-align:center;'>Resultados dos cliques obtidos no link: <ins><em>".$link."<em></ins></p>";
        
        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
        $qnt_result_pg = 15;
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
        $result_tarefa = "SELECT * FROM resultado WHERE Tarefa_idTarefa=".$idTarefa." LIMIT $inicio, $qnt_result_pg";

   //     $sql = "SELECT * FROM resultado WHERE Tarefa_idTarefa=" . $idTarefa . "";
   //     $result = $conn->query($sql);
 
        echo "<table>"
        . "<thead>"
        . "<tr>"
        . "<th>Coordenada X</th>"
        . "<th>Coordenada Y</th>"
        . "<th>Elemento</th>"
        . "</tr>"
        . "</thead>"
        . "<tbody>";
        $resultado_tarefa = mysqli_query($conn, $result_tarefa);
         if ($resultado_tarefa->num_rows > 0) {
		while($row = mysqli_fetch_assoc($resultado_tarefa)){
  //     if ($result->num_rows > 0) {
  //         while ($row = $result->fetch_assoc()) {
                echo "<tr>"
                . "<td>" . $row['coordX'] . " </td>" .
                "<td>" . $row['coordY'] . " </td>" .
                "<td>" . $row['elementoClick'] . " </td>" .
                "</tr>";
            }
        } else {
            echo "<div class='alerta'>A tarefa ainda não foi realizada</div><br>";
        }
        echo "</tbody>"
        ."</table>";
        
        $result_pg = "SELECT COUNT(Tarefa_idTarefa) AS num_result FROM resultado WHERE Tarefa_idTarefa=" . $idTarefa . "";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
	//	echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		//Limitar os link antes depois
		$max_links = 5;
		echo "<div class='center'><div class='pagination'><a href='resultado.php?pagina=1'>&laquo;</a> ";
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='resultado.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
		echo "<a href='#' class='ativa'>$pagina</a>";
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='resultado.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		echo "<a href='resultado.php?pagina=$quantidade_pg'>&raquo;</a></div></div>";
        echo "<div class='center'><p>Resultados existentes:". $row_pg['num_result']."</p></div>";
        ?>
    </body>
</html>