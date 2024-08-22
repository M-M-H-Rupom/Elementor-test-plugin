<?php
if (! defined('ABSPATH')){
	exit; 
}

class Elementor_features_Widget extends \Elementor\Widget_Base {

	public function get_name(){
		return 'Features';
	}
	public function get_title(){
		return esc_html__( 'Features', 'elementor_test' );
	}
	public function get_icon(){
		return 'eicon-kit-details';
	}
	public function get_categories(){
		return ['test-category'];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'features_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'dev_title',
			[
				'label' => esc_html__( 'Title', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'elementor_test' ),
            ],
		);

        $this->add_control(
			'dev_description',
			[
				'label' => esc_html__( 'Description', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'elementor_test' ),
				'placeholder' => esc_html__( 'Type your description here', 'elementor_test' ),
			]
		);

        $this->add_control(
			'features_list',
			[
				'label' => esc_html__( 'Feature List', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'feature_title',
						'label' => esc_html__( 'Title', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Title' , 'elementor_test' ),
						'label_block' => true,
					],
                    [
						'name' => 'feature_description',
						'label' => esc_html__( 'Description', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'Description' , 'elementor_test' ),
						'label_block' => true,
					],
					
				],
				'default' => [
					[
						'feature_title' => esc_html__( 'Feature One', 'elementor_test' ),
						'feature_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'elementor_test' ),
					],
					[
						'feature_title' => esc_html__( 'Feature Two', 'elementor_test' ),
						'feature_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'elementor_test' ),
					],
				],
				'title_field' => '{{{ feature_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <section class="fdb-block">
            <div class="container">
                <div class="row align-items-center pb-xl-5">
                    <div class="col-12 col-md-7 col-xl-5">
                        <h1><?php echo esc_html( $settings['dev_title'] ); ?></h1>
                        <p class="lead"><?php echo esc_html( $settings['dev_description'] ); ?></p>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 m-sm-auto mr-md-0 ml-md-auto pt-4 pt-md-0">
                        <img alt="image" class="img-fluid" src="<?php echo plugins_url( "../assets/images/developer.svg", __FILE__ ) ?>">
                    </div>
                </div>

                <div class="row pt-5 m-auto">
                    <?php 
                    foreach($settings['features_list'] as $feature_item){
                    ?>
                    <div class="col-12 col-sm-6 col-md-3">
                        <h3><strong><?php echo $feature_item['feature_title'] ?></strong></h3>
                        <p><?php echo $feature_item['feature_description'] ?></p>
                    </div>
                    <?php    
                    }
                    ?>
                </div>
            </div>
        </section>
		<?php
	}

	// protected function content_template() {
    
	// }
}
