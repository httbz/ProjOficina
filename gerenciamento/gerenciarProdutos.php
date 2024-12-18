<?php
session_start();
include_once '../config/config.php';
include_once '../classes/Produtos.php';

$produto = new Produtos($db);
// Captura o termo de pesquisa (caso exista)


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $produto = new Produtos($db);
        $produto->deletar($_POST['id']);
        header("Location: gerenciarProdutos.php");
        exit();
    }
}
$termo = $_GET['pesquisa'] ?? '';

// Verifica se o termo de pesquisa foi fornecido. Se não, lista todos os usuários.
if ($termo) {
    $produtos = $produto->pesquisarProdutos($termo); // Pesquisa os usuários com o termo
} else {
    $produtos = $produto->listarTodos(); // Lista todos os usuários caso não haja pesquisa
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Produtos</title>
    <link rel="stylesheet" href="../styles/style_gUsuario.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <header>
        <img src="../assets/img/logo.png" alt="Logo" class="small-img">
        <h1 class="title">Gerenciamento de Produto</h1>
        <a href="../dashboard.php" class="btn-voltar"><ion-icon name="arrow-undo"></ion-icon></a>
    </header>
    <main>
        <div class="container">
            <h1 class="title-container">Produtos</h1>
            <form method="GET">
                <div class="row">
                    <div class="search" style="margin-right: 20px">
                        <input type="text" name="pesquisa" class="input" placeholder="Procure por descrição ou referência..." value="<?php echo htmlspecialchars($termo); ?>">
                        <button class="search__btn">
                            <ion-icon name="search" style="font-weight: 900;"></ion-icon>
                        </button>
                    </div>
                    <a href="../cadastro/cadProduto.php" class="btn-adicionar"><ion-icon name="add-circle"></ion-icon></a>
                </div>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Preço de custo</th>
                        <th>Preço de venda</th>
                        <th>Referencia</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $prod): ?>
                        <tr>
                            <td><?php echo $prod['descricao']; ?></td>
                            <td><?php echo $prod['valorCusto']; ?></td>
                            <td><?php echo $prod['valorVenda']; ?></td>
                            <td><?php echo $prod['referencia']; ?></td>
                            <td>
                                <div class="row">
                                <form action="gerenciarProdutos.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                        <input type="hidden" name="id" value="<?php echo $prod['id']; ?>">
                                        <button type="submit" name="delete" class="btn-excluir">
                                            Excluir <ion-icon name="trash"></ion-icon>
                                        </button>
                                    </form>
                                    <a href="../editar/editarProdutos.php?id=<?php echo $prod['id']; ?>" class="btn-editar">Editar 
                                      <ion-icon name="pencil"></ion-icon></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>