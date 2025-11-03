<?php
 session_start();
if(isset($_SESSION["ID"]))
{
  header("Location:home.php");
  exit;
}

include "conn.php";



if ($_GET["username"] == null || $_GET["password"] == null)
 {

  $message = "no credentials";
  session_abort();
  header("Location:login_page.php?data=$message");

  exit;

}
else
{

$password = $_GET["password"];
$username = $_GET["username"];
$conn = connect();
$stmt = $conn->prepare("select * from users where username=? ");
$stmt->bind_param("s",$username);
$message = '';
$stmt->execute();
$result =$stmt->get_result();


if (!$DATA=$result->fetch_assoc()) {

    $message = "invalid username";
    session_abort();
    header("Location:login_page.php?error=$message");

}
if(!password_verify($password,$DATA["passwrd"]))
{
    $message = "invalid password";
    session_abort();
    header("Location:login_page.php?error=$message");

}
if ($result->num_rows > 0)
 {

  echo $DATA["username"];
  $id = $DATA["ID"];
 
  
  $_SESSION["ID"]=$id;
  $_SESSION["user"]=$username;
  $_SESSION["priv"]=$DATA["privilage"];
  header("Location:home.php");
}
}


