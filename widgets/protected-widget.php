<?php
if (! defined('ABSPATH')){
	exit; 
}

class Elementor_protected_Widget extends \Elementor\Widget_Base {

	public function get_name(){
		return 'protectedcontent';
	}
	public function get_title(){
		return esc_html__( 'Protected Content', 'elementor_test' );
	}
	public function get_icon(){
		return 'eicon-protected';
	}
	public function get_categories(){
		return ['test-category'];
	}
	protected function register_controls() {
		$this->start_controls_section(
			'protected_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		
		$this->add_control(
			'password',
			[
				'label' => esc_html__( 'Password', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Password', 'elementor_test' ),
			]
		);
        $this->add_control(
			'message',
			[
				'label' => esc_html__( 'Message', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Message', 'elementor_test' ),
			]
		);

        $this->add_control(
			'protected_message',
			[
				'label' => esc_html__( 'Protected Message', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Protected Message', 'elementor_test' ),
			]
		);
       
		$this->end_controls_section();      

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>
        <p><?php echo $settings['message']?></p>
        <div>
            <form action="<?php echo the_permalink() ?>" method="POST">
                <input type="hidden" name="p_hidden" value="<?php echo md5($settings['password']) ?>">
                <label for="">
                    <span>Input Password</span>
                    <input type="password" name="p_password" id="">
                </label>
                <button type="submit">Submit</button>
            </form>
        </div>
        <?php
		
	}

	protected function content_template() {
	
	}
}
