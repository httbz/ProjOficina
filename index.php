<?php
session_start();
$_SESSION['autenticado'] = $_SESSION['usuario_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="./styles/styleIndex.css">

    <title>Oficina</title>
</head>

<body class="bg-dark text-white">
    <header class="container-fluid py-3 ">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <img src="./assets/img/logo.png" alt="Logo" class="img-fluid" style="height: 65px; width: 65px;">
            </div>
            <div class="col text-center">
                <h1 class="h3 fw-bold m-0">OFICINA BGH</h1>
            </div>
            <div class="col-auto">
                <div class="dropdown">
                    <ion-icon name="person-circle" class="fs-1 dropdown-toggle" data-bs-toggle="dropdown"></ion-icon>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Gerenciar Conta</a></li>
                        <li><a class="dropdown-item" href="./gerenciarUsuarios.php">Gerenciar Usuários</a></li>
                        <li><a class="dropdown-item" href="./logout.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main class="container py-5">
        <div class="row justify-content-center g-4">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="./gerenciarVeiculos.php" class="text-decoration-none">
                    <div class="bg-dark rounded-3 d-flex justify-content-center align-items-center"
                        style="height: 250px;">
                        <ion-icon name="car-sport"></ion-icon>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="./gerenciarClientes.php" class="text-decoration-none">
                    <div class="bg-dark rounded-3 d-flex justify-content-center align-items-center"
                        style="height: 250px;">
                        <ion-icon name="person"></ion-icon>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="./gerenciarServicos.php" class="text-decoration-none">
                    <div class="bg-dark rounded-3 d-flex justify-content-center align-items-center"
                        style="height: 250px;">
                        <ion-icon name="hammer"></ion-icon>
                    </div>
                </a>
            </div>

        </div>
        <div class="row justify-content-center g-4">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="./gerenciarProdutos.php" class="text-decoration-none">
                    <div class="bg-dark rounded-3 d-flex justify-content-center align-items-center"
                        style="height: 250px;">
                        <ion-icon name="pricetag"></ion-icon>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="./gerenciarEstoque.php" class="text-decoration-none">
                    <div class="bg-dark rounded-3 d-flex justify-content-center align-items-center"
                        style="height: 250px;">
                        <ion-icon name="logo-buffer"></ion-icon>
                    </div>
                </a>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (e) {
            if (!e.target.matches('.dropbtn')) {
                var myDropdown = document.getElementById("myDropdown");
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }
            }
        }
    </script>
</body>

</html>