<?php 
include "conn.php";
$conn=connect();
$username=$_POST["username"];
if(isset($username)==true)
{
$pass=$_POST["passwrd"];
$priv=$_POST["privilage"];
$mail=$_POST["email"];
$id=$_POST["ID"];
$desc=$_POST["description"];
$prof=$_POST["profile_pic"];
$dob=$_POST["dob"];



$conn->execute_query(
"
update users
set username='$username',passwrd='$pass',privilage='$priv',email='$mail',
description='$desc',profile_pic='$prof',dob='$dob'
where ID=$id;
"
);
header("Location:admin_update.php");
}else
{
    header("Location:admin_update.php?error='user not selected'");
}