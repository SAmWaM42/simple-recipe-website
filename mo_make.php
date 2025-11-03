<?php
include "conn.php";
$conn = connect();
var_dump($_GET);
$new_cat = $_GET["cat_name"];
$recipies = $_GET["recipies"];
$message;
try {
  $conn->multi_query
(
"
alter table categories
drop column $new_cat;

alter table categories
add $new_cat varchar(45);
"
  );
} catch (mysqli_sql_exception) {
  $message = "category doesnt exist";
  header("Location:http://localhost/webapp/cat.php?mess=$message");
}
for ($i = 0; $i < sizeof($recipies); $i++) {

  $value = $recipies[$i];

  $test2 = $conn->execute_query("select count(*) from categories where recipe_id=(select ID  from  posts where title='$value')");
  if ($test2 == 0) {
    $conn->execute_query
    (
      "insert into 
        categories(recipe_id) 
        select ID from posts where title='$value';
        "
    );
}
$conn->execute_query(

"update categories
set $new_cat='$value'
where recipe_id=(select ID from posts where title='$value')"
);

}

