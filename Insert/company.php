<div class="col-md-2 col-sm-12 mb-3 ml-2 text-center border border rounded shadow shadow-regular" >
  <div class="text-muted b text-justify mt-3">
    Add a company/trainee to the database if you cannot find it in the lists in the contact form.
  </div>
  <button class="btn btn-primary mt-5 mb-1" data-toggle="modal" data-target="#addcomp"><i class="far fa-plus-square"></i><span class="mx-3 h6">Company</span>
  </button>

  <button class="btn btn-primary mt-1 mb-3" data-toggle="modal" data-target="#addtrainee"><i class="far fa-plus-square"></i><span class="mx-3 h6">Trainee</span>
  </button>

  <!-- Modal Company-->
  <div class="modal fade" id="addcomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Company information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <form method="post" action="insert.php">
              <div class="input-group mb-3">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Company name" aria-label="Name" aria-describedby="basic-addon1" name="compname" required>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="industry" placeholder="Industry" required>
                  </div>
                  <div class="input-group mb-3">
                    <input type="number" step="1" min="0" class="form-control" name="nbrEmp" placeholder="Number of employees">
                  </div>
              </div>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" name="companysubmit">
                  <i class="far fa-plus-square"></i>
                  <span class="mx-2">Save</span>
                </button>

            </form>


        </div>

      </div>
    </div>
  </div>

  <!-- Modal Trainee -->
  <div class="modal fade" id="addtrainee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Trainee information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <form method="post" action="insert.php">
              <div class="input-group mb-3">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Voornaam" aria-label="First Name" name="traineeFname" required>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="traineeLname" placeholder="Naam" required>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="traineeEmail" placeholder="Email" required>
                  </div>
                  <div class="input-group mb-3">
                    <select class="form-control" name="traineeDep" required>
                      <option value="IT">IT</option>
                      <option value="Legal">Legal</option>
                      <option value="Finance">Finance</option>
                      <option value="Human Resources">Human Resources</option>
                      <option value="Supply Chain Management">Supply Chain Management</option>
                      <option value="Engineering">Engineering</option>
                    </select>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="traineeTel" placeholder="Telefoon" required>
                  </div>
                  <div class="input-group mb-3">
                    <select name="traineeKantoor" class="form-control" placeholder="Kantoor">
                      <option value="" disabled selected>Kantoor</option>
                      <?php
                        for($i=0;$i<count($avOffices);$i++){
                          echo '<option value="'.$avOffices[$i]["Stad"].'">'.$avOffices[$i]["Stad"].'</option>';
                        }
                       ?>
                    </select>
                  </div>
              </div>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" name="traineesubmit">
                  <i class="far fa-plus-square"></i>
                  <span class="mx-2">Save</span>
                </button>

            </form>


        </div>

      </div>
    </div>
  </div>
</div>
