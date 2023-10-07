<?php

/*
 * Change button text on product pages
 */
//add_filter( 'woocommerce_product_single_add_to_cart_text', 'misha_add_to_cart_text_2' );

function misha_add_to_cart_text_2( $product ){
	return 'Doneer nu';
}

/*
 * Change button text on Product Archives
 */
add_filter( 'woocommerce_loop_add_to_cart_link', 'misha_add_to_cart_text_1' );

function misha_add_to_cart_text_1( $add_to_cart_html ) {
	$str = str_replace( 'Add to cart', 'Buy now', $add_to_cart_html );
	$str = str_replace( 'Read more', 'Contact Us', $str );
	return $str;
}


/*
 * Change button text on Product Archives
 */
add_filter( 'woocommerce_product_add_to_cart_text', 'misha_add_to_cart_text_1', 10, 2 );

add_filter( 'woocommerce_add_to_cart_redirect', 'misha_skip_cart_redirect_checkout' );

function misha_skip_cart_redirect_checkout( $url ) {
    if ($_GET['direct_checkout'] == '1' || $_POST['direct_checkout'] == '1')
	return wc_get_checkout_url();

    //return wc_get_cart_url();
    return  $url;
}

add_filter( 'woocommerce_product_add_to_cart_url', 'misha_fix_for_individual_products', 10, 2 );
function misha_fix_for_individual_products( $add_to_cart_url, $product ){

	if( $product->get_sold_individually() // if individual product
	    && WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( $product->id ) ) // if in the cart
	    && $product->is_purchasable() // we also need these two conditions
	    && $product->is_in_stock() ) {
		$add_to_cart_url = wc_get_checkout_url();
	}

	if( $product->id == '10960' || $product->id == '11553' || $product->id == '10837' ){
		return '#';
	}

	return $add_to_cart_url;

}

add_filter( 'wc_add_to_cart_message_html', 'misha_remove_add_to_cart_message' );

function misha_remove_add_to_cart_message( $message ){

    if(($_GET['direct_checkout'] == '1' || $_POST['direct_checkout'] == '1'))
        return '';

    return  $message;
}

add_filter( 'woocommerce_add_to_cart_validation', 'remove_cart_item_before_add_to_cart', 20, 3 );

function remove_cart_item_before_add_to_cart( $passed, $product_id, $quantity ) {
	if( ! WC()->cart->is_empty() && ($_GET['direct_checkout'] == '1' || $_POST['direct_checkout'] == '1')) WC()->cart->empty_cart();
	if ( ! WC()->cart->is_empty()  && checkDirectDonation() == '1') WC()->cart->empty_cart();
	if ( ! WC()->cart->is_empty()  && checkCartIsSubscription() ) WC()->cart->empty_cart();

	return $passed;
}

//add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {


	$fields['order']['order_comments']['placeholder'] = '';
	$fields['order']['order_comments']['label'] = '';
//	$fields['billing']['billing_email']['label'] = 'E-mailadres';
//	$fields['billing']['billing_company']['label'] = 'Bedrijfsnaam';
//	$fields['billing']['billing_first_name']['label'] = 'Voornaam';
//	$fields['billing']['billing_last_name']['label'] = 'Achternaam';
	$fields['billing']['billing_email']['priority'] = 5;
	$fields['billing']['billing_company']['priority'] = 6;
	$fields['billing']['billing_first_name']['priority'] = 8;

	$fields['billing']['billing_user_gender'] = array(
		'type'          => 'select',
		'options'  => array(
			'm' => 'Dhr.',
			'f' => 'Mvr.',
			'o' => 'Genderneutraal',
		),
		"label"    => "Aanhef",
		"required" => true,
		"class"    => [ "form-row-wide" ],
		"priority" => 7
	);

	$fields['billing']['billing_user_middle'] = array(
		'type'          => 'text',
		"label"    => "Tussenvoegsel",
		"required" => false,
		"class"    => [ "form-row-last" ],
		"priority" => 10
	);

	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_phone']);


	$fields['billing']['billing_country'] ['priority'] = 75;
	//$fields['billing']['billing_city']['']
	$fields['billing']['billing_address_1']['label']  = 'Straatnaam';
	$fields['billing']['billing_address_1']['class']  = ['form-row-first'];
	$fields['billing']['billing_address_1']['placeholder']  = '';
	$fields['billing']['billing_address_2']['label']  = 'Huisnummer';
	$fields['billing']['billing_address_2']['placeholder']  = '';
	$fields['billing']['billing_address_2']['class']  = ['form-row-last'];
	$fields['billing']['billing_address_2']['required'] = true;

	$fields['billing']['billing_postcode']['class'] = ['form-row-first'];
	$fields['billing']['billing_city']['class'] = ['form-row-last'];
	$fields['billing']['billing_first_name']['required'] = false;
	$fields['billing']['billing_last_name']['required'] = false;
	if (!checkCartIsSubscription()){
		//	unset($fields['billing']['billing_address_1']);
		//	unset($fields['billing']['billing_address_2']);
		//	unset($fields['billing']['billing_city']);
		//	unset($fields['billing']['billing_postcode']);
		//	unset($fields['billing']['billing_country']);
		$fields['billing']['billing_address_1']['required'] = false;
		$fields['billing']['billing_address_2']['required'] = false;
		$fields['billing']['billing_city']['required'] = false;
		$fields['billing']['billing_postcode']['required'] = false;
		$fields['billing']['billing_country']['required'] = false;
    }


	if (isset($_POST['donation_anonymous']) && $_POST['donation_anonymous'] == '1') {
		$fields['billing']['billing_email']['required'] = false;
		$fields['billing']['billing_user_gender']['required'] = false;
		$fields['billing']['billing_first_name']['required'] = false;
		$fields['billing']['billing_last_name']['required'] = false;
	}
	if ( isset($_POST['donation_user_company']) && $_POST['donation_user_company'] == '1') {
		$fields['billing']['billing_user_gender']['required'] = false;
		$fields['billing']['billing_first_name']['required'] = false;
		$fields['billing']['billing_last_name']['required'] = false;
		$fields['billing']['billing_company']['required'] = true;
	}



	return $fields;
}

function filter_wc_address_i18n_params( $fields ) {
	// make filter magic happen here...

	file_put_contents('data.json',json_encode($fields));
	$fields['locale'] = "{}";
	$fields['locale_fields'] = "{}";


	return $fields;
};

// add the filter
add_filter( 'wc_address_i18n_params', 'filter_wc_address_i18n_params', 10, 1 );

add_action( 'woocommerce_checkout_update_order_meta', 'million_save_extra_checkout_fields', 10, 2 );

function million_save_extra_checkout_fields($order_id, $posted ){
	if( isset( $posted['donation_user_gdprAccepted'] ) ) {
		update_post_meta( $order_id, 'donation_user_gdprAccepted', sanitize_text_field( $posted['donation_user_gdprAccepted'] ) );
	}
	if( isset( $posted['donation_user_privacyAccepted'] ) ) {
		update_post_meta( $order_id, 'donation_user_privacyAccepted', sanitize_text_field( $posted['donation_user_privacyAccepted'] ) );
	}
	if( isset( $posted['donation_user_company'] ) ) {
		update_post_meta( $order_id, 'donation_user_company', sanitize_text_field( $posted['donation_user_company'] ) );
	}
	if( isset( $posted['donation_anonymous'] ) ) {
		update_post_meta( $order_id, 'donation_anonymous', sanitize_text_field( $posted['donation_anonymous'] ) );
	}
}

add_action('woocommerce_after_checkout_validation', 'after_checkout_validation_168');

function after_checkout_validation_168( $posted ) {

	if (empty($_POST['donation_user_privacyAccepted']) && empty($_POST['donation_anonymous'])) {
		wc_add_notice( __( "<strong>Privacy</strong> is vereist", 'woocommerce' ), 'error' );
	}
	if(empty($_POST['projectnummer']))
	{
		wc_add_notice( __( "<strong>Project Number</strong> required", 'woocommerce' ), 'error' );
	}

}

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar',10);

add_action( 'woocommerce_before_calculate_totals', 'million_update_price'  );

function million_update_price( $cart_object ) {
	$cart_items = $cart_object->cart_contents;
	if ( ! empty( $cart_items ) ) {
		foreach ( $cart_items as $key => $value ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $value['data'], $value, $key );
			if ( isset( $value["donation_amount"] )  && in_array($_product->get_id(),donation_product_ids) ) {
				$value['data']->set_price( intval($value["donation_amount"]) );
			}
		}
	}
}

function million_donation_amount( $cart_item_data, $product_id ) {
	if( isset( $_POST['amount'] ) && !empty($_POST['amount']) && in_array($product_id,donation_product_ids)) {
		$cart_item_data[ "donation_amount" ] = str_replace(' €','',$_POST['amount']);
		$cart_item_data[ "donation_amount" ] = str_replace('€','',$cart_item_data[ "donation_amount" ]);
	}
	if( isset( $_GET['amount'] ) && !empty($_GET['amount'])) {
		$cart_item_data[ "donation_amount" ] = str_replace(' €','',$_GET['amount']);
		$cart_item_data[ "donation_amount" ] = str_replace('€','',$cart_item_data[ "donation_amount" ]);
	}

	//file_put_contents('data.json',json_encode($_GET));
	return $cart_item_data;
}

add_filter( 'woocommerce_add_cart_item_data', 'million_donation_amount', 99, 2 );


/*add_filter( 'woocommerce_get_item_data', function ( $data, $cartItem ) {
	if ( isset( $cartItem['donation_amount'] ) ) {
		$data[] = array(
			'name' => 'My custom data',
			'value' => $cartItem['donation_amount']
		);
	}
	return $data;
}, 10, 2 );*/


add_action( 'woocommerce_thankyou', 'mds_redirectcustom');

function mds_redirectcustom( $order_id ){
	$order = wc_get_order( $order_id );
	$url = site_url('/bedankt/?order_id='.$order_id);
	if ( ! $order->has_status( 'failed' ) ) {
		wp_safe_redirect( $url );
		exit;
	}
}

add_action('woocommerce_after_add_to_cart_form','mds_woocommerce_after_add_to_cart_form');
function mds_woocommerce_after_add_to_cart_form(){

    $is_orphan = get_field('orphanage_product');

    if (!$is_orphan):
	?>
	<form method="post">
        <div class="row">
            <input type="hidden" name="add-to-cart" value="<?php the_ID(); ?>"/>
            <input type="hidden" id="direct_donation_quantity" name="quantity" value="1"/>
            <input type="hidden" name="direct_checkout" value="1"/>
            <button style="margin-bottom: 20px;" class="button-cta" type="submit">DONEER NU</button>
        </div>
	</form>
	<?php else:  ?>
    <div class="row">
        <a href="/contact/" style="margin-top:40px;margin-bottom: 20px;" class="button">Meer Informatie</a>
    </div>
    <style>
        form.cart{display: none;}
    </style>
    <?php endif;
}



// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );
function woocommerce_custom_product_add_to_cart_text() {
	return __( 'Bekijk', 'woocommerce' );
}

function custom_woocommerce_loop_add_to_cart_link( $html, WC_Product $product ) {

	$is_orphan = get_field('orphanage_product');
	/*if (is_product_category() || is_shop()) {*/
	$button_text = $is_orphan ? 'Meer informatie' : __( "Bekijk", "woocommerce" );
	if($is_orphan)
	    $button_link = '/contact/';
	else
	    $button_link = $product->get_permalink();
	$html      = '<a class="button" href="' . $button_link . '">' . $button_text . '</a>';
	//}

	ob_start();
	?>
    <div class="bootstrap-iso">
        <div class="weird-price">
            <!--<p><?php /*echo substr(strip_tags($product->get_short_description()),0,90); */?></p>-->

            <div class="row align-items-center no-gutters">
                <div class="col-5">
                    <p class="text-center mb-0">
                            <?php if ($is_orphan):?>
                                <small class="un-packagingunit">
                                    beginnend met
                                </small>
                                <span class="price"><?php echo $product->get_price_html();?></span>
                            <?php else: ?>
                                <span class="price"><?php echo $product->get_price_html();?></span>
                                <small class="un-packagingunit">
                                        per eenheid
                                </small>
                            <?php endif;?>
                    </p>
                </div>
                <div class="col-7">
                    <div class="text-center">
						<?php echo $html;?>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<?php

	return  ob_get_clean();
}

add_filter( 'woocommerce_loop_add_to_cart_link', 'custom_woocommerce_loop_add_to_cart_link', 10, 2 );

add_filter( 'woocommerce_catalog_orderby', 'mds_remove_default_sorting_options' );

function mds_remove_default_sorting_options( $options ){

	unset( $options[ 'popularity' ] );
//	unset( $options[ 'menu_order' ] );
	unset( $options[ 'rating' ] );
	unset( $options[ 'date' ] );
	//unset( $options[ 'price' ] );
	//unset( $options[ 'price-desc' ] );

	$options[ 'menu_order' ] = 'Sorteren'; // rename
	$options[ 'price' ] = 'Bedrag oplopend (laag naar hoog)'; // rename
	$options[ 'price-desc' ] = 'Bedrag aflopend (hoog naar laag)'; // rename

	return $options;

}

// Add custom validation for PayPal gateway
add_action('woocommerce_checkout_process', 'custom_validate_paypal_fields');

function custom_validate_paypal_fields() {
    if (WC()->payment_gateways->get_current_gateway() === 'mollie_wc_gateway_bancontact') {
        $first_name = isset($_POST['billing_first_name']) ? sanitize_text_field($_POST['billing_first_name']) : '';
        $last_name = isset($_POST['billing_last_name']) ? sanitize_text_field($_POST['billing_last_name']) : '';

        if (empty($first_name) || empty($last_name)) {
            wc_add_notice(__('Please enter both first name and last name for Bank Transfer payments.', 'woocommerce'), 'error');
        }
    }
}

// Display an error message if PayPal fields are empty
add_action('woocommerce_before_checkout_form', 'display_paypal_fields_error_message');

function display_paypal_fields_error_message() {
    if (is_checkout() && WC()->payment_gateways->get_current_gateway() === 'paypal') {
        wc_print_notice(__('Please enter both first name and last name for Bank Transfer payments.', 'woocommerce'), 'error');
    }
}