<div class="col-md-2 col-sm-12 mb-3 ml-2 text-center border border rounded shadow shadow-regular" >
  <div class="text-muted b text-justify mt-3">
    Add a company to the database if you cannot find it in the list in the contact form.
  </div>
  <button class="btn btn-primary mt-5 mb-3" data-toggle="modal" data-target="#addcomp"><i class="far fa-plus-square"></i><span class="mx-3 h6">Add a company</span>
  </button>

  <!-- Modal -->
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
</div>
