<!DOCTYPE html>

<html>

<head>

    <title>RECIPE LOGIN</title>
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="stylesheet" href="index.css">

</head>

<body id="form">

    <div class="main">
        <h1 class="title">
            I CAN COOK</h1>
        <h1 class="message">LOGIN:</h1>

        <form class="page" action="mo_make.php" method="GET">
            <h2>select existing category</h2>
            <select name="cat_name" id="recipies" style="display:block;">

                <?php
                include "conn.php";
                $conn = connect();
                $res = $conn->execute_query("SELECT column_name
                FROM INFORMATION_SCHEMA.COLUMNS
                WHERE table_name = 'categories' and column_name != 'recipe_id';");

                while ($value = $res->fetch_assoc()) {
                    echo
                        ' 
        <option  type="checkbox" >' . $value["column_name"] . ' </option>
        ';
                }

                ?>
                 </select>

                <h6>HOLD CTRL TO SELECT MULTIPLE</h6>
                <select name="recipies[]" id="recipies" multiple style="display:block;">
                    <?php
                    
                    $res = $conn->execute_query("select title from posts");
                    foreach ($res as $key => $value) {

                        echo
                            ' 
        <option   type="checkbox" >' . $value["title"] . ' </option>
        ';
                    }

                    ?>

                </select>
                <button name="create" type="submit" type="reset" style="padding_left:5%;">modify</button>
               
                <h2 id="message">
                    <?php



                    ?>
                </h2>
        </form>

        <h2>
            <?php
            if (isset($_GET["mess"])) {
                echo $_GET["mess"];
            }
            ?>
        </h2>

    </div>
</body>

</html>