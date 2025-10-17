<?php
    class Conexao {
        private static $host = "localhost";
        private static $usuario = "root";
        private static $senha = "f8lnxf8lnx";
        private static $banco = "mcecelulares";

        public static function conectar() {
            try {

                return new PDO("mysql:host=".self::$host.";dbname=".self::$banco.";charset=utf8",
                self::$usuario, self::$senha);

            } catch (PDOException $e) {
                die("Erro ao conectar com banco de dadaos: {$e->getMessage()}");
            }
        }
    }