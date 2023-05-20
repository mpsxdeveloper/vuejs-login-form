<?php

require_once("ConnectionFactory.php");
require_once("User.php");

class Dao {

    private $conexao;
    
    public function __construct() {
        $this->conexao = ConnectionFactory::getInstance();
    }

    public function login($matricula, $senha) {

        try {            
            $sql = "SELECT * FROM users WHERE matricula = :matricula";
            $rs = $this->conexao->prepare($sql);
            $rs->bindParam(":matricula", $matricula);
            $rs->execute();
            if($rs->rowCount() > 0) {
                $row = $rs->fetch(PDO::FETCH_OBJ);
                if(password_verify($senha, $row->senha)) {
                    $usuario = new User();
                    $usuario->setId($row->id);
                    $usuario->setMatricula($row->matricula);
                    $usuario->setNome($row->nome);
                    return $usuario;
                }
            }
        }
        catch(PDOException $e) {
            echo($e->getMessage());
        }
        return null;

    }

}