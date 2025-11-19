<?php
require_once "../config/Conexao.php";
require_once "../models/Vendas.php";

class VendasController{
    private $vendas;

    public function __construct()
    {
        $db = new Conexao();
        $pdo = $db->conectar();
        $this->vendas = new Vendas($pdo);
    }

    public function index($id = null)
    {
        $this->vendas->index($id);
    }

    public function salvar()
    {
        require "../views/vendas/salvar.php";
    }

    public function listar()
    {
        require "../views/vendas/listar.php";
    }
}