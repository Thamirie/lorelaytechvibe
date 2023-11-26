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

// Verifica se a requisição é do tipo POST e se o campo "nomeSetor" está definido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nomeSetor"]) && isset($_POST["id_departamento"])) {
    // Recebe e limpa os dados do formulário
    $nomeSetor = trim($_POST["nomeSetor"]);
    $id_departamento = trim($_POST["id_departamento"]);

    // Preparação da consulta usando prepared statement
    $sql = "INSERT INTO company_vibe.setor (nomeSetor, id_departamento) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Verifica se a preparação da consulta foi bem sucedida
    if ($stmt) {
        // Vincula os parâmetros e executa a inserção
        $stmt->bind_param("si", $nomeSetor, $id_departamento); // "s" para string e "i" para inteiro
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="container">
    <div class="cadastro">
        <h4>Cadastre um Setor:</h4>
        <form action="cad-setor.php" method="post">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control input-cadastro" id="text" placeholder="Nome do setor" name="nomeSetor" autocomplete="off">

                    <select name="id_departamento" id="text" autocomplete="off" class="input-cadastro">
                        <option value="1">Desenvolvimento</option>
                        <option value="2">Marketing</option>
                        <option value="3">Recursos Humanos</option>
                        <option value="4">Financeiro</option>
                        <option value="5">Serviços Gerais</option>
                    </select>

                    <button type="submit" class="btn btn-cadastro">Cadastrar</button>

                </div>
            </div>
        </form>
    </div>
</section>
</body>
</html>