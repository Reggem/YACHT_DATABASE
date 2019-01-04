
<!-- The action of the form should be to send a request by email to the database manager with the information so that he can grant access to the DB.  -->
<form method="post" action="Validation/validationrequest.php" class="border bg-light px-5 py-4 rounded shadow" action="../Validation/validationrequest.php">
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
  <button type="submit" class="btn btn-primary">Request Credentials</button>
</form>
