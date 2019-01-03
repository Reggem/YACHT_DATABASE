<form method="post" class="container" action="addcomp.php">
  <div class="input-group mb-3">
      <div class="input-group mb-3 mt-5 h6">
        Insert Company information
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Company name" aria-label="Name" aria-describedby="basic-addon1" name="compname" required>
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="city" placeholder="City" required>
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="industry" placeholder="Industry" required>
      </div>
      <div class="input-group mb-3">
        <input type="number" step="1" min="0" class="form-control" name="nbrEmp" placeholder="Number of employees">
      </div>

      <button class="btn btn-primary" type="submit" id="savenewcomp"><i class="far fa-plus-square"></i><span class="mx-2">Save</span>
      </button>
      <button class="btn btn-danger inline  mx-2" id="savenewcomp" onclick="window.close()">Quit</button>

  </div>
</form>
