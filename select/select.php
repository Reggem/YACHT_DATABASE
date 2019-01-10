<?php
session_start();
require('../config.php');
// require('../SQL/queries');

// <!-- Define variables and clean function  -->


  $companies=$industries=$cities=$departments=$trainees="";

  if (isset($_POST["query"]) or isset($_POST["inspect"]) ) {
      $trainees=$_POST["trainee_select"];
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
    <?php
    include("../stylesheets.php");
    ?>

    <title>Query the database</title>
  </head>
  <body>


    <!-- include the session variable sin top + Navbar -->
    <?php
      // echo '<pre>'.print_r($_SESSION)."</pre>";
      include("navbarselect.php");
    ?>

    <div class="container-fluid">
      <div class="row mt-3">
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
              $intrainees= @implode("', '", $trainees);

              //Include the queries
              include("../SQL/queries.php");
            ?>
        </div>
        <div class="col">

      <!-- Results -->

        <!-- Perform the query and show the resulting table -->
        <?php
           echo "<div class='h5'> Query:</div>";


           if(isset($_POST["query"])){


                 if($query!="No query formed!"){
                          // If the query has seleted elements --> display the table

                         echo $query;

                         echo "<br><br><table style='border: solid 1px black;'>";
                         echo "<tr><th>Company</th><th>City</th><th>Name</th><th>Function</th><th>Telephone</th><th>Email</th><th>Department</th>";

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

                         echo "</table>";
                    }
                    else{
                      echo "Try selecting filters to form a query.";
                    }




             }elseif(isset($_POST["inspect"])){
               if($query!="No query formed!"){
                 echo $query;
                 }else{
                 echo " Try selecting filters to form a query";
             }

             }
        ?>
        </div>

      <?php
        include("../jssheets.php");
      ?>
  </body>
</html>
