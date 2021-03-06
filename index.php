<?php
  session_start();
  session_destroy();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Welcome page</title>



  </head>
  <body>

    <!-- Insert Navbar  -->
    <?php
      // echo '<pre>'.print_r($_SESSION)."</pre>";
      include("Index/navbarwelcome.php");
    ?>

    <!-- Insert the text content  -->
     <div class="container">
       <div class="row">
         <div class="col"></div>
         <div class="col-5">
            <div class="h6 mt-5 text-center">
              Welcom the the YACHT trainees database UI. THis web application is aimed at centralizing all information regarding the contact persons and companies that have been found or contacted by the trainees.
            </div>
            <div class="h6 text-center">
              You can query, insert, and modify informations regarding those contacts via this platform, so that all other trainees can benefit from it.
            </div>
            <div class="h6 text-center">
              The developper of this platform hopes that it will ease the search for contacts among companies for trainees. Please log in to start performing requests on the database.
            </div>
            <br>

            <p class="h4 text-center">Not yet have credentials?</p>
            <p class="h7 text-center">Click the button below to request access. The database manager will grant you the credentials ASAP.</p>

            <div class="text-center">
              <button class="btn btn-primary ml-auto text-center"   data-toggle="modal" data-target="#CredentialsModal"><span class="mx-2">Request Credentials</span>
              </button>
            </div>


            <!-- Insert the request form -->

            <?php
              // include("Index/requestform.php");
              include('Index/modalcredentials.php');
            ?>

         </div>
         <div class="col"></div>
       </div>
     </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="JS/popuplogin.js"></script> -->
  </body>
</html>
