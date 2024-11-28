<?php
include 'config.php';
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o ID do usuário logado
    $user_id = $_SESSION['user_id'];
    // Recebe os dados do formulário
    $property = $_POST['property'];
    $visit_date = $_POST['visit_date'];

    // Insere a visita no banco de dados
    $query = "INSERT INTO visits (user_id, property, visit_date) VALUES ('$user_id', '$property', '$visit_date')";

    if (mysqli_query($conn, $query)) {
        // Redireciona para o perfil ou página de consulta de visitas após sucesso
        header("Location: profile.php");
        exit();
    } else {
        echo "Erro ao marcar visita: " . mysqli_error($conn);
    }
} else {
    echo "Método inválido.";
}
?>
