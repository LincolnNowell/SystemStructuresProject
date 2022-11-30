<?php
include 'inc/connect.php';

function FindUser(&$dbh, $email)
{
    $stmt = $dbh->query("SELECT * FROM `users` WHERE `username`='" . $email . "'");
    $row = $stmt->fetch();
    if ($row['count(*)'] > 0) {
        return true;
    }
    return false;
}

function AddUser(&$dbh, $name, $email, $password)
{
    if (FindUser($dbh, $email)) {
        header("Location: signup.php?status=taken");
    } else {
        $sql = "INSERT INTO `users` (`id`,`name`,`username`,`pwd`) VALUES (NULL,?,?,?);";
        $sth = $dbh->prepare($sql);
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        if ($sth->execute([$name, $email, $hashedPwd])) {
            header('Location: profile.php?email='. $email .'');
        }
    }
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['pwd'];
$route = $_GET['route'];

switch ($route) {
    case 'sign-up':
        AddUser($dbh, $name,$email, $password);
        break;
}
