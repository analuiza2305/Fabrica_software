<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha_criptografada')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>document.getElementByID('msg').innerHTML='<div class='warnbox'>Cadastro realizado</div>';</script>";
        header('location: cadastro.html');
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
