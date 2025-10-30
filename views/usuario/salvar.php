<?php

    if ($_POST) {

        

        $nome = trim($_POST['nome'] ?? NULL);
        $senha = $_POST['senha'] ?? NULL;
        $redigite = $_POST['redigite'] ?? NULL;
        $id = $_POST['id'] ?? NULL;

        if (empty($nome)) {
            echo "<script>mensagem('Erro, preencha seu nome','usuario','error');</script>";
            
        } else if ($senha != $redigite) {
            echo "<script>mensagem('Erro, as senhas não são iguais','usuario','error');</script>";

        } else if ((empty($id)&& empty($senha))) {
            echo "<script>mensagem('Erro, preencha a senha','usuario','error');</script>";

        } 

        if (!empty($senha)) {
            $_POST['senha'] = password_hash($senha, PASSWORD_BCRYPT);

        }


        
        $msg = $this->usuario->salvar($_POST);

        if ($msg == "1") {
            echo "<script>mensagem('Registro salvo com sucesso','usuario','ok');</script>";
        } else {
            echo "<script>mensagem('Erro ao salvar os dados','usuario','error');</script>";
        }

    } else {
        echo "<script>mensagem('Erro, requisição ivalida','usuario','error');</script>";
    }