<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Elementor_personalcontent_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'personal_content';
	}

	public function get_title() {
		return esc_html__( 'Personal Content', 'elementor_test' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'test-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'personal_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content_title',
			[
				'label' => esc_html__( 'Title', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'elementor_test' ),
				'placeholder' => esc_html__( 'Title', 'elementor_test' ),
			]
		);

        $this->add_control(
			'content_description',
			[
				'label' => esc_html__( 'Description', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Description', 'elementor_test' ),
				'placeholder' => esc_html__( 'Here the Description', 'elementor_test' ),
			]
		);

        $this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Button', 'elementor_test' ),
				'placeholder' => esc_html__( 'Button', 'elementor_test' ),
			]
		);

        $this->add_control(
			'content_btn',
			[
				'label' => esc_html__( 'Button', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'button_type' => 'success',
				'text' => esc_html__( 'Button', 'elementor_test' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'portfolio_style',
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
        <section class="fdb-block text-center">
            <div class="col-fill-right" style="background-image: url(<?php echo plugins_url( "../assets/images/6.jpg", __FILE__ ) ?>"></div>
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 col-md-5 text-center">
                        <h1><?php echo $settings['content_title'] ?></h1>
                        <p class="lead"><?php echo $settings['content_description'] ?></p>
                        <p class="mt-4 mb-5"><a class="btn btn-secondary" href="#"><?php echo $settings['button_text'] ?></a></p>

                        <p>Follow us on</p>
                        <p>
                        <a href="#" class="mx-2 text-secondary"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="mx-2 text-secondary"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="mx-2 text-secondary"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" class="mx-2 text-secondary"><i class="fab fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#" class="mx-2 text-secondary"><i class="fab fa-google" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}
