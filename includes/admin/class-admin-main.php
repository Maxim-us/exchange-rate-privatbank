<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXERPAdminMain
{

	public $plugin_name;

	/*
	* MXERPAdminMain constructor
	*/
	public function __construct()
	{

		$this->plugin_name = MXERP_PLUGN_BASE_NAME;

		$this->mxerp_enable_widgets();

	}

	/*
	* Registration of styles and scripts
	*/
	public function mxerp_register()
	{

		// register scripts and styles
		add_action( 'admin_enqueue_scripts', array( $this, 'mxerp_enqueue' ) );

	}

		public function mxerp_enqueue()
		{

			// wp_enqueue_style( 'mxerp_font_awesome', MXERP_PLUGIN_URL . 'assets/font-awesome-4.6.3/css/font-awesome.min.css' );

			// wp_enqueue_style( 'mxerp_admin_style', MXERP_PLUGIN_URL . 'includes/admin/assets/css/style.css', array( 'mxerp_font_awesome' ), MXERP_PLUGIN_VERSION, 'all' );

			// wp_enqueue_script( 'mxerp_admin_script', MXERP_PLUGIN_URL . 'includes/admin/assets/js/script.js', array( 'jquery' ), MXERP_PLUGIN_VERSION, false );

		}

	public function mxerp_enable_widgets()
	{

		// Widgets
		require_once MXERP_PLUGIN_ABS_PATH . 'includes/core/widgets.php';

	}

}

// Initialize
$initialize_class = new MXERPAdminMain();

// Apply scripts and styles
$initialize_class->mxerp_register();