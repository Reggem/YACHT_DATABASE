<?php

try {

  // Get available Companies
  $querycompanies="SELECT DISTINCT  b.Bedrijf
  FROM bedrijven b;";

  $sqlCompanies=$connection->prepare($querycompanies);
  $sqlCompanies->execute();

  $avCompanies=$sqlCompanies->fetchall();

  // Get available Trainees
  $querytrainees="SELECT DISTINCT CONCAT_WS(' ',Voornaam, Naam) as Trainee
  FROM trainees
  ORDER BY Trainee;";

  $sqltrainees=$connection->prepare($querytrainees);
  $sqltrainees->execute();

  $avTrainees=$sqltrainees->fetchall();

} catch (PDOException $e) {
    echo "<div class='text-danger h6'>Echec connection</div>";
}
?>



<div class="col-md-9 col-sm-12" id=contactform>
  <form method="post" class="container mt-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="h6">Insert contacts information</div>
    <div class="form-group mb-3">
        <label for="trainee">Added by</label>
        <select name="trainee" class="form-control" placeholder="Toegevoegd door" onchange="checkAndAddOption(this)" required>
          <?php
            for($i=0;$i<count($avTrainees);$i++){
              echo '<option value="'.$avTrainees[$i]["Trainee"].'">'.$avTrainees[$i]["Trainee"].'</option>';
            }
           ?>
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="trainee">Company</label>
        <select name="bedrijf" class="form-control" placeholder="Select a company" required>
          <?php
            for($i=0;$i<count($avCompanies);$i++){
              echo '<option value="'.$avCompanies[$i]["Bedrijf"].'">'.$avCompanies[$i]["Bedrijf"].'</option>';
            }
           ?>
        </select>
    </div>
    <div class="form-row">
      <div class="col">
          <div class="form-group mb-3">
            <label for="trainee">First Name</label>
            <input type="text" class="form-control" placeholder="Voornaam" aria-label="Voornaam" aria-describedby="basic-addon1" name="voornaam" required>
          </div>
      </div>
      <div class="col">
          <div class="form-group mb-3">
            <label for="trainee">Last Name</label>
            <input type="text" class="form-control" placeholder="Naam" aria-label="Naam" aria-describedby="basic-addon1" name="naam" required>
          </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
        <div class="form-group mb-3">
            <label for="trainee">Function</label>
          <input type="text" class="form-control" placeholder="Functie" aria-label="Functie" aria-describedby="basic-addon2"  name="functie">
        </div>
      </div>
      <div class="col">
        <div class="form-group mb-3">
            <label for="trainee">Department</label>
          <input type="text" class="form-control" placeholder="Adfdeling" aria-label="Afdeling" aria-describedby="basic-addon2"  name="department">
        </div>
      </div>
      <div class="col">
        <div class="form-group mb-3">
            <label for="trainee">Location</label>
          <input type="text" class="form-control" placeholder="Locatie" aria-label="Locatie" aria-describedby="basic-addon2"  name="locatie">
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text">@</span>
      </div>
      <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2" name="email">
    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text" ><i class="fas fa-phone"></i></span>
      </div>
      <input type="text" class="form-control" placeholder="Telefoon" aria-label="Telefoon" aria-describedby="basic-addon2"  name="Telefoon">
    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
      </div>
      <input type="text" class="form-control" placeholder="LinkedIn URL" aria-label="LinkedIn URL" aria-describedby="basic-addon2"  name="linkedin">
    </div>
    <div class="form-group mb-3">
      <label for="trainee">Note</label>
      <input type="textarea" class="form-control" placeholder="Note about the contact ant the status of the relationship " aria-label="Note"  name="note" >
    </div>
    <div class="form-group mb-3">
      <label for="trainee">Status</label>
      <select  name="status" class="form-control">
        <!-- <option value="" selected></option> -->
        <option value="Moet Mailen">Moet Mailen</option>
        <option value="Gemaild">Gemaild</option>
        <option value="Gebeld">Gebeld</option>
        <option value="Gemaild">Afspraak</option>
        <option value="Geen interesse">Geen interesse</option>
        <option value="Geen interesse trainee">Geen interesse trainee</option>
        <option value="On Hold">On Hold</option>
        <option value="Moet Bellen">Moet Bellen</option>
        <option value="Reminder Sturen">Reminder Sturen</option>
      </select>
    </div>

    <!-- When clicked a modal opens -->

    <!-- <button class="btn btn-secondary " type="submit"  name="inspectadd" id="inspectqueryadd" data-toggle="modal" data-target="#myModal"><span class="mx-3 h6">Inspect query</span></button> -->




    <!--  wen clicked the query is executed-->
    <button class="btn btn-primary " type="submit" aria-pressed="true" name="contactsubmit"><span class="mx-3 h6">Add contact</span></button>
  </form>



</div>
