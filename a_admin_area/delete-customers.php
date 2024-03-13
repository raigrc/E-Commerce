<?php
    session_start();

    require_once('conn.php');

    if (isset($_POST['delete_customer'])) {
        $customer_id = intval($_POST['customer_id']);

        $delete_user_query = "DELETE FROM customers WHERE customer_id = ?";
        $stmt = $mysqli->prepare($delete_user_query);
        $stmt->bind_param("i", $customer_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Customer successfully deleted.";
        } else {
            echo "Failed to delete user. Please try again.";
        }
        $stmt->close();
    }

?>