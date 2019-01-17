<!-- Stores the queries to be made on select, insert and alter -->


<?php


$query = "SELECT DISTINCT b.Bedrijf, c.Locatie, CONCAT_WS(' ',c.Voornaam,c.Naam) as Naam, c.Functie,c.Telefoon, c.Email, c.Status FROM contacts c
LEFT JOIN bedrijven b on b.idCompany=c.Bedrijf_idBedrijf
WHERE 1=1 ";


if (isset($_POST['query'])){

        $addstring1 = $addstring2 = $addstring3 = $addstring4 =$addstring5 = $addstring6=$addstring7= $and1 = $and2 = $and3 = $and4 = $and5 =$and6= $and7="";
        $andcnt =7 ;

        if(!empty($departments[0])){
          $addstring1 = " c.Afdeling IN ('$indepartments') ";
        }

        if(!empty($companies[0])){
          $addstring2 = " b.Bedrijf IN ('$incompanies') ";
        }

        if(!empty($trainees[0])){
          $addstring3 = " c.ToegevoegdDoor IN ('$intrainees') ";
        }

        if(!empty($industries[0])){
          $addstring4 = " b.Industrie IN ('$inindustries') ";
        }

        if(!empty($cities[0])){
          $addstring5 = " c.Locatie IN ('$incities') ";
        }

        if(!empty($status[0])){
          $addstring6 = " c.Status IN ('$instatus') ";
        }

        if(!empty($functie[0])){
          $addstring7 = " c.Functie IN ('$infuncties') ";
        }

        //Assign the ands
        for($i=1;$i<=$andcnt;$i++){
          ${"and".$i} =  ${"addstring".$i} != '' ? " AND" : "";
        }

        $query .= $and1.$addstring1.$and2.$addstring2.$and3.$addstring3.$and4.$addstring4.$and5.$addstring5.$and6.$addstring6.$and7.$addstring7;

}

// if (isset($_POST['inspect'])){
//
//   $addstring1 = $addstring2 = $addstring3 = $addstring4 =$addstring5 = $and1 = $and2 = $and3 = $and4 = $and5 ="";
//   $andcnt =5 ;
//
//   if(!empty($departments[0])){
//     $addstring1 = " c.Afdeling IN ('$indepartments') ";
//   }
//
//   if(!empty($companies[0])){
//     $addstring2 = " b.Bedrijf IN ('$incompanies') ";
//   }
//
//   if(!empty($trainees[0])){
//     $addstring3 = " c.ToegevoegdDoor IN ('$intrainees') ";
//   }
//
//   if(!empty($industries[0])){
//     $addstring4 = " b.Industrie IN ('$inindustries') ";
//   }
//
//   if(!empty($cities[0])){
//     $addstring5 = " c.Locatie IN ('$incities') ";
//   }
//
//   //Assign the ands
//   for($i=1;$i<=$andcnt;$i++){
//     ${"and".$i} =  ${"addstring".$i} != '' ? " AND" : "";
//   }
//
//   $query .= $and1.$addstring1.$and2.$addstring2.$and3.$addstring3.$and4.$addstring4.$and5.$addstring5;
//
// }


//If notheing is selected we display the message that the user should select in the filter list

if(empty($companies[0]) and empty($trainees[0]) and empty($cities[0]) and empty($departments[0]) and empty($industries[0]) and empty($infuncties[0]) and empty($instatus[0])){

  $query="No query formed!";
}

// echo $query;


 ?>
