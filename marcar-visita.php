<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcar Visita</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Marcar Visita</h1>
    <form action="marcar-visita-process.php" method="POST">
        <label for="property">Imóvel:</label>
        <input type="text" name="property" required><br><br>

        <label for="visit_date">Data da Visita:</label>
        <input type="date" name="visit_date" required><br><br>

        <button type="submit">Marcar Visita</button>
    </form>
</body>
</html>
