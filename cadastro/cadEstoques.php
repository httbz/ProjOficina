<?php
include_once '../config/config.php';
include_once '../classes/Estoques.php';
include_once '../classes/Produtos.php';

$produto = new Produtos($db);
$produtos = $produto->ler();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $estoque = new Estoques($db);
    
    $fkProduto = $_POST['fkProduto'];
    $qtd = $_POST['qtd'];
    $qtdMax = $_POST['qtdMax'];
    $qtdMin = $_POST['qtdMin'];

    $estoque->registrar($fkProduto, $qtd, $qtdMax, $qtdMin);
    header('Location: ../gerenciamento/gerenciarEstoque.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">



<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Cadastrar Estoque</title>

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
        <h1 class="le title-container">Cadastro de Estoque</h1>
        <a href="../gerenciamento/gerenciarEstoque.php" class="btn-voltar"><ion-icon name="arrow-undo"></ion-icon></a>
    </header>

    <main style="height: 100vh;">
        <br><br><br>
        <div class="container mx-auto shadow ">
            <h1 class="text-center title-container">Cadastrar Estoque</h1>
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Produto:</label>
                            <select name="fkProduto" required class="form-control">
                                <option value="">Selecione o Produto:</option>
                                <?php foreach ($produtos as $prod): ?>
                                    <option value="<?php echo $prod['id']; ?>">
                                        <?php echo htmlspecialchars($prod['descricao']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="dataNasc">Quantidade</label>
                                <input type="number" name="qtd" id="qtd" class="form-control" required
                                    placeholder="Quantidade...">
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-6">
                            <label for="nome">Quantidade Máxima</label>
                            <input type="number" name="qtdMax" id="qtdMax" class="form-control"
                                placeholder="Quantidade máxima...">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="senha">Quantidade minima</label>
                                <input type="number" name="qtdMin" id="qtdMin" class="form-control"
                                    placeholder="Quantidade mínima...">
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


</body>

</html>