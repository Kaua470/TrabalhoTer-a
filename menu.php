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
</div>

</body>
</html>