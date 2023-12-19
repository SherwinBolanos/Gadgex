<?php
include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<style>
    .cancel-btn {
        display: block;
        width: 100%;
        margin-top: 1rem;
        border-radius: .5rem;
        padding: 1rem 3rem;
        font-size: 1.7rem;
        text-transform: capitalize;
        color: var(--white);
        background-color: red;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .cancel-btn:hover {
        background-color: gray;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'components/user_header.php'; ?>

    <section class="orders">

        <h1 class="heading">placed orders</h1>

        <div class="box-container">

            <?php
            if ($user_id == '') {
                echo '<p class="empty">please login to see your orders</p>';
            } else {
                $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
                $select_orders->execute([$user_id]);
                if ($select_orders->rowCount() > 0) {
                    while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <div class="box">
                            <p>Placed On : <span><?= $fetch_orders['placed_on']; ?></span></p>
                            <p>Name : <span><?= $fetch_orders['name']; ?></span></p>
                            <p>Email : <span><?= $fetch_orders['email']; ?></span></p>
                            <p>Number : <span><?= $fetch_orders['number']; ?></span></p>
                            <p>Address : <span><?= $fetch_orders['address']; ?></span></p>
                            <p>Payment Method : <span><?= $fetch_orders['method']; ?></span></p>
                            <p>Your Orders : <span><?= $fetch_orders['total_products']; ?></span></p>
                            <p>Total Price : <span>$<?= $fetch_orders['total_price']; ?>/-</span></p>
                            <p> Item status : <span style="color:<?php
                            if ($fetch_orders['payment_status'] == 'pending') {
                                echo 'orange';
                            } elseif ($fetch_orders['payment_status'] == 'canceled') {
                                echo 'red';
                            } else {
                                echo 'green';
                            }
                            ?>"><?php echo $fetch_orders['payment_status']; ?></span> </p>
                            <?php
                            if ($fetch_orders['payment_status'] !== 'canceled' && $fetch_orders['payment_status'] !== 'completed') {
                                ?>
                                <button class="cancel-btn" onclick="confirmCancel(<?= $fetch_orders['id']; ?>)">Cancel Order</button>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p class="empty">no orders placed yet!</p>';
                }
            }
            ?>

        </div>

    </section>

    <?php include 'components/footer.php'; ?>

    <script>
        function confirmCancel(orderId) {
            // Display a confirmation prompt to the user
            var isConfirmed = confirm('Are you sure you want to cancel this order?');

            // If the user confirms, proceed with cancelation
            if (isConfirmed) {
                // Implement the logic to cancel the order using AJAX
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'cancel_order.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status == 200) {
                        // Reload the page or update the UI accordingly
                        window.location.reload();
                    }
                };
                xhr.send('order_id=' + orderId);
            }
        }
    </script>

    <script src="js/script.js"></script>

</body>

</html>

