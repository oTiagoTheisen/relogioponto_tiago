<?php
$conn = new mysqli("localhost", "root", "", "relogio_ponto");
$id = $_POST['funcionario_id'];
$tipo = $_POST['tipo_registro'];
$conn->query("INSERT INTO registro_ponto (id_funcionario, dt_registro, tipo_registro)
              VALUES ($id, NOW(), '$tipo')");
header("Location: dashboard.html");
?>