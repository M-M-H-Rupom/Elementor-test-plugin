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
		return 'fa fa-price';
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
				'default' => esc_html__( 'Default title', 'elementor_test' ),
				'placeholder' => esc_html__( 'Type your title here', 'elementor_test' ),
			]
		);

		$this->add_control(
			'pricing_column',
			[
				'label' => esc_html__( 'Pricing Column', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
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
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Description' , 'elementor_test' ),
						'show_label' => false,
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
						'default' => esc_html__( 'Url' , 'elementor_test' ),
						'label_block' => true,
					],
					
				],
				// 'default' => [
				// 	[
				// 		'pricing_title' => esc_html__( 'Title', 'elementor_test' ),
				// 		'pricing_description' => esc_html__( 'Item content', 'elementor_test' ),
				// 	],
					
				// ],
				'title_field' => '{{{ pricing_title  }}}',
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
						<h1 class="text-white">Pricing</h1>
					</div>
				</div>

				<div class="row mt-5 align-items-center">
					<div class="col-12 col-sm-10 col-md-8 m-auto col-lg-4 text-center">
						<div class="fdb-box p-4">
							<h2>Hobby</h2>
							<p class="lead">Far far away, behind the word mountains, far from the countries Vokalia.</p>

							<p class="h1 mt-5 mb-5">$99</p>

							<p><a href="https://www.froala.com" class="btn btn-dark">Buy Now</a></p>
						</div>
					</div>

					<div class="col-12 col-sm-10 col-md-8 m-auto col-lg-4 text-center pt-4 pt-lg-0">
						<div class="fdb-box px-4 pt-5">
							<h2>Advanced</h2>
							<p class="lead">Separated they live in Bookmarksgrove right at the coast, a large language ocean.</p>

							<p class="h1 mt-5 mb-5">$299</p>

							<p><a href="https://www.froala.com" class="btn btn-secondary">Buy Now</a></p>
						</div>
					</div>

					<div class="col-12 col-sm-10 col-md-8 m-auto col-lg-4 text-center pt-4 pt-lg-0">
						<div class="fdb-box p-4">
							<h2>Business</h2>
							<p class="lead">Even the all-powerful Pointing has no control about the blind texts it is an almost life.</p>

							<p class="h1 mb-5 mt-5">$799</p>

							<p><a href="https://www.froala.com" class="btn btn-dark">Buy Now</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
		
	}

	protected function content_template() {
		
	}

	
}