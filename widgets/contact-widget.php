<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Elementor_contact_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'contact_widget';
	}

	public function get_title() {
		return esc_html__( 'Contact', 'elementor_test' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	public function get_categories() {
		return [ 'test-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'contact_content',
			[
				'label' => esc_html__( 'Content', 'elementor_test' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'contact_title',
			[
				'label' => esc_html__( 'Title', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Contact Us', 'elementor_test' ),
			]
		);

        $this->add_control(
			'contact_description',
			[
				'label' => esc_html__( 'Description', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Description', 'elementor_test' ),
			]
		);

        $this->add_control(
			'items',
			[
				'label' => esc_html__( 'Field item', 'elementor_test' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
						'name' => 'field_label',
						'label' => esc_html__( 'Field label', 'elementor_test' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Field label', 'elementor_test' ),
					],
                    [
						'name' => 'field_type',
						'label' => esc_html__( 'Field Type', 'elementor_test' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'text',
                        'options' => [
                            'text' => esc_html__( 'Text', 'elementor_test' ),
                            'textarea' => esc_html__( 'Textarea', 'elementor_test' ),
                        ],
					],
					[
						'name' => 'text_field',
						'label' => esc_html__( 'Text', 'elementor_test' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'condition' => [
                            'field_type' => 'text',
                        ],
                        'default' => esc_html__( 'Text', 'elementor_test' ),
					],
                    [
						'name' => 'textarea_field',
						'label' => esc_html__( 'Textarea', 'elementor_test' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'condition' => [
                            'field_type' => 'textarea',
                        ],
                        'default' => esc_html__( 'Textarea', 'elementor_test' ),
					],
                   
				],
				'default' => [
					[
						'text_field' => esc_html__( 'Field', 'elementor_test' ),
					],
					[
						'text_field' => esc_html__( 'Field', 'elementor_test' ),
					],
				],
				'title_field' => 'Field',
			]
		);

   
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>
        <section class="fdb-block py-0">
            <div class="container py-5 my-5" style="background-image: url(imgs/shapes/9.svg);">
                <div class="row py-5">
                    <div class="col py-5">
                        <div class="fdb-box fdb-touch">
                            <div class="row text-center justify-content-center">
                                <div class="col-12 col-md-9 col-lg-7">
                                    <h1><?php echo esc_html($settings['contact_title']) ?></h1>
                                    <p class="lead"><?php echo esc_html($settings['contact_description']) ?></p>
                                </div>
                            </div>

                            <div class="row justify-content-center pt-4">
                                <div class="col-12 col-md-8">
                                    <form>
                                        <?php 
                                        foreach($settings['items'] as $item_index => $a_item){
                                            if($a_item['field_type'] == 'text'){
                                                ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <span> <?php echo $a_item['field_label'] ?></span>
                                                    </div>
                                                </div>
                                                <div class="row mt-1 mb-4">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Text" name="input_text[<?php echo $item_index ?>]">
                                                    </div>
                                                </div>
                                                <p><?php echo $item_index ?></p>
                                                <?php
                                            }else{
                                                ?>
                                                <div class="row mt-1 mb-4">
                                                    <div class="col">
                                                        <textarea class="form-control" name="input_massage[<?php echo $item_index ?>]" rows="3" placeholder="How can we help?"></textarea>
                                                    </div>
                                                </div>
                                                <p><?php echo $item_index ?></p>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                        }
                                        ?>
                                        <div class="row mt-4">
                                            <div class="col text-center">
                                                <input type="submit" value="Send"  class="btn btn-primary" id="submit_massage" name="send_massage">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>              
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
	}
}
