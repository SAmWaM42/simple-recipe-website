<?php
 session_start();
if(isset($_SESSION["ID"]))
{
  header("Location:home.php");
  exit;
}
 include "conn.php";
$username = $_GET["username"];
$password = $_GET["password"];
if ($username == null || $password == null)
 {

  $message = "no credentials";
  session_abort();
  header("Location:login_page.php?data=$message");

  exit;

}
else
  {
    $conn = connect();

$check = "select * from users where username='$username' and passwrd='$password'";
$message = '';
$result = $conn->execute_query($check);


if ($result->num_rows == 0) {


  $check2 = $conn->execute_query("select passwrd from users where username='$username'");
  if ($check2->num_rows == 0)
  {
    $message = "invalid username";
    session_abort();
    header("Location:login_page.php?error=$message");

  }
  //make it work for a hashing funtion to increase security
  else if ($check2 != $password) {
    $message = "invalid password";
    session_abort();
    header("Location:login_page.php?error=$message");
  }
}
  }

$DATA = mysqli_fetch_assoc($result);
if ($result->num_rows > 0)
 {



  echo $DATA["username"];
  $id = $DATA["ID"];
 
  
  $_SESSION["ID"]=$id;
  $_SESSION["user"]=$username;
  $_SESSION["priv"]=$DATA["privilage"];
  header("Location:home.php");
}


