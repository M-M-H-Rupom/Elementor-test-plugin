<?php
if (! defined('ABSPATH')){
	exit; 
}

class Elementor_info_Widget extends \Elementor\Widget_Base {

	public function get_name(){
		return 'infobox';
	}
	public function get_title(){
		return esc_html__( 'Info Box', 'elementor_test' );
	}
	public function get_icon(){
		return 'eicon-info';
	}
	public function get_categories(){
		return ['test-category'];
	}
	protected function register_controls() {
		$this->start_controls_section(
			'info_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'info_image',
			[
				'label' => esc_html__( 'Image', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'info_title',
			[
				'label' => esc_html__( 'Title', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Default title', 'elementor_test' ),
			]
		);
		$this->add_control(
			'info_description',
			[
				'label' => esc_html__( 'Details', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Default description', 'elementor_test' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="infobox">
			<div class="info_image" style="width:150px">
				<img src="<?php echo $settings['info_image']['url'] ?>" alt="">
			</div>
			<div class="info_content">
				<h2><?php echo $settings['info_title'] ?></h2>
				<p><?php echo $settings['info_description'] ?></p>
			</div>
		</div>
		<?php
	}

	// protected function content_template() {
		
	// }
}
