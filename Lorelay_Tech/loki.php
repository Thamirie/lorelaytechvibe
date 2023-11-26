<!-- alterar.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Funcionário</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_vibe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $novoNome = $_POST['novoNome'];

    $sql = "UPDATE company_vibe.funcionarios SET Nome='$novoNome' WHERE id_funcionario=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Nome atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar nome: " . $conn->error;
    }
}

// Mostrar formulário para selecionar o funcionário
$sql = "SELECT id_funcionarios, Nome FROM company_vibe.funcionarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form method='post' action='alterar.php'>";
    echo "Selecione o funcionário: ";
    echo "<select name='id'>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id_funcionario'] . "'>" . $row['Nome'] . "</option>";
    }
    echo "</select>";
    echo "<br>";
    echo "Novo nome: <input type='text' name='novoNome'>";
    echo "<input type='submit' value='Atualizar'>";
    echo "</form>";
} else {
    echo "Não há funcionários cadastrados.";
}

$conn->close();
?>

</body>
</html>
