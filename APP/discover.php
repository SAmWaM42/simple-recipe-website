<?php 
$title="discover page";
require("INC/header.php");
include("conn.php");
?>
<div>
    <?php
    $conn=connect();
    $raw_data=$conn->execute_query("select * from posts");
    while($data=$raw_data->fetch_assoc())
    {
       
            $image=$data["url"];
            $recip_name=$data["title"];
            $recipie_description=$data["description"];
            $url="view.php?id=".$data["ID"]."&tit=".$recip_name;

            echo '
           
            <div class="body" style="margin-left:4%;margin-right:3%;border-radius:5%;background-color: rgb(225, 199, 167);padding-top:3%;padding-bottom:3%;">
        
            <div style="width: 30%;display: inline-block;" >
<img src="img/posts/'.$image.'" alt="" style="width: 80%;height:40%;margin-left:13%;">
            </div>
      
        
       
            <div  style="width: 40%;display: inline-block;" >
                <h2><a href="'.$url.'"> '.$recip_name.':</a></h2>
                <p>
                '.$recipie_description.
                '
                </p>

            </div>
     

 
</div>
';

        

    }


        ?>
</div>

<?php

require("INC/footer.php");
?>