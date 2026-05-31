<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST['placa'];

    $verifica = "SELECT * FROM veiculos WHERE placa = '$placa'";
    $resultado = $conn->query($verifica);

    if ($resultado->num_rows > 0) {
        $sql = "INSERT INTO registros (placa, tipo)
                VALUES ('$placa', 'Entrada')";

        $conn->query($sql);
    } else {
        echo "<p>Veículo não cadastrado.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Entrada</title>
</head>
<body>

<a href="menu.php">Voltar ao Menu</a>

<h2>Registrar Entrada</h2>

<form method="post">
    <input type="text" name="placa" placeholder="Placa" required><br><br>

    <button type="submit">Registrar</button>
</form>

</body>
</html>