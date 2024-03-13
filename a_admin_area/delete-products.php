<?php
    session_start();

    require_once('conn.php');

    if (isset($_POST['delete_product'])) {
        $product_id = intval($_POST['product_id']);

        $delete_product_query = "DELETE FROM products WHERE prod_id = ?";
        $stmt = $mysqli->prepare($delete_product_query);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Product successfully deleted.";
        } else {
            echo "Failed to delete user. Please try again.";
        }
        $stmt->close();
    }

?>