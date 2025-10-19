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
            if(campoSenha.type === "password"){
                campoSenha.type = "text";
            } else {
                campoSenha.type = "password";
            }
        }
    </script>
</head>
<body>
    <?php
        if(!isset($_SESSION["mcecelulares"])){
            //não te sessao e não foi dado post
            require "../views/index/login.php";
        } else if ((!isset($_SESSION["mcecelulares"])) && (!$_POST)) {
            //não tem sessao, mas foi dado post

        } else {

        }
    ?>
</body>
</html>