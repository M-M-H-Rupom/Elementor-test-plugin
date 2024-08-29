<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Elementor_demoportfolio_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'demo_portfolio';
	}

	public function get_title() {
		return esc_html__( 'Portfolio', 'elementor_test' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'test-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'portfolio_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_tags',
			[
				'label' => __( 'Show Tags', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor_test' ),
				'label_off' => __( 'Hide', 'elementor_test' ),
				// 'return_value' => 'yes',
				'default' => 'yes',
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
		<div class="show_cat_product">
			<span>Show product</span>
		</div>
        <!-- <div class="demo_product_cat">
            <ul>
                <?php 
                $p_cats = get_terms(array(
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => false,
                ));
                foreach($p_cats as $single_cat){
                    ?> 
                    <li><?php echo $single_cat->name ?></li>
                    <?php
                }
                ?>
                <li></li>
            </ul>
        </div> -->
		<?php
		$postfolios = new WP_Query([
			'posts_per_page'=>-1,
			'post_type'=>'porfolio',
			'post_status'=>'publish'
		]);
		echo '<div class="portfolio-grid portfolio-gallery grid-4 gutter">';
		while($postfolios->have_posts()){
			$postfolios->the_post();
			$image_url  = get_the_post_thumbnail_url(get_the_ID(),'large');
			?>
			<div class="portfolio-item">
				<a href="<?php echo esc_url($image_url)  ;?>" class="portfolio-image popup-gallery"
				title="View details">
				<img src="<?php echo esc_url($image_url)  ;?>" alt="" />
				<div class="portfolio-hover-title">
					<div class="portfolio-content">
						<h6><?php the_title() ;?></h6>
						<div class="portfolio-category">
							<span><?php the_excerpt() ;?></span>
						</div>
					</div>
				</div>
            	</a>
			</div>
			<?php
		}
		echo '</div>';
		wp_reset_query();

	}
}
