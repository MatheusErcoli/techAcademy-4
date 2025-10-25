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
            // quando chamado com um id (ex: categoria/index/1) o $id será passado aqui
            require "../views/categoria/index.php";
        }

        public function salvar(){
            require "../views/categoria/salvar.php";
        }

        public function listar(){
            require "../views/categoria/listar.php";
        }

        public function excluir($id){
            require "../views/categoria/excluir.php";

        }
    }