<?php

class Vendas
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index($id = null)
    {
        $dados = null;
        if (!empty($id)) {
            $dados = $this->editar($id);
        }

        require "../views/vendas/index.php";
    }
    public function editar($id)
    {
        $sql = "select * from pedido where id_pedido = :id_pedido limit 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id_pedido", $id);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function salvar($dados)
{
    if (empty($dados['id_pedido'])) {
        $sql = "INSERT INTO pedido (id_cliente, id_funcionario, data_pedido, ativo)
                VALUES (:id_cliente, :id_funcionario, :data_pedido, :ativo)";
    } else {
        $sql = "UPDATE pedido SET
                id_cliente = :id_cliente,
                id_funcionario = :id_funcionario,
                data_pedido = :data_pedido,
                ativo = :ativo
                WHERE id_pedido = :id_pedido LIMIT 1";
    }

    $consulta = $this->pdo->prepare($sql);
    $consulta->bindParam(":id_cliente", $dados['id_cliente']);
    $consulta->bindParam(":id_funcionario", $dados['id_funcionario']);
    $consulta->bindParam(":data_pedido", $dados['data_pedido']);
    $consulta->bindParam(":ativo", $dados['ativo']);

    // só faz bind DO ID se for update
    if (!empty($dados['id_pedido'])) {
        $consulta->bindParam(":id_pedido", $dados['id_pedido']);
    }

    return $consulta->execute();
}


    public function listar()
    {
        $sql = "SELECT 
            p.id_pedido,
            p.data_pedido,
            p.ativo,
            c.nome AS nome_cliente,
            f.nome AS nome_funcionario
        FROM pedido p
        INNER JOIN cliente c ON c.id_cliente = p.id_cliente
        INNER JOIN funcionario f ON f.id_funcionario = p.id_funcionario
        ORDER BY p.id_pedido";

        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function salvarItem($dados)
    {
        if(empty($dados['id_item'])){
            $sql = "insert into itempedido (id_pedido, id_produto, quantidade, preco_unitario) values (:id_pedido, :id_produto, :quantidade, :preco_unitario)";
        } else {
            $sql = "update itempedido set id_pedido = :id_pedido, id_produto = :id_produto, quantidade = :quantidade, preco_unitario = :preco_unitario where id_item = :id_item limit 1";
        }

        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id_pedido", $dados['id_pedido']);
        $consulta->bindParam(":id_produto", $dados['id_produto']);
        $consulta->bindParam(":quantidade", $dados['quantidade']);
        $consulta->bindParam(":preco_unitario", $dados['preco_unitario']);

        if(!empty($dados['id_item'])){
            $consulta->bindParam(":id_item", $dados['id_item']);
        }
        return $consulta->execute();
    }
    public function editarItem($id)
    {
        $sql = "select * from itempedido where id_item = :id_item limit 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id_item", $id);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
        
    }

    public function listarItem()
    {
        $sql = "select 
                ip.id_item,
                p.id_pedido,
                pr.nome,
                ip.quantidade,
                ip.preco_unitario
                from itempedido ip
                inner join pedido p on p.id_pedido = ip.id_pedido
                inner join produto pr on pr.id_produto = ip.id_produto
                order by ip.id_item";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarClientes()
    {
        $sql = "select * from cliente order by nome";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarFuncionario()
    {
        $sql = "select * from funcionario order by nome";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
     public function listarPedidos()
{
    $sql = "SELECT * FROM pedido ORDER BY id_pedido DESC";
    $consulta = $this->pdo->prepare($sql);
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_OBJ);
}


    public function listarProdutos()
    {
        $sql = "select * from produto order by id_produto";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
}
