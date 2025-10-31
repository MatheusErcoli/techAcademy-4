<?php
    header("Content-Type: application/json");

    require_once "../../config/Conexao.php";

    $db = new Conexao();
    $pdo = $db->conectar();

    $sql = "select * from funcionario where ativo = 'S' order by nome";
    $consulta = $pdo->prepare($sql);
    $consulta->execute();

    $dadosCategoria = $consulta->fetch(PDO::FETCH_ASSOC);

    echo json_encode($dadosFuncionario);