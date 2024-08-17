<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

class Elementor_test_Widget extends \Elementor\Widget_Base {

	
	public function get_name() {
		return 'Testwidget';
	}

	public function get_title() {
		return esc_html__( 'Test widget', 'elementor_test' );
	}

	public function get_icon() {
		return 'fa fa-image';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	// public function get_keywords() {
	// 	return [ 'test', 'widget-test' ];
	// }

	// public function get_custom_help_url() {
	// 	return 'https://developers.elementor.com/docs/widgets/';
	// }


	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'Heading',
			[
				'label' => esc_html__( 'Heading', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Hello world', 'elementor_test' ),

			]
		);
        
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo "<h1>" . esc_html( $settings['Heading'])."</h1>";
	}

}