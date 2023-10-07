<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

if(0):
?>
<table class="shop_table woocommerce-checkout-review-order-table">
	<thead>
	<tr>
		<th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
		<th class="product-total"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	do_action( 'woocommerce_review_order_before_cart_contents' );

	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
			?>
			<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
				<td class="product-name">
					<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</td>
				<td class="product-total">
					<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</td>
			</tr>
			<?php
		}
	}

	do_action( 'woocommerce_review_order_after_cart_contents' );
	?>
	</tbody>
	<tfoot>

	<tr class="cart-subtotal">
		<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
		<td><?php wc_cart_totals_subtotal_html(); ?></td>
	</tr>

	<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
		<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
			<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
			<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
		</tr>
	<?php endforeach; ?>

	<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

		<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

		<?php wc_cart_totals_shipping_html(); ?>

		<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

	<?php endif; ?>

	<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
		<tr class="fee">
			<th><?php echo esc_html( $fee->name ); ?></th>
			<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
		</tr>
	<?php endforeach; ?>

	<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
		<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
			<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited ?>
				<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					<th><?php echo esc_html( $tax->label ); ?></th>
					<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
				</tr>
			<?php endforeach; ?>
		<?php else : ?>
			<tr class="tax-total">
				<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
				<td><?php wc_cart_totals_taxes_total_html(); ?></td>
			</tr>
		<?php endif; ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

	<tr class="order-total">
		<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
		<td><?php wc_cart_totals_order_total_html(); ?></td>
	</tr>

	<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</tfoot>
</table>
<?php  endif; ?>

<?php

//$is_subs_cart = checkCartIsSubscription();
//echo $is_subs_cart;
//$is_subs_cart = true;
$direct_donation = checkDirectDonation();
/*$name = '';
$cart_item_g = [];
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
    $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	$direct_donation = get_post_meta($_product->get_id(),'direct_donation',true);
	$name = $_product->get_name();
	$cart_item_g = $cart_item;
}*/

$total = WC()->cart->get_cart_contents_total();

if ($direct_donation != '1'): ?>

    <div style="text-align: center;">
        <h3>Jouw donatie:</h3>
        <?php

        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
	        $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

	        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
		        ?>
                     <h4><strong>
	                     <?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                         x
                         <?php echo $cart_item['quantity'] ?>

				        <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                             <strong>
                        </h4>
		        <?php
	        }
        }

        ?>
        <!--<strong><?php /*echo $name; */?> x <?php /*echo $cart_item_g['quantity']; */?></strong></h4>-->
    </div>
<?php endif; ?>
<?php

if ($total != 15 && $total != 25 && $total != 50 && $total != 75)
    $is_other = true;
else
	$is_other = false;

if ($direct_donation) :?>

    <ul class="wc_payment_amounts">
        <li class="wc_payment_amount">
            <input <?php if ($total == 15) echo 'checked'; ?> id="payment_amount_15" type="radio" class="input-radio" name="payment_amount" value="15" >
            <label for="payment_amount_15">€ 15</label>
        </li>
        <li class="wc_payment_amount">
            <input <?php if ($total == 25) echo 'checked'; ?> id="payment_amount_25" type="radio" class="input-radio" name="payment_amount" value="25" >
            <label for="payment_amount_25">€ 25</label>
        </li>
        <li class="wc_payment_amount">
            <input <?php if ($total == 50) echo 'checked'; ?> id="payment_amount_50" type="radio" class="input-radio" name="payment_amount" value="50" >
            <label for="payment_amount_50">€ 50</label>
        </li>
                <li class="wc_payment_amount">
            <input <?php if ($total == 75) echo 'checked'; ?> id="payment_amount_75" type="radio" class="input-radio" name="payment_amount" value="75" >
            <label for="payment_amount_100">€ 75</label>
        </li>
        <li class="wc_payment_amount payment_amount_other">
            <input <?php if ($is_other) echo 'checked'; ?> id="payment_amount_other" type="radio" class="input-radio" name="payment_amount" value="other" >
            <label for="payment_amount_other">Ander bedrag</label>
        </li>
    </ul>

    <div class="bootstrap-iso" id="payment_other_value" style="<?php if ($is_other) echo 'display:block';?>">
        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-md-5">
                <label for="payment_amount_other_value">Kies een bedrag</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">€</div>
                    </div>
                    <input id="payment_amount_other_value" class="form-control" type="number" name="payment_amount_other_value" value="<?php echo intval($total); ?>" min="100" max="10000">
                </div>
            </div>
        </div>
    </div>

<?php  $current_product_id  = getCartProductId();  ?>

    <div class="text-center section-label" id="donation_amount_label">
        <span class="num">2</span>Frequentie
    </div>

    <ul class="wc_payment_frequencies">
        <li class="wc_payment_frequency">
            <input <?php if ($current_product_id != year_product_id && $current_product_id != quarter_product_id && $current_product_id != month_product_id ) echo 'checked'; ?> id="payment_frequency_single" type="radio" class="input-radio" name="payment_frequency" value="0">
            <label for="payment_frequency_single">Eenmalig</label>
        </li>
        <li class="wc_payment_frequency">
            <input <?php if ($current_product_id == month_product_id )  echo 'checked'; ?> id="payment_frequency_month" type="radio" class="input-radio" name="payment_frequency" value="1" >
            <label for="payment_frequency_month">Elke Maand</label>
        </li>
        <li class="wc_payment_frequency">
            <input <?php if ($current_product_id == quarter_product_id )  echo 'checked'; ?> id="payment_frequency_quarter" type="radio" class="input-radio" name="payment_frequency" value="4" >
            <label for="payment_frequency_quarter">Elk Kwartaal</label>
        </li>
        <li class="wc_payment_frequency">
            <input <?php if ($current_product_id == year_product_id )  echo 'checked'; ?> id="payment_frequency_year" type="radio" class="input-radio" name="payment_frequency" value="12" >
            <label for="payment_frequency_year">Elk Jaar</label>
        </li>
    </ul>

<?php else:?>

    <div class="order-total">
        <th><?php esc_html_e( 'Bedrag:', 'woocommerce' ); ?></th>
        <td><?php wc_cart_totals_order_total_html(); ?></td>
		<?php /*echo wc_get_formatted_cart_item_data( $cart_item_g ); */?>
    </div>

<?php endif;?>

<style>
    .wc_payment_amounts,.wc_payment_frequencies{border-bottom: none;text-align: center;    margin: 20px 0;list-style: none outside;}
    .wc_payment_amount .input-radio, .wc_payment_frequency .input-radio {
        display: none;
    }
    li.wc_payment_amount, li.wc_payment_frequency {
        width: 120px;
        height: 85px;
        position: relative;
        margin: 2px;
        border-radius: 5px;
        cursor: pointer;
        padding: 8px;
        display: inline-block;
        text-align: center;
    }
    .wc_payment_amount label, .wc_payment_frequency label {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #fff;
        border: 1px solid #dadada;
        border-radius: 5px;
        box-shadow: 0 2px 0 0 #dadada;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;     
        transition: all 75ms ease;
        font-weight: 600;
        font-size: 25px;
        color: black;
    }
    li.wc_payment_frequency {
        width: 120px;
        height: 120px;
    }
    .wc_payment_frequency label{    font-size: 22px; color: #09f;}

    .wc_payment_amount input:checked+label, .wc_payment_frequency input:checked+label {
           background: #09f !important;
        font-size:25px !important;
        color: #fff;
        transform: scale(1);
        box-shadow: none;
        border-color: #09f;
    }
    .wc_payment_amount.payment_amount_other label{    font-size: 25px;}
    .wc_payment_frequency.payment_amount_other label{    font-size: 25px;}

    #payment_other_value{display: none;}
</style>
<script>
    jQuery(document).ready(function ($) {

    });

    jQuery('input[name="payment_amount"]').change(function () {

        if(jQuery(this).val() === 'other'){
            jQuery('#payment_other_value').show();
        }
        else{
            jQuery('#payment_other_value').hide();
        }

        refreshCartPricing();
    });

    jQuery('input[name="payment_frequency"]').change(function () {
        refreshCartPricing();
    });
    jQuery('#payment_amount_other_value').change(function () {
        refreshCartPricing();
    });

    function refreshCartPricing(){

        let amount = jQuery('input[name="payment_amount"]:checked').val();
        if (amount === 'other'){
            amount = jQuery('#payment_amount_other_value').val();
            if(amount === '15' || amount === '25' || amount === '50' || amount === '75'){
                amount = 100;
            }
            if(amount < 7)
            {
                 amount = 7;
            }
        }

        let frequency = jQuery('input[name="payment_frequency"]:checked').val();

        jQuery('.body-overlay').addClass('active');
        jQuery('.overlay__inner').addClass('loading ');

        if (frequency !== '0'){
            jQuery('#donationAnonymousField').hide();
            jQuery('#donation_anonymous').prop('checked',false);
            jQuery('#donation_anonymous').trigger('change');

        }else {
            jQuery('#donationAnonymousField').show();
        }

        jQuery.ajax({
            url : ajax_url.ajax_url,
            type: "POST",
            data : {
                action : 'refresh_cart_pricing',
                payment_frequency : frequency,
                amount : amount,
                direct_checkout  : '1'
            },
            success : function (response) {
                console.log(response);
                if(response['is_subscription'] === true){
                    jQuery('#million_billing_fields').addClass('is-subscription-cart');
                    jQuery('#million_billing_fields').removeClass('is-normal-cart');

                    jQuery('.woocommerce-additional-fields').addClass('is-subs-ship');
                    jQuery('.woocommerce-additional-fields').removeClass('is-normal-ship');
                }else {
                    jQuery('#million_billing_fields').removeClass('is-subscription-cart');
                    jQuery('#million_billing_fields').addClass('is-normal-cart');

                    jQuery('.woocommerce-additional-fields').removeClass('is-subs-ship');
                    jQuery('.woocommerce-additional-fields').addClass('is-normal-ship');
                }
            }
        }).done(function (response) {
            location.reload();
            // jQuery('.body-overlay').removeClass('active');
            // jQuery('.overlay__inner').removeClass('loading');
            //jQuery('body').trigger('update_checkout');
        });
    }
</script>
