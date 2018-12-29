<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

final class MXERPExchangeRatePrivatBank
{

	/*
	* MXERPExchangeRatePrivatBank constructor
	*/
	public function __construct()
	{

		$this->define_constants();
		
		$this->mxerp_include();

	}

	/*
	* Define MXERP constants
	*/
	public function define_constants()
	{

		// include php files
		$this->mxerp_define( 'MXERP_PLUGIN_ABS_PATH', dirname( MXERP_PLUGIN_PATH ) . '/' );

		// version
		$this->mxerp_define( 'MXERP_PLUGIN_VERSION', '1.0' ); // Must be replaced before production on for example '1.0'


	}

	/*
	* Incude required core files
	*/
	public function mxerp_include()
	{

		// Helpers
		require_once MXERP_PLUGIN_ABS_PATH . 'includes/core/helpers.php';

		// Part of the Frontend
		require_once MXERP_PLUGIN_ABS_PATH . 'includes/frontend/class-frontend-main.php';

		// Part of the Administrator
		require_once MXERP_PLUGIN_ABS_PATH . 'includes/admin/class-admin-main.php';

	}

	/*
	* Define function
	* You should check to type of data that you put into your constants.
	* if variable $value is an array, that constant consists of serialized data.
	*/
	private function mxerp_define( $mame, $value )
	{

		// if $value is array
		if( is_array( $value ) ) {

			define( $mame, serialize( $value ) );

		} else {

			define( $mame, $value );

		}


	}

	public function mxerp_basic_pugin_function()
	{
		// Basis functions
		require_once MXERP_PLUGIN_ABS_PATH . 'includes/class-basis-plugin-class.php';

	}

}