<?php include './inc/head.php'; ?>
<?php include './inc/header.php'; ?>
<?php include './inc/tags.php'; ?>
<?php include './inc/sidebar.php'; ?>

<body>
  <div class="container">
    <div class="row" style="margin-top: 100px;">
      <form action="process.php?route=blog" method="POST">
        <div class="form-group">
          <label for="Title" class="space-top">Title</label>
          <input type="text" class="form-control" id="Title" placeholder="Title" name="title">
          <label for="category" class="space-top" id="category" placeholder="category">Category</label>
          <div class="form-check space-top">
            <input class="form-check-input" type="radio" name="category" id="flexRadioDefault1" value="product">
            <label class="form-check-label" for="flexRadioDefault1">
              Product
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="flexRadioDefault2" value="event">
            <label class="form-check-label" for="flexRadioDefault2">
              Event
            </label>
          </div>
          <label for="Email" class="space-top">Date</label>
          <input type="date" class="form-control" id="Date" name="date">
        </div>
        <div class="form-group space-top">
          <label for="exampleFormControlTextarea1">Description</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
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