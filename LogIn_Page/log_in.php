<?php
session_start(); // Inicia a sessão

//variable to be pass to others file to check the role of the user

$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");
if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
} 

// Consulta SQL para verificar o usuário
$query = $conn->prepare("SELECT * FROM Clientes WHERE Email = ?");
if ($query === false) {
    die("Prepare failed: " . $conn->error);
}

$query->bind_param("s", $email);  // Sincroniza o email ao parâmetro na consulta
$query->execute();                // Executa a consulta
$result = $query->get_result(); // Obtém o resultado da consulta 

if ($result->num_rows > 0) {
    // Usuário encontrado, verificar senha
    $row = $result->fetch_assoc();  
    $stored_password = $row['password'];
    $_SESSION['role'] = $row['role'];
    if ($password == $stored_password) {
        $_SESSION['logged'] = true;
        $_SESSION['email'] = $email;
        echo "<script>window.location.href = '../main.php'</script>";
    } 
    else {
        echo "<script>alert('Senha incorreta!'); window.location.href = '../main.php'</script>";
    }
} 
else {
    // echo "<script>alert('Utilizador não encontrado!'); window.location.href = 'main.php'</script>";
}

$query->close();
$conn->close();
?>

