<?php
    require "../config/Conexao.php";
    require "../models/Categoria.php";

    class CategoriaController{

        private $categoria;

        public function __construct() {
            $db = new Conexao();
            $pdo = $db->conectar();
            $this->categoria = new Categoria($pdo);
        }

        public function index($id = null){
        }

        public function salvar(){
            
        }

        public function listar(){

        }

        public function excluir($id){

        }
    }