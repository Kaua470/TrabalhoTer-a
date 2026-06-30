<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

include 'conexao.php';

$sql = "SELECT * FROM registros ORDER BY horario DESC";
$result = $conn->query($sql);

$ano = date('Y');

$url = "https://date.nager.at/api/v3/PublicHolidays/$ano/BR";

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
    <title>Menu Principal</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div class="topo">

    <a href="menu.php">Início</a>
    <a href="entrada.php">Registrar entrada</a>
    <a href="saida.php">Registrar saída</a>
    <a href="cadastro.php">Cadastro</a>
    <a href="logout.php">Sair</a>

</div>

<div class="container-home">

    <h2>Consultar Registros</h2>

    <table border="1" cellpadding="8" cellspacing="0" style="margin:auto;">

        <tr>

            <th>Placa</th>
            <th>Tipo</th>
            <th>Horário</th>

        </tr>

        <?php

        while($row = $result->fetch_assoc()){

            echo "<tr>";
            echo "<td>".$row['placa']."</td>";
            echo "<td>".$row['tipo']."</td>";
            echo "<td>".$row['horario']."</td>";
            echo "</tr>";

        }

        ?>

    </table>
    <p class="feriado">

        Próximo feriado:
        <?= $proximo['localName']; ?>
        (<?= date('d/m/Y', strtotime($proximo['date'])); ?>)

    </p>
</div>
</body>
</html>