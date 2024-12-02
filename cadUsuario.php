<?php
include_once './config/config.php';
include_once './classes/Usuario.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = new Usuario($db);
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
    $usuario->criar($nome, $tipo, $sexo, $dataNasc, $celular, $email, $cpf, $endCidade, $endBairro, $endRua, $endNum, $endComplemento, $senha);
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="./styles/styleCadUsuario.css">
</head>
<header>
    <img src="./assets/img/logo.png" alt="Logo" class="logo">
    <h1 class="title">Oficina</h1>
    <a href="index.php" class="btn-voltar">Voltar</a>
</header>

<body>
    <main>
        <div class="container">
            <h1>Cadastrar Usuário</h1>
            <form method="POST">
                <div class="row">
                    <div class="column">
                        <label for="">Tipo:</label>
                        <div class="row">
                            <label for="admin" style="margin-right: 10px;margin-left: 10px;">
                                <input type="radio" id="admin" name="tipo" value="admin" required class="ball">
                                Administrador
                            </label>
                            <label for="funcionario" style="margin-right: 10px;margin-left: 10px;">
                                <input type="radio" id="funcionario" name="tipo" value="funcionario" required
                                    class="ball">
                                Funcionário
                            </label>
                        </div>
                    </div>
                    <div class="column" style="margin-left: 30px;">
                        <label>Sexo:</label>
                        <div class="row">
                            <label for="masculino" style="margin-right: 10px;margin-left: 10px;">
                                <input type="radio" id="masculino" name="sexo" value="M" required class="ball">
                                Masculino
                            </label>
                            <label for="feminino" style="margin-right: 10px;margin-left: 10px;">
                                <input type="radio" id="feminino" name="sexo" value="F" required class="ball"> Feminino
                            </label>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="column">
                        <label for="">Usuário/Nome: </label>
                        <input type="text" name="nome" required class="control" placeholder="Nome...">
                    </div>
                    <div class="column">
                        <label for="">Senha: </label>
                        <input type="text" name="senha" required class="control" placeholder="Senha...">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="column">
                        <label for="">Data de Nascimento: </label>
                        <input type="date" name="dataNasc" required class="control">
                    </div>
                    <div class="column">
                        <label for="">Cpf: </label>
                        <input type="text" name="cpf" required class="control" placeholder="Cpf...">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="column">
                        <label for="">Celular: </label>
                        <input type="text" name="celular" required class="control" placeholder="Telefone...">
                    </div>
                    <div class="column">
                        <label for="">E-mail: </label>
                        <input type="email" name="email" required class="control" placeholder="E-Mail...">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="column">
                        <label for="">Cidade: </label>
                        <input type="text" name="endCidade" required class="control" placeholder="Cidade...">
                    </div>
                    <div class="column">
                        <label for="">Bairro: </label>
                        <input type="text" name="endBairro" required class="control" placeholder="Bairro...">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="column">
                        <label for="">Rua/Logradouro: </label>
                        <input type="text" name="endRua" required class="control" placeholder="Rua/Logradouro...">
                    </div>
                    <div class="column">
                        <label for="">Número: </label>
                        <input type="text" name="endNum" required class="control" placeholder="Número...">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="column">
                        <label for="">Complemento: </label>
                        <input type="text" name="endComplemento" required class="control-max"
                            placeholder="Complemento...">
                    </div>
                </div>
                <input type="submit" value="Adicionar" class="btn">
            </form>
        </div>
    </main>
</body>

</html>