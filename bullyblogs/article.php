<?php include './inc/head.php'; ?>
<?php include './inc/header.php'; ?>
<?php include './inc/tags.php'; ?>
<?php include './inc/sidebar.php'; ?>

<?php
$sql = 'SELECT * FROM `posts` WHERE `id`=' . $_GET['postid'] . ' LIMIT 1';
$sth = $dbh->query($sql);
$result = $sth->fetch();
$sql2 = 'SELECT * FROM `users` WHERE `id`=' . $result['user_id'] . ' LIMIT 1';
$sth2 = $dbh->query($sql2);
$result2 = $sth2->fetch();
$_SESSION['current_article_id'] = $_GET['postid'];
?>

<body>
    <div class="container form-spacing-top">
        <h1><?php echo $result['title'] ?></h1>
        <h3>By <?php echo $result2['name'] ?></h3>
        <?php
        $sql3 = 'SELECT * FROM `likes` WHERE `user_id`=' . $result['user_id'] . ' AND `liked_id`=' . $_GET['postid'] . ' LIMIT 1';
        $sth3 = $dbh->query($sql3);
        $result3 = $sth3->fetch();
        echo $result3['user_id'];
        if (!empty($result3)) {
            echo '<a href="process.php?route=like&status=unlike"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill maroon-heart" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
        </svg></a>';
        } else {
            echo '<a href="process.php?route=like&status=like"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
          </svg></a>';
        }
        ?>
        <p class="article-text"><?php echo $result['description'] ?></p>
        <hr />
        <form action="process.php?route=review" method="POST">
            <div class="form-group space-top">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="review"></textarea>
            </div>
            <button class="btn maroon-style space-top" type="submit">Review</button>
        </form>
        <h2 style="text-align: center;">Review</h2>
        <?php
            $reviewsSql = "SELECT * FROM `reviews` WHERE `reviewed_id`=". $_GET['postid'] ."";
            $sth_review = $dbh->query($reviewsSql);
            while($result4 = $sth_review->fetch()){
                echo $result4['review_text'];
            }

        ?>
    </div>
</body>

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

<?php include './inc/footer.php' ?>