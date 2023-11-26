<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../geral.css">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro - Lorelay</title>

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
                <a href="../index.html">
                    <button class="btn-header">Home</button>
                </a>

                <a href="index-cad.php">
                    <button class="btn-header-active">Cadastrar</button>
                </a>

                <a href="../consulta/index-consulta.php">
                    <button class="btn-header">Consultar</button>
                </a>

                <a href="../sobre.php">
                    <button class="btn-header">Sobre</button>
                </a>
            </div>
        </div>
    </nav>
</header>

<nav class="container">
    <div style="text-align: center; padding-top: 50px;">
        <h1>Empresa Lorelay Tech Vibe</h1> 
        <h3>Cadastre setores, departamentos, funções e funcionários</h3><br>
    </div>
</nav>

<section class="container">
    <div class="cadastro">
        <h4>Cadastre uma função:</h4>
        <form action="cad-funcao.php" method="post">

            <div class="row">
                <div class="col">
                    <label for="nomeFuncao">Nome da Função:</label>
                    <input type="text" class="form-control input-cadastro" id="text" placeholder="Digite o nome da Função" name="funcao" autocomplete="off">

                    <label for="id_setor">Selecione o setor:</label>
                    <select name="id_setor" id="text" autocomplete="off" class="input-cadastro">
                        <option value="1">Desenvolvimento de Software</option>
                        <option value="2"></option>
                        <option value="3"></option>
                        <option value="4"></option>
                        <option value="5"></option>
                        <option value="6"></option>
                        <option value="7"></option>
                        <option value="8"></option>
                        <option value="9"></option>
                        <option value="10"></option>
                        <option value="11"></option>
                        <option value="12"></option>
                        <option value="13"></option>
                        <option value="14"></option>
                        <option value="15"></option>
                        <option value="16"></option>
                        <option value="17"></option>
                        <option value="18"></option>
                    </select>

                    <label for="departamento_id_departamento">Selecione o departamento:</label>
                    <select name="departamento_id_departamento" id="text" autocomplete="off" class="input-cadastro">
                        <option value="1">Desenvolvimento</option>
                        <option value="2">Marketing</option>
                        <option value="3">Recursos Humanos</option>
                        <option value="4">Financeiro</option>
                        <option value="5">Serviços Gerais</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn-cadastro">Cadastrar</button>
        </form>
    </div>
</section>

<section class="container">
    <div style="border: 1px solid #000938; padding: 15px; border-radius: 3px;">
        <h4>Cadastre um Setor:</h4>

        <form action="cad-setor.php" method="post">
            <div class="row">
                <div class="col">

                    <label for="nomeSetor">Nome do setor:</label>
                    <input type="text" class="form-control tupin" id="text" placeholder="Digite o nome do setor" name="nomeSetor" autocomplete="off">

                    <label for="id_departamento">Selecione o departamento:</label>
                    <select name="id_departamento" id="text" autocomplete="off" class="tupin-select">
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

<section class="container">
    <div class="cadastro">
        <h4>Cadastre um departamento:</h4>
        <form action="cad-departamento.php" method="post">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control input-cadastro" id="text" placeholder="Digite o nome do Departamento" name="nomeDepartamento" autocomplete="off">
                </div>
            </div>
            <button type="submit" class="btn btn-cadastro">Cadastrar</button>
        </form>
    </div>
</section>

<section class="container">
    <div style="border: 1px solid #000938; padding: 15px; border-radius: 3px; margin-bottom:15px;">
        <h4>Cadastre um funcionário:</h4>

        <form action="cad-funcionario.php" method="post">
            <div class="row">
                <div class="col">
                    <label for="nome">Nome do funcionário:</label>
                    <input type="text" class="form-control tupin" id="text" placeholder="Nome" name="nome" autocomplete="off">

                    <label for="sobrenome">Último sobrenome do funcionário:</label>
                    <input type="text" name="sobrenome" id="text" class="form-control tupin" placeholder="Último nome" autocomplete="off">

                    <label for="nasc">Data de Nacimento:</label>
                    <input type="date" id="text" name="nasc" class="form-control tupin" placeholder="Data de Nascimento" autocomplete="off">

                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="text" class="form-control tupin" placeholder="CPF (apenas números)" autocomplete="off">

                    <label for="tel">Telefone:</label>
                    <input type="text" name="tel" id="text" class="form-control tupin" placeholder="Telefone (DDD e restante junto)" autocomplete="off">

                    <label for="salario">Salário a receber:</label>
                    <input type="text" name="sal" id="text" class="form-control tupin" placeholder="Salário" autocomplete="off">

                    <label for="id_funcao">Selecione o cargo/função:</label>
                    <select name="id_funcao" id="text" autocomplete="off" class="tupin-select">
                        <option value="1">Contador</option>
                        <option value="2">Desenvolvedor Java</option>
                        <option value="3">Analista Finaceiro</option>
                        <option value="4">Recrutador</option>
                        <option value="5">Gerente de Conteúdo</option>
                        <option value="6">Faxineiro</option>
                        <option value="7">Desenvolvedor Front-end</option>
                        <option value="8">Desenvolvedor Back-end</option>
                        <option value="9">Engenheiro de Software</option>
                        <option value="10">Desenvolvedor Mobile</option>
                        <option value="11">Arquiteto de Software</option>
                        <option value="12">Engenheiro de Dados</option>
                        <option value="13">Analista de Dados</option>
                    </select> <br>

                    <label for="id_departamento">Selecione o departamento:</label>
                    <select name="id_departamento" id="text"  autocomplete="off" class="tupin-select">
                        <option value="1">Desenvolvimento</option>
                        <option value="2">Marketing</option>
                        <option value="3">Recursos Humanos</option>
                        <option value="4">Financeiro</option>
                        <option value="5">Serviços Gerais</option>
                    </select>   

                </div>
            </div>
            <button type="submit" class="btn btn-cadastro">Cadastrar</button>
        </form>
    </div>
</section>

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