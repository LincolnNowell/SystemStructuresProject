<?php include 'connect.php' ?>

<header class="py-3 mb-3 border-bottom maroon-style">
  <!-- Put grid template columns in seperate css and make mobile style -->
  <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr .5fr;">
    <nav class="navbar">
      <div class="container-fluid">
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" id="side-bar-activator">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <div class="d-flex align-items-center">
      <form class="w-100 me-3" role="search">

      </form>
    </div>

    <div class="d-flex justify-content-end">
      <?php
      if (!empty($_SESSION['name'])) {
        echo '<div class="flex-shrink-0 dropdown">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">
            <img src="./imgs/bootstrap-themes.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small shadow show" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 34px, 0px);">
            <li><a class="dropdown-item" href="#">New blog...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="process.php?route=sign-out">Sign out</a></li>
          </ul>
        </div>';
      } else {
        echo '<a class="btn btn-secondary" href="signup.php">Sign Up</a> &nbsp;';
        echo '<a class="btn btn-secondary" href="login.php">Sign In</a>';
      }
      ?>
    </div>
  </div>
</header>