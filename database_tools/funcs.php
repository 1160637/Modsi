<?php
    function getPacotePrice($Destino)
    {
        session_start();
        $conn= new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        if ($Destino == 'Malta'){
            $Destino = 5;
        }

        $query = $conn->prepare("SELECT Preço FROM Pacotes WHERE Destino = ?");
        if ($query === false) {
            die("Prepare failed: " . $conn->error);
        }
        $query->bind_param("i", $Destino);
        $query->execute();                
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        $preço = $row['Preço'];

        $query->close();
        $conn->close();
        return $preço;
    }
?>
<?php
    function getPartida($Destino)
    {
        session_start();
        $conn= new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        if ($Destino == 'Malta'){
            $Destino = 5;
        }

        $query = $conn->prepare("SELECT Partida FROM Pacotes WHERE Destino = ?");
        if ($query === false) {
            die("Prepare failed: " . $conn->error);
        }
        $query->bind_param("i", $Destino);
        $query->execute();                
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        $partida = $row['Partida'];

        if($partida == 1){
            $partida = 'Portugal';
        }
        elseif($partida == 2){
            $partida = 'Espanha';
        }
        elseif($partida == 3){
            $partida = 'Itália';
        }
        elseif($partida == 4){
            $partida = 'França';
        }
        elseif($partida == 5){
            $partida = 'Malta';
        }

        $query->close();
        $conn->close();
        return $partida;
    }
?>

<?php
    function alterarVagasHoteis($Destino, $pensão, $num_reservas)
    {
        session_start();
        $conn= new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        if($Destino == 1){
            $Destino = 'Portugal';
        }
        elseif($Destino == 2){
            $Destino = 'Espanha';
        }
        elseif($Destino == 3){
            $Destino = 'Itália';
        }
        elseif($Destino == 4){
            $Destino = 'França';
        }
        elseif($Destino == 5){
            $Destino = 'Malta';
        }

        $query = $conn->prepare("SELECT Vagas FROM Hoteis WHERE Pensão = ? and hoteis_id = ?");
        if ($query === false) {
            die("Prepare failed: " . $conn->error);
        }
        $query->bind_param("si", $pensão, $Destino);
        $query->execute();                
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        $vagas = $row['Vagas'];
        if($vagas < $num_reservas){
            echo "<script>alert('Não há vagas suficientes!'); window.location.href = '../main.php'</script>";
        }
        else{
            $query = $conn->prepare("UPDATE Hoteis SET Vagas= ? WHERE Pensão = ? AND  hoteis_id = ? ");
            if ($query === false) {
                die("Prepare failed: " . $conn->error);
            }
                $new_vagas = $vagas - $num_reservas;
                $query->bind_param("isi",$new_vagas, $pensão, $Destino);
                $query->execute(); 
        }

        $query->close();
        $conn->close();
    }

    function getClientNameFromId($id){
        session_start();
        $conn= new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->prepare("SELECT Nome FROM Clientes WHERE client_id = ?");
        if ($query === false) {
            die("Prepare failed: " . $conn->error);
        }
        
        $query->bind_param("i", $id);
        $query->execute();                
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        $name = $row['Nome'];

        $query->close();
        $conn->close();
        return $name;
    }

    function getHotelNameFromId($id){
        session_start();
        $conn= new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->prepare("SELECT Nome FROM Hoteis WHERE hoteis_id = ?");
        if ($query === false) {
            die("Prepare failed: " . $conn->error);
        }
        
        $query->bind_param("i", $id);
        $query->execute();                
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        $name = $row['Nome'];

        $query->close();
        $conn->close();
        return $name;
    }

    function getDestionFromId($id){
        $conn= new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->prepare("SELECT Pais FROM Destinos WHERE pais_id = ?");
        if ($query === false) {
            die("Prepare failed: " . $conn->error);
        }
        
        $query->bind_param("i", $id);
        $query->execute();                
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        $Destino = $row['Pais'];

        $query->close();
        $conn->close();
        return $Destino;
    }

    function getPacotesdestinoFromId($id){
        $conn= new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->prepare("SELECT Destino FROM Pacotes WHERE pacotes_id = ?");
        if ($query === false) {
            die("Prepare failed: " . $conn->error);
        }
        
        $query->bind_param("i", $id);
        $query->execute();                
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        $Destino = $row['Destino'];

        $pais = getDestionFromId($Destino);

        $query->close();
        $conn->close();
        return $pais;
    }

    function getPacotesNameFromId($id){
        $conn= new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->prepare("SELECT Name FROM Pacotes WHERE pacotes_id = ?");
        if ($query === false) {
            die("Prepare failed: " . $conn->error);
        }
        
        $query->bind_param("i", $id);
        $query->execute();                
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        $Name = $row['Name'];

        $query->close();
        $conn->close();
        return $Name;
    }
?>

