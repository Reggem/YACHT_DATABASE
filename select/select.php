<?php
session_start();
require('../config.php');
// require('../SQL/queries');

// <!-- Define variables and clean function  -->


  $companies=$industries=$cities=$departments=$trainees="";
  // echo "<pre>";
  // print_r($_POST);
  // echo "</pre>";

  if (isset($_POST["query"]) or isset($_POST["inspect"]) ) {

    if(isset($_POST["trainee_select"])){
      $trainees=$_POST["trainee_select"];
      $intrainees= @implode("', '", $trainees);
    }
    if(isset($_POST["industry_select"])){
      $industries = $_POST["industry_select"];
      $inindustries = @implode("', '", $industries);
    }
    if(isset($_POST["company_select"])){
      $companies = $_POST["company_select"];
      $incompanies = @implode("', '", $companies);
    }
    if(isset($_POST["city_select"])){
      $cities = $_POST["city_select"];
      $incities = @implode("', '", $cities);
    }
    if(isset($_POST["department_select"])){
      $departments = $_POST["department_select"];
      $indepartments = @implode("', '", $departments);
    }
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
      header("Location: ../index.php");
      exit;
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
      <div class="row mt-3 d-flex">
        <?php include("filterscheckboxes.php"); ?>
        <button class="btn btn-outline-success justify-content-end mr-4 mb-3 border" id="downloadbtn"><i class="fas fa-download s-2x"></i>
        </button>
      </div>
      <div class="row">
        <div class="col-lg-2" >

          <!-- Form to select the fields we want to filter on -->
            <?php
              include("selectform.php");
            ?>


            <?php
              //Include the queries
              include("../SQL/queriesselect.php");
            ?>
        </div>
        <div class="col">

      <!-- Results -->

        <!-- Perform the query and show the resulting table -->
        <?php



           if(isset($_POST["query"])){


                 if($query!="No query formed!"){
                          // If the query has seleted elements --> display the table

                         // echo "<div class='h5'> Query:</div>";
                         // echo $query;


                        // style='border: solid 1px black;'
                         echo "<div class='table-responsive'><table class='table table-hover'>";
                         echo "<thead class='thead-light'><tr><th scope='col'>Company</th><th scope='col'>City</th><th scope='col'>Name</th><th scope='col'>Function</th><th scope='col'>Telephone</th><th scope='col'>Email</th><th scope='col'>Department</th></thead><tbody>";

                         class TableRows extends RecursiveIteratorIterator {
                           function __construct($it) {
                             parent::__construct($it, self::LEAVES_ONLY);
                           }

                           function current() {
                             return "<td scope='row'>" . parent::current(). "</td>";
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

                         echo "</tbody></table></div>";
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

             }else{
               echo "<div class='text-center text-muted h1 align-middle' style='height:100%;'><span class='align-middle'>NO QUERY FORMED</span></div>";
             }
        ?>
        </div>
      </div>
    </div>

      <?php
        include("../jssheets.php");
      ?>
      <script type="text/javascript" src="js.js"></script>
  </body>
</html>
