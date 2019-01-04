<?php
session_start();
require('../config.php');

// <!-- Define variables and clean function  -->


  $companies=$industries=$cities=$departments="";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $industries = $_POST["industry_select"];
      $companies = $_POST["company_select"];
      $cities = $_POST["city_select"];
      $departments = $_POST["department_select"];
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

    <title>Query the database</title>
  </head>
  <body>


    <!-- include the session variable sin top + Navbar -->
    <?php
      // echo '<pre>'.print_r($_SESSION)."</pre>";
      include("navbarselect.php");
    ?>
    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-md-2">

          <!-- Form to select the fields we want to filter on -->
            <?php

              include("selectform.php");

            ?>


            <?php

            try{
              $incities = @implode("', '", $cities);
              $inindustries = @implode("', '", $industries);
              $incompanies = @implode("', '", $companies);
              $indepartments = @implode("', '", $departments);
            }catch(Exception $e){
              echo "You have not yet selected any fields.";
            }

              // echo "<div class='h5'>You have selected:</div>
              // Cities: '".$incities."'<br> Industries:'".$inindustries."' <br> Companies: '".$incompanies."'<br>Departments: '".$indepartments."'";




            // If company is selected by the user, we don't cara about the industry
            if(!empty($companies[0])){
              // echo "the company is not empty: ".$companies[0];

              $query="SELECT DISTINCT  b.Industrie, b.Bedrijf, l.Stad, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
              FROM contacts c
              LEFT JOIN bedrijven b on b.idCompany=c.Bedrijven_idCompany
              LEFT JOIN locatie l on b.idCompany=l.Bedrijven_idCompany
              WHERE (l.Stad IN ('".$incities."') AND c.Afdeling IN ('".$indepartments."') AND b.Bedrijf IN ('".$incompanies."'));";

              if(empty($departments[0]) and empty($cities[0])){

                // echo "2";
                $query="SELECT DISTINCT b.Industrie, b.Bedrijf, l.Stad, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
                FROM contacts c
                LEFT JOIN bedrijven b on b.idCompany=c.Bedrijven_idCompany
                LEFT JOIN locatie l on b.idCompany=l.Bedrijven_idCompany
                WHERE ( b.Bedrijf IN ('".$incompanies."'));";

              }elseif(!empty($departments[0]) and empty($cities[0])){
                // echo "3";
                $query="SELECT DISTINCT b.Industrie, b.Bedrijf, l.Stad, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
                FROM contacts c
                LEFT JOIN bedrijven b on b.idCompany=c.Bedrijven_idCompany
                LEFT JOIN locatie l on b.idCompany=l.Bedrijven_idCompany
                WHERE ( c.Afdeling IN ('".$indepartments."') AND b.Bedrijf IN ('".$incompanies."'));";
              }
              elseif(empty($departments[0]) and !empty($cities[0])) {
                // echo "4";
                $query="SELECT DISTINCT b.Industrie, b.Bedrijf, l.Stad, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
                FROM contacts c
                LEFT JOIN bedrijven b on b.idCompany=c.Bedrijven_idCompany
                LEFT JOIN locatie l on b.idCompany=l.Bedrijven_idCompany
                WHERE (l.Stad IN ('".$incities."') AND b.Bedrijf IN ('".$incompanies."'));";
              }

              // If the compnay is not specified by the suer
            }else{
              if (empty($cities[0]) and empty($departments[0]) and empty($industries[0])) {
                $query="No query formed!";
                // echo "<h4> No filters selected </h4>";
              }elseif(!empty($cities[0]) and empty($departments[0]) and empty($industries[0])){
                // echo "6";
                $query="SELECT DISTINCT b.Industrie, b.Bedrijf, l.Stad, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
                FROM contacts c
                LEFT JOIN bedrijven b on b.idCompany=c.Bedrijven_idCompany
                LEFT JOIN locatie l on b.idCompany=l.Bedrijven_idCompany
                WHERE (l.Stad IN ('".$incities."'));";
              }elseif(!empty($cities[0]) and !empty($departments[0]) and empty($industries[0])){
                // echo "7";
                $query="SELECT DISTINCT b.Industrie, b.Bedrijf, l.Stad, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
                FROM contacts c
                LEFT JOIN bedrijven b on b.idCompany=c.Bedrijven_idCompany
                LEFT JOIN locatie l on b.idCompany=l.Bedrijven_idCompany
                WHERE (l.Stad IN ('".$incities."') AND c.Afdeling IN ('".$indepartments."'));";
              }elseif(!empty($cities[0]) and empty($departments[0]) and !empty($industries[0])){
                // echo "8";
                $query="SELECT DISTINCT b.Industrie, b.Bedrijf, l.Stad, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
                FROM contacts c
                LEFT JOIN bedrijven b on b.idCompany=c.Bedrijven_idCompany
                LEFT JOIN locatie l on b.idCompany=l.Bedrijven_idCompany
                WHERE (l.Stad IN ('".$incities."') AND b.Industrie IN ('".$inindustries."'));";
              }elseif (!empty($cities[0]) and !empty($departments[0]) and !empty($industries[0])) {
                // echo "9";
                $query="SELECT DISTINCT b.Industrie, b.Bedrijf, l.Stad, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
                FROM contacts c
                LEFT JOIN bedrijven b on b.idCompany=c.Bedrijven_idCompany
                LEFT JOIN locatie l on b.idCompany=l.Bedrijven_idCompany
                WHERE (l.Stad IN ('".$incities."') AND b.Industrie IN ('".$inindustries."') AND c.Afdeling IN ('".$indepartments."'));";
              }elseif (empty($cities[0]) and !empty($departments[0]) and !empty($industries[0])) {
                // echo "10";
                $query="SELECT DISTINCT b.Industrie, b.Bedrijf, l.Stad, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
                FROM contacts c
                LEFT JOIN bedrijven b on b.idCompany=c.Bedrijven_idCompany
                LEFT JOIN locatie l on b.idCompany=l.Bedrijven_idCompany
                WHERE ( b.Industrie IN ('".$inindustries."') AND c.Afdeling IN ('".$indepartments."'));";
              }elseif(empty($cities[0]) and !empty($departments[0]) and empty($industries[0])){
                // echo "11";
                $query="SELECT DISTINCT b.Industrie, b.Bedrijf, l.Stad, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
                FROM contacts c
                LEFT JOIN bedrijven b on b.idCompany=c.Bedrijven_idCompany
                LEFT JOIN locatie l on b.idCompany=l.Bedrijven_idCompany
                WHERE (c.Afdeling IN ('".$indepartments."'));";
              }elseif(empty($cities[0]) and empty($departments[0]) and !empty($industries[0])){
                // echo "12";
                $query="SELECT  DISTINCT b.Industrie, b.Bedrijf, l.Stad, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
                FROM contacts c
                LEFT JOIN bedrijven b on b.idCompany=c.Bedrijven_idCompany
                LEFT JOIN locatie l on b.idCompany=l.Bedrijven_idCompany
                WHERE (b.Industrie IN ('".$inindustries."'));";
              }
            }




          ?>
        </div>
        <div class="col">

      <!-- Results -->

        <!-- Perform the query and show the resulting table -->
        <?php

          echo "<table style='border: solid 1px black;'>";
           echo "<tr><th>Industry</th><th>Company</th><th>City</th><th>Name</th><th>First Name</th><th>Telephone</th><th>Email</th><th>Department</th>";

                  class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }



                  try {

                    if($query=="No query formed!"){
                      echo "Try selecting filters to form a query.";
                    }else{
                      $sql=$connection->prepare($query);
                      $sql->execute();
                      $result=$sql->setFetchMode(PDO::FETCH_ASSOC);

                    foreach(new TableRows(new RecursiveArrayIterator($sql->fetchAll())) as $k=>$v) {
                        echo $v;
                          }

                      // if(empty($result)){
                      //   echo "<div class='h3 text-secondary'> Query returned no results.</div>";
                      // }else{
                      //
                      //   // Print the results of the query
                      //
                      //   echo "<pre>";
                      //   print_r($result);
                      //   echo "</pre>";
                      //
                      // }
                    }

                  } catch (PDOException $e) {
                      echo "<div class='text-danger h6'>Echec connection</div>";
                  }
          echo "</table>";

        ?>



        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mt-5">
        </div>
        <div class="col">
          <?php
          echo "<br><br><div class='h5'> Query:</div>";
          echo $query;
          ?>
        </div>
      </div>
    </div>














     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
