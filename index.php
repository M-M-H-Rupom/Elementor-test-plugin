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

	$widgets_manager->register( new \Elementor_test_Widget() );
	$widgets_manager->register( new \Elementor_demo_Widget() );

}
add_action( 'elementor/widgets/register', 'register_test_widget' );

// function register_test_widget( $widgets_manager ) {

// 	require_once( __DIR__ . '/widgets/test-widget.php' );

// 	$widgets_manager->register( new \Elementor_test_Widget() );

// }
// add_action( 'elementor/widgets/register', 'register_test_control_widget' );
// register category
function elementor_test_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'test-category',
		[
			'title' => esc_html__( 'Test Category', 'elementor_test' ),
			'icon' => 'fa fa-image',
		]
	);
	$elements_manager->add_category(
		'second-category',
		[
			'title' => esc_html__( 'Second Category', 'elementor_test' ),
			'icon' => 'fa fa-plug',
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'elementor_test_widget_categories' );