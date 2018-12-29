<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXERPFrontEndMain
{

	/*
	* Registration of styles and scripts
	*/
	public function mxerp_register()
	{

		add_action( 'wp_enqueue_scripts', array( $this, 'mxerp_enqueue' ) );

	}

		public function mxerp_enqueue()
		{

			wp_enqueue_style( 'mxerp_style', MXERP_PLUGIN_URL . 'includes/frontend/assets/css/style.css', '', MXERP_PLUGIN_VERSION, 'all' );

		}

}

// Initialize
$initialize_class = new MXERPFrontEndMain();

// Apply scripts and styles
$initialize_class->mxerp_register();