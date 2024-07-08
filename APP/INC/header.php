<?php

if(session_status()==0||session_status()==1)
{
    session_start();
}

$head1;
$head2;
$link1;
$link2;
if(isset($_SESSION["ID"]))
{
   
    $head1=$_SESSION["user"];
    $head2;
    $link1="discover.php";
    $link2;
    
    if($_SESSION["priv"]=="admin")
    {
   
     $head2="DISCOVER";
     $link2="admin_update.php";
     
    }
    else
    {
       
        $head2="DISCOVER";
        $link2="display.php";

    }

}
?>
<!DOCTYPE html>
<html>
    <head>
<title>
    <?php
echo $title
?>
</title>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    </head>
<body>
    <header>
        <img src="img/assets/logo.jpg" aria-placeholder="logo">
        <ul class="nav">
            <li class="nav1" style="width=12%">
<a href="
<?php if(isset($head1))
            {
             echo $link2;
            }else
           { 
            echo "login_page.php";
           }
              ?>"
              >
              <?php
              if(isset($head1))
            {

             echo '<span style="text-transform: uppercase;">'.$head1.'</span>';
            }
            else
           { 
            echo "LOGIN";
           }
            ?>
          
            </a>  
            </li>
            <li class="nav2">
                <a href="
                <?php
              if(isset($head2))
            {
             echo $link1;
            }
            else
           { 
            echo "sign_in_form.php";
           }
              ?>"
                > 
                <?php
              if(isset($head2))
            {
             echo "$head2";
            }
            else
           { 
            echo "SIGN_IN";
           }
              ?>
            </a>

            </li>
          
        </ul>
        <h1 class="site_name">
     <a href="home.php" style="color:black;"> GRANDMA'S COOKBOOK </a> 
        </h1>


    </header>