<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

?>
<?php

$ano = date('Y');

$url = "https://date.nager.at/api/v3/PublicHolidays/2026/BR";

$json = file_get_contents($url);

$feriados = json_decode($json, true);

$hoje = date('Y-m-d');

$proximo = null;

foreach ($feriados as $feriado) {

    if ($feriado['date'] >= $hoje) {

        $proximo = $feriado;
        break;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
        }

        a {
            display: block;
            background: #ddd;
            padding: 10px;
            margin-top: 10px;
            text-decoration: none;
            color: black;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Menu Principal</h2>

    <a href="entrada.php">Registrar Entrada</a>
    <a href="saida.php">Registrar Saída</a>
    <a href="cadastro.php">Cadastrar Veículo</a>
    <a href="consulta.php">Consultar Registros</a>
    <a href="logout.php">Sair</a>
    <br>

    <p>
        Próximo feriado:
        <?= $proximo['localName']; ?>
        (<?= date('d/m/Y', strtotime($proximo['date'])); ?>)
    </p>
</div>

</body>
</html>