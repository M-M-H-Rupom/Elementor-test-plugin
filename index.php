<?php
/**
 * Plugin Name: Elementor-test 
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

	$widgets_manager->register( new \Elementor_test_Widget() );

}
add_action( 'elementor/widgets/register', 'register_test_widget' );