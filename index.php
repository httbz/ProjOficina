<?php
session_start();
$_SESSION['autenticado'] = $_SESSION['usuario_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styleIndex.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <title>Oficina</title>
</head>

<body>
    <header>
        <div class="row">
            <img src="./assets/img/logo.png" alt="Logo" class="small-img">
            <h1 style="font-size: 3rem; font-weight: 700;">OFICINA BGH</h1>

            <div class="dropdown">
                <ion-icon name='person-circle' class="dropbtn" style='font-size: 3rem;' onclick="myFunction()" ></ion-icon>

                <div id="myDropdown" class="dropdown-content">

                    <a href="#">Link 1</a>
                    <a href="./gerenciarUsuarios.php">Gerenciar Usuários</a>
                    <a href="./logout.php">Sair</a>
                </div>
            </div>

        </div>
    </header>
    <main>
        <div class="container">
            <a href="./gerenciarVeiculos.php">
                <div class="test">
                    <ion-icon name="car-sport"></ion-icon>
                </div>
            </a>

            <a href="./gerenciarClientes.php">
                <div class="test">
                    <ion-icon name="person"></ion-icon>
                </div>
            </a>

            <a href="./gerenciarServicos.php">
                <div class="test">
                    <ion-icon name="hammer"></ion-icon>
                </div>
            </a>

            <a href="./gerenciarProdutos.php">
                <div class="test" id="price">
                    <ion-icon name="pricetag"></ion-icon>
                </div>
            </a>

            <a href="./gerenciarEstoque.php">
                <div class="test">
                    <ion-icon name="logo-buffer"></ion-icon>
                </div>
            </a>

        </div>

    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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