<?php
    class Funcionario {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function getFuncionario($email) {
            $sql = "select * from funcionario where email = :email LIMIT 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":email", $email);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_OBJ);
        }

        public function salvar($dados) {
            if (empty($dados['id_funcionario'])){
                $sql = "insert into funcionario (id_funcionario, nome, cargo, email, telefone, salario, ativo, data_admissao) values (NULL, :nome, :cargo, :email, :telefone, :salario, :ativo, :data_admissao)";
                $consulta = $this->pdo->prepare($sql);
                $consulta->bindParam(":nome", $dados['nome']);
                $consulta->bindParam(":cargo", $dados['cargo']);
                $consulta->bindParam(":email", $dados['email']);
                $consulta->bindParam(":telefone", $dados['telefone']);
                $consulta->bindParam(":salario", $dados['salario']);
                $consulta->bindParam(":ativo", $dados['ativo']);
                $consulta->bindParam(":data_admissao", $dados['dataAdmissao']);
            } else {
                $sql = "update funcionario set nome = :nome, cargo = :cargo, email = :email, telefone = :telefone, salario = :salario, ativo = :ativo, data_admissao = :data_admissao where id_funcionario = :id_funcionario limit 1";
                $consulta = $this->pdo->prepare($sql);
                $consulta->bindParam(":nome", $dados['nome']);
                $consulta->bindParam(":cargo", $dados['cargo']);
                $consulta->bindParam(":email", $dados['email']);
                $consulta->bindParam(":telefone", $dados['telefone']);
                $consulta->bindParam(":salario", $dados['salario']);
                $consulta->bindParam(":ativo", $dados['ativo']);
                $consulta->bindParam(":data_admissao", $dados['dataAdmissao']);
                $consulta->bindParam(":id_funcionario", $dados['id_funcionario']);
            }
            return $consulta->execute();
        }

        public function listar() {
            $sql = "select * from funcionario order by id_funcionario";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }

        public function editar($id) {
            $sql = "select * from funcionario where id_funcionario = :id_funcionario limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":id_funcionario", $id);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_OBJ);
        }

        public function excluir($id) {
            $sql = "delete from funcionario where id_funcionario = :id_funcionario limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":id_funcionario", $id);

            return $consulta->execute();
        }
    }