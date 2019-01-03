<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Validation of request</title>
  </head>
  <body>

    <!-- Insert Navbar  -->
    <?php
      // echo '<pre>'.print_r($_SESSION)."</pre>";
      include("../Validation/navbarval.php");
    ?>

    <!-- Insert the text content  -->
     <div class="container">
       <div class="row">
         <div class="col"></div>
         <div class="col-5">
            <div class="h6 mt-5 text-center">
              Thank you for your request. I 'll will check if you are eligible for accessing this database and come back to you asap with your credentials.
            </div>
            <br>
            <div class="text-center">
              You have submitted the following informations: <br>
              <br>
              Last Name: <b><?php echo $_POST['name']; ?></b><br>
              First Name: <b><?php echo $_POST['fname']; ?></b><br>
              Email: <b><?php echo $_POST['email']; ?></b><br>
            </div>

         </div>
         <div class="col"></div>
       </div>
     </div>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
