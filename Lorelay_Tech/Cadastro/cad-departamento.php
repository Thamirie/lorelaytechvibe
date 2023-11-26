<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_vibe";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação da conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica se a requisição é do tipo POST e se o campo "nomeDepartamento" está definido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nomeDepartamento"])) {
    // Recebe e limpa os dados do formulário
    $nomeDepartamento = trim($_POST["nomeDepartamento"]);

    // Preparação da consulta usando prepared statement
    $sql = "INSERT INTO company_vibe.departamento (nomeDepartamento) VALUES (?)";
    $stmt = $conn->prepare($sql);

    // Verifica se a preparação da consulta foi bem sucedida
    if ($stmt) {
        // Vincula o parâmetro e executa a inserção
        $stmt->bind_param("s", $nomeDepartamento); // "s" indica que $nomeDepartamento é uma string
        if ($stmt->execute()) {
            echo "Cadastro efetuado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }
        $stmt->close(); // Fecha o statement
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
    $conn->close(); // Fecha a conexão
}
