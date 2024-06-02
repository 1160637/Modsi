<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="cruzeiros">
      <div class="div">
        <div class="WF-drop-down">
          <div class="drop-down-base">
            <div class="text-input">
              <div class="label">
                <div class="value">Cruzeiros</div>
                <img class="icon" src="../img/drop_down_icon.png" />
              </div>
            </div>
          </div>
        </div>
        <div class="text-wrapper">Cruzeiros</div>
        <div class="WF-option">
          <div class="WF-list-options"><div class="text-wrapper-2">Datas</div></div>
        </div>
        <button class="WF-button">
          <div class="label-2">Next</div>
          <div class="icon-right-wrapper"><img class="icon-right" src="../img/Icon Right.png" /></div>
        </button>
      </div>
    </div>

    <?php
      if(!isset($_SESSION)) {
        session_start();
    }

      Include('../database_tools/funcs.php');
      $conn = LigaBD();
      // ListaCruzeiros($connection);
    ?>
    <table class="table-custom" >
    <tbody>
      <tr>
        <td> Destino </td>
        <td> Partida </td>
        <td> Data Partida </td>
        <td> Data Chegada </td>
      </tr>
      <tr>
        <?php
            $query = "SELECT * FROM Cruzeiros";
            $result = $conn->query($query);

          while($row = $result->fetch_assoc())
          {
        ?>
          <td><?php echo $row['chegada']?></td>
          <td><?php echo $row['partida']?></td>
          <td><?php echo $row['Data_partida']?></td>
          <td><?php echo $row['Data_chegada']?></td>
      </tr>
        <?php    
          }
        ?>
    </tbody>  
    </table>
  </body>
</html>
