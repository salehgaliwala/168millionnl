<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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
$is_subs = checkCartIsSubscription() ? 'is-subscription-cart': 'is-normal-cart';
?>
<div class="woocommerce-billing-fields">
	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<h3><?php esc_html_e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>

	<?php else : ?>
		<!--<h3><?php /*esc_html_e( 'Billing details', 'woocommerce' ); */?></h3>-->
        <div class="text-center section-label">
            <span class="num"><?php echo $direct_donation == '1' ? '4' :'3' ?></span> <?php echo __('Laat weten'); ?> <strong><?php echo __('wie je bent'); ?></strong>
        </div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

    <div class="bootstrap-iso">
        <div id="million_billing_fields" class="<?php echo $is_subs; ?> row no-gutters section justify-content-center">
            <div class="col-md-9 col-lg-7 col-12 px-md-5 pb-4 pt-4">

                <div class="p-0 col-12 text-11 hideable" id="donationAnonymousField">
                    <div class="form-group">
                        <div class="checkboxContainer ">
                            <label>
                                <div class="inputContainer">
                                    <input type="checkbox" id="donation_anonymous" name="donation_anonymous" value="1">
                                    <div class="styler"></div>
                                </div>
                                <span id="donation_anonymous_label" class="checkbox-label">
                                    <?php echo __('Liever niet, ik wil anoniem doneren'); ?>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="woocommerce-billing-fields__field-wrapper">
                    <?php
                    $fields = $checkout->get_checkout_fields( 'billing' );

                    foreach ( $fields as $key => $field ) {

                        if ($key == 'billing_company'):?>
                            <div class="form-row form-row-wide donation_user_company">
                                <div class="checkboxContainer ">
                                    <label>
                                        <div class="inputContainer">
                                            <input type="checkbox" id="donation_user_company" name="donation_user_company" value="1">
                                            <div class="styler"></div>
                                        </div>
                                        <span id="donation_user_company_label" class="checkbox-label">
                                            <?php echo __('als bedrijf doneren'); ?>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        <?php endif;
                         
                            woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
                        
                    }
                    ?>
                </div>

                <div class="form-group donation_user_gdprAccepted"><div class="checkboxContainer ">
                        <label>
                            <div class="inputContainer">
                                <input type="checkbox" id="donation_user_gdprAccepted" name="donation_user_gdprAccepted" value="1">
                                <div class="styler"></div>
                            </div>
                            <span id="donation_user_gdprAccepted_label" class="checkbox-label">
                                <?php echo __('Stichting 168Million mag mij contacteren met betrekking tot deze donatie'); ?>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'account aanmaken' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Account aanmaken?', 'woocommerce' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>
