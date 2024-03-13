<?php
    session_start();

    require_once ("conn.php");

    $customer_id = $_SESSION['customer_id'];

    $cancelled_item = $_GET['id'];

    $cart_item = "SELECT * FROM cart WHERE cart_id = '$cancelled_item'";
    $item_result = mysqli_query($mysqli, $cart_item);

    if (mysqli_num_rows($item_result) > 0) {
        $delete_item = "DELETE FROM cart WHERE cart_id = '$cancelled_item'";
        $del_result = mysqli_query($mysqli, $delete_item);

        if ($del_result) {
            echo "<script>alert('Item successfully removed on cart')</script>";
            echo "<script>window.location='./cart.php?id=$customer_id'</script>";
        }
    }
?>