<?php
include 'conexao.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];

    $sql = "INSERT INTO veiculos (placa, modelo)
            VALUES ('$placa', '$modelo')";

    if ($conn->query($sql)) {
        $mensagem = "Veículo cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar o veículo.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Veículo</title>
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

<h2>Cadastrar Veículo</h2>

<?php
if (!empty($mensagem)) {
    echo "<p class='sucesso'>$mensagem</p>";
}
?>

<form method="post">
    <input type="text" name="placa" placeholder="Placa" required><br><br>

    <input type="text" name="modelo" placeholder="Modelo" required><br><br>

    <button type="submit">Salvar</button>
</form>
</div>
</body>
</html>