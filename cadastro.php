<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];

    $sql = "INSERT INTO veiculos (placa, modelo)
            VALUES ('$placa', '$modelo')";

    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Veículo</title>
</head>
<body>

<a href="menu.php">Voltar ao Menu</a>

<h2>Cadastrar Veículo</h2>

<form method="post">
    <input type="text" name="placa" placeholder="Placa" required><br><br>

    <input type="text" name="modelo" placeholder="Modelo" required><br><br>

    <button type="submit">Salvar</button>
</form>

</body>
</html>