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

                <!-- Header -->
                        <header id="header">
                                <div class="inner">
                                        <a href="index.php" class="logo">E-Library Website</a>
                                        <nav id="nav">
                        <!--                    <a href="index.php" id = "home">Home</a> -->
                                                <a href="logout.php" id = "userlogout">Logout</a>
                                                <a href="listall.php" id = "listall">List of All Books</a>
                                <!--            <a href="login.html" id = "userlogin">User Login</a>
                                                <a href="registerbook.html" id = "userregister">User Register</a> -->
                                        </nav>
                                </div>
                        </header>
                        <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
                <!-- Banner -->
                        <section id="banner">
                                <div class="inner">
                                        <h1>Welcome to E-Library: <span>Here you can browse books, list your books and find other readers!<br />
                                </span></h1>
                        <!--            <ul class="actions">
                                                <li><a href="#" class="button alt">Get Started</a></li>
                                        </ul>-->
                                </div>
                        </section>

            <?php
 require 'database.php';
 session_start();
 $username1 = $_SESSION['username'];
 echo "<h1>Hi, our dear user  <i>".$username1."</i> !!!</h1><br />";
 echo "<h2> Let's begin your reading journey!</h2><br/>";
 echo "<br /><br />";

//below are various forms for the other options you can do on the main page, such as uploading a story, viewing your own comments, and viewing profiles.
 ?>
                        <div id="search">
                                <form id="myform">
                                        <div class="input-field">
                    <h3>Search Books</h3>
                                                <input type="search" id="books">
                    <button class="btn red">Search Books</button>

                    <br /><br />

                                        </div>
                </form>
                        </div>


                        <div id="result">


                        </div>
            <br>
            <br>
            <br>

<hr>

<h5>You can upload Books you own here:<h5>

<form action = "uploadbook.php" methods = "GET">

<label>Username(must be same as your login username!):</label>
<input type="text" placeholder="username" name="username" id="username" />
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
                      <select id = "category" name = "category" >
                                <option value = "Nonfiction Biography">Nonfiction Biography</option>
                                <option value = "Nonfiction Informative">Nonfiction Informative</option>
                                <option value = "Graphic Novel">Graphic Novel</option>
                                <option value = "Mystery">Mystery</option>
                                <option value = "Fantasy">Fantasy</option>
                                <option value = "Science Fiction">Science Fiction</option>
                                <option value = "Children’s">Children’s</option>
                                <option value = "Realistic/Historical Fiction">Realistic/Historical Fiction</option>
                                <option value = "Action/Thriller">Action/Thriller</option>
                                <option value = "Romance">Romance</option>
                                <option value = "Other">Other</option>
                        </select>
<br>
<input type= "submit" name = "submit" value = "submit" />
<br><br>
<br><br>
</form>
                <!-- Two -->
                        <section id="two">
                                <div class="inner">
                                        <article>
                                                <div class="content">
                                                        <header>
                                                                <h2>Books you owned</h2>
                                                        </header>
                                                        <div class="image fit">
                                                                <img src="images/pic01.jpg" alt="" />
                                                        </div>
                                                </div>
                    </article>
                </div>
                </section>
                    
<?php
 require 'database.php';
// session_start();
 $username1 = $_SESSION['username'];
 $stmt = $mysqli->prepare("select title, author,year, category from book where username = ?");
 if(!$stmt)
 {
     printf("Query Prep Failed: %s\n", $mysqli->error);
     exit;
 }
 $stmt->bind_param('s', $username1);

 $stmt->execute();

 $stmt->bind_result($title, $author, $year, $category);
 echo "<br /><br />";
 while($stmt->fetch()){
    printf("%s,<br />, %s,<br />, %s,<br />,%s, <br /><br /><br />",
    htmlspecialchars("Book title :".$title),
    htmlspecialchars("Author: ".$author),
    htmlspecialchars("Year ".$year),
    htmlspecialchars("Category ".$category));

    echo "<a href=readmore.php>READ MORE</a> ";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
        echo "<a href=edit.php?title=$title&buser=$username1&list=1>EDIT INFO</a> ";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
        echo "<a href=delete.php?title=$title&buser=$username1&list=1>DELETE BOOK</a> ";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";

}
$stmt->close();

?>

<hr>

<h5>You can upload Books you want to buy here:<h5>
<form action = "buy.php" methods = "GET">
<label>Username(must be same as your login username!):</label>
<input type="text" placeholder="username" name="username" id="username1" />
<br>
<label>Book Name:</label>
<input type="text" placeholder="title" name="title" id="title1" />
<br>
<label>Author:</label>
<input type="text" placeholder="Author" name="author" id="author1" />
<br>
<label> Publish Year</label>
<input type="text" placeholder="year" name = "year" id = "year1" />
<br>
<label> category</label>

                      <select id = "category1" name = "category" >
                                <option value = "Nonfiction Biography">Nonfiction Biography</option>
                                <option value = "Nonfiction Informative">Nonfiction Informative</option>
                                <option value = "Graphic Novel">Graphic Novel</option>
                                <option value = "Mystery">Mystery</option>
                                <option value = "Fantasy">Fantasy</option>
                                <option value = "Science Fiction">Science Fiction</option>
                                <option value = "Children’s">Children’s</option>
                                <option value = "Realistic/Historical Fiction">Realistic/Historical Fiction</option>
                                <option value = "Action/Thriller">Action/Thriller</option>
                                <option value = "Romance">Romance</option>
                                <option value = "Other">Other</option>
                        </select>

<br>
<input type= "submit" name = "submit" value = "submit" />
<br><br>
<br><br>
                <!-- Three -->
                        <section id="three">
                                <div class="inner">
                                        <article>
                                                <div class="content">
                                                        <header>
                                                                <h2>Books you want to buy</h2>
                                                        </header>
                                                        <div class="image fit">
                                                                <img src="images/pic01.jpg" alt="" />
                                                        </div>
                                                </div>
                    </article>
                </div>
                </section>

<?php
 require 'database.php';
// session_start();
 $username1 = $_SESSION['username'];
 $stmt = $mysqli->prepare("select username, title, author,year, category from buy where username = ?");
 if(!$stmt)
 {
     printf("Query Prep Failed: %s\n", $mysqli->error);
     exit;
 }
 $stmt->bind_param('s', $username1);

 $stmt->execute();

 $stmt->bind_result($username, $title, $author, $year, $category);
 echo "<br /><br />";

 while($stmt->fetch()){
    printf("%s,<br />, %s,<br />, %s,<br />,%s, <br /><br /><br />",
    htmlspecialchars("Book title :".$title),
    htmlspecialchars("Author: ".$author),
    htmlspecialchars("Year ".$year),
    htmlspecialchars("Category ".$category));
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
  //      echo "<a href=edit.php>EDIT INFO</a> ";
  //  echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
        echo "<a href=delete.php?title=$title&buser=$username1&list=2>DELETE BOOK</a> ";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";

}
$stmt->close();

?>
                                                                                     
        </body>
</html>
