<?php
/*
Plugin Name: Курс валют ПриватБанка
Plugin URI: https://github.com/Maxim-us/exchange-rate-privatbank
Description: Плагин позволяет вывести курс валют от Приват Банка на сайте в области виджетов.
Author: Marko Maksym
Version: 1.1
Author URI: https://github.com/Maxim-us
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Unique string - MXERP
*/

/*
* Define MXERP_PLUGIN_PATH
*/
if ( ! defined( 'MXERP_PLUGIN_PATH' ) ) {

	define( 'MXERP_PLUGIN_PATH', __FILE__ );

}

/*
* Define MXERP_PLUGIN_URL
*/
if ( ! defined( 'MXERP_PLUGIN_URL' ) ) {

	// Return http://my-domain.com/wp-content/plugins/exchange-rate-privatbank/
	define( 'MXERP_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

}

/*
* Define MXERP_PLUGN_BASE_NAME
*/
if ( ! defined( 'MXERP_PLUGN_BASE_NAME' ) ) {

	// Return exchange-rate-privatbank/exchange-rate-privatbank.php
	define( 'MXERP_PLUGN_BASE_NAME', plugin_basename( __FILE__ ) );

}

/*
* Include the main MXERPExchangeRatePrivatBank class
*/
if ( ! class_exists( 'MXERPExchangeRatePrivatBank' ) ) {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-final-main-class.php';

	// Create new instance
	$mxerp_new_instance = new MXERPExchangeRatePrivatBank();

	// activation|deactivation class include
	$mxerp_new_instance->mxerp_basic_pugin_function();

	/*
	* Registration hooks
	*/
	// Activation
	register_activation_hook( __FILE__, array( 'MXERPBasisPluginClass', 'activate' ) );

	// Deactivation
	register_deactivation_hook( __FILE__, array( 'MXERPBasisPluginClass', 'deactivate' ) );

	/*
	* Translate plugin
	*/
	add_action( 'plugins_loaded', 'mxerp_translate' );

	function mxerp_translate()
	{

		load_plugin_textdomain( 'mxerp-domain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	}

}