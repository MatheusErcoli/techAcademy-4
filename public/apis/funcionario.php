<?php
    header("Content-Type: application/json");

    require_once "../../config/Conexao.php";

    $db = new Conexao();
    $pdo = $db->conectar();

    try {
        $sql = "select * from funcionario where ativo = 1 order by nome";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();

        $dadosFuncionario = $consulta->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($dadosFuncionario);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }