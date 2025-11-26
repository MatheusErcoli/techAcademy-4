<?php
    header("Content-Type: application/json");

    require_once "../../config/Conexao.php";

    $db = new Conexao();
    $pdo = $db->conectar();

    try {
        // usar apenas 1/0 no filtro (apenas ativos)
        $sql = "select * from categoria where ativo = 1 order by descricao";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();

        // trazer todas as linhas
        $dadosCategoria = $consulta->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($dadosCategoria);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
       
    
