<?php
use \Elementor\Widget_Base;
class Home_About extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_home_about';
	}

	public function get_title() {
		return esc_html__( 'About Section', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-single-post';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'About', 'details', 'list' ];
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
			'about_section_heading',
			[
				'label' => esc_html__( 'Section Heading', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Write section heading', 'textdomain' ),
				'default' => esc_html__( 'About VICORV', 'textdomain' ),
			]
		);
        $this->add_control(
			'about_section_sub_heading',
			[
				'label' => esc_html__( 'Section Sub Heading', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Write sub heading', 'textdomain' ),
				'default' => esc_html__( 'Suppliers of Hall effect current sensors', 'textdomain' ),
			]
		);
        $this->add_control(
			'about_section_description',
			[
				'label' => esc_html__( 'About company', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Write about company', 'textdomain' ),
				'default' => esc_html__( 'Shenzhen VICORV technology Co., Ltd is dedicated to the professional market fields of aviation, railroad and marine, providing customers with comprehensive solutions for current sensors, circuit breakers, contactors, SSPC, solid state power controllers, etc. <br><br> The company has set up an office and factory in Shenzhen, and an import and export company in Hong Kong, as a platform to provide customers with fast, stable, durable, high-quality "one-stop" service, providing a full range of products and solutions in the customer\'s research and development and production process.', 'textdomain' ),
			]
		);
        $this->add_control(
			'about_section_button_name',
			[
				'label' => esc_html__( 'Button name', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Button name', 'textdomain' ),
				'default' => esc_html__( 'Learn More', 'textdomain' ),
			]
		);
        $this->add_control(
			'about_section_button_link',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
			]
		);
        $this->add_control(
			'about_section_image',
			[
				'label' => esc_html__( 'About Section Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);



        $this->end_controls_section();

		

	}


    protected function render() {
			$settings = $this->get_settings_for_display();

		?>
            <div class="box3">
				<img src="img/aslide-logo.png" alt="" class="bg">
				<div class="content1600">
					<div class="box-c">
						<div class="l hoverLi wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
							<div class="pic">
								<img src="<?php echo $settings['about_section_image']['url']; ?>" alt="">
							</div>
						</div>
						<div class="r">
							<div class="index-title wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
								<p class="title"><?php echo $settings['about_section_heading']; ?></p>
							</div>
							<p class="des wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s"><?php echo $settings['about_section_sub_heading']; ?></p>
							<a class="commonMore wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s"
								href="<?php echo $settings['about_section_button_link']['url']; ?>"><span><?php echo $settings['about_section_button_name']; ?></span><span class="iconfont icon-youjiantou11"></span></a>
							<div class="text wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
								<div class="text-box">
									<p><?php echo $settings['about_section_description']; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        <?php
    }
}