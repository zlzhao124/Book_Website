<?php
    require 'database.php';
    session_start();
    $username = $_GET['username1'];
    $title =  $_GET['title1'];
    $author = $_GET['author1'];
    $year = $_GET['year1'];
    $category = $_GET['category1'];

    $user = $_SESSION['username1'];
//    echo $user;

  //inserts stuff from textboxes on main page (all the story info) into our sql table for stories 
if ($username == $user){
    $stmt = $mysqli->prepare("insert into buy(username, title, author,year, category) values (?,?, ?, ?, ?)");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('sssss', $username, $title, $author, $year,$category);
    if (!$stmt->execute()){
        echo "Fail to post";
    }

    $stmt->close();
}
    header("Location: index.php");
    ?>
