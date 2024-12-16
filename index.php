<?php
session_start();
include_once './config/config.php';
include_once './classes/Usuario.php';

$usuario = new Usuario($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['forgot_password'])) {
    $email = $_POST['email'];
    // Gerar um token único
    $token = bin2hex(random_bytes(50));
    $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));
    
    // Salvar token e validade no banco de dados
    $stmt = $db->prepare("UPDATE usuarios SET reset_token = ?, reset_expira = ? WHERE email = ?");
    $stmt->execute([$token, $expira, $email]);

    // Enviar e-mail com o link de redefinição
    $reset_link = "http://seusite.com/reset_password.php?token=$token";
    $assunto = "Redefinição de Senha";
    $mensagem = "Clique no link para redefinir sua senha: $reset_link";
    mail($email, $assunto, $mensagem);

    echo "Um link de redefinição foi enviado para o seu e-mail.";
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
</head>
<body>
    <div class="container">
        <h1 class="login-title">LOGIN</h1>
        <form method="POST" name="login" class="login-form">
            <div class="input-group">
                <label for="nome">Usuário:</label>
                <input type="text" name="nome" id="nome" placeholder="Digite seu usuário" required>
            </div>
            <div class="input-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
            </div>
                <!-- Link para "Esqueceu a senha?" -->
    <p><a href="#" onclick="document.getElementById('forgot-form').style.display='block', document.getElementById('login').style.display='none'">Esqueceu a senha?</a></p>
            <button type="submit" name="login" class="btn-login">
                <i class="fas fa-arrow-right"></i>
            </button>
        </form>
            <!-- Formulário "Esqueceu a senha?" -->
    <div id="forgot-form" style="display:none;">
        <form method="POST">
            <input type="email" name="email" placeholder="Digite seu e-mail" required>
            <button type="submit" name="forgot_password" class="btn-danger"><i class="fas fa-arrow-right"></i></button>
        </form>
    </div>
    </div>
</body>
</html>