<?php
require_once "../config/Conexao.php";
require_once "../models/Vendas.php";

class VendasController
{
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
        $dadosPedido = $this->vendas->listar();
        require "../views/vendas/listar.php";
    }

    public function item($id = null)
    {
        $dados = null;

        if (!empty($id)) {
            $dados = $this->vendas->editarItem($id);
        }
        $dadosPedido = $this->vendas->listarPedidos();
        $dadosProdutos = $this->vendas->listarProdutos();
        require "../views/vendas/item.php";
    }

    public function listarItem()
    {
        require "../views/vendas/listarItem.php";
    }

    public function salvarItem()
    {
        require "../views/vendas/salvarItem.php";
    }
}
