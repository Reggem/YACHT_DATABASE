<?php
  session_start();
  require('../config.php');

  $addcontName=$addcontFN=$addFun=$addEmail=$addTel=$addLinkedin=$addDepartment="";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $addcontName = test_input($_POST["naam"]);
      $addcontFN = test_input($_POST["voornaam"]);
      $addFun = test_input($_POST["functie"]);
      $addEmail = test_input($_POST["email"]);
      $addTel = test_input($_POST["Telefoon"]);
      $addLinkedin = test_input($_POST["linkedin"]);
      $addDepartment=test_input($_POST["department"]);
      $bedrijf=test_input($_POST['bedrijf']);
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
    <title>Welcome page</title>

  </head>
  <body>
    <?php
      // echo '<pre>'.print_r($_SESSION)."</pre>";
      include("navbarinsert.php");
    ?>
    <!-- Insert the company in the database  -->


    <div class="container content">


        <div class="row mt-5">

              <!-- Connection to the database -->
              <?php

              try {
                $connection=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,$_SESSION["code"]);
                $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


                // Get available Companies
                $querycompanies="SELECT DISTINCT  b.Bedrijf
                FROM bedrijven b;";

                $sqlCompanies=$connection->prepare($querycompanies);
                $sqlCompanies->execute();

                $avCompanies=$sqlCompanies->fetchall();

              } catch (PDOException $e) {
                  echo "<div class='text-danger h6'>Echec connection</div>";
              }
              ?>


              <?php
              include('form.php');
              ?>

              <!-- Add the contact to the contact table -->
              <?php


                // Format for the query
                $tab=array($addcontName, $addcontFN, $addEmail,$addTel,$addFun,$addDepartment);
                $new_tab="'".implode("', '", $tab)."'";

                // Insert the contact
                @$sqlcont="INSERT INTO contacts(Naam, Voornaam, Email,Telefoon,Functie, Afdeling, Bedrijven_idCompany)
                 SELECT $new_tab, idCompany FROM bedrijven WHERE Bedrijf='$bedrijf';";

                $insert=$connection->prepare($sqlcont);
                $insert->execute();

              ?>


        </div>
      </div>





     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../JS/popupaddcomp.js"></script>
    <!-- <script type="text/javascript" src="JS/closepopup.js"></script> -->
  </body>
</html>
