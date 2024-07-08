<?php
include "conn.php";
$conn = connect();
$new_cat = $_GET["cat_name"];
$recipies = $_GET["recipies"];
$message;
try {
  $conn->execute_query
(
"
alter table categories
add $new_cat varchar(45);
"
  );
} catch (mysqli_sql_exception) {
  $message = "category exists";
  header("Location:cat.php?mess=$message");
}
for ($i = 0; $i < sizeof($recipies); $i++) {

  $value = $recipies[$i];
  $test = max(($conn->execute_query("select ID  from  posts where title='$value'"))->fetch_array());
  $test2 =max($conn->execute_query("select count(*) from categories where recipe_id='$test'")->fetch_array());
  if ($test2 == 0) {
    $conn->execute_query
    (
      "insert into 
        categories(recipe_id) 
        select ID from posts where title='$value';
        "
    );
  }
  $conn->execute_query
  (
    "update categories
          set $new_cat='$value'
        where recipe_id=(select ID from posts where title='$value')"
  );

}

header("Location:cat.php");
