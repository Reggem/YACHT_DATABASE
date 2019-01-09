<?php
session_start();
require('../config.php');
// require('../SQL/queries');

// <!-- Define variables and clean function  -->


  $companies=$industries=$cities=$departments="";

  if (isset($_POST["query"]) or isset($_POST["inspect"]) ) {
      $industries = $_POST["industry_select"];
      $companies = $_POST["company_select"];
      $cities = $_POST["city_select"];
      $departments = $_POST["department_select"];
    }else{
      echo "No query yet";
    }



  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  //Connect to the database
  try {
    $connection=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,$_SESSION["code"]);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      echo "<div class='text-danger h6'>Echec connection</div>";
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
        <div class="col-md-2" >

          <!-- Form to select the fields we want to filter on -->
            <?php

              include("selectform.php");

            ?>


            <?php


              $incities = @implode("', '", $cities);
              $inindustries = @implode("', '", $industries);
              $incompanies = @implode("', '", $companies);
              $indepartments = @implode("', '", $departments);

              //Include the queries
              include("../SQL/queries.php");





          ?>
        </div>
        <div class="col">

      <!-- Results -->

        <!-- Perform the query and show the resulting table -->
        <?php
           echo "<br><br><div class='h5'> Query:</div>";
           echo $query;

           if(isset($_POST["query"])){

                 if($query!="No query formed!"){

                         echo "<br><br><table style='border: solid 1px black;'>";
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

                         $sql=$connection->prepare($query);
                         $sql->execute();
                         $result=$sql->setFetchMode(PDO::FETCH_ASSOC);

                         if(!empty($result)){
                           foreach(new TableRows(new RecursiveArrayIterator($sql->fetchAll())) as $k=>$v) {
                             echo $v;
                           }
                         }



                       try {

                         if($query=="No query formed!"){
                           echo "Try selecting filters to form a query.";
                         }else{

                           if(isset($_POST["query"])){

                             }
                             else{
                               echo "<div class='h6 text-secondary'>The query returned 0 results</div>";
                             }
                           }
                         }
                        catch (PDOException $e) {
                         echo "<div class='text-danger h6'>Echec connection</div>";
                       }

                       echo "</table>";

               }else{
                 echo " Select fields to form a query";
               }
             }elseif(isset($_POST["inspect"])){
               if($query!="No query formed!"){
                 echo $query;
               }else{
                 echo " Select fields to form a query";
             }

             }



        ?>













     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
