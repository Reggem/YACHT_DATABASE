
<?php

  // Get available Industries
  $querytrainees="SELECT DISTINCT CONCAT_WS(' ',Voornaam, Naam) as Trainee
  FROM trainees
  ORDER BY Trainee;";

  $sqltrainees=$connection->prepare($querytrainees);
  $sqltrainees->execute();

  $avTrainees=$sqltrainees->fetchall();

  // Get available Companies
  $querycompanies="SELECT DISTINCT  b.Bedrijf
  FROM bedrijven b
  ORDER BY b.Bedrijf;";

  $sqlCompanies=$connection->prepare($querycompanies);
  $sqlCompanies->execute();

  $avCompanies=$sqlCompanies->fetchall();


  // Get available Industries
  $queryindustries="SELECT DISTINCT  b.Industrie
  FROM bedrijven b
  WHERE NOT b.Industrie='-'
  ORDER BY b.Industrie;";

  $sqlindustries=$connection->prepare($queryindustries);
  $sqlindustries->execute();

  $avIndustries=$sqlindustries->fetchall();


  // Get available Cities
  $querycity="SELECT DISTINCT c.Locatie
  FROM contacts c
  WHERE NOT c.Locatie='-'
  ORDER BY c.Locatie;";

  $sqlCities=$connection->prepare($querycity);
  $sqlCities->execute();

  $avCities=$sqlCities->fetchall();


  // Get available departments
  $queryDepartments="SELECT DISTINCT c.Afdeling
  FROM contacts c
  WHERE NOT c.Afdeling=''
  ORDER BY c.Afdeling;";

  $sqldepartments=$connection->prepare($queryDepartments);
  $sqldepartments->execute();

  $avDepartments=$sqldepartments->fetchall();


  // Get available functions
  $queryFunctions="SELECT DISTINCT c.Functie
  FROM contacts c
  WHERE NOT c.Functie=''
  ORDER BY c.Functie;";

  $sqlfunctions=$connection->prepare($queryFunctions);
  $sqlfunctions->execute();

  $avFunctions=$sqlfunctions->fetchall();

?>



      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="sticky-top" id="filtersform" style="top:80px;"   >

            <div class="form-group detach" id="trfilterid">
              <!-- Trainees -->
              <label for="industry_select">Trainee</label>
              <select class="form-control custom-select" placeholder="Select a trainee" name="trainee_select[]"  size="3" multiple>
                <option value="" selected="selected">-</option>
                <?php
                  for($i=0;$i<count($avTrainees);$i++){
                    echo '<option value="'.$avTrainees[$i]["Trainee"] .'">'.$avTrainees[$i]["Trainee"].'</option>';
                  }
                 ?>
              </select>
            </div>


            <div class="form-group detach" id="indfilterid">
              <!-- Industry -->
              <label for="industry_select">Industry</label>
              <select class="form-control custom-select" placeholder="Select Industries" name="industry_select[]" size="3" multiple>
                <option value="" selected="selected">-</option>
                <?php
                  for($i=0;$i<count($avIndustries);$i++){
                    echo '<option value="'.$avIndustries[$i]["Industrie"] .'">'.$avIndustries[$i]["Industrie"].'</option>';
                  }
                 ?>
              </select>
            </div>


            <div class="form-group detach" id="compfilterid">
              <!-- Company -->
              <label for="company_select">Company</label>
              <select class="form-control custom-select" placeholder="Select Companies" name="company_select[]" size="3" multiple>
                <option value="" selected="selected">-</option>
                <?php
                  for($i=0;$i<count($avCompanies);$i++){
                    echo '<option value="'.$avCompanies[$i]["Bedrijf"].'">'.$avCompanies[$i]["Bedrijf"].'</option>';
                  }
                 ?>
              </select>
            </div>


            <div class="form-group detach" id="cityfilterid">
              <!-- Cities -->
              <label for="city_select">City</label>
              <select class="form-control custom-select" placeholder="Select Cities" name="city_select[]" size="3" multiple>
                <option value="" selected="selected">-</option>
                <?php
                  for($i=0;$i<count($avCities);$i++){
                      echo '<option value="'.$avCities[$i]["Locatie"] .'">'.$avCities[$i]["Locatie"].'</option>';
                  }
                 ?>
              </select>
            </div>


            <div class="form-group detach" id="depfilterid">
              <!-- Deparmtents -->
              <label for="department_select">Department</label>
              <select class="form-control custom-select" placeholder="Select Deparmtents" name="department_select[]" size="3" multiple>
                <option value="" selected="selected">-</option>
                <?php
                  for($i=0;$i<count($avDepartments);$i++){
                    echo '<option value="'.$avDepartments[$i]["Afdeling"] .'">'.$avDepartments[$i]["Afdeling"].'</option>';
                  }
                 ?>
              </select>
            </div>



            <div class="form-group detach" id="funfilterid">
              <!-- FUNCTION -->
              <label for="function_select">Function</label>
              <select class="form-control custom-select" placeholder="Select functions" name="function_select[]" size="3" multiple>
                <option value="" selected="selected">-</option>
                <?php
                  for($i=0;$i<count($avFunctions);$i++){
                    echo '<option value="'.$avFunctions[$i]["Functie"] .'">'.$avFunctions[$i]["Functie"].'</option>';
                  }
                 ?>
              </select>
            </div>

            <div class="form-group detach" id="statusfilterid">
              <!-- STATUS -->
              <label for="status_select">Status</label>
              <select class="form-control custom-select" placeholder="Select status" name="status_select[]" size="3" multiple>
                <option value="Gemaild">Gemaild</option>
                <option value="Gebeld">Gebeld</option>
                <option value="Afspraak">Afspraak</option>
                <option value="Geen interesse">Geen interesse</option>
                <option value="Geen interesse trainee">Geen interesse trainee</option>
                <option value="On Hold">On Hold</option>

              </select>
            </div>


            <!-- <button type="submit" class="btn btn-secondary h6" name="inspect">Inspect</button> -->
            <button type="submit" class="btn btn-primary h6" name="query" id="querybtn">Query</button>

      </form>
