<?php
class Categoria
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvar($dados){
        // normalizar o valor de 'ativo' para inteiro (S/N -> 1/0)
        $ativo = 0;
        if (isset($dados['ativo'])) {
            $ativo = ($dados['ativo'] === 'S' || $dados['ativo'] === '1' || $dados['ativo'] === 1) ? 1 : 0;
        }

        if(empty($dados['id_categoria'])){
            $sql = "insert into categoria (id_categoria,nome,descricao,ativo) values (NULL, :nome, :descricao, :ativo)";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":nome", $dados['nome']);
            $consulta->bindParam(":descricao", $dados['descricao']);
            $consulta->bindValue(":ativo", $ativo, PDO::PARAM_INT);
        } else{
            $sql = "update categoria set nome = :nome, descricao = :descricao, ativo = :ativo where id_categoria = :id_categoria limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":nome", $dados['nome']);
            $consulta->bindParam(":descricao", $dados['descricao']);
            $consulta->bindValue(":ativo", $ativo, PDO::PARAM_INT);
            $consulta->bindParam(":id_categoria", $dados['id_categoria']);
        }

        return $consulta->execute();
    }

    public function listar(){
        $sql = "select * from categoria order by id_categoria";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function editar($id){
        $sql = "select * from categoria where id_categoria = :id_categoria limit 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id_categoria", $id);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function excluir($id){
        $sql = "delete from categoria where id_categoria = :id_categoria limit 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id_categoria", $id);

        return $consulta->execute();
    }
}
