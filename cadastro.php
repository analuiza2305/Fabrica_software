<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha_criptografada')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        echo "<script>window.location.href = 'index_inicial.html';</script>"; 
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
