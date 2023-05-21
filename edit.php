<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <title> Edit </title>
        <link rel="stylesheet" href = "revision-style.css">
        
    </head>
    <?php 
        $id = $_GET["ID"];
        include "config.php";
        $Rdata = mysqli_query($con, "SELECT * FROM tblrevision WHERE Id = $id");
        $data = mysqli_fetch_array($Rdata);
    ?>
    <body>
        <form action="update.php" method = "post" class="main">
            <div class="container">
                <div class="row">
                    <h1> Edit </h1>
                    <div class="col">
                        <textarea type="text"  name="main" value="<?php echo $data["main"]; ?>" placeholder ="Name..." class="form_control"><?php echo $data["main"]; ?></textarea>
                        <textarea class="main" value="<?php echo $data["list"]; ?>" name="list" placeholder = "Information..." rows=4 cols=20><?php echo $data["list"]; ?></textarea>

                    </div>

                    <div class="col">
                        <button class="btn">Update</button>
                        <input type="hidden" name = "id" value = "<?php echo $data["Id"]; ?>">
                    </div>

                </div>
            </div>
        </form>
    </body>
</html>