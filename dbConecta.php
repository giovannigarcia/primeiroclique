<?php
$servername = "localhost";
$username = "nomeusuario";
$password = "senha";
$dbname = "nomedobanco";
// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);
// Verifica conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
//echo "Connectado com sucesso";
?>