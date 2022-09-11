<?php

    Class Usuarios{

        private $pdo;

        public function __construct($sgbd, $dbname, $host, $user, $password){

            try{
                $this->pdo = new PDO("{$sgbd}:dbname={$dbname};host={$host}", $user, $password);
            }
            catch(PDOException $e){
                echo "Erro com o acesso ao banco de dados: " . $e->getMessage();
            }
            catch(Exception $e){
                echo "Erro Genério :" . $e->getMessage();
                exit();
            }

        }

        public function buscarDados(){
            $res = array();
            $con = $this->pdo->query("SELECT * FROM clientes.cdo ORDER BY id DESC");
            $res = $con->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }



           

    }

    
    
?>