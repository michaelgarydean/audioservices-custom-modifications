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
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
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

