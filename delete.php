<?php
include "config.php";
echo $id = $_GET["ID"];
mysqli_query($con, "DELETE FROM `tblrevision` WHERE Id = $id");
header("location:revision.php");
?>
