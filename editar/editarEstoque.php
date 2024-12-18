<?php
session_start();
include_once '../config/config.php';
include_once '../classes/Estoques.php';
include_once '../classes/Produtos.php';

$produto = new Produtos($db);
$produtos = $produto->ler();

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../index.php');
    exit();
}

$estoque = new Estoques($db);

// Verificar se o ID foi fornecido para edição
if (isset($_GET['id'])) {
    // Recupera os dados do usuário para edição
    $id = $_GET['id'];
    $dadosEstoque = $estoque->lerPorId($id);
} else {
    // Caso contrário, preenche com valores vazios para cadastro
    $dadosEstoque = [
        'fkProduto' => '',
        'qtd' => '',
        'qtdMax' => '',
        'qtdMin' => '',

        
    ];
}

// Processa o formulário para cadastro ou edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fkProduto = $_POST['fkProduto'];
    $qtd = $_POST['qtd'];
    $qtdMax = $_POST['qtdMax'];
    $qtdMin = $_POST['qtdMin'];

    
 
    if (isset($_GET['id'])) {
        $estoque->atualizar( $id, $fkProduto, $qtd, $qtdMax, $qtdMin);
    } 
    // Redireciona para a página de gerenciamento de usuários
    header('Location: ../gerenciamento/gerenciarEstoque.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleCadUsuario.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../styles/styleCadUsuario.css">
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Editar Produto</title>
</head>

<body>
<header>
        <img src="../assets/img/logo.png" alt="Logo" class="small-img">
        <h1 class="le">Edição de Produto</h1>
        <a href="../gerenciamento/gerenciarEstoque.php" class="btn-voltar"><ion-icon name="arrow-undo"></ion-icon></a>
    </header>
    <main style="height: 100vh;">
        <div class="container mx-auto shadow algin-middle">
            <h1 class="text-center">Editar Estoque</h1>
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                    <label>Produto:</label>
                            <select name="fkProduto" required class="form-control">
                                <option value="">Selecione o Produto:</option>
                                <?php foreach ($produtos as $prod): ?>
                                    <option value="<?php echo $prod['id']; ?>" <?php echo ($prod['id'] == $dadosEstoque['fkProduto']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($prod['descricao']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                    <div class="col-md-6">
                        <label>Quantidade:</label>
                        <input type="number" name="qtd" id="qtd" class="form-control" placeholder="ValorVenda..."
                                required value="<?php echo htmlspecialchars($dadosEstoque['qtd']); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="qtdMax">Quantidade Máxima:</label>
                            <input type="number" name="qtdMax" id="qtdMax" class="form-control" placeholder="valor de custo..."
                                required value="<?php echo htmlspecialchars($dadosEstoque['qtdMax']); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="qtdMin">Quantidade Mínima:</label>
                            <input type="number" name="qtdMin" id="qtdMin" class="form-control" placeholder="Descrição..." required value="<?php echo htmlspecialchars($dadosEstoque['qtdMin']); ?>">
                        </div>
                    </div>
                </div>



              

            

                

                <button type="submit" class="btn-cad">
                <ion-icon name="pencil"></ion-icon> Atualizar
                </button>
            </form>
        </div>
    </main>
   
</body>

</html>