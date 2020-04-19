<!DOCTYPE HTML>

<html>
        <head>
                <title>E-library Website</title>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
                <link rel="stylesheet" href="css/main.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="js2.js"></script>

                <script>
                        google.books.load();
                  </script>
        </head>
<body>

<?php

 require 'database.php';
 session_start();
 $username1 = $_SESSION['username'];
 $stmt = $mysqli->prepare("select username, title, author,year, category from book");
 if(!$stmt)
 {
     printf("Query Prep Failed: %s\n", $mysqli->error);
     exit;
 }

 $stmt->execute();

 $stmt->bind_result($username, $title, $author, $year, $category);
 echo "<br /><br />";

 while($stmt->fetch()){
    printf("%s,<br />, %s,<br />, %s,<br />, %s,<br />,%s, <br /><br /><br />",
    htmlspecialchars("user:".$username),
    htmlspecialchars("Book title :".$title),
    htmlspecialchars("Author: ".$author),
    htmlspecialchars("Year ".$year),
    htmlspecialchars("Category ".$category));
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
    echo "<a href=makecomment.php>COMMENT</a> ";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
    echo "<a href=moreinfo.php>MORE INFO</a> ";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
}
$stmt->close();

?>



<form action = "index.php" methods = "POST">
<input type= "submit" name = "view" value = "Go Back" />
</form>
</body>

</html>


