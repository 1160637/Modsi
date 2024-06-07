<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name_id'];
    $nascimento = $_POST['Nascimento']
    $email = $_POST['email'];
    $telemovel = $_POST['telemovel']
    $password = $_POST['passwd'];
    $confirm_password = $_POST['conf_passwd'];

    // Verifica se email e password não estão vazios
    if (empty($name_sign_up) || empty($email_sign_up) || empty($password_sign_up)) {
        echo "Nome, email e password são obrigatórios!";
        exit;
    }

    //Verifica de passwd são iguais
    if ($password != $confirm_password){
        echo "PASSWORD DIFERENTES"
        exit;
    }
    // Database connection
    $servername = 'ave.dee.isep.ipp.pt';
    $username = '1160637';
    $dbpassword = 'admin';
    $dbname = '1160637';

    $conn= new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");
    if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
    }

    $query = $conn->prepare("INSERT INTO 'Clientes' (`Nome`, `Idade`, `Telemovel`, `Email`, `password`) VALUES (?, ?, ?, ?, ?)");
    if ($query === false) {
        die("Prepare failed: " . $conn->error);
    }

    $query->bind_param("sssss", $name, $nascimento, $email, $telemovel, $password); //sss é o número de parâmetros
    $execval = $query->execute();

    if ($execval) {
        echo "<script>window.location.href = 'Interface Inicial.html'</script>";
    } else {
        echo "Falha no registo: " . $query->error;
    }

    $query->close();
    $conn->close();
}
?>