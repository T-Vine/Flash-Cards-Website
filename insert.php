<?php
//code for inserting new flash-cards.
$LIST = $_POST["list"];
$MAIN = $_POST["main"];
include "config.php";
mysqli_query($con, "INSERT INTO `tblrevision`(`list`,`main`) VALUES ('$LIST', '$MAIN')");
//mysqli_query($con, "INSERT INTO `tblrevision`(`main`) VALUES ('$MAIN')");
header("location:revision.php");
?>