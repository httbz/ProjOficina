<?php
include_once './config/config.php';
include_once './classes/Usuario.php';


$mensagem = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $usuario = new Usuario($db);
    $codigo = $usuario->gerarCodigoVerificacao($email);


    if ($codigo) {
        $mensagem = "Seu código de verificação é: <a>$codigo</a>. Por favor, anote o código e <a href='redefinir_senha.php'>clique aqui</a> para redefinir sua senha.";
    } else {
        $mensagem = 'E-mail não encontrado.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./styles/styleLogin.css">
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="login-title" style="font-size: 2rem;">Recuperação de Senha</h1>
        <form method="POST" class="login-form">
            <div class="input-group">
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" placeholder="Digite seu E-mail de Recuperação" required>
            </div>

            <div class="row" style="margin-top: 40px;">
                <a href="index.php" class="btn-voltar" style="float: left;"><ion-icon name="arrow-undo"></ion-icon></a>
                
                <button type="submit" class="btn-login" style="float: right;">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <p style="margin-top:25px;"><?php echo $mensagem; ?></p>
        </form>


    </div>
</body>

</html>