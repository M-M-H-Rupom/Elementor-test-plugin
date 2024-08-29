<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Elementor_teammember_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'team_member';
	}

	public function get_title() {
		return esc_html__( 'Team Member', 'elementor_test' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'test-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'teammember_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'member_image',
			[
				'label' => esc_html__( 'Member Image', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'facebook',
			[
				'label' => esc_html__( 'Facebook', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Facebook', 'elementor_test' ),
			]
		);
        $this->add_control(
			'member_name',
			[
				'label' => esc_html__( 'Name', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Name', 'elementor_test' ),
			]
		);

        $this->add_control(
			'member_description',
			[
				'label' => esc_html__( 'Description', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Description', 'elementor_test' ),
			]
		);

        $this->add_control(
			'twitter',
			[
				'label' => esc_html__( 'Twitter', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Twitter', 'elementor_test' ),
			]
		);

        $this->add_control(
			'linkedin',
			[
				'label' => esc_html__( 'Linkedin', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Linkedin', 'elementor_test' ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'team_member_style',
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
        <div class="team-hover card border-0 mb-4">
            <img class="card-img rounded" src="<?php echo  esc_url($settings['member_image']['url']) ;?>" alt="">
            <div class="team-info text-center">
                <div class="team-title">
                    <h6><?php echo esc_html($settings['member_name']) ;?></h6>
                    <p><?php echo esc_html($settings['member_description']) ;?></p>
                </div>
                <div class="team-social-links">
                    <a href="<?php echo esc_url($settings['facebook'])  ;?>"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo esc_url($settings['twitter'])  ;?>"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo esc_url($settings['linkedin'])  ;?>"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <!-- <div class="bg-image position-relative" style="max-width: 22rem;">
  			<img src="https://placehold.co/600x400" class="w-100" />
			<div class="mask position-absolute top-100 start-50 text-light d-flex justify-content-center flex-column text-center" style="background-color: rgba(0, 0, 0, 0.5)">
				<h4>Custom heading</h4>
				<p class="m-0">paragraph</p>
			</div>
		</div> -->
        <?php
		
	}
}
