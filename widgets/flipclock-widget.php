<?php
if (! defined('ABSPATH')){
	exit; 
}

class Elementor_flipclock_Widget extends \Elementor\Widget_Base {

	public function get_name(){
		return 'flipclock';
	}
	public function get_title(){
		return esc_html__( 'Flip Box', 'elementor_test' );
	}
	public function get_icon(){
		return 'eicon-clock';
	}
	public function get_categories(){
		return ['test-category'];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'flipclok_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'setdate',
			[
				'label' => esc_html__( 'Set Dates', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 3,
				'max' => 1000,
				'step' => 1,
				'default' => 3,
			]
		);

		$this->add_control(
			'due_date',
			[
				'label' => esc_html__( 'Target Time', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
			]
		);
		$this->add_control( 
			'display_type', 
			[
				'label'   => __( 'Display Type', 'elementor_test' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'clock'    => __( 'Clock', 'elementor_test' ),
					'timerc'   => __( 'Time CountDown', 'elementor_test' ),
					'genericc' => __( 'Normal CountDown', 'elementor_test' ),
				],
				'default' => 'clock'
			] 
		);

		$this->add_control( 
			'clock_format', 
			[
				'label'     => __( 'Clock Format', 'elementor_test' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => [
					'12' => __( '12 Hour', 'elementor_test' ),
					'24' => __( '24 Hour', 'elementor_test' ),
				],
				'default'   => '12',
				'condition' => [
					'display_type' => 'clock'
				]
			]
		);
		$this->add_control(
			'flipclock_title',
			[
				'label' => esc_html__( 'Title', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '', 'elementor_test' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="clock" id="test_id" 
		data-set-dates="<?php echo $settings['setdate'] ?>"
		data-target-time="<?php echo $settings['due_date'] ?>"
		>

		</div>
		<?php
	}

	// protected function content_template() {
		
	// }
}


