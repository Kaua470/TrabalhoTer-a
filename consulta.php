<?php
include 'conexao.php';

$sql = "SELECT * FROM registros ORDER BY horario DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consultar Registros</title>
</head>
<body>

<a href="menu.php">Voltar ao Menu</a>

<h2>Consultar Registros</h2>

<?php
while($row = $result->fetch_assoc()) {
    echo "<p>" . $row['placa'] . " - " . $row['tipo'] . " - " . $row['horario'] . "</p>";
}
?>

</body>
</html>