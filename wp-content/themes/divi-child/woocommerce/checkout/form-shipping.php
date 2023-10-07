<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;

$direct_donation = checkDirectDonation();
$is_subs = checkCartIsSubscription() ? 'is-subs-ship':'is-normal-ship';
?>
<div class="woocommerce-shipping-fields">
	<?php if ( true === WC()->cart->needs_shipping_address() ) : ?>

		<h3 id="ship-to-different-address">
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
				<input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" /> <span><?php esc_html_e( 'Ship to a different address?', 'woocommerce' ); ?></span>
			</label>
		</h3>

		<div class="shipping_address">

			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

			<div class="woocommerce-shipping-fields__field-wrapper">
				<?php
				$fields = $checkout->get_checkout_fields( 'shipping' );

				foreach ( $fields as $key => $field ) {
					woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
				}
				?>
			</div>

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>

	<?php endif; ?>
</div>
<div class="woocommerce-additional-fields  <?php echo $is_subs;?>">
	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

	<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

		<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

			<!--<h3><?php /*esc_html_e( 'Additional information', 'woocommerce' ); */?></h3>-->
            <div class="text-center section-label section-4">
                <span class="num"><?php echo $direct_donation == '1' ? '5' :'4' ?></span><?php echo __('Laat een'); ?> <strong><?php echo __('bericht'); ?></strong> <?php echo __('achter'); ?>
            </div>

		<?php endif; ?>


    <div class="bootstrap-iso">
        <div class="row no-gutters section justify-content-center">
            <div class="col-md-9 col-lg-7 col-12 px-md-5">
                <div class="woocommerce-additional-fields__field-wrapper">
                    <?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
                        <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
                        <?php if ($key == 'order_comments') : ?>
                            <div class="text-right notes-comment">
                                <span class=""><?php echo __('optioneel'); ?></span>
                            </div>
                        <?php endif;?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="form-group donation_user_gdprAccepted"><div class="checkboxContainer ">
                        <label>
                            <div class="inputContainer">
                                <input type="checkbox" id="donation_user_privacyAccepted" name="donation_user_privacyAccepted" value="1">
                                <div class="styler"></div>
                            </div>
                            <span id="donation_user_privacyAccepted_label" class="checkbox-label">
                                <?php echo __('Ik ga akkoord met de donatievoorwaarden en de <a href="/privacy-en-voorwaarden/">privacyverklaring.</a>'); ?>
                            </span>
                            <span id="donation_user_privacyAccepted_label2" class="checkbox-label2">
                                <?php echo __('Ik ben akkoord met een automatische incasso.'); ?>
                            </span>
                        </label>
                    </div>
                </div>
        </div>
    </div>


	<?php endif; ?>

	<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>

    <div class="" style="text-align: center;">
        <button class="btn btn-donate-now">
            <?php echo __('Doneer nu','168million'); ?>
        </button>
    </div>
</div>
