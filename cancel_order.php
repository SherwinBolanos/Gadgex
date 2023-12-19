<?php
include 'components/connect.php';

if (isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    // Update the payment status to "canceled"
    $update_payment = $conn->prepare("UPDATE `orders` SET payment_status = 'canceled' WHERE id = ?");
    $update_payment->execute([$order_id]);

    echo 'Order canceled successfully!';
} else {
    echo 'Invalid request!';
}
?>
