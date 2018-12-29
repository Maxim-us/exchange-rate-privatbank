<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Require template for admin panel
*/
function mxerp_require_template_admin( $file ) {

	require_once MXERP_PLUGIN_ABS_PATH . 'includes/admin/templates/' . $file;

}