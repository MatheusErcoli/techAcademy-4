<?php
    class Usuario {
        Private $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo;
        }

        public function getUsuario($email){
            $sql = "select id,nome,email,senha from usuario where email = :email limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":email", $email);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_OBJ);
        }

        public function editar ($id) {
            $sql = "select * from usuario where id = :id limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":id", $id);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_OBJ);
        }

        public function salvar($dados) {
          
            if (empty($dados['id'])) {
                $sql = "insert into usuario (nome, email, senha, telefone, ativo) 
                        values (:nome, :email, :senha, :telefone, :ativo)";
                $consulta = $this->pdo->prepare($sql);
                $consulta->bindParam(":nome", $dados['nome']);
                $consulta->bindParam(":email", $dados['email']);
                $consulta->bindParam(":senha", $dados['senha']);
                $consulta->bindParam(":telefone", $dados['telefone']);
                $consulta->bindParam(":ativo", $dados['ativo']);
                return $consulta->execute();
            } 
            
        }
        
    }