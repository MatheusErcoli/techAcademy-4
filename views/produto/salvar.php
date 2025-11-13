<?php
$id_produto = $_POST['id_produto'] ?? null;
$nome = trim($_POST['nome'] ?? null);
$id_categoria = $_POST['id_categoria'] ?? null;
$descricao = trim($_POST['descricao'] ?? null);
$valor = trim($_POST['valor'] ?? null);
$ativo = $_POST['ativo'] ?? null;
$destaque = $_POST['destaque'] ?? null;
$quantidade = $_POST['quantidade'] ?? 0;
$id_marca = $_POST['id_marca'] ?? null;

$valor = str_replace(".", "", $valor);
$_POST['valor'] = str_replace(",", ".", $valor);
$_POST['id_categoria'] = (int) ($id_categoria ?? 0);
$_POST['valor'] = (float) ($_POST['valor'] ?? 0);
$_POST['ativo'] = (isset($ativo) && ($ativo === 'S' || $ativo === '1' || $ativo === 1 || $ativo === true)) ? 1 : 0;
$_POST['destaque'] = (isset($destaque) && ($destaque === 'S' || $destaque === '1' || $destaque === 1 || $destaque === true)) ? 1 : 0;
$_POST['estoque'] = (int) ($quantidade ?? 0);

if (empty($nome)) {
    echo "<script>mensagem('Digite o nome do produto','produto','error');</script>";
    exit;
} else if (empty($id_categoria)) {
    echo "<script>mensagem('Selecione a categoria do produto','produto','error');</script>";
    exit;
} else if (empty($descricao)) {
    echo "<script>mensagem('Digite a descrição do produto','produto','error');</script>";
    exit;
} else if (empty($valor)) {
    echo "<script>mensagem('Digite o valor do produto','produto','error');</script>";
    exit;
} else if ($quantidade === null || !is_numeric($quantidade) || (int)$quantidade < 0) {
    echo "<script>mensagem('Digite uma quantidade válida para o estoque','produto','error');</script>";
    exit;
}

$uploaded = isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK;
$imagem = null;

if ($uploaded) {
    $ext = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
        echo "<script>mensagem('Formato de imagem não suportado. Use JPG/PNG.','produto','error');</script>";
        exit;
    }

    $imagem = time() . '.' . $ext;
    $_POST['imagem'] = $imagem;
} else {
    // preserva a imagem atual quando nenhum arquivo novo foi enviado
    // o form fornece um campo hidden `imagem_atual` com o nome da imagem existente
    $_POST['imagem'] = $_POST['imagem_atual'] ?? $_POST['imagem'] ?? null;
}

$msg = $this->produto->salvar($_POST);

if ($msg) {
    if ($uploaded) {
        $uploadDir = dirname(__DIR__, 2) . '/public/arquivos';
        $dest = $uploadDir . '/' . $imagem;
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $dest)) {
            echo "<script>mensagem('Produto salvo com sucesso!','produto','ok');</script>";
        } else {
            echo "<script>mensagem('Produto salvo, mas falha ao gravar imagem no servidor.','produto','error');</script>";
        }
    } else {
        echo "<script>mensagem('Produto salvo com sucesso!','produto','ok');</script>";
    }
} else {
    echo "<script>mensagem('Erro ao salvar o produto!','produto','error');</script>";
}
