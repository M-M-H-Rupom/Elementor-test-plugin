<?php
if (! defined('ABSPATH')){
	exit; 
}

class Elementor_dualheading_Widget extends \Elementor\Widget_Base {

	public function get_name(){
		return 'dualheading';
	}
	public function get_title(){
		return esc_html__( 'Dual Heading', 'elementor_test' );
	}
	public function get_icon(){
		return 'eicon-heading';
	}
	public function get_categories(){
		return ['test-category'];
	}
	protected function register_controls() {
		$this->start_controls_section(
			'dualheading_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		
		$this->add_control(
			'heading_one',
			[
				'label' => esc_html__( 'Heading One', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Heading One', 'elementor_test' ),
			]
		);
        $this->add_control(
			'heading_two',
			[
				'label' => esc_html__( 'Heading Two', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Heading Two', 'elementor_test' ),
			]
		);
        $this->add_control(
			'text_align',
			[
				'label' => esc_html__( 'Text Align', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'left' => esc_html__( 'Left', 'elementor_test' ),
					'center' => esc_html__( 'Center', 'elementor_test' ),
					'right' => esc_html__( 'Right', 'elementor_test' ),
				],
				'selectors' => [
					'{{WRAPPER}} .demo_heading' => 'text-align: {{VALUE}};',
				],
			]
		);

        $this->add_control(
            'heading_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'elementor_test' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1' => esc_html__( 'H1', 'elementor_test' ),
                    'h2' => esc_html__( 'H2', 'elementor_test' ),
                    'h3' => esc_html__( 'H3', 'elementor_test' ),
                    'h4' => esc_html__( 'H4', 'elementor_test' ),
                    'h5' => esc_html__( 'H5', 'elementor_test' ),
                    'h6' => esc_html__( 'H6', 'elementor_test' ),
                ],
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
			'dualheading_style',
			[
				'label' => esc_html__( 'Heading One', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_control(
			'heading_one_color',
			[
				'label' => esc_html__( 'Color', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading_one_text' => 'color: {{VALUE}}',
                ],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography_head_one',
				'selector' => '{{WRAPPER}} .heading_one_text',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'dualheading_2_style',
			[
				'label' => esc_html__( 'Heading Two', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'heading_two_color',
			[
				'label' => esc_html__( 'Heading Two', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading_two_text' => 'color: {{VALUE}}',
                ],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography_head_two',
				'selector' => '{{WRAPPER}} .heading_two_text',
			]
		);

		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>
        <<?php echo $settings['heading_tag'] ?> class="demo_heading">
            <span class="heading_one_text"><?php echo esc_html($settings['heading_one']) ?></span>
            <span class="heading_two_text"><?php echo esc_html($settings['heading_two']) ?></span>
        </<?php echo $settings['heading_tag'] ?>>
        <?php
		
	}

	protected function content_template() {
		?>
        <{{settings.heading_tag}} class="demo_heading">
            <span class="heading_one_text">{{settings.heading_one}}</span>
            <span class="heading_two_text">{{settings.heading_two}}</span>
        </{{settings.heading_tag}}>
        <?php
	}
}
