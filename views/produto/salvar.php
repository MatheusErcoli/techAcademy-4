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
    // aceitar 'S'/'N', '1'/'0' ou valores inteiros
    $_POST['ativo'] = (isset($ativo) && ($ativo === 'S' || $ativo === '1' || $ativo === 1 || $ativo === true)) ? 1 : 0;
    $_POST['destaque'] = (isset($destaque) && ($destaque === 'S' || $destaque === '1' || $destaque === 1 || $destaque === true)) ? 1 : 0;
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
//piazada abaixo vou deixar comentários explicando o código
// Verifica se uma imagem foi enviada no formulário
    $uploaded = isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK;
    $imagem = null;
    //se foi enviada
    if($uploaded){
        //"PATHINFO_EXTENSION" pega a extensão do arquivo, "strtolower" converte para minúsculas
        $ext = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        // "in_array" verifica qual formato e como está com ! se não estiver no formato da errado
        if(!in_array($ext, ['jpg','jpeg','png'])){
            echo "<script>mensagem('Formato de imagem não suportado. Use JPG/PNG.','produto','error');</script>";
            exit;
        }
        //transforma o nome do arquivo para evitar conflitos
        $imagem = time() . '.' . $ext;
        $_POST['imagem'] = $imagem;
    } else {
        //caso nenhuma imagem tenha sido enviada não tem problema por causa do ?? NULL
        $_POST['imagem'] = $_POST['imagem'] ?? null;
    }
    //salva no banco produto
    $msg = $this->produto->salvar($_POST);
    if($msg){
        if($uploaded){
            //defini o caminho da pasta
            $uploadDir = dirname(__DIR__, 2) . '/public/arquivos';
            //move o arquivo para a pasta
            $dest = $uploadDir . '/' . $imagem;
            if(move_uploaded_file($_FILES['imagem']['tmp_name'], $dest)){
                echo "<script>mensagem('Produto salvo com sucesso!','produto','ok');</script>";
            } else {
                echo "<script>mensagem('Produto salvo, mas falha ao gravar imagem no servidor.','produto','error');</script>";
            }
        } else {
            echo "<script>mensagem('Produto salvo com sucesso!','produto','ok');</script>";
        }
        //caso produto não tenha sido salvado
    } else {
        echo "<script>mensagem('Erro ao salvar o produto!','produto','error');</script>";
    }