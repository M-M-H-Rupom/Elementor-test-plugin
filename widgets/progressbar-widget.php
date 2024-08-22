<?php
if (! defined('ABSPATH')){
	exit; 
}

class Elementor_progressbar_Widget extends \Elementor\Widget_Base {

	public function get_name(){
		return 'ProgressBar';
	}
	public function get_title(){
		return esc_html__( 'ProgressBar', 'elementor_test' );
	}
	public function get_icon(){
		return 'eicon-spinner';
	}
	public function get_categories(){
		return ['test-category'];
	}
	public function get_script_depends() {
        return ['progressbar-js'];
    }
	protected function register_controls() {
		$this->start_controls_section(
			'progressbar_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'progress_title',
			[
				'label' => esc_html__( 'Title', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'progress Bar', 'elementor_test' ),
				// 'placeholder' => esc_html__( 'Title', 'elementor_test' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		// $settings = $this->get_settings_for_display();
		?>
        <div class="progress"></div>
		<?php
	}

	// protected function content_template() {
		
	// }
}
