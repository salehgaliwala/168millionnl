<?php

add_shortcode('donation_order_table','donation_order_table');

function donation_order_table(){

	if (wc_current_user_has_role('administrator')):

		require_once __DIR__.'/../vendor/autoload.php';
		require_once __DIR__.'/Bookings.php';
		require_once __DIR__.'/pagination.php';

		\WPEloquent\Core\Laravel::connect([
			'global' => true,

			'config' => [

				'database' => [
					'user'     => DB_USER,
					'password' => DB_PASSWORD,
					'name'     => DB_NAME,
					'host'     => DB_HOST,
					'port'     => '3306'
				],

				// your wpdb prefix
				//'prefix' => 'wppa_',
				'prefix' => '',
			],

			// enable events
			'events' => false,

			// enable query log
			'log'    => false
		]);

		$ordersAll = (new \Burgernomics\Models\Bookings())->newQuery()->paginate(15,['*'],'pageno',$_GET['pageno']);

		?>

		<table>
			<thead>
			<tr>
				<th>ID</th>
				<th>Bestelling-ID</th>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>E-mail</th>
				<th>Account-nummer</th>
				<th>Amount</th>
				<th>Status</th>
			</tr>
			</thead>
			<tbody>
            <?php foreach ( $ordersAll->items() as $order ) : ?>
                <?php $order = json_decode(json_encode($order),true);?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo $order['firstname']; ?></td>
                    <td><?php echo $order['lastname']; ?></td>
                    <td><?php echo $order['email']; ?></td>
                    <td><?php echo $order['accountnumber']; ?></td>
                    <td><?php echo $order['amount']; ?></td>
                    <td><?php echo $order['order_status']; ?></td>
                </tr>
            <?php endforeach; ?>
			</tbody>
		</table>
        <div class="bootstrap-iso">
		    <?php linksGenerator( $ordersAll, site_url('/donation-form-orders/?') ); ?>
        </div>
	<?php
	endif;
}

