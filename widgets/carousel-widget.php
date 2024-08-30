<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Elementor_carousel_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'carousel_content';
	}

	public function get_title() {
		return esc_html__( 'Carousel', 'elementor_test' );
	}

	public function get_icon() {
		return 'eicon-carousel';
	}

	public function get_categories() {
		return [ 'test-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'carousel_section',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'carousel_title',
			[
				'label' => esc_html__( 'Title', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'title here', 'elementor_test' ),
			]
		);

        

        $this->add_control(
			'carousel_items',
			[
				'label' => esc_html__( 'Carousel List', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'item_switcher',
                        'label' => esc_html__( 'Active', 'elementor_test' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Yes', 'elementor_test' ),
                        'label_off' => esc_html__( 'No', 'elementor_test' ),
                        'return_value' => 'yes',
                        'default' => 'no',
                    ],
                    [
						'name' => 'item_image',
						'label' => esc_html__( 'Image', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
				        ],
					],
					[
						'name' => 'item_title',
						'label' => esc_html__( 'Title', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Title' , 'elementor_test' ),
						'label_block' => true,
					],
                    [
						'name' => 'item_description',
						'label' => esc_html__( 'Description', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'Description' , 'elementor_test' ),
						'label_block' => true,
					],
                    [
						'name' => 'content_color',
						'label' => esc_html__( 'Color', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::COLOR,
                        // 'selectors' => [
                        //         '{{WRAPPER}} .content_color' => 'color: {{VALUE}}',
                        // ],
					],
				],
				'default' => [
					[
						'item_title' => esc_html__( 'Title #1', 'elementor_test' ),
						'item_description' => esc_html__( 'Item content', 'elementor_test' ),
                        'item_switcher' => 'yes',
					],
					[
						'item_title' => esc_html__( 'Title #2', 'elementor_test' ),
						'item_description' => esc_html__( 'Item content', 'elementor_test' ),
					],
				],
				'title_field' => '{{{ item_title }}}',
			]
		);

		$this->end_controls_section();


        $this->start_controls_section(
			'css_section',
			[
				'label' => esc_html__( 'Color', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'elementor_test' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                
            ]
        );

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
       <h3 class="title_color" style="color: <?php echo esc_attr($settings['title_color']); ?>">
	        <?php echo esc_html($settings['carousel_title']); ?>
        </h3>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
                <?php 
                $bs_slide = 0 ;
                $aria_label = 1;
                foreach($settings['carousel_items'] as $a_item_indicator){
                    $active = '';
                    if('yes' == $a_item_indicator['item_switcher']){
                        $active = 'active' ;
                    }
                    ?>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $bs_slide ?>" class="<?php echo $active ?>" aria-current="true" aria-label="<?php echo $aria_label ?>"></button>

                    <?php
                    $bs_slide++ ;
                    $aria_label++ ;
                }
                ?>
			</div>
			<div class="carousel-inner">
                <?php 
                foreach($settings['carousel_items'] as $a_item){
                    $active = '';
                    if('yes' == $a_item['item_switcher']){
                        $active = 'active' ;
                    }
                    ?>
                    <div class="carousel-item <?php echo $active ?>">
                        <img src="<?php echo esc_url($a_item['item_image']['url'] ) ; ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block ">
                            <h5 class="content_color"><?php echo esc_html( $a_item['item_title'] ); ?></h5>
                            <p><?php echo esc_html($a_item['item_description']) ; ?></p>
                        </div>
				    </div>
                    <?php
                }
                ?>
			</div>
			<button class="carousel-control-prev opacity-0" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next opacity-0" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
		<?php
	}
}

