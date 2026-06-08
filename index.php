<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

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

        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios
            WHERE login='$login' AND senha='$senha'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();

        $_SESSION['usuario'] = $login;
        
        header("Location: menu.php");
        exit;
    } else {
        echo "<p>Login ou senha inválidos.</p>";
    }
}
?>

<form method="post">
        <input type="text" name="login" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>