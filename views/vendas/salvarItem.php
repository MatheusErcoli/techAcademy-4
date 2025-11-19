<?php
$id_item = $_POST['id_item'] ?? null;
$id_pedido = $_POST['id_pedido'] ?? null;
$id_produto = $_POST['id_produto'] ?? null;
$quantidade = $_POST['quantidade'] ?? null;
$preco_unitario = $_POST['preco_unitario'] ?? null;

if(empty($id_pedido)){
    echo "<script>mensagem('Digite o N° do pedido','vendas/item', 'error')</script>";
    exit;
} else if(empty($id_produto)){
    echo "<script>mensagem('Escolha qual é o produto','vendas/item', 'error')</script>";
    exit;
} else if(empty($quantidade)){
    echo "<script>mensagem('Digite a quantidade','vendas/item', 'error')</script>";
    exit;
} else if(empty($preco_unitario)){
    echo "<script>mensagem('Digite o preço unitário','vendas/item', 'error')</script>";
    exit;
}

$msg = $this->vendas->salvarItem($_POST);

if($msg){
    echo "<script>mensagem('Pedido salvo com sucesso!','vendas/item', 'ok')</script>";
    exit;
} else {
    echo "<script>mensagem('Pedido não foi salvo','vendas/item','error')</script>";
    exit;
}