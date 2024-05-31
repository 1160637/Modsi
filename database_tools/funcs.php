<?php

if(!isset($_SESSION)) {
    session_start();
}

function LigaBD()
{
    $conn= new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");

    if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function LinkOrdem($ordcamp, $filtro)
{
    $ordem = $ordcamp . "&amp;filtro=$filtro";
    $txt = "<a href='?ordem=$ordem' class='titcoluna'> $ordcamp </a>";

    return $txt;
}
    
function ListaCruzeiros($conn)
{
    $query = "SELECT * FROM Cruzeiros";

    // $filtro = $_SESSION['filtro'];

    $result = $conn->query($query);
    if($result->num_rows > 0)
    {
        print " <table> \n";

        $row = $result->fetch_assoc();
        print " <tr> \n";
        foreach ( $row as $name => $val )
        print " </tr> \n";
        $result->data_seek(0);
        
        while ( $row = $result->fetch_row() ) {
            print " <tr> \n";
            foreach ( $row as $val )
            print " <td>$val</td> \n";
            print " <td> <a href='mostra.php?sku=$row[0]'> +info </a> </td>\n";
            print " </tr> \n";
        }
        print " </table> \n";

    }

    else
    echo "0 results";
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    print_r($_SESSION);
    echo $url;  
    print"\n";

    mysqli_close($conn);
   
}

function ListaHotel($conn)
{
    $query = "SELECT * FROM Hoteis";

    // $filtro = $_SESSION['filtro'];

    $result = $conn->query($query);
    if($result->num_rows > 0)
    {
        print " <table> \n";

        $row = $result->fetch_assoc();
        print " <tr> \n";
        foreach ( $row as $name => $val )
        print " </tr> \n";
        $result->data_seek(0);
        
        while ( $row = $result->fetch_row() ) {
            print " <tr> \n";
            foreach ( $row as $val )
            print " <td>$val</td> \n";
            print " <td> <a href='mostra.php?sku=$row[0]'> +info </a> </td>\n";
            print " </tr> \n";
        }
        print " </table> \n";

    }

    else
    echo "0 results";
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    print_r($_SESSION);
    echo $url;  
    print"\n";

    mysqli_close($conn);
   
}

?>
