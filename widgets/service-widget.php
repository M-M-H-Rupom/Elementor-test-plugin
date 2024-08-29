<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Elementor_service_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service_widget';
	}

	public function get_title() {
		return esc_html__( 'Service', 'elementor_test' );
	}

	public function get_icon() {
		return 'eicon-welcome';
	}

	public function get_categories() {
		return [ 'test-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'service_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'service_icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				
			]
		);

        $this->add_control(
			'service_label',
			[
				'label' => esc_html__( 'Label', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '00', 'elementor_test' ),
			]
		);
        
        $this->add_control(
			'service_title',
			[
				'label' => esc_html__( 'Title', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'elementor_test' ),
			]
		);

        $this->add_control(
			'service_des',
			[
				'label' => esc_html__( 'Description', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Description', 'elementor_test' ),
			]
		);
   

       
		$this->end_controls_section();

		$this->start_controls_section(
			'service_style',
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
        <div class="d-flex flex-column justify-content-center align-items-center text-center mx-auto">
            <button type="button" class="btn btn-primary position-relative rounded-circle py-3 px-4">
                icon
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    01
                    <span class="visually-hidden">unread messages</span>
                </span>
            </button>
            <div class="steps-dashed mb-md-5 mb-3 rounded-circle bg-gray p-4" style="width:15%">
                <i class="<?php echo esc_attr($settings['service_icon']['value']) ;?> icon-lg"></i>
                <span class="step-number">
                    <?php echo esc_html($settings['service_label']) ;?>
                </span>
            </div>
            <div class="steps-info">
                <h6 class="mb-3"><?php echo esc_html($settings['service_title']) ;?></h6>
                <p><?php echo esc_html($settings['service_des']) ;?></p>
            </div>
        </div>


        <?php
	}
}
