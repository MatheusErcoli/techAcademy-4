<?php
    header("Content-Type: application/json");

    require_once "../../config/Conexao.php";

    $db = new Conexao();
    $pdo = $db->conectar();

    try {
        // aceitar tanto 'S'/'N' quanto 1/0 dependendo do esquema
        $sql = "select * from categoria where ativo IN ('S', '1', 1) order by descricao";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();

        // trazer todas as linhas
        $dadosCategoria = $consulta->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($dadosCategoria);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
       
    
