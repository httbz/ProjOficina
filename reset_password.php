<?php
include_once './config/config.php';
include_once './classes/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $nome = $_POST['nome'];
    $senha_antiga = $_POST['senha_antiga'];
    $senha_nova = password_hash($_POST['senha_nova'], PASSWORD_BCRYPT);

    // Validar token e expiração
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE reset_token = ? AND reset_expira > NOW()");
    $stmt->execute([$token]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha_antiga, $usuario['senha'])) {
        // Atualizar senha
        $stmt = $db->prepare("UPDATE usuarios SET senha = ?, reset_token = NULL, reset_expira = NULL WHERE id = ?");
        $stmt->execute([$senha_nova, $usuario['id']]);
        echo "Senha redefinida com sucesso!";
    } else {
        echo "Token inválido ou senha antiga incorreta.";
    }
} else if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    die("Token inválido.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Redefinir Senha</title>
</head>
<body>
    <form method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
        <input type="text" name="nome" placeholder="Nome do usuário" required>
        <input type="password" name="senha_antiga" placeholder="Senha antiga" required>
        <input type="password" name="senha_nova" placeholder="Nova senha" required>
        <button type="submit">Redefinir Senha</button>
    </form>
</body>
</html>
