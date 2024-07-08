<?php
include "conn.php";
session_start();
$conn = connect();

if(isset($_SESSION["ID"]))
{
    

if 
($_POST["recipie"] == null || $_FILES["recipie_pic"] == null || $_POST["description"] == null || $_POST["ingridients"] == null || $_POST["procedure"] == null) 
{
    session_abort();
    $err="un-filled fields";
header("Location:post_page.php?error=$err");
    die;
}

$recipie;
$user_id = $_SESSION["ID"];
$description = $_POST["description"];
$ingridients = $_POST["ingridients"];
$procedure = $_POST["procedure"];
$name = $_POST["recipie"];
$id;
$date = date("Y/m/d");
$result = $conn->execute_query("select max(ID) from posts");

$id=max( $result->fetch_assoc());
if ($id == null) {
    $id = 0;

} 
if($id>=0)
{
   
$id = $id + 1;
}


if (isset($_FILES["recipie_pic"])) {

    $target_dir = "img/posts/";
    $recipie = $target_dir . basename($_FILES["recipie_pic"]["full_path"]);
    move_uploaded_file($_FILES["recipie_pic"]["tmp_name"], $recipie)

        or
        die;
    $recipie = basename($_FILES["recipie_pic"]["full_path"]);
}
$sql = ("insert into posts values ('$name','$description','$recipie','$ingridients','$procedure','$date',$user_id,$id)");
$conn->execute_query($sql);

header("Location:home.php");

}    
