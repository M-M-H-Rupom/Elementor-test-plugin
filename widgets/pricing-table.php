<?php
if (! defined('ABSPATH')){
	exit; 
}

class Elementor_pricing_Widget extends \Elementor\Widget_Base {

	public function get_name(){
		return 'pricing_table';
	}
	public function get_title(){
		return esc_html__( 'Pricing table', 'elementor_test' );
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
						'name' => 'pricing_description',
						'label' => esc_html__( 'Description', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'Description' , 'elementor_test' ),
						'show_label' => false,
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
						'pricing_title' => esc_html__( 'Basic Plan', 'elementor_test' ),
						'pricing_description' => esc_html__( 'Far far away, behind the word mountains, far from the countries Vokalia .for begginers', 'elementor_test' ),
					],
					[
						'pricing_title' => esc_html__( 'Advanced Plan', 'elementor_test' ),
						'pricing_description' => esc_html__( 'Separated they live in Bookmarksgrove right at the coast, a large language ocean.', 'elementor_test' ),
					],
					[
						'pricing_title' => esc_html__( 'Pro Plan', 'elementor_test' ),
						'pricing_description' => esc_html__( 'lead">Even the all-powerful Pointing has no control about the blind texts it is an almost life.', 'elementor_test' ),
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
		<section class="fdb-block" style="background-image: url(<?php echo plugins_url( "../assets/images/pricing_red.svg", __FILE__ ) ?>)">
			<div class="container">
				<div class="row text-center">
					<div class="col">
						<h1 class="text-white"><?php echo esc_html($settings['price_title']); ?></h1>
					</div>
				</div>

				<div class="row mt-5 align-items-center">
					<?php foreach ($settings['pricing_column'] as $pricing_item) {
						$button_color_class = $pricing_item['pricing_featured']? 'primary' : 'dark';
						$featured_pricing_padding = $pricing_item['pricing_featured']? 'px-4 py-5' : 'p-4';
						?>
						<div class="col-12 col-sm-10 col-md-8 m-auto col-lg-4 text-center">
							<div class="fdb-box <?php echo esc_attr($featured_pricing_padding) ?> ">
								<h2><?php echo esc_html($pricing_item['pricing_title']); ?></h2>
								<p class="lead"><?php echo esc_html($pricing_item['pricing_description']); ?></p>
								<p class="h1 mt-5 mb-5">$<?php echo esc_html($pricing_item['item_price']); ?></p>
								<p>
									<a href="<?php echo esc_url($pricing_item['pricing_button_url']['url']); ?>" class="btn btn-<?php echo esc_attr($button_color_class) ?>">
										<?php echo esc_html($pricing_item['pricing_button']); ?>
									</a>
								</p>
							</div>
						</div>
					<?php }; ?>
				</div>
			</div>
		</section>

		<?php
	}

	protected function content_template() {
		// Leave empty or implement JS-based dynamic rendering if needed
	}
}
