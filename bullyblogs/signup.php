<?php include './inc/head.php'; ?>
<?php include './inc/header.php'; ?>
<?php include './inc/tags.php'; ?>
<?php include './inc/sidebar.php'; ?>

<body class="text-center">

  <main class="form-signin w-100 m-auto">
    <form class="form-spacing-top" action="process.php?route=sign-up" method="POST" name="sign-up-info">
      <h1 class="h3 mb-3 fw-normal">Sign Up</h1>
      <?php 
        if(!empty($_GET['status'])){
          if($_GET['status'] === 'taken') echo '<div class="p-3 mb-3 bg-warning text-white">Email is alreadly taken</div>';
        }
      ?>
      <div class="form-floating form-title-spacing">
        <input type="name" class="form-control" id="floatingInput" name="name" placeholder="Name" required>
        <label for="floatingInput">Name</label>
      </div>
      <div class="form-floating">
        <input type="tel" class="form-control" id="floatingInput" name="phone" placeholder="phone" required>
        <label for="floatingInput">Phone</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="pwd" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
      </div>
      <div class="p-3 mb-3 bg-warning text-white email-alert">Email is not valid</div>
      <div class="p-3 mb-3 bg-warning text-white password-alert">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</div>

      <button class="w-100 btn btn-lg maroon-style btn-spacing" type="submit">Sign in</button>
    </form>
  </main>

</body>

<script>
  const validEmail = new RegExp("/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/");
  const strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})');

  const emailInput = document.querySelector("form[name='sign-up-info'] input[name='email']");
  const pwdInput = document.querySelector("form[name='sign-up-info'] input[name='pwd']");

  const form = document.querySelector("form[name='sign-up-info']");

  form.addEventListener('submit', e =>{
    if(!strongPassword.test(pwdInput.value)){
      e.preventDefault();
      document.querySelector('.password-alert').style = 'display: flex';
    }
  })
</script>

<?php include './inc/footer.php' ?>