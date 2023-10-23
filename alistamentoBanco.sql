CREATE DATABASE alistamento;

USE alistamento;

CREATE TABLE usuarios (
    usu_id INT PRIMARY KEY AUTO_INCREMENT,
    usu_nome VARCHAR(255) NOT NULL,
    usu_sobrenome VARCHAR(255) NOT NULL,
    usu_endereco VARCHAR(255) NOT NULL,
    usu_bairro VARCHAR(255) NOT NULL,
    usu_numero VARCHAR(20) NOT NULL,
    usu_email VARCHAR(255) NOT NULL,
    usu_telefone VARCHAR(20) NOT NULL,
    usu_rg VARCHAR(20) NOT NULL,
    usu_cpf VARCHAR(14) NOT NULL,
    usu_genero ENUM('Masculino', 'Feminino') NOT NULL
);

DROP TABLE usuarios;

SELECT * FROM usuarios;	