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
	require_once( __DIR__ . '/widgets/progressbar-widget.php' );

	$widgets_manager->register( new \Elementor_test_Widget() );
	$widgets_manager->register( new \Elementor_demo_Widget() );
	$widgets_manager->register( new \Elementor_pricing_Widget() );
	$widgets_manager->register( new \Elementor_pricing_another_Widget() );
	$widgets_manager->register( new \Elementor_progressbar_Widget() );

}
add_action( 'elementor/widgets/register', 'register_test_widget' );

// enqueue 
function my_widgets_frontend_style() {
	wp_enqueue_style( 'frontent_froala_css',plugin_dir_url( __FILE__ ).'assets/css/froala.css' );
	wp_enqueue_style( 'frontent_bootstrap_css', plugin_dir_url( __FILE__ ).'assets/css/bootstrap.css' );
}
add_action( 'elementor/frontend/after_enqueue_styles', 'my_widgets_frontend_style' );

function my_widgets_editor_scripts(){
	wp_enqueue_script( 'frontent_bootstrap_js', plugin_dir_url( __FILE__ ).'assets/js/bootstrap.js', 'false',time(),'true');
}
add_action( 'elementor/editor/after_enqueue_scripts', 'my_widgets_editor_scripts' );

function my_widgets_frontend_scripts(){
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'progressbar_js', plugin_dir_url( __FILE__ ).'assets/js/progressbar.js', array('jquery'),time(),'true');
	wp_enqueue_script( 'script_js', plugin_dir_url( __FILE__ ).'assets/js/script.js', ['jquery'],time(),'true');
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