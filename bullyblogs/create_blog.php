<?php include './inc/head.php'; ?>
<?php include './inc/header.php'; ?>
<?php include './inc/tags.php'; ?>
<?php include './inc/sidebar.php'; ?>

<body>
  <div class="container">
    <div class="row">
      <form>
        <div class="form-group">
          <label for="exampleFormControlInput1" class="space-top">Name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          <label for="exampleFormControlInput1" class="space-top">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          <label for="exampleFormControlInput1" class="space-top">Date</label>
          <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
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
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
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