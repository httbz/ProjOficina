<?php
session_start();
include_once './config/config.php';
include_once './classes/Usuario.php';


$usuario = new Usuario($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        // Processar login
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        if ($dados_usuario = $usuario->login($nome, $senha)) {
            $_SESSION['usuario_id'] = $dados_usuario['id'];
            header('Location: index.php');
            exit();
        } else {
            $mensagem_erro = "Credenciais inválidas!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="./styles/styleLogin.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto+Condensed&display=swap"
    rel="stylesheet">

<head>
    <title>LOGIN</title>
</head>

<body>
    <main>
        <div class="test-box">
            <h1>LOGIN</h1>
        </div>
        <div class="container">
            <div class="box">
                <form method="POST">
                    <label for="">Usuario:</label><br>
                    <input type="text" name="nome" required class="control" placeholder="Usuario...">
                    <br><br>
                    <label for="">Senha:</label><br>
                    <input type="password" name="senha" required class="control" placeholder="Senha...">
                    <br><br>
                    <input type="submit" name="login" value="➤" class="btn">
                </form>
                <div class="mensagem">
                    <?php if (isset($mensagem_erro))
                        echo '<p>' . $mensagem_erro . '</p>'; ?>
                </div>
            </div>

    </main>
</body>

</html>