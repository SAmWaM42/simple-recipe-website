<?php $title="Update"?>
<?php require("INC/header.php");  ?>
  <div class="body" style="margin-bottom: 10%;width:fit-content;padding-top:5%;padding-bottom:5%;">
<form class="page" class="form"  action="admin_update.php" method="GET" enctype="multipart/form-data">
<h1 style="display:block">SELECT USER TO UPDATE</h1>
  <select name="user">
  <?php
include "conn.php";
$conn = connect();
$nam=$conn->execute_query("select username from users");
 while($nam2=$nam->fetch_assoc())
{foreach($nam2 as $key=>$value)
{
  echo "<option> $value  </option>";
}
}
?>
</select>
<button type="submit">select</button>
</form>
  <form class="form" action="update.php" method="POST" enctype="multipart/form-data">
  <table >
  
    <tr>
    <?php
    $result = $conn->execute_query("select * from users ");
     $cols=$result->fetch_fields();

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
        $result = $conn->execute_query("select * from users where username='$user'");


      while ($row = $result->fetch_assoc())
      {
        $i=0;
        
       
      foreach ($row as $key => $value) 
      {
      
         if($cols[$i]->name=="ID" || $cols[$i]->name=="profile_pic")
        {
          echo '<td style=" word-wrap: break-word; width: 10%;"><input name="'.$cols[$i]->name.'"  value="'.$value.'" readonly></td>';
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
 <?php require("INC/footer.php");  ?>