<?php $title=$_GET["tit"];
require("INC/header.php");
include("conn.php");
$id=$_GET["id"];
$conn=connect();
$raw_data=$conn->execute_query("select * from posts where ID=$id");
$data=$raw_data->fetch_assoc();
?>
<div>
  <?php 

  echo
   '
   <h1>'.$data["title"].' </h1>
   <div >
   <img style="display:block;max-width:30%;max-height:30%;" src="img/posts/'.$data["url"].'">
   </div>
   <h2 style="font-size:x-large;">description:</h2>
   <p style="font-size:large;"> '.$data["description"].' </p>
   <h2 style="font-size:x-large;">ingridients:</h2>
   <p style= "width:40%;"font-size:large;""> '.$data["ingridients"].' </p>
   <h2 style="font-size:x-large;">procedure:</h2>
   <p style= "width:40%;font-size:large;"> '.$data["method"].'</p>
  ';
  ?>

</div>
<?php  require("INC/footer.php");?>