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

// Consultar valores da tabela função
$sql = "SELECT * FROM company_vibe.funcao";
$resultfuncao = $conn->query($sql);

$sql = "SELECT * FROM company_vibe.departamento";
$resultdepartamento = $conn->query($sql);

$sql = "SELECT * FROM company_vibe.funcionarios";
$resultfuncionario = $conn->query($sql);

$sql = "SELECT * FROM company_vibe.setor";
$resultSetor = $conn->query($sql);

// Consultar valores da tabela função
$sql_funcoes = "SELECT funcao.id_funcao, funcao.nomeFuncao, setor.nomeSetor, departamento.nomeDepartamento
                FROM funcao
                INNER JOIN setor ON funcao.id_setor = setor.id_setor
                INNER JOIN departamento ON funcao.departamento_id_departamento = departamento.id_departamento";
$result_funcoes = $conn->query($sql_funcoes);

// Consultar valores da tabela setor
$sql_setores = "SELECT setor.id_setor, setor.nomeSetor, departamento.nomeDepartamento
                FROM setor
                INNER JOIN departamento ON setor.id_departamento = departamento.id_departamento";
$result_setores = $conn->query($sql_setores);

// Consultar valores da tabela departamento
$sql_departamentos = "SELECT id_departamento, nomeDepartamento FROM departamento";
$result_departamentos = $conn->query($sql_departamentos);

// Consultar valores da tabela funcionarios
$sql_funcionarios = "SELECT funcionarios.id_funcionarios, funcionarios.Nome, funcionarios.Sobrenome,
                    funcionarios.dataNasc, funcionarios.cpf, funcionarios.tel, funcionarios.salario,
                    funcao.nomeFuncao, departamento.nomeDepartamento
                    FROM funcionarios
                    INNER JOIN funcao ON funcionarios.funcao_id_funcao = funcao.id_funcao
                    INNER JOIN departamento ON funcionarios.departamento_id_departamento = departamento.id_departamento";
$result_funcionarios = $conn->query($sql_funcionarios);

$conn->close();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Consulta - Lorelay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../geral.css">
    <link rel="stylesheet" href="consulta.css">
    <link rel="shortcut icon" href="../IMG/LT VIBE.png" type="image/x-icon">

</head>
<body>

<header class="container-fluid">
    <nav class="row" style="display: flex; justify-content: center; align-items: center;">
        <div class="col-sm-4">
        <a href="index.php">
                <button class="btn-logo">
                    <h3>Lorelay Tech Vibe</h3>
                </button>
            </a>
        </div>

        <div class="col-sm">
            <input type="text" class="busca" placeholder="Buscar...">
        </div>

        <div class="col-sm">
            <div style="flex-direction: row; display: flex;">
                <a href="../index.php">
                    <button class="btn-header">Home</button>
                </a>

                <a href="../cadastro/index-cad.php">
                    <button class="btn-header">Cadastrar</button>
                </a>

                <a href="index-consulta.php">
                    <button class="btn-header-active">Consultar</button>
                </a>

                <a href="../sobre.php">
                    <button class="btn-header">Sobre</button>
                </a>
            </div>
        </div>
    </nav>
</header>

<nav class="container">
    <div style="padding-top: 50px; text-align: center;">
        <h1>Empresa Lorelay Tech Vibe</h1> 
        <h3>Consulte departamentos, funções e funcionários</h3><br>
    </div>
</nav>

<div class="container">
    <section style="margin-bottom: 50px;">
        <h2>Funções Cadastradas</h2>
        <p>Consulte na tabela abaixo as funções da Empresa:</p>            

        <table class="table">
            <thead>
                <tr class="thead">
                    <th>ID da função</th>
                    <th>Nome da Função</th>
                    <th>Nome do Setor</th>
                    <th>Nome do Departamento</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($result_funcoes->num_rows > 0) {
                    while ($row = $result_funcoes->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id_funcao']}</td>
                                <td>{$row['nomeFuncao']}</td>
                                <td>{$row['nomeSetor']}</td>
                                <td>{$row['nomeDepartamento']}</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Sem resultados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section style="margin-bottom: 50px;">
        <h2>Setores Cadastrados</h2>
        <p>Consulte na tabela abaixo os setores da empresa:</p>
        <table class="table">
            <thead>
                <tr class="thead">
                    <th>Código</th>
                    <th>Nome do Setor</th>
                    <th>Departamento</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($result_setores->num_rows > 0) {
                    while ($row = $result_setores->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id_setor']}</td>
                                <td>{$row['nomeSetor']}</td>
                                <td>{$row['nomeDepartamento']}</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Sem resultados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section style="margin-bottom: 50px;">
        <h2>Departamentos Cadastrados</h2>
        <p>Consulte na tabela abaixo os departamentos da empresa:</p>
        <table class="table">
            <thead>
                <tr class="thead">
                    <th>Código</th>
                    <th>Nome do departamento</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($result_departamentos->num_rows > 0) {
                    while ($row = $result_departamentos->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id_departamento']}</td>
                                <td>{$row['nomeDepartamento']}</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Sem resultados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section style="margin-bottom: 50px;">
        <h2>Funcionários Cadastrados</h2>
        <p>Consulte na tabela abaixo os Funcionários da Empresa:</p>

        <table class="table">
            <thead>
                <tr class="thead">
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Último Nome</th>
                    <th> Data de Nascimento</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Salário</th>
                    <th>Função</th>
                    <th>Departamento</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($result_funcionarios->num_rows > 0) {
                    while ($row = $result_funcionarios->fetch_assoc()) {
                        // Formatação do CPF e do telefone
                        $formatted_cpf = substr($row['cpf'], 0, 3) . '.' . substr($row['cpf'], 3, 3) . '.' . substr($row['cpf'], 6, 3) . '-' . substr($row['cpf'], 9);
                        $formatted_tel = '(' . substr($row['tel'], 0, 2) . ') ' . substr($row['tel'], 2, 5) . '-' . substr($row['tel'], 7);

                        echo "<tr>
                                <td>{$row['id_funcionarios']}</td>
                                <td>{$row['Nome']}</td>
                                <td>{$row['Sobrenome']}</td>
                                <td>{$row['dataNasc']}</td>
                                <td>{$formatted_cpf}</td>
                                <td>{$formatted_tel}</td>
                                <td>{$row['salario']}</td>
                                <td>{$row['nomeFuncao']}</td>
                                <td>{$row['nomeDepartamento']}</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Sem resultados</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<footer class="container-fluid">
    <nav class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
            <h3 style="text-align: center;">Redes sociais!!</h3>

            <div style="flex-direction: column; display: flex; justify-content: center; align-items: center;">
            <a href="https://www.facebook.com/fabiano.sinhorelli">
                <button class="btn-header">Facebook</button>
            </a>

            <a href="https://www.instagram.com/fabiano.sinhorelli/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==">
                <button class="btn-header">Instagram</button>
            </a>

            <a href="https://www.linkedin.com/in/fabiano-sinhorelli/?originalSubdomain=br">
                <button class="btn-header">Linkedin</button>
            </a>

            <a href="#">
                <button class="btn-header">Twitter</button>
            </a>
            </div>
        </div>


        <div class="col-sm">
            <h3 style="text-align: center;">Páginas</h3>
            <div style="flex-direction: column; display: flex; justify-content: center; align-items: center;">
            
            <a href="index.php">
                <button class="btn-header">Home</button>
            </a>

            <a href="cadastro/index-cad.php">
                <button class="btn-header">Cadastrar</button>
            </a>

            <a href="consulta/index-consulta.php">
                <button class="btn-header">Consultar</button>
            </a>

            <a href="sobre.php">
                <button class="btn-header">Sobre</button>
            </a>
            </div>
        </div>


        <div class="col-sm"></div>
    </nav> <br><br>
    <p>&copy; Lorelay Tech Vibe Enterprise 2023 - Todos os direitos reservados — Desenvolvido po Leyla Thamiriê</p>
</footer>
</body>
</html>

<!--

    <section style="margin-bottom: 50px;">
        <h2>Setores Cadastrados</h2>
        <p>Consulte na tabela abaixo os setores da empresa:</p>
        <table class="table">
            <thead>
                <tr class="thead">
                    <th>Código</th>
                    <th>Nome do Setor</th>
                    <th>Departamento</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </section>

    <section style="margin-bottom: 50px;">
        <h2>Departamentos Cadastrados</h2>
        <p>Consulte na tabela abaixo os departamentos da empresa:</p>
        <table class="table">
            <thead>
                <tr class="thead">
                    <th>Código</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if($resultdepartamento->num_rows > 0){
                    while($row = $resultdepartamento->fetch_assoc()){
                        echo '<tr>';
                        echo '<td>' . $row['id_departamento'] . '</td>';
                        echo '<td>' . $row['nomeDepartamento'] . '</td>';
                        echo '</tr>';
                    }
                }else{
                    echo '<tr>';
                    echo '<td>Sem dado</td>';
                    echo '<td>Sem dado</td>';
                    echo '</tr>';
                }
                ?>   
            </tbody>
        </table>
    </section>

    <section style="margin-bottom: 50px;">
        <h2>Funcionários Cadastrados</h2>
        <p>Consulte na tabela abaixo os Funcionários da Empresa:</p>

        <table class="table">
            <thead>
                <tr class="thead">
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Último Nome</th>
                    <th> Data de Nascimento</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Salário</th>
                    <th>Função</th>
                    <th>Departamento</th>
                </tr>
                <script>
                    function formatarCPF(cpf) {
                        return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
                    }

                    document.querySelectorAll('.cpf-cell').forEach(function(cell) {
                        let cpfSemFormato = cell.textContent.trim(); // Obtém o CPF sem formatação
                        let cpfFormatado = formatarCPF(cpfSemFormato); // Formata o CPF
                        cell.textContent = cpfFormatado; // Define o conteúdo da célula como o CPF formatado
                        });
                </script>
            </thead>
            <tbody>
                <?php
                if($resultfuncionario->num_rows > 0){
                    while($row = $resultfuncionario->fetch_assoc()){
                        echo '<tr>';
                        echo '<td>' . $row['id_funcionarios'] . '</td>';
                        echo '<td>' . $row['Nome'] . '</td>';
                        echo '<td>' . $row['Sobrenome'] . '</td>';
                        echo '<td>' . $row['dataNasc'] . '</td>';
                        $cpfFormatado = substr($row['cpf'], 0, 3) . '.' . substr($row['cpf'], 3, 3) . '.' . substr($row['cpf'], 6, 3) . '-' . substr($row['cpf'], -2);
                            echo '<td>' . $cpfFormatado . '</td>';
                        $telFormatado = formatarTelefone($row['tel']); // Formata o número de telefone
                            echo '<td>' . $telFormatado . '</td>';
                        echo '<td>' . $row['salario'] . '</td>';
                        echo '<td>' . $row['funcao_id_funcao'] . '</td>';
                        echo '<td>' . $row['departamento_id_departamento'] . '</td>';
                        echo '</tr>';
                    }
                }else{
                    echo '<tr>';
                    echo '<td>Sem dado</td>';
                    echo '<td>Sem dado</td>';
                    echo '<td>Sem dado</td>';
                    echo '<td>Sem dado</td>';
                    echo '<td>Sem dado</td>';
                    echo '<td>Sem dado</td>';
                    echo '<td>Sem dado</td>';
                    echo '<td>Sem dado</td>';
                    echo '<td>Sem dado</td>';
                    echo '</tr>';
                }
                ?>   
            </tbody>
        </table>

    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<footer class="container-fluid">
    <nav class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
            <h3 style="text-align: center;">Redes sociais!!</h3>

            <div style="flex-direction: column; display: flex; justify-content: center; align-items: center;">
            <a href="https://www.facebook.com/fabiano.sinhorelli">
                <button class="btn-header">Facebook</button>
            </a>

            <a href="https://www.instagram.com/fabiano.sinhorelli/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==">
                <button class="btn-header">Instagram</button>
            </a>

            <a href="https://www.linkedin.com/in/fabiano-sinhorelli/?originalSubdomain=br">
                <button class="btn-header">Linkedin</button>
            </a>

            <a href="#">
                <button class="btn-header">Twitter</button>
            </a>
            </div>
        </div>


        <div class="col-sm">
            <h3 style="text-align: center;">Páginas</h3>
            <div style="flex-direction: column; display: flex; justify-content: center; align-items: center;">
            
            <a href="index.php">
                <button class="btn-header">Home</button>
            </a>

            <a href="cadastro/index-cad.php">
                <button class="btn-header">Cadastrar</button>
            </a>

            <a href="consulta/index-consulta.php">
                <button class="btn-header">Consultar</button>
            </a>

            <a href="sobre.php">
                <button class="btn-header">Sobre</button>
            </a>
            </div>
        </div>


        <div class="col-sm"></div>
    </nav> <br><br>
    <p>&copy; Lorelay Tech Vibe Enterprise 2023 - Todos os direitos reservados — Desenvolvido po Leyla Thamiriê</p>
</footer>

-->
