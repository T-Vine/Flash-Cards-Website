<?php 

include "config.php";

$list = $_POST["list"];
$main = $_POST["main"];
$id = $_POST["id"];

mysqli_query($con, "UPDATE `tblrevision` SET `list`='$main',`main`='$list' WHERE Id = $id");
header("location:revision.php");
?>