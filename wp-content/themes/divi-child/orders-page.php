<?php
/*
Template Name: Orders Page
*/

get_header();

// Check if the user is logged in
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url(get_permalink()));
    exit;
}

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        // Query WooCommerce orders
        $orders = wc_get_orders(array(
            'limit' => -1, // Get all orders
        ));

        if ($orders) :
        ?>

        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>First Name</th>
                    <th>Last Name </th>
                    <th>Payment Method</th>
                    <th>Total</th>
                    <!-- Add more table headers for additional fields as needed -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                <tr>
                    <td><?php echo $order->get_id(); ?></td>
                    <td><?php echo $order->get_date_created()->format('Y-m-d H:i:s'); ?></td>
                    <td><?php echo $order->get_billing_first_name() ?></td>
                    <td><?php echo $order->get_billing_last_name() ?></td>
                    <td><?php echo $order->get_payment_method() ?></td>
                    <td><?php echo $order->get_total(); ?></td>
                    <!-- Add more table cells for additional fields as needed -->
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php else : ?>

        <p>No orders found.</p>

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
