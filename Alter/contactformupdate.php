<?php

try {

  //Get company that was seleted
  $querycompanyselected="SELECT DISTINCT  b.Bedrijf
  FROM bedrijven b
  WHERE b.idCompany='".$result_array["Bedrijf_idBedrijf"]."';";

  $sqlSelectedComp=$connection->prepare($querycompanyselected);
  $sqlSelectedComp->execute();

  $selectedComp=$sqlSelectedComp->fetchall();

  $selectedCompany=$selectedComp[0]["Bedrijf"];
  // print_r($selectedCompany);


  // Get available Companies
  $querycompanies="SELECT DISTINCT  b.Bedrijf
  FROM bedrijven b
  WHERE NOT b.idCompany='".$result_array["Bedrijf_idBedrijf"]."'
  ORDER BY b.Bedrijf;";

  $sqlCompanies=$connection->prepare($querycompanies);
  $sqlCompanies->execute();

  $avCompanies=$sqlCompanies->fetchall();

  // Get available Trainees
  $querytrainees="SELECT DISTINCT CONCAT_WS(' ',Voornaam, Naam) as Trainee
  FROM trainees
  WHERE NOT CONCAT_WS(' ',Voornaam, Naam)='".$result_array["ToegevoegdDoor"]."'
  ORDER BY Trainee;";

  // echo $querytrainees;


  $sqltrainees=$connection->prepare($querytrainees);
  $sqltrainees->execute();

  $avTrainees=$sqltrainees->fetchall();

} catch (PDOException $e) {
    echo "<div class='text-danger h6'>Echec connection</div>";
}
?>



<div class="col-md-9 col-sm-12" id=contactform>
  <form method="post" class="container mt-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="h6">Contact form of : <?php echo "<b>".$_SESSION["contactname_selected"]."</b>"; ?></div>
    <div class="form-group mb-3">
        <label for="trainee">Added by</label>
        <select name="trainee" class="form-control" placeholder="Toegevoegd door" required>
          <option value="<?php echo $result_array["ToegevoegdDoor"]?>" selected>
            <?php echo $result_array["ToegevoegdDoor"]; ?>
          </option>
          <?php
            for($i=0;$i<count($avTrainees);$i++){
              echo '<option value="'.$avTrainees[$i]["Trainee"].'">'.$avTrainees[$i]["Trainee"].'</option>';
            }
           ?>
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="company">Company</label>
        <select name="company" class="form-control" placeholder="Select a company" required>
          <option value="<?php echo $selectedCompany; ?>" selected>
            <?php echo $selectedCompany; ?>
          </option>
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
            <input type="text" class="form-control" value="<?php echo $result_array["Voornaam"]; ?>"  aria-label="Voornaam" aria-describedby="basic-addon1" name="voornaam" required>
          </div>
      </div>
      <div class="col">
          <div class="form-group mb-3">
            <label for="trainee">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $result_array["Naam"]; ?>" aria-label="Naam" aria-describedby="basic-addon1" name="naam" required>
          </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
        <div class="form-group mb-3">
          <label for="trainee">Function</label>
          <input type="text" class="form-control" value="<?php echo $result_array["Functie"]; ?>" aria-label="Functie" aria-describedby="basic-addon2"  name="functie">
        </div>
      </div>
      <div class="col">
        <div class="form-group mb-3">
          <label for="trainee">Department</label>
          <input type="text" class="form-control" value="<?php echo $result_array["Afdeling"]; ?>" aria-label="Afdeling" aria-describedby="basic-addon2"  name="department">
        </div>
      </div>
      <div class="col">
        <div class="form-group mb-3">
            <label for="trainee">Location</label>
          <input type="text" class="form-control" value="<?php echo $result_array["Locatie"]; ?>" aria-label="Locatie" aria-describedby="basic-addon2"  name="locatie">
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text">@</span>
      </div>
      <input type="email" class="form-control" value="<?php echo $result_array["Email"]; ?>" aria-label="Email" aria-describedby="basic-addon2" name="email">
    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text" ><i class="fas fa-phone"></i></span>
      </div>
      <input type="text" class="form-control" value="<?php echo $result_array["Telefoon"]; ?>" aria-label="Telefoon" aria-describedby="basic-addon2"  name="Telefoon">
    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
      </div>
      <input type="text" class="form-control" value="<?php echo $result_array["LinkedIn"]; ?>" aria-label="LinkedIn URL" aria-describedby="basic-addon2"  name="linkedin">
    </div>
    <div class="form-group mb-3">
      <label for="note">Note</label>
      <input type="textarea" class="form-control" placeholder="Note about the contact ant the status of the relationship " aria-label="Note"  name="note" value="<?php echo $result_array["Note"]; ?>">
    </div>
    <div class="form-group mb-3">
      <label for="status">Status</label>
      <select  name="status" class="form-control">
        <option value="<?php echo $result_array["Status"]; ?>" style="visibility:hidden;"  selected>
          <?php echo $result_array["Status"]; ?>
        </option>
        <option value="Moet Mailen">Moet Mailen</option>
        <option value="Gemaild">Gemaild</option>
        <option value="Gebeld">Gebeld</option>
        <option value="Afspraak">Afspraak</option>
        <option value="Geen interesse">Geen interesse</option>
        <option value="Geen interesse trainee">Geen interesse trainee</option>
        <option value="On Hold">On Hold</option>
        <option value="Moet Bellen">Moet Bellen</option>
        <option value="Reminder Sturen">Reminder Sturen</option>
      </select>
    </div>


    <!--  wen clicked the query is executed-->
    <button class="btn btn-primary " type="submit" aria-pressed="true" name="contactupdate"><span class="mx-3 h6">Update contact</span></button>

    <!-- When clicked the contact is deleted -->
    <button class="btn btn-secondary " type="submit" aria-pressed="true" name="contactdelete"><i class="fas fa-trash-alt"></i><span class="mx-3 h6">Delete contact</span></button>
  </form>



</div>
