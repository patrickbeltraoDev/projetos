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

        public function cadastrarUsuarios($name, $lastName, $cpf, $password, $email){

            $con = $this->pdo->prepare("SELECT * FROM clientes.cdo where cpf = :c");
            $con->bindValue(":c", $cpf);
            $con->execute();
            if($con->rowCount() > 0){
                return false;
            }else{
                $res = $this->pdo->prepare("INSERT INTO clientes.cdo (nome, sobrenome, cpf, email, senha) VALUES (:n, :s, :c, :p, :e)");
                $res->bindValue(":n", "$name");
                $res->bindValue(":s", "$lastName");
                $res->bindValue(":c", "$cpf");
                $res->bindValue(":p", "$password");
                $res->bindValue(":e", "$email");
                $res->execute();
                return true;
            }
        }

        public function excluirUsuarios($id){
            $con = $this->pdo->query("DELETE FROM clientes.cdo WHERE id = $id");
            
        }



           

    }

    
    
?>