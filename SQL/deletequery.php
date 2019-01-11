<!-- Here we execute the query taht deletes the contact from the database -->
<?php
$contact=$_POST["voornaam"].' '.$_POST["naam"];


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

$deletequery="DELETE FROM contacts
WHERE CONCAT_WS(' ',Voornaam, Naam)='$contact'";
// echo $deletequery;

if(isset($_POST["contactdelete"])){
  $sqldelete=$connection->prepare($deletequery);
  $sqldelete->execute();
}

 ?>
