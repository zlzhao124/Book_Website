<?php
//delete an event
require 'database.php';

header("Content-Type: application/json"); // We are sending a JSON response

ini_set("session.cookie_httponly", 1);
session_start();

$username = $_SESSION['username'];



//Variables can be accessed as such and is equivalent to what I previously did with $_POST['username'] and $_POST['password']
$title = $_POST['title'];
$author = $_POST['author'];
$user = $_POST['user'];
$category = $_POST['category'];
$year = $_POST['year'];
$list = $_POST['list'];
$isbn = $_POST['isbn'];
$abstract = $_POST['abstract'];


if ($list == 1){
$stmt = $mysqli->prepare("insert into book(username, title, author,year, category, isbn, abstract) values (?,?, ?, ?, ?, ?, ?)");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('sssssss', $username, $title, $author, $year,$category, $isbn, $abstract);
    if (!$stmt->execute()){
//        echo "Fail to post";
    echo json_encode(array(
      "success" => false,
      "message" => "Unable to add book!"
    ));
$stmt->close();
    }
else{
    $stmt->close();
echo json_encode(array(
      "success" => true));
}
}
else if ($list == 2){
$stmt = $mysqli->prepare("insert into buy(username, title, author,year, category) values (?,?, ?, ?, ?)");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('sssss', $username, $title, $author, $year,$category);
    if (!$stmt->execute()){
//        echo "Fail to post";
    echo json_encode(array(
      "success" => false,
      "message" => "Unable to add book!"
    ));
$stmt->close();
    }
else{
    $stmt->close();
echo json_encode(array(
      "success" => true));
}

}


//$stmt2->close();
exit;

?>
