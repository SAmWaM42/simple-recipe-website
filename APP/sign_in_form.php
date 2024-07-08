<?php $title="sign_page"?>
<?php require("INC/header.php"); ?>

<form action="sign_in.php" method="POST" class="form" enctype="multipart/form-data">
            <div class="first">
                
            <img src="img/assets/bread.jpg" aria-placeholder="img">
                <input type="file" name="profile" placeholder="enter profile picture">
                <?php 
                if(isset($_POST[""]))
                ?>
                


            </div>
            <div id="others">
                <input type="text" name="username" placeholder=" username"  style="font-size: xx-large;">
                <input type="email" name="email" placeholder="email"  style="font-size: xx-large;">
                <input type="date" name="dob" placeholder="date of birth"  style="font-size: xx-large;">
                <input type="text" name="description" placeholder="description"  style="font-size: xx-large;">
               
      <input type="password" placeholder="password" name="password" style="font-size: xx-large;"> 
      <input type="password" placeholder=" cofirm passowrd" name="pas_check" style="font-size: xx-large;">  
      <button type="submit" id="sign_up" >Sign Up</button>
      <?php
      if(isset($_GET["error"]))
      {
        $err=$_GET["error"];
        echo "<h3>$err</h3>";
      }
  ?>  
</div>
    </form>
</div>
<?php require("INC/footer.php"); ?>