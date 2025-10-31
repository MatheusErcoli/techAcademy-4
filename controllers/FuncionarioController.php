<?php 
    require "../config/Conexao.php";
    require "../models/Funcionario.php";

    class FuncionarioController{
        private $funcionario;
        public function __construct() {
            $db = new Conexao();
            $pdo = $db->conectar();
            $this->funcionario = new Funcionario($pdo);
        }

        public function index($id){
            require "../views/funcionario/index.php";
        }
        public function salvar(){
            require "../views/funcionario/salvar.php";
        }
        public function listar(){
            require "../views/funcionario/listar.php";
        }
        public function excluir($id){
            require "../views/funcionario/excluir.php";
        }
    }