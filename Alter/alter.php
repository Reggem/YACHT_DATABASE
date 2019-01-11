<?php
  session_start();
  require('../config.php');

  //Connect to the database
  try {
    $connection=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,$_SESSION["code"]);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      echo "<div class='text-danger h6'>Echec connection</div>";
  }

  $contactname_selected=$company_selected="";

  if(isset($_POST["search"])){
      $contactname_selected=$_POST["contact_select"];

    // if(isset($_POST["company_select"])){
    //   $company_selected=$_POST["company_select"];
    // }
  }

  //Update the contact if we have clicked the update button
  if(isset($_POST["contactupdate"])){

    include("../SQL/updatequery.php");
  }

  if(isset($_POST["contactdelete"])){
    include("../SQL/deletequery.php");
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

            if(isset($_POST["search"])){
              include('contactformupdate.php');
            }
          ?>

        </div>

      </div>

    </div>



     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
