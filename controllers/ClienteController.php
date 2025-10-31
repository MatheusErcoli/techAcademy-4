<?php
require "../config/Conexao.php";
require "../models/Cliente.php";

class ClienteController {
    private $cliente;

    public function __construct()
    {
        $db = new Conexao();
        $pdo = $db->conectar();
        $this->cliente = new Cliente($pdo);
    }

    public function index ($id = null) {
        require "../views/cliente/index.php";
    }

    public function excluir ($id) {
        require "../views/cliente/excluir.php";
    }

    public function salvar() {
        require "../views/cliente/salvar.php";
    }

    public function listar() {
        require "../views/cliente/listar.php";
    }
}
