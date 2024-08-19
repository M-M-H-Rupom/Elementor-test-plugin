<?php
if (! defined('ABSPATH')){
	exit; 
}

class Elementor_demo_Widget extends \Elementor\Widget_Base {

	public function get_name(){
		return 'controlwidget';
	}
	public function get_title(){
		return esc_html__( 'Control widget', 'elementor_test' );
	}
	public function get_icon(){
		return 'fa fa-image';
	}
	public function get_categories(){
		return ['test-category'];
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'demo_number',
			[
				'label' => esc_html__( 'Number', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'price',
			[
				'label' => esc_html__( 'Price', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 50,
				'step' => 2,
				'default' => 5,
			]
		);

		$this->end_controls_section();
		// wysiwyg content
		$this->start_controls_section(
			'content_wysiwyg',
			[
				'label' => esc_html__( 'WYSIWYG', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'demo_item_description',
			[
				'label' => esc_html__( 'Demo content', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__('Type your description here', 'elementor_test'),
			]
		);
		$this->end_controls_section();

		
		$this->start_controls_section(
			'demo_content_section',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'demo_list',
			[
				'label' => esc_html__( 'Repeater List', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => esc_html__( 'Title', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'elementor_test' ),
						'label_block' => true,
					],
					[
						'name' => 'list_content',
						'label' => esc_html__( 'Content', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'List Content' , 'elementor_test' ),
						'show_label' => false,
					],
				],
				'default' => [
					[
						'list_title' => esc_html__( 'Title 1', 'elementor_test' ),
						'list_content' => esc_html__( 'Item content. change this text', 'elementor_test' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

		// custom code 
		$this->start_controls_section(
			'content_custom_code',
			[
				'label' => esc_html__( 'Custom code', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'custom_html',
			[
				'label' => esc_html__( 'Custom HTML', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'html',
				'rows' => 25,
			]
		);

		$this->end_controls_section();
		// switcher 
		$this->start_controls_section(
			'content_switcher',
			[
				'label' => esc_html__( 'Switcher', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'demo_switcher',
			[
				'label' => esc_html__( 'Show Switcher', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
		// data and time 
		$this->start_controls_section(
			'content_date',
			[
				'label' => esc_html__( 'Date Time', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'date_time',
			[
				'label' => esc_html__( 'Date Time', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
			]
		);

		$this->end_controls_section();
		// animation
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Animation', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'entrance_animation',
			[
				'label' => esc_html__( 'Entrance Animation', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'prefix_class' => 'animated ',
			]
		);
		$this->add_control(
			'exit_animation',
			[
				'label' => esc_html__( 'Exit Animation', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::EXIT_ANIMATION,
				'prefix_class' => 'animated ',
			]
		);
		

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<span class="price">
			<?php echo $settings['price']; ?>
		</span>
		<div class="description">
			<?php echo $settings['demo_item_description']; ?>
		</div>
		<div class="">
			<?php echo $settings['custom_html']; ?>
		</div>
		<div class="">
			<h2> <?php echo $settings['demo_switcher']; ?> </h2>
		</div>
		<div class="<?php echo esc_attr( $settings['entrance_animation'] ); ?>">
			Lorem, ipsum dolor.
		</div>
		<div class="<?php echo esc_attr( $settings['exit_animation'] ); ?>">
			exit animation
		</div>
		<?php
		if ( $settings['demo_list'] ) {
			foreach (  $settings['demo_list'] as $index => $item ) {
				$key = $this->get_repeater_setting_key('list_title','demo_list',$index);
				$this->add_inline_editing_attributes($key);
				echo '<h3 '.$this->get_render_attribute_string($key).'>'. $item['list_title'] . '</h3>';
				echo '<p>' . $item['list_content'] . '</p>';
			}
		}
		$date_time = strtotime( $settings['date_time'] );
		$date_time_in_days = $date_time / DAY_IN_SECONDS;
		?>
		<p><?php printf( esc_html__( 'After %s days.', 'elementor_test' ), $date_time_in_days ); ?></p>
		<?php
	}

	protected function content_template() {
		?>
		<# 
			if ( settings.demo_list.length ) { #>
				<# _.each( settings.demo_list, function( item ) { #>
					<h3>{{{ item.list_title }}}</h3>
					<p>{{{ item.list_content }}}</p>
				<# }); #>
			<# } 
		#>
		<span class="price">
			{{{ settings.price }}}
		</span>
		<div class="description">
			{{{ settings.demo_item_description }}}
		</div>
		<div class="">
			{{{ settings.custom_html }}}
		</div>
		<div class="">
			{{{ settings.demo_switcher }}}
		</div>
		<div class="{{ settings.entrance_animation }}">
			Lorem, ipsum dolor.
		</div>
		<div class="{{ settings.exit_animation }}">
			exit animation
		</div>
		<#
			const date_time = new Date( settings.date_time );
			const now_date = new Date();
			const date_time_in_days = Math.floor( ( date_time - now_date ) / 86400000 ); 
		#>
		<p>After {{{ date_time_in_days }}} days. </p>
		
		<?php
	}

	
}