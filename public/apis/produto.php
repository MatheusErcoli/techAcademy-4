<?php
    header("Content-Type: application/json");

    $id = $_GET['id'] ?? NULL;
    $categoria = $_GET["categoria"] ?? NULL;

    require_once "../../config/Conexao.php";

    $db = new Conexao();
    $pdo = $db->conectar();

    try {
        if (!empty($categoria)) {
            // todos os produtos de uma categoria
            $sql = "select * from produto where ativo = 1 AND id_categoria = :categoria order by nome";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(":categoria", $categoria);
            $consulta->execute();

            $dadosProduto = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } else if (!empty($id)) {
            // um determinado produto
            $sql = "select * from produto where ativo = 1 AND id_produto = :id limit 1";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(":id", $id);
            $consulta->execute();

            $dadosProduto = $consulta->fetch(PDO::FETCH_ASSOC);
        } else {
            // todos os produtos
            $sql = "select * from produto where ativo = 1 order by nome";
            $consulta = $pdo->prepare($sql);
            $consulta->execute();

            $dadosProduto = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode($dadosProduto);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }