<?php
class Cliente {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    // buscar cliente por email (usado no login)
    public function getCliente($email){
        $sql = "select id_cliente as id, nome, email, senha from Cliente where email = :email limit 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":email", $email);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function editar ($id) {
        $sql = "select * from Cliente where id_cliente = :id limit 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id", $id);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function salvar($dados) {
        // adaptar nomes de campos: id_cliente, nome, email, senha, telefone, ativo
        if (empty($dados['id_cliente'])) {
            $sql = "insert into Cliente (nome, email, senha, telefone, ativo) values (:nome, :email, :senha, :telefone, :ativo)";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":nome", $dados['nome']);
            $consulta->bindParam(":email", $dados['email']);
            $consulta->bindParam(":senha", $dados['senha']);
            $consulta->bindParam(":telefone", $dados['telefone']);
            $consulta->bindParam(":ativo", $dados['ativo']);
        } else if (empty($dados['senha'])) {
            $sql = "update Cliente set nome = :nome, email = :email, telefone = :telefone, ativo = :ativo where id_cliente = :id_cliente limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":nome", $dados['nome']);
            $consulta->bindParam(":email", $dados['email']);
            $consulta->bindParam(":telefone", $dados['telefone']);
            $consulta->bindParam(":ativo", $dados['ativo']);
            $consulta->bindParam(":id_cliente", $dados['id_cliente']);
        } else {
            $sql = "update Cliente set nome = :nome, email = :email, senha = :senha, telefone = :telefone, ativo = :ativo where id_cliente = :id_cliente limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":nome", $dados['nome']);
            $consulta->bindParam(":email", $dados['email']);
            $consulta->bindParam(":senha", $dados['senha']);
            $consulta->bindParam(":telefone", $dados['telefone']);
            $consulta->bindParam(":ativo", $dados['ativo']);
            $consulta->bindParam(":id_cliente", $dados['id_cliente']);
        }

        return $consulta->execute();
    }

    public function listar() {
        $sql = "select id_cliente as id, nome, email, telefone, ativo from Cliente order by nome";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
}
