<?php
session_start();
$conn = new mysqli("localhost", "root", "", "relogio_ponto");

$login = $_POST['login'];
$senha = md5($_POST['senha']);
$query = "SELECT * FROM usuario WHERE login='$login' AND senha='$senha' AND ativo='A'";

$result = $conn->query($query);
if ($result->num_rows > 0) {
    $_SESSION['usuario'] = $login;
    header("Location: dashboard.html");
} else {
    echo "Login inválido.";
}
?>