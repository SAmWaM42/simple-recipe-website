<?php $title="user page"?>
<?php
session_start();
if($_SESSION["ID"])
{
  $id=$_SESSION["ID"];
}
 require("INC/header.php");
 ?>

<div class="body" style="margin-left:10%;padding-top:5%;padding-bottom:5%;border-radius:3%;">
<?php


include "conn.php";
$conn=connect();
$data=$conn->execute_query("select * from users where ID=$id");


     
      $result = $conn->execute_query("select * from users ");
      $cols=$result->fetch_fields();
    
    ?>
   
   
   <?php
      
   
 
       while ($row = $data->fetch_assoc())
       {
         $i=0;
         
        
       foreach ($row as $key => $value) 
       {
         
          switch($cols[$i]->name)
          { 
             case "username":
            echo ' <h2 style="width: 80%; display:block";><span style="text-transform:uppercase;margin-right:25%;margin-left:15%;">'.$cols[$i]->name.':</span>'.$value.'</h2>';
            $i++;
            break;
            case "passwrd":
              echo ' <h2 style="width: 80%; display:block";><span style="text-transform:uppercase;margin-right:25%;margin-left:15%;">'.$cols[$i]->name.':</span>'.$value.'</h2>';
             $i++;
             break;
             case "email":
              echo ' <h2 style="width: 80%; display:block";><span style="text-transform:uppercase;margin-right:30%;margin-left:15%;">'.$cols[$i]->name.':</span>'.$value.'</h2>';
             $i++;
             break;
             case "description":
              echo ' <h2 style="width: 70%; display:block;"><span style="text-transform:uppercase;margin-right:25%;margin-left:15%;">'.$cols[$i]->name.':</span>'.$value.'</h2>';
             $i++;
             break;
           
             case "dob":
              echo ' <h2 style="width: 80%; display:block";><span style="text-transform:uppercase;margin-right:35%;margin-left:15%;">'.$cols[$i]->name.':</span>'.$value.'</h2>';
             $i++;
             break;
             case  "privilage":
              $i++;
              break;
              case  "ID":
                $i++;
                break;
                case  "profile_pic":
                  $i++;
                  break;
          }
         }
       
       

       }
       
      $data=$conn->execute_query("select * from posts where user_id=$id");
    
 
      echo ' <h2 style="width: 80%; display:block";><span style="text-transform:uppercase;margin-right:35%;margin-left:15%;">POST_COUNT:</span>'.$data->num_rows.'</h2>';
      
       ?>


   <?php
 echo '<a href="post_page.php" style="padding-left:13%;padding-right:13%;font-size: large;" ><button style="padding-left:5%;padding-right:5%;font-size: large;">add post</button></a>';
   ?>

      

    

</div>

<div class="body" style="margin-bottom: 10%;width:fit-content;padding-top:5%;padding-bottom:5%;">
<form class="page" class="form"  action="display.php?#sel" method="GET" enctype="multipart/form-data">
<h1 style="display:block" id="sel">SELECT RECIPIE TO VIEW</h1>
  <select name="user" id="sel">
  <?php
$nam=$conn->execute_query("select title from posts where user_id=$id");

 foreach($nam as $key=>$value)
{
  echo '<option>'.$value["title"].'</option>';
}
 

?>
</select>
<button type="submit">select</button>
</form>
  <form class="form" action="post_update.php" method="POST" enctype="multipart/form-data">
    <?php 
     $result = $conn->execute_query("select * from posts");
     $cols=$result->fetch_fields();
    
      ?>
  <table >
  
    <tr>
    <?php
   
    foreach($cols as $col)
     { 
     
      
      echo '<th style=" word-wrap: break-word;    width: 10%;">  '.$col->name.' </th>';
      
     }
    ?>
    </tr>
  
      <?php
     
     if(isset($_GET["user"])&&$_GET["user"]!="")
      {
        $user=$_GET["user"];
        $result = $conn->execute_query("select * from posts where title='$user'");


      while ($row = $result->fetch_assoc())
      {
        $i=0;
        
       
      foreach ($row as $key => $value) 
      {
      
         if($cols[$i]->name=="ID" || $cols[$i]->name=="url" || $cols[$i]->name=="user_id")
        {
          echo '<td style=" word-wrap: break-word; width: 10%;"><input name="'.$cols[$i]->name.'"  value="'.$value.'" readonly></td>';
        }
        else if($cols[$i]->name=="post_date")
{
  echo '<td style=" word-wrap: break-word;   width: 10%;"><input name="'.$cols[$i]->name.'"  value="'.$value.'"  type="date" readonly></td>';
}
        else
        {
          echo '<td style=" word-wrap: break-word;   width: 10%;"><input name="'.$cols[$i]->name.'"  value="'.$value.'"></td>';
        }
     
      
   $i++;
      }
       echo "</tr>";
      }

    }

      ?>
  </table>
   <button type="submit">update</button>
    </form>
    
  <?php
  if(isset($_GET["error"]))
  echo '"'.$_GET["error"].'"';

  ?>
 </div>
<?php require("INC/footer.php");?>