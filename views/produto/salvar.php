<?php

    $id_produto = $_POST['id_produto'] ?? null;
    $nome = trim($_POST['nome'] ?? null);
    $id_categoria = $_POST['id_categoria'] ?? null;
    $descricao = trim($_POST['descricao'] ?? null);
    $valor = trim($_POST['valor'] ?? null);
    $ativo = $_POST['ativo'] ?? null;
    $destaque = $_POST['destaque'] ?? null;

    $valor = str_replace(".", "", $valor);
    $_POST['valor'] = str_replace(",", ".", $valor);
    $_POST['id_categoria'] = (int) ($id_categoria ?? 0);
    $_POST['valor'] = (float) ($_POST['valor'] ?? 0);
    $_POST['ativo'] = ($ativo === 'S') ? 1 : 0;
    $_POST['destaque'] = ($destaque === 'S') ? 1 : 0;
    //validar os dados (obrigatórios)
    if(empty($nome)){
        echo "<script>mensagem('Digite o nome do produto','produto','error');</script>";
        exit;
    } else if(empty($id_categoria)){
        echo "<script>mensagem('Selecione a categoria do produto','produto','error');</script>";
        exit;
    } else if(empty($descricao)){
        echo "<script>mensagem('Digite a descrição do produto','produto','error');</script>";
        exit;
    } else if(empty($valor)){
        echo "<script>mensagem('Digite o valor do produto','produto','error');</script>";
        exit;
    } else if(empty($ativo)){
        echo "<script>mensagem('Selecione se o produto está ativo','produto','error');</script>";
        exit;
    } else if(empty($destaque)){
        echo "<script>mensagem('Selecione se o produto é destaque','produto','error');</script>";
        exit;
    }

    $imagem = $_POST['imagem'] ?? time().".jpg"; 
    $_POST['imagem'] = $imagem;

    $msg = $this->produto->salvar($_POST);
    if($msg == 1){
        //gravar a imagem no servidor
        move_uploaded_file($_FILES['arquivo']['tmp_name'], "arquivos/{$imagem}");
        echo "<script>mensagem('Produto salvo com sucesso!','produto','ok');</script>";
    }else{
        echo "<script>mensagem('Erro ao salvar o produto!','produto','error');</script>";
    }