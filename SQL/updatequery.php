<!-- Here we write the query that will update our contact  -->
<?php
// echo $_SESSION["contactname_selected"];
$contact=$_SESSION["contactname_selected"];

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
//UPDATE THE CONTACT

//Collect the data of the contact
$updcontName=$updcontFN=$updFun=$updEmail=$updTel=$updLinkedin=$updDepartment=$updTrainee=$updLocatie=$updCompany=$updNote=$updStatus="";



if(isset($_POST["contactupdate"])){
  $updcontName = test_input($_POST["naam"]);
  $updcontFN = test_input($_POST["voornaam"]);
  $updFun = test_input($_POST["functie"]);
  $updEmail = test_input($_POST["email"]);
  $updTel = test_input($_POST["Telefoon"]);
  $updLinkedin = test_input($_POST["linkedin"]);
  $updDepartment=test_input($_POST["department"]);
  $updCompany=test_input($_POST["company"]);
  $updTrainee=test_input($_POST["trainee"]);
  $updLocatie=test_input($_POST["locatie"]);
  $updNote=test_input($_POST["note"]);
  $updStatus=test_input($_POST["status"]);


  $queryupdate="UPDATE contacts c
  SET Voornaam='$updcontFN' , Naam='$updcontName', Email='$updEmail', Telefoon='$updTel', Afdeling='$updDepartment' , Functie='$updFun', Locatie='$updLocatie', LinkedIn='$updLinkedin', ToegevoegdDoor='$updTrainee',
  Note='$updNote',Status='$updStatus',Bedrijf_idBedrijf= (SELECT idCompany
                      FROM bedrijven
                      WHERE Bedrijf='$updCompany')
  WHERE CONCAT_WS(' ',Voornaam, Naam)='$contact' ;";

  
  // echo $queryupdate;
  $sqlupdate=$connection->prepare($queryupdate);
  $sqlupdate->execute();
}


 ?>
