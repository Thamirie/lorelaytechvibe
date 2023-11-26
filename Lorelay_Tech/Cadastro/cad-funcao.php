<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_vibe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $funcao = test_input($_POST["funcao"]);

  // Inserir dados na tabela de valores do ESP32
$sql = "INSERT INTO company_vibe.funcao (nomeFuncao) VALUES ('$funcao')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastrados efetuado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
//importante para não sofrer ataque hacker no site
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
