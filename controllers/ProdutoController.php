<?php
    require "../config/Conexao.php";
    require "../models/Produto.php";
    
    class ProdutoController{

        private $produto;

        public function __construct() {
            $db = new Conexao();
            $pdo = $db->conectar();
            $this->produto = new Produto($pdo);
        }

        // mostra o formulário de cadastro/edição ou lista conforme o modelo
        public function index($id = null){
            $this->produto->index($id);
        }
        
    }