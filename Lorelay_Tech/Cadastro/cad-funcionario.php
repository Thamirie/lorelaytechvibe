<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_vibe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Função para tratar os dados do formulário
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Recebe e trata os dados do formulário
$Nome = test_input($_POST['nome'] ?? '');
$Sobrenome = test_input($_POST['sobrenome'] ?? '');
$dataNasc = test_input($_POST['nasc'] ?? '');
$cpf = test_input($_POST['cpf'] ?? '');
$tel = test_input($_POST['tel'] ?? '');
$salario = test_input($_POST['sal'] ?? '');
$funcao_id_funcao = test_input($_POST['id_funcao'] ?? '');
$departamento_id_departamento = test_input($_POST['id_departamento'] ?? '');

// Prepara a query usando prepared statements para inserir dados na tabela
$sql = "INSERT INTO funcionarios (Nome, Sobrenome, dataNasc, cpf, tel, salario, funcao_id_funcao, departamento_id_departamento)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssii", $Nome, $Sobrenome, $dataNasc, $cpf, $tel, $salario, $funcao_id_funcao, $departamento_id_departamento);

if ($stmt->execute()) {
    echo "Cadastro efetuado com sucesso!";
} else {
    echo "Erro ao cadastrar funcionário: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
