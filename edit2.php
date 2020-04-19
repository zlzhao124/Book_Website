<?php

require 'database.php';
include 'edit.php';
$new_title = $_POST['btitle'];
$new_author= $_POST['bauthor'];
$new_year= $_POST['byear'];
$new_cat = $_POST['bcategory'];

$stmt = $mysqli->prepare("update book set title = ?, author = ?, year = ?, category = ? where title = ? AND username = ?");
        if(!$stmt){
         printf("Query Prep Failed: %s\n", $mysqli->error);
         exit;
        }
        $stmt->bind_param('ssssss', $new_title, $new_author, $new_year, $new_cat, $title, $b_username);
        if (!$stmt->execute()){
            echo "Fail to update :( ";
        }
        else{
        echo "success!";
        }

        $stmt->fetch();
        $stmt->close();


?>
