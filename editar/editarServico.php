<?php
session_start();
include_once '../config/config.php';
include_once '../classes/Servicos.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../index.php');
    exit();
}

$servico = new Servicos($db);

// Verificar se o ID foi fornecido para edição
if (isset($_GET['id'])) {
    // Recupera os dados do usuário para edição
    $id = $_GET['id'];
    $dadosServico = $servico->lerPorId($id);
} else {
    // Caso contrário, preenche com valores vazios para cadastro
    $dadosServico = [
        'descricao' => '',
        'valor' => '',
        'tipo' => ''
    ];
}

// Processa o formulário para cadastro ou edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $tipo = $_POST['tipo'];

    if (isset($_GET['id'])) {
        // Se ID existe, é edição, então atualiza os dados
        $servico->atualizar($descricao, $valor, $tipo, $id);
    } else {
        // Caso contrário, cria um novo usuário
        $servico->registrar($descricao, $valor, $tipo);
    }

    // Redireciona para a página de gerenciamento de usuários
    header('Location: ../gerenciamento/gerenciarServicos.php');
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
    <title>Editar Serviço</title>
</head>

<body>
    <header>
        <img src="../assets/img/logo.png" alt="Logo" class="small-img">
        <h1 class="le">Edição de Serviço</h1>
        <a href="../gerenciamento/gerenciarServicos.php" class="btn-voltar"><ion-icon name="arrow-undo"></ion-icon></a>
    </header>
    <main style="height: 100vh;">
        <div class="container mx-auto shadow algin-middle">
            <h1 class="text-center">Editar Serviço</h1>
            <form method="POST">


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Descricao">Descricao:</label>
                            <input type="text" name="descricao" id="descricao" class="form-control"
                                placeholder="Descrição..." required
                                value="<?php echo htmlspecialchars($dadosServico['descricao']); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Descricao">Tipo de Serviço:</label>
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="">Selecione o Tipo</option>
                                <option value="Mecânico" <?php echo $dadosServico['tipo'] == 'Mecânico' ? 'selected' : ''; ?>>Mecânico</option>
                                <option value="Elétrico" <?php echo $dadosServico['tipo'] == 'Eleétrico' ? 'selected' : ''; ?>>Elétrico</option>
                                <option value="Estético" <?php echo $dadosServico['tipo'] == 'Estético' ? 'selected' : ''; ?>>Estético</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="valor">Valor:</label>
                            <input type="number" name="valor" id="valor" class="form-control" placeholder="Valor..."
                                required value="<?php echo htmlspecialchars($dadosServico['valor']); ?>">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-cad">
            <ion-icon name="pencil"></ion-icon> Atualizar
        </button>
        </div>
        </form>
        </div>
    </main>
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