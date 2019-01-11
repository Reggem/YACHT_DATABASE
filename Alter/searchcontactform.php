<!-- We should be able to modify a company and a contact so let's make two forms -->

<?php

  // Get available contacts by name and company
  $querycontacts="SELECT DISTINCT CONCAT_WS(' ',Voornaam, Naam) as Contact
  FROM contacts
  ORDER BY Contact;";

  $sqlcontacts=$connection->prepare($querycontacts);
  $sqlcontacts->execute();

  $avContacts=$sqlcontacts->fetchall();

  // Get available Companies
  $querycompanies="SELECT DISTINCT  b.Bedrijf
  FROM bedrijven b
  ORDER BY b.Bedrijf;";

  $sqlCompanies=$connection->prepare($querycompanies);
  $sqlCompanies->execute();

  $avCompanies=$sqlCompanies->fetchall();

?>



      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="sticky-top mt-3" style="top:80px; "   >

            <div class="form-group">
              <!-- Contacts-->
              <label for="contact_select" class="text-muted  h6" >Select a contact to modify</label>
              <select class="form-control custom-select" placeholder="Select a contact" name="contact_select"  size="10" required>
                <?php
                  for($i=0;$i<count($avContacts);$i++){
                    echo '<option value="'.$avContacts[$i]["Contact"] .'">'.$avContacts[$i]["Contact"].'</option>';
                  }
                ?>
              </select>
            </div>


            <!-- <div class="form-group">

              <label for="company_select">Company</label>
              <select class="form-control custom-select" placeholder="Select a company" name="company_select" size="3" >
                <?php
                  // for($i=0;$i<count($avCompanies);$i++){
                  //   echo '<option value="'.$avCompanies[$i]["Bedrijf"] .'">'.$avCompanies[$i]["Bedrijf"].'</option>';
                  // }
                 ?>
              </select>
            </div> -->

            <button type="submit" name="search" class="btn btn-secondary m-3">Search contact</button>
        </form>
