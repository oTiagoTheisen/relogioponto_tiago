CREATE SCHEMA IF NOT EXISTS relogio_ponto DEFAULT CHARACTER SET utf8;
USE relogio_ponto;

CREATE TABLE usuario (
    id_usuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    login VARCHAR(45) NOT NULL,
    senha VARCHAR(45) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) DEFAULT NULL,
    tipo_acesso VARCHAR(1) DEFAULT NULL, -- 'A' = admin, 'F' = funcionário
    ativo VARCHAR(1) DEFAULT 'A'
);

INSERT INTO usuario (login, senha, nome, cpf, tipo_acesso, ativo)
VALUES ('admin', 'd2063a446846c004df97e299fb781ea4', 'Administrador', '00000000000', 'A', 'A');

CREATE TABLE cargo (
    id_cargo INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_cargo VARCHAR(45) NOT NULL,
    ativo VARCHAR(1) NOT NULL DEFAULT 'A'
);

INSERT INTO cargo (nome_cargo, ativo) VALUES ('Auxiliar', 'A');

CREATE TABLE funcionario (
    id_funcionario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_cargo INT NOT NULL,
    ativo VARCHAR(1) NOT NULL DEFAULT 'A',
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_cargo) REFERENCES cargo(id_cargo)
);

INSERT INTO funcionario (id_usuario, id_cargo) VALUES (1, 1);

CREATE TABLE registro_ponto (
    id_registro INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_funcionario INT NOT NULL,
    dt_registro DATETIME NOT NULL,
    tipo_registro ENUM('entrada', 'saida') NOT NULL,
    ativo VARCHAR(1) NOT NULL DEFAULT 'A',
    FOREIGN KEY (id_funcionario) REFERENCES funcionario(id_funcionario)
);

INSERT INTO registro_ponto (id_funcionario, dt_registro, tipo_registro)
VALUES (1, NOW(), 'entrada');