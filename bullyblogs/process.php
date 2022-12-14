<?php
session_start();
include 'inc/connect.php';

function FindUser(&$dbh, $email)
{
    $stmt = $dbh->query("SELECT * FROM `users` WHERE `email`='" . $email . "'");
    $row = $stmt->fetch();
    if ($row['count(*)'] > 0) {
        return true;
    }
    return false;
}

function VerifyUser(&$dbh, $email, $pwd)
{
    $stmt = $dbh->query("SELECT * FROM `users` WHERE `email`='" . $email . "' LIMIT 1");
    $row = $stmt->fetch();

    if (!empty($row['email'])) {
        if (password_verify($pwd, $row['pwd'])) {

            $_SESSION['name'] = $row['name'];
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $row['name'];
            header('location: profile.php');
        } else {
            header('location: login.php?status=invalid');
        }
    } else {
        header('location: login.php?status=no-user');
    }
}

function AddUser(&$dbh, $name, $phone, $email, $password)
{
    if (FindUser($dbh, $email)) {
        header("Location: signup.php?status=taken");
    } else {
        $sql = "INSERT INTO `users` (`id`,`name`,`phone`,`email`,`pwd`) VALUES (NULL,?,?,?,?);";
        $sth = $dbh->prepare($sql);
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        if ($sth->execute([$name, $phone, $email, $hashedPwd])) {

            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;
            header('Location: profile.php');
            exit;
        }
    }
}

function AddPost(&$dbh, $cat, $title, $date, $desc, $id)
{
    $sql = "INSERT INTO `posts` (`id`, `category`, `title`, `date`, `description`, `user_id`) VALUES (NULL,?,?,?,?,?)";
    $sth = $dbh->prepare($sql);
    if ($sth->execute([$cat, $title, $date, $desc, $id])) {
        header("location: profile.php");
    }
}

function AddLike(&$dbh, $user_id, $article_id)
{
    $sql2 = "SELECT * FROM `posts` WHERE `id`=" . $article_id . " LIMIT 1";
    $sth2 = $dbh->query($sql2);
    $postResult = $sth2->fetch();
    if (!empty($postResult)) {
        $updateSql = "UPDATE `posts` SET likes= ? WHERE `id`=? LIMIT 1";
        $stmt = $dbh->prepare($updateSql);
        $stmt->execute([$postResult['likes'] + 1, $article_id]);
    }
    $sql = "INSERT INTO `likes` (`id`, `user_id`, `liked_id`) VALUES (NULL,?,?)";
    $sth = $dbh->prepare($sql);
    if ($sth->execute([$user_id, $article_id])) {
        header("location: article.php?article_id=" . $article_id . "");
    }
}

function AddReview(&$dbh, $user_id, $article_id, $review)
{
    $sql = "INSERT INTO `reviews` (`id`, `user_id`, `reviewed_id`, `review_text`) VALUES (NULL,?,?,?)";
    $sth = $dbh->prepare($sql);
    if ($sth->execute([$user_id, $article_id, $review])) {
        header("location: article.php?article_id=" . $article_id . "");
    }
}


$route = $_GET['route'];

switch ($route) {
    case 'sign-up':
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        AddUser($dbh, $name, $phone, $email, $password);
        break;
    case 'sign-in':
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        VerifyUser($dbh, $email, $password);
        break;
    case 'sign-out':

        session_destroy();
        header('location: index.php');
        break;
    case 'like':

        $articleId = $_SESSION['current_article_id'];
        $userId =  $_SESSION['user_id'];
        AddLike($dbh, $userId, $articleId);
        break;
    case 'review':

        $id = $_SESSION['user_id'];
        $review = $_POST['review'];
        $articleId = $_SESSION['current_article_id'];
        AddReview($dbh, $id, $articleId, $review);
        break;
    case 'blog':

        $id = $_SESSION['user_id'];
        $title = $_POST['title'];
        $date = $_POST['date'];
        $desc = $_POST['desc'];
        $cat = $_POST['category'];
        AddPost($dbh, $cat, $title, $date, $desc, $id);
        break;
}
