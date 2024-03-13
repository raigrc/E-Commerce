<?php 
    session_start();
    include './conn.php';

    $customer_id = $_SESSION['customer_id'];
    $cancelled_order = $_GET['id'];

    $get_order = "SELECT * FROM orders WHERE order_id = '$cancelled_order'";
    $get_result = mysqli_query($mysqli, $get_order);

    

    if (mysqli_num_rows($get_result) > 0) {
        $del_order = "UPDATE `orders` SET `order_status`='Cancelled' WHERE order_id = '$cancelled_order'";
        $del_result = mysqli_query($mysqli, $del_order);

        if ($del_result) {
            echo "<script>alert('Item successfully cancelled')</script>";
            echo "<script>window.location='./user_setting.php?id=$customer_id'</script>"; 
        }
    }
?>