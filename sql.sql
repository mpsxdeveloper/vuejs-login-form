CREATE DATABASE vue_db;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    matricula VARCHAR(15) NOT NULL,
    senha VARCHAR(60) NOT NULL,
    PRIMARY KEY(id),
    UNIQUE(matricula)
);