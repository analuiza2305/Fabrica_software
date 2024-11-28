<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $usuario = $result->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            echo "<script>alert('Login realizado com sucesso!');</script>";
            echo "<script>window.location.href = 'profile.php';</script>"; 
            
        } else {
            echo "<script>alert('Senha incorreta!');</script>";
        echo "<script>window.location.href = 'login.html';</script>"; 
        }
    } else {
        echo "<script>alert('Usuario não encontrado');</script>";
        echo "<script>window.location.href = 'index_inicial.html';</script>"; 
    }
}


$conn->close();
?>
