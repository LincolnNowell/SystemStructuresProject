<?php
try{
    $dbh = new PDO('mysql:host=localhost;dbname=bullyblogs', 'root', '');
}catch(PDOException $e){
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>