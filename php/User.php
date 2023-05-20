<?php

class User implements JsonSerializable {

    private $id;
    private $nome;
    private $senha;
    private $matricula;
    
    public function __construct() {
    }

    public function jsonSerialize() : mixed {
        $vars = get_object_vars($this);
        return $vars;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

}