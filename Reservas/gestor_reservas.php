<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn:400,400i,600,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="gestor_reservas.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title> Pior Agência de Viagens</title>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header id="topico1" class="header center">
            <!--navbar-->
            <div class="navbar-wrapper">
                <nav class="navbar">
                    <div class="navbar-logo">
                        <h1>
                            <span class="center">P</span>
                            <span class="center">A</span>
                            <span class="center">V</span>
                            <span class="center">P</span>
                            <span class="center">T</span>
                        </h1>
                    </div>
                </nav>
            </div>
            <!--Fim Navbar-->
            <!--Tabela Reservas-->
            <div class="table-container">
                <h1 class="titulo2"> Dados de Reservas</h1>
                <table class="table">
                    <thead>
                            <?php
                                session_start(); // Inicia a sessão
                                include "../database_tools/funcs.php";
                                $conn = new mysqli("ave.dee.isep.ipp.pt", "1160637", "admin", "1160637");
                                if ($conn->connect_error) {
                                    die("Connection Failed : " . $conn->connect_error);
                                } 
                                
                                // Consulta SQL para verificar o usuário
                                $query = $conn->prepare("SELECT * FROM Reservas WHERE 1");
                                if ($query === false) {
                                    die("Prepare failed: " . $conn->error);
                                }
                                
                                $query->execute();                // Executa a consulta
                                $result = $query->get_result(); // Obtém o resultado da consulta
                                $row = $result->fetch_assoc();
                                print " <tr>";
                                foreach ( $row as $name => $val )
                                print " <th scope=col>". $name . "</th>";
                                print " </tr>";
                                print "</thead>";
                                $result->data_seek(0);
                                
                                print " <tbody>";
                                while ( $row = $result->fetch_row() ) {
                                    print " <tr>";
                                    foreach ( $row as $val => $valor)
                                    if ($val == 0){
                                        print " <td scope=row>$valor</td> ";
                                    }
                                    elseif ($val == 1){
                                        $valor = getPacotesNameFromId($valor);
                                        print " <td scope=row>$valor</td> ";
                                    }
                                    elseif ($val == 2){
                                        $valor = getHotelNameFromId($valor);
                                        print " <td scope=row>$valor</td> ";
                                    }
                                    elseif ($val == 3){
                                        print " <td scope=row>$valor</td> ";
                                    }    
                                    elseif ($val == 4){
                                            $valor = getClientNameFromId($valor);
                                            print " <td >$valor</td> ";
                                        }
                                    elseif ($val == 5){
                                        print " <td >$valor</td> ";
                                    }
                                }//while
                                print " </tbody>";
                            ?>
                </table>
                <h1 class="titulo2">Gestao dados</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Reserva_ID</th>
                            <th scope="col">Pacote</th>
                            <th scope="col">Hoteis</th>
                            <th scope="col">Cruzeiros</th>
                            <th scope="col">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--Fim Tabela -->
    </div>
    <script src=" main_script.js">
    </script>
</body>

</html>