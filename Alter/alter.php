<?php
  session_start();
  require('../config.php');

  //Connect to the database
  try {
    $connection=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,$_SESSION["code"]);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      header("Location: ../index.php");
      exit;
  }

  $contactname_selected=$company_selected="";

  if(isset($_POST["search"])){
      $_SESSION["contactname_selected"]=$_POST["contact_select"];
      // print_r($_SESSION);
      
    // if(isset($_POST["company_select"])){
    //   $company_selected=$_POST["company_select"];
    // }
  }

  //Update the contact if we have clicked the update button
  if(isset($_POST["contactupdate"])){
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";

    include("../SQL/updatequery.php");
  }

  if(isset($_POST["contactdelete"])){
    include("../SQL/deletequery.php");
  }

  //*******************************************************************
  //Update coming from the click of the edit button in the select
  if(isset($_POST["updatecontact"])){
      $contactname_selected=$_POST["updatecontact"];
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
    <title>Modify entry</title>
  </head>
  <body>
    <?php
      // echo '<pre>'.print_r($_SESSION)."</pre>";
      include("navbaralter.php");
    ?>

    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-sm-2 ml-2 border shadow shadow-regular text-center">
          <?php
            include('searchcontactform.php');
          ?>
        </div>
        <div class="col">
          <?php
            include('../SQL/searchcontactquery.php');

            if(isset($_POST["search"]) or isset($_POST["updatecontact"])){
              include('contactformupdate.php');
            }
          ?>

        </div>

      </div>

    </div>



    <?php
      include("../jssheets.php");
    ?>
  </body>
</html>
