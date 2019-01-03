<?php
session_start();
require("../config.php");



$addcompName=$addindus=$addnbrEmp=$addcity="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $addcompName = test_input($_POST["compname"]);
    $addindus = test_input($_POST["industry"]);
    $addcity = test_input($_POST["city"]);
    $addnbrEmp = test_input($_POST["nbrEmp"]);
  }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>addcomp</title>
  </head>
  <body>


    <div class="container">
      <div class="row">
        <div class="col"></div>
        <div class="col-9">
            <?php
            // echo "<pre>".print_r($_SESSION)."</pre>";
            include("../Insert/newcomp.php");

            try {
              $connection=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,$_SESSION["code"]);
              $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

              // Format for the query
              $tab=array($addcompName, $addnbrEmp, $addindus);
              $new_tab="'".implode("', '", $tab)."'";

              // Insert the company
              $sql="INSERT INTO bedrijven(Bedrijf, AantalWerknemers, Industrie)
               VALUES($new_tab);";

              $insert=$connection->prepare($sql);
              $insert->execute();


              //Insert the location

              $sqllocatie="INSERT INTO locatie(Stad, Bedrijven_idCompany)
               SELECT '$addcity', idCompany FROM bedrijven WHERE Bedrijf='$addcompName';";

              $insert2=$connection->prepare($sqllocatie);
              $insert2->execute();



            } catch (PDOException $e) {
                // echo "<div class='text-danger h6'>Echec connection</div>";
            }


            echo "<div class='h6'>Query:</div> <br>".$sql."<br>";
            echo "<div class='h6'>Query:</div> <br>".@$sqllocatie;
            ?>
        </div>
        <div class="col"></div>
      </div>
    </div>
















    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
    </html>
