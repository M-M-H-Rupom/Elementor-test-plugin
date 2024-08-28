<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Elementor_icontext_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'icon_text';
	}

	public function get_title() {
		return esc_html__( 'Icon Text', 'elementor_test' );
	}

	public function get_icon() {
		return 'eicon-text';
	}

	public function get_categories() {
		return [ 'test-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'icontext_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'icontext_title',
			[
				'label'       => esc_html__( 'Title', 'elementor_test' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title', 'elementor_test' ),
				'default' => esc_html__( 'Title', 'elementor_test' ),
			]
		);

        $this->add_control(
			'icontext_description',
			[
				'label'       => esc_html__( 'Description', 'elementor_test' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Description', 'elementor_test' ),
				'default' => esc_html__( 'Description', 'elementor_test' ),
			]
		);

        $this->add_control(
			'icontext_icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Style', 'elementor_test' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="blurb shadow-sm text-center box-hover py-2">
			<i class="<?php echo esc_attr($settings['icontext_icon']['value']) ;?> text-primary"></i>
			<h6 class="my-2">
				<?php echo esc_html($settings['icontext_title']) ;?>
			</h6>
			<p class="mb-0">
				<?php echo esc_html($settings['icontext_description']) ;?>
			</p>
		</div>
		<?php
	}
}
