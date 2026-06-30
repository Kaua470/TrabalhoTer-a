<?php
include 'conexao.php';

$mensagem = "";
$classe = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST['placa'];

    $verifica = "SELECT * FROM veiculos WHERE placa = '$placa'";
    $resultado = $conn->query($verifica);

    if ($resultado->num_rows > 0) {
        $sql = "INSERT INTO registros (placa, tipo)
                VALUES ('$placa', 'Saída')";

        if ($conn->query($sql)) {
            $mensagem = "Saída registrada com sucesso!";
            $classe = "sucesso";
        }
    } else {
        $mensagem = "Veículo não cadastrado.";
        $classe = "erro";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Saída</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div class="topo">
    <a href="menu.php">Início</a>
    <a href="entrada.php">Registrar Entrada</a>
    <a href="saida.php">Registrar Saída</a>
    <a href="cadastro.php">Cadastro</a>
    <a href="logout.php">Sair</a>
</div>

<div class="container-menu">

<h2>Registrar Saída</h2>

<?php
if (!empty($mensagem)) {
    echo "<p class='$classe'>$mensagem</p>";
}
?>

<form method="post">
    <input type="text" name="placa" placeholder="Placa" required><br><br>

    <button type="submit">Registrar</button>
</form>

</div>

</body>
</html>