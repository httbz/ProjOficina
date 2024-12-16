<?php
// account_management.php
session_start(); // Start session for managing user data

include("../config/config.php");
include("../classes/Usuario.php");

$user = $_SESSION['usuario_id']; // Fetch current user data

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission for updating user details
    $username = $_POST['nome'] ?? $user['nome'];
    $email = $_POST['email'] ?? $user['email'];
    $password = $_POST['password'] ?? $user['password'];

    // Validate and update user data (you should add actual validation and database logic)
    $user['nome'] = $username;
    $user['email'] = $email;
    $user['password'] = $password;

    // Simulate saving to the database
    $_SESSION['usuario'] = $user;
    $message = "Account updated successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../styles/styleCadUsuario.css">
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Gerenciar Conta</title>
</head>
<body>
<header>
        <img src="../assets/img/logo.png" alt="Logo" class="small-img">
        <h1 class="le title-container">Gerenciar Conta</h1>
        <a href="../dashboard.php" class="btn-voltar"><ion-icon name="arrow-undo"></ion-icon></a>
    </header>
    
    <?php if (!empty($message)) echo "<p style='color:green;'>$message</p>"; ?>

    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <button type="submit" class="btn-atualizar">Update</button>
    </form>
</body>
</html>
