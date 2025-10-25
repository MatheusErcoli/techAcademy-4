<?php
    $id_categoria = $_POST['id_categoria'] ?? '';
    $descricao = trim($_POST['descricao'] ?? '');
    $nome = trim($_POST['nome'] ?? '');
    $ativo = $_POST['ativo'] ?? '';

    if(empty($nome)){
        echo "<script>mensagem('O nome da categoria é obrigatório!','categoria','error');</script>";
        exit;
    }else if($ativo === '' || $ativo === null){
        // usar comparação estrita porque '0' (não ativo) em PHP é considerado empty()
        echo "<script>mensagem('O campo ativo é obrigatório!','categoria','error');</script>";
        exit;
    }

    $msg = $this->categoria->salvar($_POST);

    if($msg == 1){
        echo "<script>mensagem('Categoria salva com sucesso!','categoria','ok');</script>";
    } else {
        echo "<script>mensagem('Erro ao salvar a categoria!','categoria','error');</script>";
    }