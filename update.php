<?php 
// Code for updating. ID is used to locate the card. List is the title and main is the body of the card.
include "config.php";

$list = $_POST["list"];
$main = $_POST["main"];
$id = $_POST["id"];

mysqli_query($con, "UPDATE `tblrevision` SET `list`='$main',`main`='$list' WHERE Id = $id");
header("location:revision.php");
?>