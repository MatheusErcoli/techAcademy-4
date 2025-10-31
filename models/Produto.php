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
        // form de cadastro e edição
        // quando um id for informado, buscar os dados e disponibilizar
        $dados = null;
        if (!empty($id)) {
            $dados = $this->editar($id);
        }

        require "../views/produto/index.php";
    }
    
    public function listarCategoria()
    {
        $sql = "select * from categoria order by descricao";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function salvar($dados)
    {
        // garantir compatibilidade entre 'quantidade' (form) e 'estoque' (db/antigos usos)
        if (isset($dados['quantidade'])) {
            $dados['estoque'] = (int)$dados['quantidade'];
        } else {
            $dados['estoque'] = isset($dados['estoque']) ? (int)$dados['estoque'] : 0;
        }
        //salvar ou alterar dados
        if (empty($dados['id_produto'])) {
            $sql = "insert into produto (id_produto,nome,id_categoria,descricao,valor,ativo,destaque,imagem,estoque) values (NULL, :nome,:id_categoria,:descricao,:valor,:ativo,:destaque,:imagem,:estoque)";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":nome", $dados['nome']);
            $consulta->bindParam(":id_categoria", $dados['id_categoria']);
            $consulta->bindParam(":descricao", $dados['descricao']);
            $consulta->bindParam(":valor", $dados['valor']);
            $consulta->bindParam(":ativo", $dados['ativo']);
            $consulta->bindParam(":destaque", $dados['destaque']);
            $consulta->bindParam(":imagem", $dados['imagem']);
            $consulta->bindValue(":estoque", (int)$dados['estoque'], PDO::PARAM_INT);
        } else {
            $sql = "update produto set nome = :nome, id_categoria = :id_categoria, descricao = :descricao,valor = :valor, ativo = :ativo, destaque = :destaque, imagem = :imagem, estoque = :estoque where id_produto = :id_produto";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":nome", $dados['nome']);
            $consulta->bindParam(":id_categoria", $dados['id_categoria']);
            $consulta->bindParam(":descricao", $dados['descricao']);
            $consulta->bindParam(":valor", $dados['valor']);
            $consulta->bindParam(":ativo", $dados['ativo']);
            $consulta->bindParam(":destaque", $dados['destaque']);
            $consulta->bindParam(":imagem", $dados['imagem']);
            $consulta->bindValue(":estoque", (int)$dados['estoque'], PDO::PARAM_INT);
            $consulta->bindParam(":id_produto", $dados['id_produto']);
        }

        return $consulta->execute();
    }

    public function listar(){
        $sql = "select * from produto order by id_produto";
        $consulta = $this->pdo->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function excluir($id){
        $sql = "delete from produto where id_produto = :id_produto limit 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id_produto", $id);

        return $consulta->execute();
    }

    public function editar($id)
    {
        $sql = "select * from produto where id_produto = :id_produto limit 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":id_produto", $id);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }
}


