<?php
$id_pedido = $_POST['id_pedido'] ?? null;
$id_cliente = $_POST['id_cliente'] ?? null;
$id_funcionario = $_POST['id_funcionario'] ?? null;
$dataPedido = $_POST['data_pedido'] ?? null;
$ativo = $_POST['ativo'] ?? null;

if(empty($id_cliente)){
    echo "<script>mensagem('Digite o nome do cliente','vendas','error');</script>";
    exit;
}else if(empty($id_funcionario)){
    echo "<script>mensagem('Digite o nome do Funcionário','vendas','error');</script>";
    exit;
}else if(empty($dataPedido)){
    echo "<script>mensagem('Digite a data do pedido','vendas','error');</script>";
    exit;
}

$msg = $this->vendas->salvar($_POST);

if($msg){
    echo "<script>mensagem('Pedido salvo com sucesso!','vendas','ok')</script>";
    exit;
} else {
    echo "<script>mensagem('Pedido não foi salvo','vendas','error')</script>";
    exit;
}