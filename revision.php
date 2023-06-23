<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <title> Revision Cards </title>
        <link rel="stylesheet" href = "revision-style.css">
        
    </head>

    <body> <!-- Main File -->
        <nav id="navbar">
            <button onclick="myFunc() ">Edit </button>

        </nav>
        <?php 
            include "config.php"; //setting up access to the database
            $rawData = mysqli_query($con, "select * from tblrevision"); //getting data from SQL Database

            
        ?>
        <form action="insert.php" method = "post" class="main"> <!-- Adding: form for inserting revision cards -->
            <div class="container">
                <div class="row">
                    <h1> Revision </h1>
                    <div class="col">
                        <textarea  name="list" placeholder ="Name..." class="form_control"></textarea> <!-- Revision Title  -->
                        <textarea class="main" name="main" placeholder = "Information..." rows=4 cols=23></textarea> <!-- Revision Card Body  -->
                    </div>

                    <div class="col">
                        <button class="btn">Add</button> <!-- Insert  -->
                        
                    </div>
                </div>
            </div>
        </form>
        
        <script>
            //JavaScript is required to loop through while keeping the navbar

            window.onscroll = function() {scrollFunction()};
            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("navbar").style.top = "0";
                } else {
                    document.getElementById("navbar").style.top = "0px";
                }
            }

            //'x' is a flag signifying for the if statement, as an impromptu toggle.
            let x = 1;
            function myFunc() {
                let wide = document.getElementsByTagName('table')[0];
                let edit1 = document.querySelectorAll('.container .datacol table tbody tr td a.delete');
                let edit2 = document.querySelectorAll('.container .datacol table tbody tr td a.edit');
                if (x===1) {
                    x = 0;
                    for (let i = 0; i < edit1.length; i++) {
                        edit1[i].style.display = "inline-block";
                    }
                    for (let b = 0; b < edit2.length; b++) {
                        edit2[b].style.display = "inline-block";
                    }
                    wide.style.width  = "40%";
                    
                    
                    x=0;
                } else if (x===0) {
                    wide.style.width = "30%";
                    x=1;
                    for (let c=0; c < edit1.length; c++) {
                        edit1[c].style.display = "none";
                    }
                    for (let y = 0; y < edit2.length; y++) {
                        edit2[y].style.display = "none";
                    }
                    //changing display
                }

                //='100%';
            }

            
        </script>
        <!-- Data (actual Revision cards) are kept in this table. -->
        <div class="container">
            <div class="datacol">
                <table class ="table" > 
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($rawData)) { //looping through each row in the database
                
                            
                        ?>
                        <tr>
                            
                            <!-- <td><?php echo $row['main'] ?></td> //echoing data, name and list. This is styled within 'revision-style.css'
                            <td><?php echo $row['list'] ?></td> -->
                            <td> <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front"> <!-- Front of the Flip-Card (title=list in database) --> 
                                        <pre><h1><?php echo $row['list'] ?></h1></pre>
                                    </div>
                                    <div class="flip-card-back">
                                        <pre><h3><?php echo $row['main'] ?></h3></pre>   <!-- Back of the flip-card (main is the main body in the database)  -->
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td class="edit"style="width: 10%;"><a href="delete.php? ID= <?php echo $row['Id']; ?>" class="delete">DELETE</a></td> 
                            <!-- Each card has a delete and edit button. This can be shown with the navbar.  -->
                            <td class="edit" style="width: 10%;"><a href="edit.php? ID= <?php echo $row['Id']; ?>" class="edit" >UPDATE</a></td>
                        </tr>
                        <?php

                            }
                        ?>
                        
                    <tbody>
                </table>
            </div>
            
        </div>

        
    </body>
</html>
