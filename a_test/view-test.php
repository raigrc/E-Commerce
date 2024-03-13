<?php
    include '../conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $sqltable = "SELECT * FROM products";
        $resulttable = mysqli_query($mysqli, $sqltable);

        if (mysqli_num_rows($resulttable) > 0) {
            while ($products = mysqli_fetch_assoc($resulttable)) {?>

                <div class="products-img">
                    <img src="a_uploads/<?=$products['prod_img']?>">
                    <p><?=$products['prod_name']?></p>
                </div>
                <div class="products-img2">
                    <img src="a_uploads/<?=$products['prod_img2']?>" alt="">
                </div>

        <?php    }
        }
    ?>
</body>
</html>