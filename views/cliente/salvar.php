<?php

    if ($_POST) {

        $nome = trim($_POST['nome'] ?? NULL);
        $senha = $_POST['senha'] ?? NULL;
        $redigite = $_POST['redigite'] ?? NULL;
        $id = $_POST['id_cliente'] ?? NULL;

        if (empty($nome)) {
            echo "<script>mensagem('Erro, preencha seu nome','cliente','error');</script>";
            exit;
        } else if ($senha != $redigite) {
            echo "<script>mensagem('Erro, as senhas não são iguais','cliente','error');</script>";
            exit;
        } else if ((empty($id)&& empty($senha))) {
            echo "<script>mensagem('Erro, preencha a senha','cliente','error');</script>";
            exit;
        }

        if (!empty($senha)) {
            $_POST['senha'] = password_hash($senha, PASSWORD_BCRYPT);

        }
        $msg = $this->cliente->salvar($_POST);

        if ($msg == "1") {
            echo "<script>mensagem('Registro salvo com sucesso','cliente','ok');</script>";
        } else {
            echo "<script>mensagem('Erro ao salvar os dados','cliente','error');</script>";
        }

    } else {
        echo "<script>mensagem('Erro, requisição ivalida','cliente','error');</script>";
    }
