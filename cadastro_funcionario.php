<?php
$conn = new mysqli("localhost", "root", "", "relogio_ponto");

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = md5($_POST['senha']);
$cpf = $_POST['cpf'];
$cargo_id = $_POST['cargo_id'];

$conn->query("INSERT INTO usuario (login, senha, nome, cpf, tipo_acesso, ativo)
              VALUES ('$login', '$senha', '$nome', '$cpf', 'F', 'A')");

$id_usuario = $conn->insert_id;
$conn->query("INSERT INTO funcionario (id_usuario, id_cargo) VALUES ($id_usuario, $cargo_id)");
header("Location: dashboard.html");
?>