<?php $title="login page"?>
<?php
 require("INC/header.php"); 
if(isset($_SESSION["ID"]))
{
  header("Location:home.php");
  exit;
}
?>


<form action="login.php" method="GET" class="form" enctype="multipart/form-data">
   
        <h2>LOGIN:</h2>
   
            <div id="others"  style="margin-top:10%">
                <input type="text" name="username" placeholder=" username" style="font-size: xx-large;">
                 <input type="password" placeholder="password" name="password"  style="font-size: xx-large;"> 
    
      <button type="submit" id="sign_up" > Login</button>
    
</div>
    </form>
</div>
<?php

 require("INC/footer.php");
  ?>