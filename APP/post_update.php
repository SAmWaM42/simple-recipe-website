<?php 
include "conn.php";
$conn=connect();
$username=$_POST["title"];
if(isset($username)==true)
{
$tit=$_POST["title"];
$ingridients=$_POST["ingridients"];
$method=$_POST["method"];
$desc=$_POST["description"];
$id=$_POST["ID"];


$conn->execute_query(
"
update posts
set title='$tit',ingridients='$ingridients',method='$method',
description='$desc'
where ID=$id ;
"
);
header("Location:display.php");
}else
{
    header("Location:display.php?error='user not selected'");
}