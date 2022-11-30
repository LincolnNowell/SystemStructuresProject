<?php include './inc/head.php'; ?>
<?php include './inc/header.php'; ?>
<?php include './inc/tags.php'; ?>
<?php include './inc/sidebar.php'; ?>

<body class="text-center">
    
<main class="form-signin w-100 h-100 m-auto">
  <form class="form-spacing-top" method="POST" action="process.php">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating form-title-spacing">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary btn-spacing" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
  </form>
</main>


    
  

</body>

<?php include './inc/footer.php' ?>