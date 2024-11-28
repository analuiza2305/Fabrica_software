<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: profile.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// Consulta as visitas do usuário
$visits_query = "SELECT * FROM visitas WHERE user_id = '$user_id'";
$visits_result = mysqli_query($conn, $visits_query);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($user_name); ?>!</h1>
    <h2>Informações do Perfil</h2>
    <p>Email: <?php echo $_SESSION['user_email']; ?></p>

    <h2>Visitas Agendadas</h2>
    <?php if (mysqli_num_rows($visits_result) > 0): ?>
        <ul>
            <?php while ($visit = mysqli_fetch_assoc($visits_result)): ?>
                <li>
                    Imóvel: <?php echo htmlspecialchars($visit['property']); ?><br>
                    Data da Visita: <?php echo htmlspecialchars($visit['visit_date']); ?>
                </li>
                <hr>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>Você ainda não marcou nenhuma visita.</p>
    <?php endif; ?>

    <button onclick="location.href='marcar-visita.php'">Marcar Nova Visita</button>
    <button onclick="location.href='logout.php'">Sair</button>
</body>
</html>
