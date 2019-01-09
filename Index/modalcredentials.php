<!-- Modal -->
<div class="modal fade" id="CredentialsModal" tabindex="-1" role="dialog" aria-labelledby="CredentialsModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" >Request credentials</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="Validation/validationrequest.php" class="" action="../Validation/validationrequest.php">
          <div class="h3 text-center">

          </div><br>
          <div class="form-group">
            <label for="email">YACHT Email</label>
            <input type="email" name="email" class="form-control" placeholder="YACHT Email" required>
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" name="fname" class="form-control" placeholder="First Name" required>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Request credentials</button>
      </div>
    </div>
  </div>
</div>
