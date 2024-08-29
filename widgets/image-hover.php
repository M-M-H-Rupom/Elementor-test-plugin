<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Elementor_imagehover_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'image_hover';
	}

	public function get_title() {
		return esc_html__( 'Image Hover', 'elementor_test' );
	}

	public function get_icon() {
		return 'eicon-image-rollover';
	}

	public function get_categories() {
		return [ 'test-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'hover_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'hover_box_title',
			[
				'label'       => esc_html__( 'Title', 'elementor_test' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title', 'elementor_test' ),
			]
		);

		$this->add_control(
			'hover_box_description',
			[
				'label'       => esc_html__( 'Description', 'elementor_test' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Description', 'elementor_test' ),
			]
		);
		$this->add_control(
			'box_height',
			[
				'label' => esc_html__( 'Height', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 500,
				'step' => 5,
				'default' => 80,
				'selectors' => ['
					{{WRAPPER}} .box_height' => 'height: {{VALUE}}px;',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'hover_style',
			[
				'label' => esc_html__( 'Style', 'elementor_test' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selectors' => '{{WRAPPER}} .hero_img',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="section-gap box-hover mb-md-0 mb-4 box_height">
			<div class="hero_img bg-overlay rounded overflow-hidden" data-overlay="0"></div>
			<div class="container">
				<div class="row justify-content-center align-items-center py-2">
					<div class="col-md-10">
						<h4 class="mb-4">
							<?php echo esc_html( $settings['hover_box_title'] ); ?>
						</h4>
						<p class="mb-4">
							<?php echo esc_html( $settings['hover_box_description'] ); ?>
						</p>
					</div>
				</div>
			</div>
		</section>
		
		<?php
	}
}
