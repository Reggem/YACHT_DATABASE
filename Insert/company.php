<?php

try {
  // require('config.php');
  // $connection=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,$_SESSION["username"],$_SESSION["password"]);
  // $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


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


<div class="col-md-3" >
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <div class="input-group mb-3">
    <label for="bedrijf" class="h6">Add a company to the database if it does not yet exist:</label>

  </div>
  <div class="input-group mb-3">
    <!-- add a popup window when this button is pressed and show the form for the company insert (company_insert_form.php) -->
    <!-- <button class="btn btn-primary" id="addCompbtn"><i class="far fa-plus-square"></i><span class="mx-2">Add a company</span>
    </button> -->

  </div>
</form>
<button class="btn btn-primary" onclick="addcomp()"><i class="far fa-plus-square"></i><span class="mx-2">Add a company</span>
</button>
</div>
