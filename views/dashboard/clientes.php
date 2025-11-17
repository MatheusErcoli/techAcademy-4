<?php
session_start();
if (!isset($_SESSION["mcecelulares"])) {
    header("Location: ../../public/index.php");
    exit;
}
$usuario = $_SESSION["mcecelulares"]["nome"];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MCe Celulares</title>

    <!-- Bootstrap e Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Seu CSS global -->
    <link rel="stylesheet" href="../../public/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Ajustes específicos do dashboard */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: var(--dark-purple);
            color: var(--white);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
        }

        .sidebar img {
            width: 120px;
            margin-bottom: 10px;
        }

        .sidebar h4 {
            font-weight: 700;
            margin-bottom: 30px;
            color: var(--white);
        }

        .sidebar a {
            color: var(--white);
            text-decoration: none;
            width: 90%;
            padding: 10px;
            border-radius: 10px;
            margin: 5px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: var(--primary-purple);
        }

        .content {
            margin-left: 260px;
            padding: 30px;
        }

        .card-option {
            background-color: var(--white);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .card-option:hover {
            transform: translateY(-5px);
        }

        .card-option i {
            font-size: 45px;
            color: var(--dark-purple);
            margin-bottom: 15px;
        }

        .logout-btn {
            background-color: #dc3545;
            color: var(--white);
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            margin-top: auto;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background-color: #b82c3a;
        }
    </style>
</head>

<body>

    <!-- Menu lateral -->
    <div class="sidebar">
        <a class="navbar-brand fw-bold" href="index.php">
            <img src="../../public/images/logo.png" alt="logo">
        </a>


        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="produtos.php"><i class="fa fa-cart-shopping"></i> Produtos</a>
        <a href="clientes.php"><i class="fa fa-users"></i> Clientes</a>
        <a href="vendas.php"><i></i>Vendas</a>

        <a href="../../public/index" class="logout-btn">
            <i class="fa fa-arrow-left"></i> Voltar
        </a>

    </div>

    <!-- Conteúdo principal -->
    <div class="content p-4">
        <h2 class="text-white fw-bold mb-4">
            Seus Clientes
        </h2>
        <div class="row g-3">
            <div class="col-12 col-md-4">
                <iframe src="http://localhost:3000/public/question/f97a8f73-8013-41e0-870a-186c057586f0" width="100%"
                    height="300"
                    frameborder="0"
                    allowtransparency="true"></iframe>
            </div>
            <div class="col-12 col-md-4">
                <iframe src="http://localhost:3000/public/question/5cb86d34-1d9b-4fed-be7e-f1c717c594fc" width="100%"
                    height="300"
                    frameborder="0"
                    allowtransparency="true"></iframe>
            </div>
            <div class="col-12 col-md-4">
                <iframe src="http://localhost:3000/public/question/e5be137c-7f80-409e-bb35-72a457add528" width="100%"
                    height="300"
                    frameborder="0"
                    allowtransparency="true"></iframe>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <iframe src="http://localhost:3000/public/question/a8f553bc-1173-46c0-be07-226806faf8e9" width="100%"
                    allowtransparency="true"
                    height="500"
                    frameborder="0">
                </iframe>
            </div>
            <div class="col-12 col-md-6">
                    <iframe src="http://localhost:3000/public/question/e04153ef-6fbf-468e-b239-5c264efcea32" width="100%"
                    allowtransparency="true"
                    height="500"
                    frameborder="0">
                </iframe>
            </div>
        </div>
    </div>

</body>

</html>