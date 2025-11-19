<?php
class Produto
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

        require "../views/produto/index.php";
    }

    public function listarCategoria()
    {
        $sql = "SELECT * FROM categoria ORDER BY descricao";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarMarca()
{
    $sql = "SELECT * FROM marca ORDER BY ds_marca";
    $consulta = $this->pdo->prepare($sql);
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_OBJ);
}


    public function salvar($dados)
    {
        // garante que estoque é um inteiro válido
        $dados['estoque'] = isset($dados['estoque']) ? (int)$dados['estoque'] : 0;

        // salva ou atualiza
        if (empty($dados['id_produto'])) {
            $sql = "INSERT INTO produto 
                (nome, id_categoria, descricao, valor, ativo, destaque, imagem, estoque, id_marca)
                VALUES (:nome, :id_categoria, :descricao, :valor, :ativo, :destaque, :imagem, :estoque, :id_marca)";
        } else {
            $sql = "UPDATE produto SET 
                nome = :nome,
                id_categoria = :id_categoria,
                descricao = :descricao,
                valor = :valor,
                ativo = :ativo,
                destaque = :destaque,
                imagem = :imagem,
                estoque = :estoque,
                id_marca = :id_marca
                WHERE id_produto = :id_produto";
        }

        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":nome", $dados['nome']);
        $consulta->bindParam(":id_categoria", $dados['id_categoria']);
        $consulta->bindParam(":descricao", $dados['descricao']);
        $consulta->bindParam(":valor", $dados['valor']);
        $consulta->bindParam(":ativo", $dados['ativo']);
        $consulta->bindParam(":destaque", $dados['destaque']);
        $consulta->bindParam(":imagem", $dados['imagem']);
        $consulta->bindParam(":estoque", $dados['estoque'], PDO::PARAM_INT);
        $consulta->bindParam(":id_marca", $dados['id_marca']);

        if (!empty($dados['id_produto'])) {
            $consulta->bindParam(":id_produto", $dados['id_produto']);
        }

        return $consulta->execute();
    }

    public function listar()
{
    $sql = "SELECT p.*, m.ds_marca FROM produto p LEFT JOIN marca m ON m.id_marca = p.id_marca ORDER BY p.id_produto";
    $consulta = $this->pdo->prepare($sql);
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_OBJ);
}


    public function excluir($id)
{
    $sql = "DELETE FROM itempedido WHERE id_produto = :id_produto";
    $consulta = $this->pdo->prepare($sql);
    $consulta->bindParam(":id_produto", $id);
    $consulta->execute();

    $sql = "DELETE FROM produto WHERE id_produto = :id_produto LIMIT 1";
    $consulta = $this->pdo->prepare($sql);
    $consulta->bindParam(":id_produto", $id);
    return $consulta->execute();
}


    public function editar($id)
    {
        $sql = "SELECT * FROM produto WHERE id_produto = :id_produto LIMIT 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id_produto", $id);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }
}
