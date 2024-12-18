<?php
include_once '../config/config.php';
include_once '../classes/Servicos.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servico = new Servicos($db);

    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $tipo = $_POST['tipo'];


    $servico->registrar($descricao, $valor, $tipo);
    header('Location: ../gerenciamento/gerenciarServicos.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Cadastrar Serviço</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../styles/styleCadUsuario.css">
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <header>
        <img src="../assets/img/logo.png" alt="Logo" class="small-img">
        <h1 class="le title-container">Cadastro de Serviços</h1>
        <a href="../gerenciamento/gerenciarServicos.php" class="btn-voltar"><ion-icon name="arrow-undo"></ion-icon></a>
    </header>

    <main style="height: 100vh;">
        <br><br><br>
        <div class="container mx-auto shadow ">
            <h1 class="text-center title-container">Cadastrar Serviço</h1>
            <form method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <textarea name="descricao" id="descricao" class="form-control" cols="3" rows="3"
                                placeholder="Descrição do serviço..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo">Tipo de Serviço:</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="">Selecione o Tipo</option>
                                    <option value="Mecânico">Mecânico</option>
                                    <option value="Elétrico">Elétrico</option>
                                    <option value="Estético">Estético</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="valor">Valor:</label>
                            <input type="number" name="valor" id="valor" class="form-control" placeholder="Valor..." required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-cad">
                    <i class="fa fa-plus"></i> Cadastrar
                </button>
            </form>
        </div>
    </main>

    <!-- Bootstrap JS, jQuery, and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>

        function applyMask(input, maskFunction) {
            input.value = maskFunction(input.value);
        }

        // Máscara para CPF
        function cpfMask(value) {
            return value
                .replace(/\D/g, '')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        }

        // Máscara para CEP
        function cepMask(value) {
            return value
                .replace(/\D/g, '')
                .replace(/(\d{5})(\d)/, '$1-$2');
        }

        // Máscara para Telefone
        function phoneMask(value) {
            return value
                .replace(/\D/g, '')
                .replace(/(\d{2})(\d)/, '($1) $2')
                .replace(/(\d{5})(\d{1,4})$/, '$1-$2');
        }
    </script>

</body>

</html>