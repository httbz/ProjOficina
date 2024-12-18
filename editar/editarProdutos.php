<?php
session_start();
include_once '../config/config.php';
include_once '../classes/Produtos.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../index.php');
    exit();
}

$produto = new Produtos($db);

// Verificar se o ID foi fornecido para edição
if (isset($_GET['id'])) {
    // Recupera os dados do usuário para edição
    $id = $_GET['id'];
    $dadosProduto = $produto->lerPorId($id);
} else {
    // Caso contrário, preenche com valores vazios para cadastro
    $dadosProduto = [
        'referencia' => '',
        'valorVenda' => '',
        'valorCusto' => '',
        'descricao' => '',
        
    ];
}

// Processa o formulário para cadastro ou edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $referencia = $_POST['referencia'];
    $valorVenda = $_POST['valorVenda'];
    $valorCusto = $_POST['valorCusto'];
    $descricao = $_POST['descricao'];
    
 
    if (isset($_GET['id'])) {
        $produto->atualizar( $id, $referencia, $valorVenda, $valorCusto, $descricao);
    } 
    // Redireciona para a página de gerenciamento de usuários
    header('Location: ../gerenciamento/gerenciarProdutos.php');
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
        <a href="../gerenciamento/gerenciarUsuarios.php" class="btn-voltar"><ion-icon name="arrow-undo"></ion-icon></a>
    </header>
    <main style="height: 100vh;">
        <div class="container mx-auto shadow algin-middle">
            <h1 class="text-center">Editar <?php echo htmlspecialchars(ucfirst($dadosProduto['referencia'])); ?></h1>
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label>Referencia:</label>
                        <div class="form-group">
                        <input type="text" name="referencia" id="referencia" class="form-control" placeholder="referencia..."
                        required value="<?php echo htmlspecialchars($dadosProduto['referencia']); ?>">
                       </div>
                    </div>
                    <div class="col-md-6">
                        <label>Valor de venda:</label>
                        <input type="decimal" name="valorVenda" id="valorVenda" class="form-control" placeholder="ValorVenda..."
                                required value="<?php echo htmlspecialchars($dadosProduto['valorVenda']); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="valorCusto">Valor de custo:</label>
                            <input type="text" name="valorCusto" id="valorCusto" class="form-control" placeholder="valor de custo..."
                                required value="<?php echo htmlspecialchars($dadosProduto['valorCusto']); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição..." required value="<?php echo htmlspecialchars($dadosProduto['descricao']); ?>">
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