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
        elseif($partida == 1){
            $partida = 'Itália';
        }
        elseif($partida == 1){
            $partida = 'França';
        }
        elseif($partida == 1){
            $partida = 'Malta';
        }

        $query->close();
        $conn->close();
        return $partida;
    }

?>
