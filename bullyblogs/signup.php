<?php include './inc/head.php'; ?>
<?php include './inc/header.php'; ?>
<?php include './inc/tags.php'; ?>
<?php include './inc/sidebar.php'; ?>

<body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form class="form-spacing-top">
    <h1 class="h3 mb-3 fw-normal">Sign Up</h1>

    <div class="form-floating form-title-spacing">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary btn-spacing" type="submit">Sign in</button>
  </form>
</main>

</body>

<?php include './inc/footer.php' ?>