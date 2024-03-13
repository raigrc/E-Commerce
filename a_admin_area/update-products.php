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
 
        $sqlsign = "UPDATE products SET cat_id ='$category', prod_name ='$product_name', prod_desc ='$prod_desc', prod_price ='$product_price', quantity ='$quantity' WHERE prod_id = '$prod_id'";
        $resultsign = $mysqli->query($sqlsign);

        if ($resultsign) {
            echo "successfully updated";
            exit();
        }else {
            echo "unsuccesfully updated";
            exit();
        }
}
