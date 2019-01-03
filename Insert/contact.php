<div class="col-md-9" id=contactform>
<form method="post" class="container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="input-group mb-3">
      <div class="input-group mb-3 h6">
        Insert contacts information
      </div>
      <select name="bedrijf" class="form-control" placeholder="Select a company" required>
        <?php
          for($i=0;$i<count($avCompanies);$i++){
            echo '<option value="'.$avCompanies[$i]["Bedrijf"].'">'.$avCompanies[$i]["Bedrijf"].'</option>';
          }
         ?>
      </select>
  </div>
  <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Naam" aria-label="Naam" aria-describedby="basic-addon1" name="naam" required>
  </div>
  <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Voornaam" aria-label="Voornaam" aria-describedby="basic-addon1" name="voornaam" required>
  </div>
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Functie" aria-label="Functie" aria-describedby="basic-addon2"  name="functie">
  </div>
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Adfdeling" aria-label="Afdeling" aria-describedby="basic-addon2"  name="department">
  </div>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2">@</span>
    </div>
    <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2" name="email">
  </div>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2"><i class="fas fa-phone"></i></span>
    </div>
    <input type="text" class="form-control" placeholder="Telefoon" aria-label="Telefoon" aria-describedby="basic-addon2"  name="Telefoon">
  </div>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2"><i class="fab fa-linkedin"></i></span>
    </div>
    <input type="text" class="form-control" placeholder="LinkedIn URL" aria-label="LinkedIn URL" aria-describedby="basic-addon2"  name="linkedin">
  </div>
  <button class="btn btn-primary opslaan-btn" type="submit" aria-pressed="true"><i class="far fa-save fa-2x"></i> </button>
</form>
</div>



<!-- Add the contact to the contact table -->
<?php




// $addcontName=$addcontFN=$addFun=$addEmail=$addTel=$addLinkedin=$addDepartment="";
//
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $addcontName = test_input($_POST["naam"]);
//     $addcontFN = test_input($_POST["voornaam"]);
//     $addFun = test_input($_POST["functie"]);
//     $addEmail = test_input($_POST["email"]);
//     $addTel = test_input($_POST["Telefoon"]);
//     $addLinkedin = test_input($_POST["linkedin"]);
//     $addDepartment=test_input($_POST["department"]);
//     $bedrijf=test_input($_POST['bedrijf']);
//   }
//


// try {
//   require('config.php');
//   $connection=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,$_SESSION["username"],$_SESSION["password"]);
//   $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//
//   // Format for the query
  $tab=array($addcontName, $addcontFN, $addEmail,$addTel,$addFun,$addDepartment);
  $new_tab="'".implode("', '", $tab)."'";

  // Insert the contact
  @$sqlcont="INSERT INTO contacts(Naam, Voornaam, Email,Telefoon,Functie, Afdeling, Bedrijven_idCompany)
   SELECT $new_tab, idCompany FROM bedrijven WHERE Bedrijf='$bedrijf';";

  $insert=$connection->prepare($sqlcont);
  $insert->execute();




// } catch (PDOException $e) {
//     // echo "<div class='text-danger h6'>Echec connection</div>";
// }

echo "<div class='h6'>Query:</div> <br>".$sqlcont;


?>
