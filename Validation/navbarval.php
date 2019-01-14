<nav class="navbar navbar-expand-md navbar-light bg-light">

    <!-- Button to come back on home page -->
    <a href="../index.php">
      <div class="navbar-brand">YACHT Trainees</div>
    </a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>
    </button>



    <!-- Login Button -->

      <button class="nav navbar btn btn-success ml-auto" id="loginbtnval" data-toggle="modal" data-target="#LoginModalVal"><i class="fas fa-sign-in-alt"></i><span class="mx-2">Log In</span>
      </button>

      <?php
        include("modalloginval.php");
      ?>



</nav>
