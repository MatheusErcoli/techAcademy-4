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
            $sql = "insert into pedido (id_cliente, id_funcionario, data_pedido)
            values (:id_cliente, :id_funcionario, :data_pedido)";
        } else {
            $sql = "update pedido set
            id_cliente = :id_cliente,
            id_funcionario = :id_funcionario,
            data_pedido = :data_pedido
            where id_pedido = :id_pedido limit 1";
        }
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id_cliente", $dados['id_cliente']);
        $consulta->bindParam(":id_funcionario", $dados['id_funcionario']);
        $consulta->bindParam(":data_pedido", $dados['data_pedido']);

        return $consulta->execute();
    }

    public function listar()
    {
        $sql = "SELECT *
                FROM pedido p
                INNER JOIN cliente c ON c.id_cliente = p.id_cliente
                INNER JOIN funcionario f ON f.id_funcionario = p.id_funcionario
                ORDER BY p.id_pedido;
";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
}
