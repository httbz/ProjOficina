<?php
include_once './config/config.php';
include_once './classes/Usuario.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = new Usuario($db);

    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $sexo = $_POST['sexo'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $dataNasc = $_POST['dataNasc'];
    $cpf = $_POST['cpf'];
    $endCidade = $_POST['endCidade'];
    $endBairro = $_POST['endBairro'];
    $endRua = $_POST['endRua'];
    $endNum = $_POST['endNum'];
    $senha = $_POST['senha'];
    $endComplemento = $_POST['endComplemento'];

    $cliente->registrar($nome, $tipo, $senha, $sexo, $dataNasc, $email, $endCidade, $endBairro, $endNum, $endComplemento, $celular, $cpf);
    header('Location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Cadastrar Usuário</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="./styles/styleCadUsuario.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <img src="./assets/img/logo.png" alt="Logo" class="logo" style="height: 40px;" />
                </a>
            </div>
            <h1>Oficina BGH</h1>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php" class="btn-primary"><i class="fa fa-arrow-left"></i> Voltar</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="container">
            <h1 class="text-center">Cadastrar Usuário</h1>
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label>Tipo:</label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" id="admin" name="tipo" value="admin" required> Administrador
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="funcionario" name="tipo" value="funcionario" required>
                                Funcionário
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Sexo:</label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" id="masculino" name="sexo" value="M" required> Masculino
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="feminino" name="sexo" value="F" required> Feminino
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome..."
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="text" name="senha" id="senha" class="form-control" placeholder="Senha..."
                                required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dataNasc">Data de Nascimento:</label>
                            <input type="date" name="dataNasc" id="dataNasc" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpf">Cpf:</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Cpf..." required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="celular">Celular:</label>
                            <input type="text" name="celular" id="celular" class="form-control"
                                placeholder="Telefone..." required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail..."
                                required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="endCidade">Cidade:</label>
                            <input type="text" name="endCidade" id="endCidade" class="form-control"
                                placeholder="Cidade..." required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="endBairro">Bairro:</label>
                            <input type="text" name="endBairro" id="endBairro" class="form-control"
                                placeholder="Bairro..." required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="endRua">Rua/Logradouro:</label>
                            <input type="text" name="endRua" id="endRua" class="form-control"
                                placeholder="Rua/Logradouro..." required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="endNum">Número:</label>
                            <input type="text" name="endNum" id="endNum" class="form-control" placeholder="Número..."
                                required>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="endComplemento">Complemento:</label>
                            <input type="text" name="endComplemento" id="endComplemento" class="form-control"
                                placeholder="Complemento..." required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block">
                    <i class="fa fa-plus"></i> Cadastrar
                </button>
            </form>
        </div>
    </main>

    <!-- Bootstrap JS, jQuery, and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>