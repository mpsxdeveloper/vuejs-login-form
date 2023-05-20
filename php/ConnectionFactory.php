<?php

class ConnectionFactory {
    
    public static $instance;

    private function __construct() {
    }
     
    public static function getInstance() {

        if(!isset(self::$instance)) {
            $banco = "vue_db";
            $host = "localhost";
            $usuario = "root";
            $senha = "";
            try {
                self::$instance = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
            } 
            catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        
        return self::$instance;
        
    }

}
