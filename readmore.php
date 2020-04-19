<!DOCTYPE html>
<html>
<head><title>Read More</title></head>
<body>

<link rel="stylesheet" href="css/main.css" />

<?php
 require 'database.php';
 session_start();
// session_start();
echo"hi";
 $username1 = $_SESSION['username'];
 $title =  $_GET['title'];
 $stmt = $mysqli->prepare("select isbn, abstract from book where  username = ?");
 if(!$stmt)
 {
     printf("Query Prep Failed: %s\n", $mysqli->error);
     exit;
 }
 $stmt->bind_param('s', $username1);
 $stmt->execute();
 $stmt->bind_result($isbn, $abstract);
 echo "<br /><br />";
 while($stmt->fetch()){
    echo "ISBN:".$isbn;
    echo "<br /><br />";
    echo "Abstract:";
    echo $abstract;
    echo "<br /><br />";
}
$stmt->close();


?>
</body>
</html>



