<?php
$conn = new mysqli("localhost", "root", "", "relogio_ponto");
$result = $conn->query("SELECT u.nome, r.dt_registro, r.tipo_registro
                        FROM registro_ponto r
                        JOIN funcionario f ON r.id_funcionario = f.id_funcionario
                        JOIN usuario u ON f.id_usuario = u.id_usuario
                        ORDER BY r.dt_registro DESC");

echo "<table border='1'><tr><th>Funcionário</th><th>Data/Hora</th><th>Tipo</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['nome']}</td><td>{$row['dt_registro']}</td><td>{$row['tipo_registro']}</td></tr>";
}
echo "</table>";
?>