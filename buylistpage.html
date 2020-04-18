
<form action = "buy.php" methods = "POST">

<label>Username(must be same as your login username!):</label>
<input type="text" placeholder="username" name="username" id="username" />
<br>

<label>Book Number:</label>
<input type="number" placeholder="number" name="id" id="id" />
<br>
<label>Book Name:</label>
<input type="text" placeholder="title" name="title" id="title" />
<br>
<label>Author:</label>
<input type="text" placeholder="Author" name="author" id="author" />
<br>
<label> Publish Year</label>
<input type="text" placeholder="year" name = "year" id = "year" />
<br>
<label> category</label>
<input type="text" placeholder="category"name = "category" id = "category" />
<br>
<input type= "submit" name = "submit" value = "submit" />
<br><br>
<br><br>

<?php
 require 'database.php';
 session_start();
 $username1 = $_SESSION['username'];
 //lists out all the stories on the front page first by fetching all of them from the story table
 $stmt1 = $mysqli->prepare("select username, id,title, author,year, category from buy");
 if(!$stmt1)
 {
     printf("Query Prep Failed: %s\n", $mysqli->error);
     exit;
 }
 $stmt1->execute();

 $stmt1->bind_result($username, $id,$title, $author, $year, $category);


 while($stmt1->fetch()){
    printf("%s,<br />, %s,<br />, %s,<br />, %s,<br />,%s, <br /><br /><br />",
    htmlspecialchars("user:".$username),
    htmlspecialchars("ID:".$id),
    htmlspecialchars("Book Title :".$title),
    htmlspecialchars("Book Author: ".$author),
    htmlspecialchars("Publish year ".$year),
    htmlspecialchars("Book Category ".$category));
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
}
$stmt1->close();

?>