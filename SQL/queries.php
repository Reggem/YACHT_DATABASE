<!-- Stores the queries to be made on select, insert and alter -->


<?php

//If notheing is selected we display the message that the user should select in the filter list

$query="";

if(empty($companies[0]) and empty($trainees[0]) and empty($cities[0]) and empty($departments[0]) and empty($industries[0])){

  $query="No query formed!";
}
//Otherwise, if anything is selected, the query should use the filters that are not empty
else{

  $query="SELECT DISTINCT b.Bedrijf, c.Locatie, CONCAT_WS(' ',c.Voornaam,c.Naam) as Naam, c.Telefoon, c.Email, c.Afdeling FROM contacts c
  LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf
  WHERE (c.ToegevoegdDoor IN ('".$intrainees."') AND c.Locatie IN ('".$incities."') AND c.Afdeling IN ('".$indepartments."') AND b.Bedrijf IN ('".$incompanies."') AND b.Industrie IN ('".$inindustries."'))";

}


 ?>
