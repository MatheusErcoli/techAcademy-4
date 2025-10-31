<?php

    $id_funcionario = $_POST['id_funcionario'] ?? null;
    $nome = trim($_POST['nome'] ?? null);
    $cargo = trim($_POST['cargo'] ?? null);
    $email = trim($_POST['email'] ?? null);
    $telefone = trim($_POST['telefone'] ?? null);
    $ativo = $_POST['ativo'] ?? null;
    $dataAdmissao = trim($_POST['dataAdmissao'] ?? null);
    $salario = trim($_POST['salario'] ?? null);

    $salario = str_replace('.', '', $salario);
    $_POST["salario"] = str_replace(',', '.', $salario);

    $_POST['ativo'] = (isset($ativo) && ($ativo === 'S' || $ativo === '1' || $ativo === 1 || $ativo === true)) ? 1 : 0;
    $ativo = $_POST['ativo'];

    if (empty($nome)) {
        echo "<script>mensagem('Erro, preencha o nome','funcionario','error');</script>";
        exit;
    } else if (empty($cargo)) {
        echo "<script>mensagem('Erro, preencha o cargo','funcionario','error');</script>";
        exit;
    } else if (empty($email)) {
        echo "<script>mensagem('Erro, preencha o email','funcionario','error');</script>";
        exit;
    } else if (!isset($ativo) || $ativo === '') {
        echo "<script>mensagem('Erro, selecione se está ativo ou não','funcionario','error');</script>";
        exit;
    } else if (empty($dataAdmissao)) {
        echo "<script>mensagem('Erro, preencha a data de admissão','funcionario','error');</script>";
        exit;
    } else if (empty($salario)) {
        echo "<script>mensagem('Erro, preencha o salário','funcionario','error');</script>";
        exit;
    } else if (empty($telefone)) {
        echo "<script>mensagem('Erro, preencha o telefone','funcionario','error');</script>";
        exit;
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>mensagem('Erro, email inválido','funcionario','error');</script>";
        exit;
    }

    $msg = $this->funcionario->salvar($_POST);

    if ($msg == 1) {
        echo "<script>mensagem('Funcionário salvo com sucesso!','funcionario','ok');</script>";
    } else {
        echo "<script>mensagem('Erro ao salvar o funcionário!','funcionario','error');</script>";
    }