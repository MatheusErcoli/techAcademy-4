<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle - Mce Celulares</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.inputmask.min.js"></script>
    <script src="js/jquery.maskedinput-1.2.1.js"></script>
    <script src="js/parsley.min.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script>
        mostrarSenha = () => {
            const campoSenha = document.getElementById("senha");
            if (campoSenha.type === "password") {
                campoSenha.type = "text";
            } else {
                campoSenha.type = "password";
            }
        }

        //função para mostrar mensagem de erro
        mensagem = function(msg, url, icone) {
            Swal.fire({
                icon: icone,
                title: msg,
                confirmButtonText: 'OK',
            }).then((result) => {
                location.href = url;
            });
        }
    </script>
</head>

<body>
    <?php
    if ((!isset($_SESSION["mcecelulares"])) && ($_POST)) {
        //não tem sessao, mas foi dado post
        $email = trim($_POST['email'] ?? NULL);
        $senha = trim($_POST['senha'] ?? NULL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>mensagem('E-mail inválido!', 'index', 'error');</script>";
        } else if (empty($senha)) {
            echo "<script>mensagem('Senha inválida!', 'index', 'error');</script>";
        } else {
            require "../controllers/indexController.php";
            $acao = new indexController();
            $acao->verificar($email, $senha);
        }
    } else if (!isset($_SESSION["mcecelulares"])) {
        //não te sessao e não foi dado post
        require "../views/index/login.php";
    } else {
    ?>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="index">
                    <img src="images/logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="categoria">Categoria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produtos">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="usuario">Usuário</a>
                        </li>
                    </ul>
                    <div class="d-flex" role="search">
                        olá <?= $_SESSION["mcecelulares"]["nome"]; ?><a href="index/sair" title="Sair" class="btn btn-danger"><i class="fas fa-power-off"></i> Sair</a>
                    </div>
                </div>
            </div>
        </nav>
    <?php
    }
    ?>
</body>

</html>