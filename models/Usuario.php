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
        
    }