<?php include './inc/head.php'; ?>
<?php include './inc/header.php'; ?>
<?php include './inc/sidebar.php'; ?>

<body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="filter-controls col-sm-2">
                <h4 class="filter-title">Filter</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Products
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Events
                    </label>
                </div>
            </div>
            <div class="results col-sm-10">
                <h4 class="Results">Results</h4>

                <div class="row">
                    <?php
                    $sql = 'SELECT * FROM `posts` LIMIT 12';
                    $sth = $dbh->query($sql);
                    while ($cards = $sth->fetch()) {
                        echo '<div class="card col-sm-3">
                            <img src="./imgs/bootstrap-themes.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">' . $cards['title'] . '</h5>
                                <p class="card-text">' . $cards['description'] . '</p>
                                <a href="article.php?postid='. $cards['user_id'] .'&article_id='. $cards['id'] .'" class="btn btn-primary">Read</a>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</body>

<?php include './inc/footer.php' ?>