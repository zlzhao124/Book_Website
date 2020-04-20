<?php

require 'database.php';

session_start();

$c_username = $_SESSION['username'];
$b_username = $_GET['buser'];
$title =  $_GET['title'];
$list = $_GET['list'];
$bauthor = $_GET['bauthor'];

if ($c_username == $b_username){


if ($list == 1){
$stmt1 = $mysqli->prepare("delete from book where title = ? AND username = ? AND author = ?");
    if(!$stmt1){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }

    $stmt1->bind_param('sss', $title, $c_username, $bauthor);
    $stmt1->execute();
    $stmt1->close();
   header("Location: index.php");
}

else if ($list == 2){
$stmt1 = $mysqli->prepare("delete from buy where title = ? AND username = ? AND author = ?");
    if(!$stmt1){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }

    $stmt1->bind_param('sss', $title, $c_username, $bauthor);
    $stmt1->execute();
    $stmt1->close();
   header("Location: index.php");
}


}

?>
