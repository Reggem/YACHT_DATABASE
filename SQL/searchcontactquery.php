<!-- Form the query that will get the info of the contact and populate the form -->

<?php

//We look for all info on our contact
$query="SELECT DISTINCT  *
FROM contacts c
WHERE CONCAT_WS(' ',c.Voornaam,c.Naam)='$contactname_selected' ";


if (isset($_POST["search"])){

  $addstring1 =  $and1 ="";
  $andcnt =1 ;

  if(!empty($company_selected)){
    $addstring1 = "Bedrijf_idBedrijf IN (SELECT idCompany
                          FROM Bedrijven
                          WHERE Bedrijf='$company_selected')";
  }

  //Assign the ands
  for($i=1;$i<=$andcnt;$i++){
    ${"and".$i} =  ${"addstring".$i} != '' ? " AND " : "";
  }

  $query .= $and1.$addstring1;
  // echo $query;
}



//Prepare request and query
if(isset($_POST["search"])){

  $sql=$connection->prepare($query);
  $sql->execute();
  $results=$sql->fetchall();

  $result_array=$results[0];
  // echo "<pre>";
  // print_r($result_array);
  // echo "</pre>";
}




?>
