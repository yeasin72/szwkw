<?php
/**
 * Plugin Name: SZWKW Components
 * Plugin URI: https://fiverr.com/yeasin71
 * Description: SZWKW essential widgets.
 * Version: 1.0.0
 * Author: Yeasin Arafath
 * Author URI: https://fiverr.com/yeasin71
 * Text Domain: elementor-custom-widget
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function szwkw_all_components( $widgets_manager ) {


	require_once( __DIR__ . '/widgets/szwkw-slider.php' );
	require_once( __DIR__ . '/widgets/szwkw-home-products.php' );
	require_once( __DIR__ . '/widgets/szwkw-customer-review.php' );

	$widgets_manager->register( new \Szwkw_Slider() );
	$widgets_manager->register( new \Home_products() );
	$widgets_manager->register( new \Customer_Review() );
	

}


add_action( 'elementor/widgets/register', 'szwkw_all_components' );

