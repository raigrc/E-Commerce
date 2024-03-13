<?php

    include '../conn.php';

    if (isset($_POST['submit']) && !empty($_POST['category']) && !empty($_POST['prod_name'])&& !empty($_POST['prod_desc'])&& !empty($_POST['prod_price']) && !empty($_POST['quantity']) && !empty($_FILES['prod_img']) && !empty($_FILES['prod_img2'])) {
        echo "<pre>";
        print_r($_FILES['prod_img']);
        print_r($_FILES['prod_img2']);
        echo "<pre>";

        // $category = $_POST['category'];
        // switch ($category) {
        //     case 'men':
        //         $cat_id = 1;
        //         break;
        //     case 'women':
        //         $cat_id = 2;
        //         break;
        //     case 'footwear':
        //         $cat_id = 3;
        //         break;
        //     default:
        //         // default value if $category is not men, women or footwear
        //         $cat_id = 0;
        //         break;
        // }

        // $product_name = $_POST['prod_name'];
        // $product_description = $_POST['prod_desc'];
        // $product_price = $_POST['prod_price'];
        // $quantity = $_POST['quantity'];

        // //image-1
        // $img_name = $_FILES['prod_img']['name'];
        // $img_size = $_FILES['prod_img']['size'];
        // $tmp_name = $_FILES['prod_img']['tmp_name'];
        // $error = $_FILES['prod_img']['error'];

        // //image-2
        // $img_name2 = $_FILES['prod_img2']['name'];
        // $img_size2 = $_FILES['prod_img2']['size'];
        // $tmp_name2 = $_FILES['prod_img2']['tmp_name'];
        // $error2 = $_FILES['prod_img2']['error'];

        // if ($error === 0) {
        //     if ($img_size > 300000) {
        //         $em = "file size is too large";
        //         header("Location: index.php?error=$em");
        //     }else {
        //         $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        //         $img_ex_lc = strtolower($img_ex);

        //         $img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
        //         $img_ex_lc2 = strtolower($img_ex2);

        //         $allowed_exs = array("jpg", "png", "jpeg", "webp");

        //         if (in_array($img_ex_lc, $allowed_exs) && in_array($img_ex_lc2, $allowed_exs)) {
        //             $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        //             $img_upload_path = 'a_uploads/'.$new_img_name;
        //             move_uploaded_file($tmp_name, $img_upload_path);

        //             $new_img_name2 = uniqid("IMG-2-", true).'.'.$img_ex_lc2;
        //             $img_upload_path2 = 'a_uploads/'.$new_img_name2;
        //             move_uploaded_file($tmp_name2, $img_upload_path2);

        //             $sql = "INSERT INTO products(cat_id, prod_name, prod_desc, prod_price, quantity, prod_img, prod_img2) VALUES('$cat_id','$product_name','$product_description','$product_price','$quantity','$new_img_name', '$new_img_name2')";
        //             $result = mysqli_query($mysqli, $sql);

        //         }
        //     }

        // }else {
        //     $em = "unknown error occured!";
        //     header("Location: index.php?error=$em");
        // }

    } else {
        echo "error";
    }
?>