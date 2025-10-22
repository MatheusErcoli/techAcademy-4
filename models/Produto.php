<?php
    class Produto {
        private $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo;
        }

        public function index($id){
            //form de cadastro e edição
            require "../views/produto/index.php";
        }

        public function salvar(){
            //salvar ou alterar
        }

        public function excluir($id){
            //excluir dados
        }

        public function listar(){
            //listar dados
        }
    }