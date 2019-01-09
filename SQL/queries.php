<!-- Stores the queries to be made on select, insert and alter -->


<?php
// If company is selected by the user, we don't car about the industry
if(!empty($companies[0])){
  // echo "the company is not empty: ".$companies[0];

  $query="SELECT DISTINCT  b.Industrie, b.Bedrijf, c.Locatie, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
  FROM contacts c
  LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf
  WHERE (c.Locatie IN ('".$incities."') AND c.Afdeling IN ('".$indepartments."') AND b.Bedrijf IN ('".$incompanies."'));";

  if(empty($departments[0]) and empty($cities[0])){

    // echo "2";
    $query="SELECT DISTINCT b.Industrie, b.Bedrijf, c.Locatie, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
    FROM contacts c
    LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf

    WHERE ( b.Bedrijf IN ('".$incompanies."'));";

  }elseif(!empty($departments[0]) and empty($cities[0])){
    // echo "3";
    $query="SELECT DISTINCT b.Industrie, b.Bedrijf, c.Locatie, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
    FROM contacts c
    LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf

    WHERE ( c.Afdeling IN ('".$indepartments."') AND b.Bedrijf IN ('".$incompanies."'));";
  }
  elseif(empty($departments[0]) and !empty($cities[0])) {
    // echo "4";
    $query="SELECT DISTINCT b.Industrie, b.Bedrijf, c.Locatie, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
    FROM contacts c
    LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf

    WHERE (c.Locatie IN ('".$incities."') AND b.Bedrijf IN ('".$incompanies."'));";
  }

  // If the compnay is not specified by the suer
}else{
  if (empty($cities[0]) and empty($departments[0]) and empty($industries[0]) and empty($trainees[0])) {
    $query="No query formed!";
    // echo "<h4> No filters selected </h4>";
  }elseif(!empty($cities[0]) and empty($departments[0]) and empty($industries[0])){
    // echo "6";
    $query="SELECT DISTINCT b.Industrie, b.Bedrijf, c.Locatie, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
    FROM contacts c
    LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf

    WHERE (c.Locatie IN ('".$incities."'));";
  }elseif(!empty($cities[0]) and !empty($departments[0]) and empty($industries[0])){
    // echo "7";
    $query="SELECT DISTINCT b.Industrie, b.Bedrijf, c.Locatie, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
    FROM contacts c
    LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf

    WHERE (c.Locatie IN ('".$incities."') AND c.Afdeling IN ('".$indepartments."'));";
  }elseif(!empty($cities[0]) and empty($departments[0]) and !empty($industries[0])){
    // echo "8";
    $query="SELECT DISTINCT b.Industrie, b.Bedrijf, c.Locatie, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
    FROM contacts c
    LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf

    WHERE (c.Locatie IN ('".$incities."') AND b.Industrie IN ('".$inindustries."'));";
  }elseif (!empty($cities[0]) and !empty($departments[0]) and !empty($industries[0])) {
    // echo "9";
    $query="SELECT DISTINCT b.Industrie, b.Bedrijf, c.Locatie, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
    FROM contacts c
    LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf

    WHERE (c.Locatie IN ('".$incities."') AND b.Industrie IN ('".$inindustries."') AND c.Afdeling IN ('".$indepartments."'));";
  }elseif (empty($cities[0]) and !empty($departments[0]) and !empty($industries[0])) {
    // echo "10";
    $query="SELECT DISTINCT b.Industrie, b.Bedrijf, c.Locatie, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
    FROM contacts c
    LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf

    WHERE ( b.Industrie IN ('".$inindustries."') AND c.Afdeling IN ('".$indepartments."'));";
  }elseif(empty($cities[0]) and !empty($departments[0]) and empty($industries[0])){
    // echo "11";
    $query="SELECT DISTINCT b.Industrie, b.Bedrijf, c.Locatie, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
    FROM contacts c
    LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf

    WHERE (c.Afdeling IN ('".$indepartments."'));";
  }elseif(empty($cities[0]) and empty($departments[0]) and !empty($industries[0])){
    // echo "12";
    $query="SELECT  DISTINCT b.Industrie, b.Bedrijf, c.Locatie, c.Naam,c.Voornaam, c.Telefoon, c.Email,   c.Afdeling
    FROM contacts c
    LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf

    WHERE (b.Industrie IN ('".$inindustries."'));";
  }
}

 ?>
