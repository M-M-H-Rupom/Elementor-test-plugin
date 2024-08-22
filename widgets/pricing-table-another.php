<?php
if (! defined('ABSPATH')){
	exit; 
}

class Elementor_pricing_another_Widget extends \Elementor\Widget_Base {

	public function get_name(){
		return 'pricing_table_another';
	}
	public function get_title(){
		return esc_html__( 'Pricing Another', 'elementor_test' );
	}
	public function get_icon(){
		return 'eicon-price-table';
	}
	public function get_categories(){
		return ['test-category'];
	}
	
	protected function register_controls() {
		$this->start_controls_section(
			'widget_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'price_title',
			[
				'label' => esc_html__( 'Title', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Pricing', 'elementor_test' ),
				'placeholder' => esc_html__( 'Title', 'elementor_test' ),
			]
		);

		$this->add_control(
			'pricing_column',
			[
				'label' => esc_html__( 'Pricing Column', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'pricing_featured',
						'label' => esc_html__( 'Featured', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Yes', 'elementor_test' ),
						'label_off' => esc_html__( 'No', 'elementor_test' ),
						'return_value' => 'yes',
						'default' => false,
					],
					[
						'name' => 'pricing_title',
						'label' => esc_html__( 'Title', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Title' , 'elementor_test' ),
						'label_block' => true,
					],
                    [
						'name' => 'item_price',
						'label' => esc_html__( 'Price', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						// 'label_block' => true,
						// 'min' => 0,
						// 'max' => 100,
						// 'step' => 5,
						'default' => 99,
					],
					[
						'name' => 'pricing_description',
						'label' => esc_html__( 'Description', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'Description' , 'elementor_test' ),
						'label_block' => true,
					],
					[
                        'name' => 'list_items',
						'label' => esc_html__( 'Items', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'label_block' => true,
                    ],
					[
						'name' => 'pricing_button',
						'label' => esc_html__( 'Button', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Buy now' , 'elementor_test' ),
						'label_block' => true,
					],
					[
						'name' => 'pricing_button_url',
						'label' => esc_html__( 'Url', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::URL,
						'default' => [
							'url' => '#',
							'is_external' => false,
							'nofollow' => false,
						],
						'label_block' => true,
					],
				],
				'default' => [
					[
						'pricing_title' => esc_html__( 'Hobby', 'elementor_test' ),
						'pricing_description' => esc_html__( 'Copy Writers ambushed her, made her drunk.', 'elementor_test' ),
                        'list_items' => esc_html__( 'Item 1', 'elementor_test' ),
					],
					[
						'pricing_title' => esc_html__( 'Advanced', 'elementor_test' ),
						'pricing_description' => esc_html__( 'Separated they live in Bookmarks right.', 'elementor_test' ),
                        'list_items' => esc_html__( 'Item 1', 'elementor_test' ),
					],
					[
						'pricing_title' => esc_html__( 'Business', 'elementor_test' ),
						'pricing_description' => esc_html__( 'A small river named Duden their place.', 'elementor_test' ),
                        'list_items' => esc_html__( 'Item 1', 'elementor_test' ),
					],
				],
				'title_field' => '{{{ pricing_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="fdb-block">
		<div class="container">
			<div class="row text-center">
				<div class="col">
					<h1><?php echo esc_html( $settings['price_title'] ); ?></h1>
				</div>
			</div>

			<div class="row mt-5 align-items-stretch">
				<?php foreach ( $settings['pricing_column'] as $single_item ) {
                     ?>
					<div class="col-12 col-sm-10 col-md-8 col-lg-4 text-left pt-4 pt-lg-0">
						<div class="fdb-box fdb-touch p-5 rounded ">
							<h2>
								<?php echo esc_html( $single_item['pricing_title'] ); ?>
								<strong class="float-xl-right d-lg-block d-xl-inline">
									$<?php echo esc_html( $single_item['item_price'] ); ?>
								</strong>
							</h2>
							<p class="lead"><em><?php echo esc_html( $single_item['pricing_description'] ); ?></em></p>

                            <p class="text-left pt-4">
								<a href="<?php echo esc_url( $single_item['pricing_button_url']['url'] ); ?>" class="btn btn-primary">
									<?php echo esc_html( $single_item['pricing_button'] ); ?>
								</a>
							</p>

							<ul class="text-left pl-3 mt-5 mb-5 list-unstyled">
                                <?php 
                                $list_items = explode("\n",trim($single_item['list_items']));
                                foreach($list_items as $a_item){
                                    ?>
                                    <li><?php echo esc_html($a_item); ?></li>
                                    <?php
                                }
                                ?>
							</ul>

							
						</div>
					</div>
				<?php }; ?>
			</div>
		</div>
	</section>
		<?php
	}

	protected function content_template() {
		
	}
}
