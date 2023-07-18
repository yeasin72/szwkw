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
	require_once( __DIR__ . '/widgets/szwkw-brand.php' );
	require_once( __DIR__ . '/widgets/szwkw-application.php' );
	require_once( __DIR__ . '/widgets/szwkw-about.php' );
	require_once( __DIR__ . '/widgets/szwkw-technical.php' );
	require_once( __DIR__ . '/widgets/szwkw-header.php' );
	require_once( __DIR__ . '/widgets/szwkw-about-page.php' );
	require_once( __DIR__ . '/widgets/szwkw-news.php' );
	require_once( __DIR__ . '/widgets/szwkw-news-details.php' );
	require_once( __DIR__ . '/widgets/szwkw-laboratories.php' );
	require_once( __DIR__ . '/widgets/szwkw-download.php' );
	require_once( __DIR__ . '/widgets/szwkw-fae-support.php' );
	require_once( __DIR__ . '/widgets/szwkw-video-slider.php' );
	require_once( __DIR__ . '/widgets/szwkw-sample-application.php' );
	require_once( __DIR__ . '/widgets/szwkw-application-details.php' );
	require_once( __DIR__ . '/widgets/szwkw-all-products.php' );
	require_once( __DIR__ . '/widgets/szwkw-navigation-breadcumb.php' );
	require_once( __DIR__ . '/widgets/szwkw-button.php' );
	require_once( __DIR__ . '/widgets/szwkw-product-details.php' );
	require_once( __DIR__ . '/widgets/szwkw-documentation-tools.php' );
	require_once( __DIR__ . '/widgets/szwkw-browse-by-category.php' );
	require_once( __DIR__ . '/widgets/szwkw-recomended-product.php' );

	$widgets_manager->register( new \Szwkw_Slider() );
	$widgets_manager->register( new \Home_products() );
	$widgets_manager->register( new \Customer_Review() );
	$widgets_manager->register( new \Home_Brand() );
	$widgets_manager->register( new \Home_Application() );
	$widgets_manager->register( new \Home_About() );
	$widgets_manager->register( new \Home_Technical_Support() );
	$widgets_manager->register( new \Header_Widget() );
	$widgets_manager->register( new \About_Page() );
	$widgets_manager->register( new \News_Widget() );
	$widgets_manager->register( new \News_Details() );
	$widgets_manager->register( new \Laboratory_Widget() );
	$widgets_manager->register( new \Data_Download() );
	$widgets_manager->register( new \Fae_Support() );
	$widgets_manager->register( new \Video_Slider() );
	$widgets_manager->register( new \Sample_Application() );
	$widgets_manager->register( new \Application_Details() );
	$widgets_manager->register( new \All_Products() );
	$widgets_manager->register( new \Navigation_And_Breadcumb() );
	$widgets_manager->register( new \Szwkw_Button() );
	$widgets_manager->register( new \Product_Details() );
	$widgets_manager->register( new \Tools_and_Documentation() );
	$widgets_manager->register( new \Browse_By_Category() );
	$widgets_manager->register( new \Recomended_Product() );
	

}


add_action( 'elementor/widgets/register', 'szwkw_all_components' );

