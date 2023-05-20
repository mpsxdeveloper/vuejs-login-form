<?php

    require_once("Dao.php");    

    $query = trim(filter_input(INPUT_POST, "query"));
    if($query == "login") {
        header("Content-Type: application/json; charset=utf-8");
        $matricula = trim(filter_input(INPUT_POST, "matricula"));
        $senha = trim(filter_input(INPUT_POST, "senha"));
        $csrf_token = filter_input(INPUT_POST, "csrf_token");
        $usuarioDAO = new Dao();
        $usuario = $usuarioDAO->login($matricula, $senha);
        if($usuario != null && $usuario->getId() != null) {
            session_start();
            if($csrf_token == $_SESSION['csrf_token']) {
                $_SESSION["id"] = $usuario->getId();
                $_SESSION["matricula"] = $usuario->getMatricula();
                $_SESSION["nome"] = $usuario->getNome();                
                echo json_encode($usuario);
            }
            else {
                echo json_encode(false);
            }
        }
        else {
            echo json_encode(false);
        }
    }
    else if($query == "logout") {
        session_start();
        unset($_SESSION["id"]);
        unset($_SESSION["matricula"]);
        unset($_SESSION["nome"]);
        session_destroy();
        header("Location: ../index.php");
    }