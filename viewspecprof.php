<!DOCTYPE html>
<html>
<head><title>View Specific Profile</title></head>
<body>

<link rel="stylesheet" href="css/main.css" />

<h1> HIIII </h1>
<body>
<?php
 require 'database.php';
 session_start();
 $user = $_SESSION['username'];
 $viewinguser = $_GET['user'];
//first displays all the book user //OWN 
 $stmt = $mysqli->prepare("select title, author, year,category from book where username = ?");

 if(!$stmt)
 {
     printf("Query Prep Failed: %s\n", $mysqli->error);
     exit;
 }
 $stmt->bind_param('s',$viewinguser);
 $stmt->execute();
 $stmt->bind_result( $title, $author, $year, $category) ;



echo("List of book user have owned <br />");
echo "<br /><br />";
 while($stmt->fetch()){
    echo "<br />";
    echo " Title: ".$title;
    echo "<br />";
    echo " Author: ".$author;
    echo "<br />";
    echo "Year: ".$year;
    echo "<br />";
    echo "category: ".$category;
    
    echo "<a href=readmore.php?user=$viewinguser>READ MORE</a>";
   
}
$stmt->close();



//next displays all the book user //want to buy
 $stmt2 = $mysqli->prepare("select title, author, year,category from buy where username = ?");


 if(!$stmt2)
 {
     printf("Query Prep Failed: %s\n", $mysqli->error);
     exit;
 }
 $stmt2->bind_param('s',$viewinguser);
 $stmt2->execute();
 $stmt->bind_result( $title, $author, $year, $category) ;


echo "<br /><br />";
echo "<br /><br />";
echo("List of book user want to buy <br />");
echo "<br /><br />";
while($stmt->fetch()){
    echo "<br />";
    echo " Title: ".$title;
    echo "<br />";
    echo " Author: ".$author;
    echo "<br />";
    echo "Year: ".$year;
    echo "<br />";
    echo "category: ".$category;

    echo "<a href=readmore.php?user=$viewinguser>READ MORE</a>";
$stmt2->close();


?>
