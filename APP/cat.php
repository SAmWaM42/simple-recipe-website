<?php require("INC/header.php")?>

    <div class="body"style="margin-left:15%" >
        <h1 class="title">
     
        <form class="form" action="create_cat.php" method="GET" >
            <h6>Choose Category:</h6>

            <input name="cat_name" placeholder="cat_name" type="text" style="display:block;margin-left:15%;padding-right:10%;"></input>

            <h6>Hold CTRL to select multiple</h6>
            <select name="recipies[]" id="recipies" multiple style="display:block;margin-left:15%;padding-right:20%;">
                <?php
                include "conn.php";
                $conn = connect();
                $res = $conn->execute_query("select title from posts");
                foreach ($res as $key => $value) {

                    echo
     ' 
        <option   type="checkbox"   style="padding-top:5%;padding-bottom:5%;">'.$value["title"].' </option>

    ';
                }



                ?>

            </select>
            <button name="create" type="submit" type="reset" style="padding_top:5%;width:10%;">create</button>
         <!-- <a href="http://localhost/webapp/modify.php" style="display:block;">  <button  style="margin_top:15%;">modify</button></a>-->
 
            <h2 id="message"><?php



            ?></h2>
        </form>

<h2>
    <?php
    if(isset($_GET["mess"]))
    {
        echo  $_GET["mess"];
    }
 ?>
 </h2>

    </div>
    <?php require("INC/footer.php") ?>