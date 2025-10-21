<?php
    require "../config/Conexao.php";
    require "../models/Usuario.php";

    class indexController{
        public $usuario;

        public function __construct() {
            $db = new Conexao();
            $pdo = $db->conectar();
            $this->usuario = new Usuario($pdo);
        }
        public function index() {

        }

        public function verificar($email, $senha){
            $dadosUsuario = $this->usuario->getUsuario($email);
            if(empty($dadosUsuario->id)){
                echo "<script>mensagem('Usuário inválido!', 'index', 'error');</script>";
            } else if(!password_verify($senha, $dadosUsuario->senha)){
                echo "<script>mensagem('senha inválido!', 'index', 'error');</script>";
            } else {
                $_SESSION["mcecelulares"] = array("id"=>$dadosUsuario->id, "nome"=>$dadosUsuario->nome);
                echo "<script>location.href='index'</script>";
            }
        }
    }