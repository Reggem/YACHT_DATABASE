<nav class="navbar navbar-expand-md navbar-light bg-light">

  <!-- Button to come back on home page -->
  <div class="navbar-brand" >YACHT Trainees</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navs for the insert alter and select  -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../select/select.php">SELECT<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Insert/insert.php">INSERT</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../Alter/alter.php">ALTER</a>
      </li>

    </ul>

    <!-- Logout Button -->
    <a href="../index.php">
      <button class="nav navbar ml-auto btn btn-danger" type="submit"><i class="fas fa-sign-out-alt"></i><span class="mx-2">Log Out</span></button>
    </a>
</nav>
