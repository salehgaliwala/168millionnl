<?php

function checkCartIsSubscription(){
	foreach (WC()->cart->get_cart() as $cart_item){
		$product = wc_get_product( $cart_item['product_id'] );

		if ($product->is_type('subscription') || $product->is_type('variable-subscription')){
			return true;
		}
		//return  false;
	}
	return  false;
}



function checkDirectDonation(){
	$direct_donation = 0;
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$direct_donation = get_post_meta($_product->get_id(),'direct_donation',true);

		if ($_product->is_type('subscription') || $_product->is_type('variable-subscription') || $_product->is_type('subscription_variation')){
			//file_put_contents('data.json',json_encode($cart_item));
			return  '1';
		}

		//file_put_contents('data.json',$_product->get_type());

		if ($direct_donation == '1')
			return  '1';
	}

	return $direct_donation;
}

function getCartProductId(){

	foreach (WC()->cart->get_cart() as $cart_item){

		if(isset($cart_item['variation']) && count($cart_item['variation']) > 0 ) {
			return  $cart_item['variation_id'];
		}

		return  $cart_item['product_id'];
	}
	return  false;
}

add_action('wp_ajax_refresh_cart_pricing','refresh_cart_pricing');
add_action('wp_ajax_nopriv_refresh_cart_pricing','refresh_cart_pricing');

function refresh_cart_pricing(){

	header( 'Content-Type: application/json' );
	//$payment_amount = $_POST['amount'];
	$payment_frequency = $_POST['payment_frequency'];

	WC()->cart->empty_cart();

	switch ($payment_frequency){
		case  '1' :
			WC()->cart->add_to_cart( month_product_id );
		break;

		case '4' ;
			WC()->cart->add_to_cart( quarter_product_id );
		break;

		case '12' ;
			WC()->cart->add_to_cart( year_product_id );
		break;

		default:
			WC()->cart->add_to_cart( simple_product_id );
	}

	echo json_encode(['status'=>'success','is_subscription' => checkCartIsSubscription() ]);

	die();
}

add_filter('woocommerce_checkout_login_message','mil168_woocommerce_checkout_login_message');
function mil168($text){
	return (esc_html__( 'Terugkerende donateur', 'woocommerce' ) ) . ' <a href="#" class="showlogin">' . esc_html__( 'Click here to login', 'woocommerce' ) . '</a>';
}

function customize_wc_errors( $error ) {
	if ( strpos( $error, 'Facturering ' ) !== false ) {
		$error = str_replace("Facturering ", "", $error);
	}
	return $error;
}
add_filter( 'woocommerce_add_error', 'customize_wc_errors' );


/**
Add Custom Icon For Cash On Delivery
 **/
function cod_gateway_icon( $gateways ) {
	if ( isset( $gateways['mollie_wc_gateway_giftcard'] ) ) {
		$gateways['mollie_wc_gateway_giftcard']->icon = '<img style="max-width: 50px;" src="'.get_stylesheet_directory_uri() . '/images/vvvgiftcard.svg'.'" alt="mollie_wc_gateway_giftcard"/>';
	}
//	if ( isset( $gateways['mollie_wc_gateway_creditcard'] ) ) {
//		$gateways['mollie_wc_gateway_creditcard']->icon = '<img style="max-width: 50px;" src="'.get_stylesheet_directory_uri() . '/images/vvvgiftcard.svg'.'" alt="mollie_wc_gateway_giftcard"/>';
//	}
	//file_put_contents('data.json',json_encode($gateways));
	return $gateways;
}

add_filter( 'woocommerce_available_payment_gateways', 'cod_gateway_icon' );


add_filter('woocommerce_get_order_item_totals','woocommerce_get_order_item_totals_168',10,1);
function woocommerce_get_order_item_totals_168($item_totals){
	unset($item_totals['cart_subtotal']);

	return $item_totals;
}

add_filter( 'woocommerce_localisation_address_formats', 'change_us_address_format' );
function change_us_address_format( $formats ) {
	$formats['NL'] = "{company}\n{name}\n{address_1} {address_2}\n{postcode} {city}\n{country}";
	return $formats;
}

// Add custom field to the WooCommerce checkout page
add_action('woocommerce_after_order_notes', 'add_custom_checkout_field');

function add_custom_checkout_field($checkout)
{
    echo '<div id="custom_checkout_field"><h3>' . __('Projectnummer') . '</h3>';

    woocommerce_form_field('projectnummer', array(
        'type' => 'text',
        'class' => array('projectnummer-field-class form-row-wide'),
        'label' => __('Projectnummer'),
        'placeholder' => __('Projectnummer'),
        'required' => true,
    ), $checkout->get_value('projectnummer'));

    echo '</div>';
}

// Save custom field value to order meta data
add_action('woocommerce_checkout_create_order', 'save_custom_checkout_field');

function save_custom_checkout_field($order)
{
    if (!empty($_POST['projectnummer'])) {
        $order->update_meta_data('_projectnummer_field', sanitize_text_field($_POST['projectnummer']));
    }
}

// Display custom field value on the order edit page in the admin
add_action('woocommerce_admin_order_data_after_billing_address', 'display_custom_checkout_field_admin');

function display_custom_checkout_field_admin($order)
{
    $custom_field = $order->get_meta('_projectnummer_field');
    if (!empty($custom_field)) {
        echo '<p><strong>' . __('Projectnummer') . ':</strong> ' . esc_html($custom_field) . '</p>';
    }
}
