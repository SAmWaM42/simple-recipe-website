<?php
$title="post_page";
 require("INC/header.php"); ?>

<form action="upload.php" method="POST" class="form" enctype="multipart/form-data">
            <div class="first">
          
            <img src="img/assets/bread.jpg" aria-placeholder="img">
                <input type="file" name="recipie_pic" placeholder="enter recipe image">
                <?php 
                if(isset($_POST[""]))
                ?>

            </div>
            <div id="others" >
                <input type="text" name="recipie" placeholder="recipe_name" style="font-size: x-large;">
                <textarea type="text" name="description" placeholder="recipe description"  style="display:block;margin-left:30%;padding-left:20%;padding-right:20%;padding-top:5%;padding-bottom:5%;margin-bottom:2%;font-size: x-large;"></textarea>
                <textarea type="text" name="ingridients" placeholder="what you're using" style="display:block;margin-left:30%;padding-left:20%;padding-right:20%;padding-top:5%;padding-bottom:5%;margin-bottom:2%;font-size: x-large;" ></textarea>
                <textarea type="text" name="procedure" placeholder="recipe steps"  style="display:block;margin-left:30%;padding-left:20%;padding-right:20%;padding-top:5%;padding-bottom:5%;margin-bottom:2%;font-size: x-large;"></textarea>
              <button type="submit" id="sign_up" style="padding-left:5%;padding-right:5%;font-size: x-large;">Post</button>
              

    
</div>
    </form>
</div>
<?php require("INC/footer.php"); ?>