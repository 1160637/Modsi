<?php

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
    
function ListaClientes($conn)
{
    $query = "SELECT * FROM Produtos";

    $filtro = $_SESSION['filtro'];

    if ($_SESSION['filtro']!="")
        $query.=" WHERE CONCAT(Sku,Marca,Modelo) LIKE '%".$_SESSION['filtro']."%'";
    
    if ($_SESSION['ordem']!="") $query .= " ORDER BY " . $_SESSION['ordem'];


    print "<from method=GET action=lista.php>";
    print " Filtro:";
    // print " <input name='filtro' value='".$_GET['filtro']."' size=8>";
    print " <input name='filtro' value='".$_SESSION['filtro']."' size=8>";
    // print " <input type=hidden name='ordem' value='$ordem'>";
    print " <input type=submit value='Search'>";
    print "</form>";

    $result = $conn->query($query);
    if($result->num_rows > 0)
    {
        print " <table> \n";

        $row = $result->fetch_assoc();
        print " <tr> \n";
        foreach ( $row as $name => $val )
        print " <th>". LinkOrdem($name, $filtro) . "</th>\n";
        print " </tr> \n";
        $result->data_seek(0);
        
        while ( $row = $result->fetch_row() ) {
            print " <tr> \n";
            foreach ( $row as $val )
            print " <td>$val</td> \n";
            print " <td> <a href='mostra.php?sku=$row[0]'> +info </a> </td>\n";
            print " </tr> \n";
        }//while

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
