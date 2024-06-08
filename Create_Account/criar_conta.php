<?php
    $name = $_POST['name_id'];
    $nascimento = $_POST['Nascimento'];
    $email = $_POST['email'];
    $telemovel = $_POST['telemovel'];
    $password = $_POST['passwd'];
    $confirm_password = $_POST['conf_passwd'];

    // Validate input
    if ($password !== $confirm_password) {
        exit();
    }

    // Database connection
    $conn= new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");
    if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
    }

    $query = $conn->prepare("INSERT INTO Clientes (Nome, Idade, Telemovel, Email, password) VALUES (?, ?, ?, ?, ?)");
    $query->bind_param("sssss", $name, $nascimento, $telemovel, $email, $password);
    if ($query->execute()) {
        echo "New record created successfully";
    } 
    else {
        echo "Error: " . $query->error;
    }

    $query->close();
    $conn->close();
?>
