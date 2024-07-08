<?php
session_start();

include  "conn.php";

if ($_POST["username"] == null ||$_POST["email"] == null ||$_POST["dob"] == null ||$_POST["password"] == null ||$_POST["pas_check"] == null) {
    session_abort();
    header("Location:sign_in_form.php?error=unfilled field");
    exit;
} else {
    
    if ($_POST["password"] !=$_POST["pas_check"]) {
        session_abort();
        header("Location:sign_in_form.php?error=passwords do not match");
        exit;
    }

    $conn=connect();
    $result;
    $user =$_POST["username"];
    $email =$_POST["email"];
    $date =$_POST["dob"];

    echo $date;

    $age = intval(date('Y')) - intval($date . date('Y'));
    $password =$_POST["password"];
    $id;
    $privilage = "user";
    $profile="";
    $prof_name;
    $description = "";
    if ($_POST["description"] != "") {
        $description =$_POST["description"];
    }
    

    $result = $conn->execute_query("select ID from users where username='$user'");
    if ($result->num_rows != 0) {
        session_abort();
        header("Location:sign_in_form.php?error=username already exists");
        exit;
    }

    $result = $conn->execute_query("select ID from users");
    if ($result->num_rows == 0) {
        $id = 1;
    } else {
        $result = $conn->execute_query("select max(ID) from users");
        $temp2 = max($result->fetch_assoc());
        $id = $temp2 + 1;
        
    }
    if (isset($_FILES["profile_pic"] )) {
    
       $target_dir="img/posts/";
       $profile = $target_dir.basename($_FILES["profile_pic"]["full_path"]);  
        $prof_name=$_FILES["profile_pic"]["full_path"];
      move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $profile)
        or
        die;
}


    $conn->execute_query("insert into users values ('$user','$password','$privilage','$email',$id,'$description','$prof_name','$date')");
    $_SESSION["ID"]=$id;
    $_SESSION["user"]=$user;
    $_SESSION["priv"]=$privilage;
    header("Location:home.php");
  
    
}

