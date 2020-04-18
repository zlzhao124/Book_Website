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
					<a href="index.html" class="logo">E-Library Website</a>
					<nav id="nav">
						<a href="index.html">Home</a>
						<a href="login.html">User Login</a>
						<a href="registerbook.html">User Register</a>
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

  

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>Welcome to E-Library: <span>Here you can browe book,list your book and find other readers!<br />
				</span></h1>
					<ul class="actions">
						<li><a href="#" class="button alt">Get Started</a></li>
					</ul>
				</div>
			</section>

            <?php
 require 'database.php';
 session_start();
 $username1 = $_SESSION['username'];
 //lists out all the stories on the front page first by fetching all of them from the story table
 $stmt = $mysqli->prepare("select username from book");
 if(!$stmt)
 {
     printf("Query Prep Failed: %s\n", $mysqli->error);
     exit;
 }
 $stmt->execute();

 $stmt->bind_result($username);
 echo "<h1>Hi, our dear user  <i>".$username1."</i> !!!</h1><br />";
 echo "<h2> Let's begin your reading journey!</h2><br/>";
 echo "<br /><br />";

 $stmt->close();
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
<h5>You can upload Books you've owned here:<h5>

<form action = "uploadbook.php" methods = "POST">

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
<input type="text" placeholder="category"name = "category" id = "category" />
<br>
<input type= "submit" name = "submit" value = "submit" />
<br><br>
<br><br>

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
                    
<?php
 require 'database.php';
 session_start();
 $username1 = $_SESSION['username'];
 //lists out all the stories on the front page first by fetching all of them from the story table
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
    htmlspecialchars("Bookauthor: ".$author),
    htmlspecialchars("Publisyear ".$year),
    htmlspecialchars("category ".$category));
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
    echo "<a href=readmore.php?sid=$user=$username>READ MORE</a> ";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";

}
$stmt->close();

?>


<h5>You can upload Books you want to buy here:<h5>
<form action = "buy.php" methods = "POST">

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
<input type="text" placeholder="category"name = "category" id = "category1" />
<br>
<input type= "submit" name = "submit" value = "submit" />
<br><br>
<br><br>





					<article class="alt">
						<div class="content">
						
							</header>
							<div class="image fit">
							
							</div>
							<p>hihi</p>
						</div>
					</article>
				</div>
			</section>












			<section id="three">
				<div class="inner">
					<article>
						<div class="content">
							<span class="icon fa-laptop"></span>
							<header>
								<h3>hihi</h3>
							</header>
							<p>own</p>
							<ul class="actions">
								<li><a href="#" class="button alt">Learn More</a></li>
							</ul>
						</div>
					</article>
					<article>
						<div class="content">
							<span class="icon fa-diamond"></span>
							<header>
								<h3>hihi</h3>
							</header>
							<p>buy.</p>
							<ul class="actions">
								<li><a href="#" class="button alt">Learn More</a></li>
							</ul>
						</div>
					</article>
					<article>
					<div class="content">
							<span class="icon fa-laptop"></span>
							<header>
								<h3>Shhaha</h3>
							</header>
							<p>hhh</p>
							<ul class="actions">
								<li><a href="#" class="button alt">Learn More</a></li>
							</ul>
						</div>
					</article>
				</div>
			</section>

	

	</body>
</html>