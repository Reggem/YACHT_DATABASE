
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


  // for($i=0;$i<count($avCompanies);$i++){
  //   echo $avCompanies[$i]["Bedrijf"].", ";
  // }

  // Get available Industries
  $queryindustries="SELECT DISTINCT  b.Industrie
  FROM bedrijven b;";

  $sqlindustries=$connection->prepare($queryindustries);
  $sqlindustries->execute();

  $avIndustries=$sqlindustries->fetchall();


  // for($i=0;$i<count($avIndustries);$i++){
  //   echo $avIndustries[$i]["Industrie"].", ";
  // }

  // Get available Cities
  $querycity="SELECT DISTINCT l.Stad
  FROM locatie l;";

  $sqlCities=$connection->prepare($querycity);
  $sqlCities->execute();

  $avCities=$sqlCities->fetchall();


  // for($i=0;$i<count($avCities);$i++){
  //   echo $avCities[$i]["Stad"].", ";
  // }

  // Get available departments
  $queryDepartments="SELECT DISTINCT c.Afdeling
  FROM contacts c;";

  $sqldepartments=$connection->prepare($queryDepartments);
  $sqldepartments->execute();

  $avDepartments=$sqldepartments->fetchall();


  // for($i=0;$i<count($avDepartments);$i++){
  //   echo $avDepartments[$i]["Afdeling"].", ";
  // }


} catch (PDOException $e) {
    echo "<div class='text-danger h6'>Echec connection</div>";
}


?>
<div class="container">
  <div class="row mt-5">
    <div class="col">

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
          <!-- Industry -->
          <label for="industry_select">Industry</label>
          <select class="form-control" placeholder="Select Industries" name="industry_select[]" multiple>
            <option value="" selected="selected">null</option>
            <?php
              for($i=0;$i<count($avIndustries);$i++){
                echo '<option value="'.$avIndustries[$i]["Industrie"] .'">'.$avIndustries[$i]["Industrie"].'</option>';
              }
             ?>
          </select>
        </div>


        <div class="form-group">
          <!-- Company -->
          <label for="company_select">Company</label>
          <select class="form-control" placeholder="Select Companies" name="company_select[]" multiple>
            <option value="" selected="selected">null</option>
            <?php
              for($i=0;$i<count($avCompanies);$i++){
                echo '<option value="'.$avCompanies[$i]["Bedrijf"].'">'.$avCompanies[$i]["Bedrijf"].'</option>';
              }
             ?>
          </select>
        </div>


        <div class="form-group">
          <!-- Cities -->
          <label for="city_select">City</label>
          <select class="form-control" placeholder="Select Cities" name="city_select[]" multiple>
            <option value="" selected="selected">null</option>
            <?php
              for($i=0;$i<count($avCities);$i++){
                echo '<option value="'.$avCities[$i]["Stad"] .'">'.$avCities[$i]["Stad"].'</option>';
              }
             ?>
          </select>
        </div>


        <div class="form-group">
          <!-- Deparmtents -->
          <label for="department_select">Department</label>
          <select class="form-control" placeholder="Select Deparmtents" name="department_select[]" multiple>
            <option value="" selected="selected">null</option>
            <?php
              for($i=0;$i<count($avDepartments);$i++){
                echo '<option value="'.$avDepartments[$i]["Afdeling"] .'">'.$avDepartments[$i]["Afdeling"].'</option>';
              }
             ?>
          </select>
        </div>


        <button type="submit" class="btn btn-primary">Query</button>
      </form>

    </div>

 </div>
</div>
