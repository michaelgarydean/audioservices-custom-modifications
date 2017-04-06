<?php
/**
 * Plugin Name:     audioservices.studio Custom Modifications
 * Plugin URI:      https://github.com/mykedean/audioservices-custom-modifications.git
 * Description:     Custom modifications used for Pheek's audioservices.studio site
 * Author:          Michael Dean
 * Author URI:      https://github.com/mykedean
 * Text Domain:     audioservices-custom-modifications
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Audioservices_Custom_Modifications
 */

/**
 * Modify the current symbol for USD and CAD
 * 
 * @param String $currency_symbol	The default symbol text used for the currency
 * @param String $currency		The currency's acronym.
 * @return String $currency_symbol	The replacement text to use for the currency symbol.
 */
add_filter( 'woocommerce_currency_symbol', 'pheek_change_existing_currency_symbol', 10, 2 );

function pheek_change_existing_currency_symbol( $currency_symbol, $currency ) {
	switch( $currency ) {
		case 'USD': 
			$currency_symbol = '$USD '; 
			break;
		case 'CAD': 
			$currency_symbol = '$CAD '; 
			break;
	}

	return $currency_symbol;
}

/**
 * Remove admin columns in the Woocommerce orders admin menu.
 * wp-admin/edit.php?post_type=shop_order
 */

add_filter( 'manage_edit-shop_order_columns', 'pheek_remove_woocommerce_admin_columns', 15 );

function pheek_remove_woocommerce_admin_columns( $columns ) {
	$new_columns = ( is_array( $columns ) ) ? $columns : array();
	
	//Remove column
	unset( $new_columns[ 'customer_message' ] );
	unset( $new_columns[ 'order_actions' ] );
	return $new_columns;
}

add_action( 'manage_shop_order_posts_custom_column', 'pheek_custom_column', 10, 2 );

function pheek_custom_column( $column ) {
	global $post, $woocommerce, $the_order;	
}
