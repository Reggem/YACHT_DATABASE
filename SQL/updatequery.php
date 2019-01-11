<!-- Here we write the query that will update our contact  -->
<?php

$contact=$_POST["voornaam"].' '.$_POST["naam"];


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
//UPDATE THE CONTACT

//Collect the data of the contact
$updcontName=$updcontFN=$updFun=$updEmail=$updTel=$updLinkedin=$updDepartment=$updTrainee=$updLocatie=$updCompany="";



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


  $queryupdate="UPDATE contacts c
  SET Voornaam='$updcontFN' , Naam='$updcontName', Email='$updEmail', Telefoon='$updTel', Afdeling='$updDepartment' , Functie='$updFun', Locatie='$updLocatie', LinkedIn='$updLinkedin', ToegevoegdDoor='$updTrainee', Bedrijf_idBedrijf= (SELECT idCompany
                      FROM bedrijven
                      WHERE Bedrijf='$updCompany')
  WHERE CONCAT_WS(' ',Voornaam, Naam)='$contact' ;";


  // echo $queryupdate;
  $sqlupdate=$connection->prepare($queryupdate);
  $sqlupdate->execute();
}


 ?>
