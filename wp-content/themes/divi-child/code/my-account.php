<?php

add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order_168' );
function my_account_menu_order_168($menu_items) {

//	file_put_contents('data.json',json_encode($menu_items));

	$menu_items['orders'] = 'Donaties';
	$menu_items['subscriptions'] = 'Periodieke schenking';
	unset($menu_items['edit-address']);
	unset($menu_items['downloads']);

	return $menu_items;
}

add_filter('woocommerce_account_orders_columns','woocommerce_account_orders_columns_168');

function woocommerce_account_orders_columns_168($columns){
	$columns['order-number'] = 'Donaties';
	return $columns;
}