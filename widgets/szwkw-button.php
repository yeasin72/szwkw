<?php
use \Elementor\Widget_Base;
class Szwkw_Button extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_button';
	}

	public function get_title() {
		return esc_html__( 'SZWKW Button', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'button' ];
	}


    protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'szwkw_button_name',
			[
				'label' => esc_html__( 'Button name', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'name', 'textdomain' ),
				'default' => esc_html__( 'Learn More', 'textdomain' ),
			]
		);
        $this->add_control(
			'external_button_class',
			[
				'label' => esc_html__( 'Class', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'class', 'textdomain' ),
			]
		);
        $this->add_control(
			'szwkw_button_url',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
			]
		);


        $this->end_controls_section();

		

	}


    protected function render() {
		$settings = $this->get_settings_for_display();
        ?>
		<style>
			<?php echo $settings['external_button_class']; ?>{
				display: none;
			}
		</style>
        <div style="cursor: pointer;" class="commonMore" id="szwkwbtn" href=""><span><?php echo $settings['szwkw_button_name']; ?></span><span class="iconfont icon-youjiantou11"></span></div>
        <script>
            $('#szwkwbtn').click(function(){
                $("<?php echo $settings['external_button_class']; ?>").click();
            })
        </script>
        <?php
    }
}