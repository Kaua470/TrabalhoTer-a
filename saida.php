<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST['placa'];

    $sql = "INSERT INTO registros (placa, tipo)
            VALUES ('$placa', 'Saída')";

    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Saída</title>
</head>
<body>

<a href="menu.php">Voltar ao Menu</a>

<h2>Registrar Saída</h2>

<form method="post">
    <input type="text" name="placa" placeholder="Placa" required><br><br>

    <button type="submit">Registrar</button>
</form>

</body>
</html>