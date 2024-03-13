<?php 
session_start();

require_once("conn.php");

if (isset($_POST['category']) && isset($_POST['prod_name']) && isset($_POST['prod_price']) && isset($_POST['quantity']) && isset($_POST['prod_desc'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $prod_id = validate($_POST['product_id']);
    $category = validate($_POST['category']);
    $product_name = validate($_POST['prod_name']);
    $product_price = validate($_POST['prod_price']);
    $quantity = validate($_POST['quantity']);
    $prod_desc = validate($_POST['prod_desc']);

    $fileTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $uploadDir = './a_uploads/';
    
    // Process image 1
    if (isset($_FILES['prod_img']) && $_FILES['prod_img']['size'] > 0) {
        $img1 = $_FILES['prod_img'];
        $img1Ext = strtolower(pathinfo($img1['name'], PATHINFO_EXTENSION));

        if (!in_array($img1Ext, $fileTypes)) {
            echo "Error: Image 1 must be a JPG, JPEG, PNG, or GIF";
            exit();
        }

        $img1Name = uniqid('img1_', true) . '.' . $img1Ext;
        $img1Path = $uploadDir . $img1Name;

        if (!move_uploaded_file($img1['tmp_name'], $img1Path)) {
            echo "Error: There was a problem uploading image 1";
            exit();
        }
    }

    // Process image 2
    if (isset($_FILES['prod_img2']) && $_FILES['prod_img2']['size'] > 0) {
        $img2 = $_FILES['prod_img2'];
        $img2Ext = strtolower(pathinfo($img2['name'], PATHINFO_EXTENSION));

        if (!in_array($img2Ext, $fileTypes)) {
            echo "Error: Image 2 must be a JPG, JPEG, PNG, or GIF";
            exit();
        }

        $img2Name = uniqid('img2_', true) . '.' . $img2Ext;
        $img2Path = $uploadDir . $img2Name;

        if (!move_uploaded_file($img2['tmp_name'], $img2Path)) {
            echo "Error: There was a problem uploading image 2";
            exit();
        }
    }

    $updateFields = "cat_id ='$category', prod_name ='$product_name', prod_desc ='$prod_desc', prod_price ='$product_price', quantity ='$quantity'";
    
    if (isset($img1Name)) {
        $updateFields .= ", prod_img = '$img1Name'";
    }

    if (isset($img2Name)) {
        $updateFields .= ", prod_img2 = '$img2Name'";
    }
 
    $sqlsign = "UPDATE products SET $updateFields WHERE prod_id = '$prod_id'";
    $resultsign = $mysqli->query($sqlsign);

    if ($resultsign) {
        echo "successfully updated";
        exit();
    } else {
        echo "unsuccessfully updated";
        exit();
    }
}

?>