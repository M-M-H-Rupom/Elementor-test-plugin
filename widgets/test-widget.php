<?php
if (! defined('ABSPATH')){
	exit; 
}

class Elementor_test_Widget extends \Elementor\Widget_Base {

	public function get_name(){
		return 'Testwidget';
	}
	public function get_title(){
		return esc_html__( 'Test widget', 'elementor_test' );
	}
	public function get_icon(){
		return 'fa fa-image';
	}
	public function get_categories(){
		return [ 'general','test-category'];
	}
	// public function get_keywords() {
	// 	return [ 'test', 'widget-test' ];
	// }

	// public function get_custom_help_url() {
	// 	return 'https://developers.elementor.com/docs/widgets/';
	// }
	protected function register_controls(){

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Heading', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Hello world', 'elementor_test' ),

			]
		);
		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Here description', 'elementor_test' ),

			]
		);
		$this->end_controls_section();
		// alignment 
		$this->start_controls_section(
			'alignment_section',
			[
				'label' => esc_html__( 'Alignment', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'heading_alignment',
			[
				'label' => esc_html__( 'Heading Alignment', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => esc_html__( 'left', 'elementor_test' ),
					'right' => esc_html__( 'right', 'elementor_test' ),
					'center' => esc_html__( 'center', 'elementor_test' ),
				],
				'selectors' => [
					'{{WRAPPER}} .heading_align' => 'text-align: {{VALUE}};',
				],
			]
		);
		// description alignment
		$this->add_control(
			'description_alignment',
			[
				'label' => esc_html__( 'Description Alignment', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => esc_html__( 'left', 'elementor_test' ),
					'right' => esc_html__( 'right', 'elementor_test' ),
					'center' => esc_html__( 'center', 'elementor_test' ),
				],
				'selectors' => [
					'{{WRAPPER}} .description_align' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		// color
		$this->start_controls_section(
			'color',
			[
				'label' => esc_html__( 'Color', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'black',
				'selectors' => [
					'{{WRAPPER}} .heading_color' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Description color', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'black',
				'selectors' => [
					'{{WRAPPER}} .description_color' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}
	protected function render(){
		$settings = $this->get_settings_for_display();
		echo "<h1 class='heading_align heading_color'>" . esc_html( $settings['heading'])."</h1>";
		echo "<p class='description_align description_color'>" . esc_html( $settings['description'])."</p>";
	}
	protected function content_template(){
		?>
		<#
		console.log('hello')
		#>
		<h1 class='heading_align heading_color'>{{{settings.heading}}}</h1>
		<p class='description_align description_color'>{{{settings.description}}}</p>
		<?php
	}
}