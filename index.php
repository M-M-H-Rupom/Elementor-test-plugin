<?php
/**
 * Plugin Name: Elementor-test-widget 
 * Description: Hello Elementor 
 * Version: 1.0
 * Author: Rupom
 * Text Domain: elementor_test
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

// function register_test_control( $controls_manager ) {

// 	require_once( __DIR__ . '/controls/test.php' );

//     $controls_manager->register( new \Elementor_test_Control() );

// }
// add_action( 'elementor/controls/register', 'register_test_control' );


function register_test_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/test-widget.php' );
	require_once( __DIR__ . '/widgets/demo-widget.php' );
	require_once( __DIR__ . '/widgets/pricing-table.php' );
	require_once( __DIR__ . '/widgets/pricing-table-another.php' );
	// require_once( __DIR__ . '/widgets/progressbar-widget.php' );
	require_once( __DIR__ . '/widgets/features-widget.php' );
	require_once( __DIR__ . '/widgets/flipclock-widget.php' );
	require_once( __DIR__ . '/widgets/infobox-widget.php' );
	require_once( __DIR__ . '/widgets/dualheading-widget.php' );
	require_once( __DIR__ . '/widgets/protected-widget.php' );
	require_once( __DIR__ . '/widgets/image-hover.php' );
	require_once( __DIR__ . '/widgets/icon-text.php' );
	require_once( __DIR__ . '/widgets/demo-portfolio.php' );
	require_once( __DIR__ . '/widgets/content-widget.php' );
	require_once( __DIR__ . '/widgets/team-menbar.php' );
	require_once( __DIR__ . '/widgets/service-widget.php' );

	$widgets_manager->register( new \Elementor_test_Widget() );
	$widgets_manager->register( new \Elementor_demo_Widget() );
	$widgets_manager->register( new \Elementor_pricing_Widget() );
	$widgets_manager->register( new \Elementor_pricing_another_Widget() );
	// $widgets_manager->register( new \Elementor_progressbar_Widget() );
	$widgets_manager->register( new \Elementor_features_Widget() );
	$widgets_manager->register( new \Elementor_flipclock_Widget() );
	$widgets_manager->register( new \Elementor_info_Widget() );
	$widgets_manager->register( new \Elementor_dualheading_Widget() );
	$widgets_manager->register( new \Elementor_protected_Widget() );
	$widgets_manager->register( new \Elementor_imagehover_Widget() );
	$widgets_manager->register( new \Elementor_icontext_Widget() );
	$widgets_manager->register( new \Elementor_demoportfolio_Widget() );
	$widgets_manager->register( new \Elementor_personalcontent_Widget() );
	$widgets_manager->register( new \Elementor_teammember_Widget() );
	$widgets_manager->register( new \Elementor_service_Widget() );

}
add_action( 'elementor/widgets/register', 'register_test_widget' );

// enqueue 
function my_widgets_frontend_style() {
	wp_enqueue_style( 'frontent_froala_css',plugin_dir_url( __FILE__ ).'assets/css/froala.css' );
	wp_enqueue_style( 'frontent_bootstrap_css', plugin_dir_url( __FILE__ ).'assets/css/bootstrap.css' );
	wp_enqueue_style( 'frontent_flipclock_css', plugin_dir_url( __FILE__ ).'assets/css/flipclock.css' );
	wp_enqueue_style( 'frontent_custom_css', plugin_dir_url( __FILE__ ).'assets/css/style.css' );
}
add_action( 'elementor/frontend/after_enqueue_styles', 'my_widgets_frontend_style' );

function my_widgets_editor_scripts(){
	wp_enqueue_script( 'frontent_bootstrap_js', plugin_dir_url( __FILE__ ).'assets/js/bootstrap.js', 'false',time(),'true');
	wp_enqueue_script( 'frontent_flipclock_js', plugin_dir_url( __FILE__ ).'assets/js/flipclock.js', array('jquery'),'1.0','true');
	wp_enqueue_script( 'frontent_main_js', plugin_dir_url( __FILE__ ).'assets/js/main.js', array('jquery','frontent_flipclock_js'),time(),'true');
	wp_localize_script('frontent_main_js', 'ajaxurl', array(
		'url' => admin_url('admin-ajax.php'),
	));
}
add_action( 'elementor/frontend/after_enqueue_scripts', 'my_widgets_editor_scripts' );


function my_widgets_frontend_scripts(){
	wp_enqueue_script('jquery');
	// wp_enqueue_script( 'progressbar_js', plugin_dir_url( __FILE__ ).'assets/js/progressbar.js', array('jquery'),time(),'true');
	// wp_enqueue_script( 'script_js', plugin_dir_url( __FILE__ ).'assets/js/script.js', ['jquery'],time(),'true');
}
add_action( 'elementor/frontend/after_register_scripts', 'my_widgets_frontend_scripts' );

function elementor_test_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'test-category',
		[
			'title' => esc_html__( 'Test Category', 'elementor_test' ),
			// 'icon' => 'fa fa-image',
		]
	);
	$elements_manager->add_category(
		'second-category',
		[
			'title' => esc_html__( 'Second Category', 'elementor_test' ),
			// 'icon' => 'fa fa-plug',
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'elementor_test_widget_categories' );