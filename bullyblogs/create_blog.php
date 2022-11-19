<?php include './inc/head.php'; ?>
<?php include './inc/header.php'; ?>
<?php include './inc/tags.php'; ?>
<?php include './inc/sidebar.php'; ?>

<body>
  <div class="container">
    <div class="row" style="margin-top: 100px;">
      <form>
        <div class="form-group">
          <label for="Name" class="space-top">Name</label>
          <input type="text" class="form-control" id="Name" placeholder="Name">
          <label for="Title" class="space-top">Title</label>
          <input type="text" class="form-control" id="Title" placeholder="Title">
          <label for="Email" class="space-top">Email address</label>
          <input type="email" class="form-control" id="Email" placeholder="Email">
          <label for="Date" class="space-top">Date</label>
          <input type="date" class="form-control" id="Date">
        </div>
        <div class="form-group space-top">
          <label for="exampleFormControlTextarea1">Description</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn maroon-style space-top">Post</button>
      </form>
    </div>
  </div>

  <script>
    tinymce.init({
      selector: 'textarea',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [{
          value: 'First.Name',
          title: 'First Name'
        },
        {
          value: 'Email',
          title: 'Email'
        },
      ]
    });
  </script>
</body>

<?php include './inc/footer.php' ?>