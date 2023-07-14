<?php
use \Elementor\Widget_Base;
class Home_Technical_Support extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_home_technical';
	}

	public function get_title() {
		return esc_html__( 'Technical Support Section', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-preferences';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'Support', 'grid', 'list' ];
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
			'support_section_heading',
			[
				'label' => esc_html__( 'Section Heading', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Write section heading', 'textdomain' ),
				'default' => esc_html__( 'Technical Support', 'textdomain' ),
			]
		);
        $this->add_control(
			'support_section_button_name',
			[
				'label' => esc_html__( 'Button name', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Button name', 'textdomain' ),
				'default' => esc_html__( 'Learn More', 'textdomain' ),
			]
		);
        $this->add_control(
			'support_section_button_link',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
			]
		);
        

        $this->add_control(
			'support_list_heading',
			[
				'label' => esc_html__( 'Supports', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'support_items',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'support_details',
						'label' => esc_html__( 'Support details', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'placeholder' => esc_html__( 'Details', 'textdomain' ),
						'default' => esc_html__( 'Shenzhen VICORV technology Co., Ltd is dedicated to the professional market
                        fields of aviation, railroad and ...', 'textdomain' ),
					],
                    [
                        'name' => 'support_image',
                        'label' => esc_html__( 'Item Image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
						'name' => 'support_item_button_label',
						'label' => esc_html__( 'Button label', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Label', 'textdomain' ),
						'default' => esc_html__( 'Learn More', 'textdomain' ),
					],
                    [
                        'name' => 'support_item_button_link',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
				'default' => [
					[
						'support_details' => esc_html__( 'Shenzhen VICORV technology Co., Ltd is dedicated to the professional market
                        fields of aviation, railroad and ...', 'textdomain' ),
						'support_item_button_label' => esc_html__( 'Learn More', 'textdomain' ),
						'support_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					
				]
			]
		);


        $this->end_controls_section();

		

	}


    protected function render() {
			$settings = $this->get_settings_for_display();
        ?>
            <div class="box6">
				<div class="content1600">
					<div class="box-t">
						<div class="index-title wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
							<p class="title"><?php echo $settings['support_section_heading']; ?></p>
							<div class="line"></div>
						</div>
						<a class="commonMore wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s"
							href="<?php echo $settings['support_section_button_link']['url']; ?>"><span><?php echo $settings['support_section_button_name']; ?></span><span class="iconfont icon-youjiantou11"></span></a>
					</div>
					<div class="box-c wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
						<div class="swiper">
							<ul class="list swiper-wrapper">
                                <?php foreach ($settings['support_items'] as $item) { ?>
								<li class="hoverLi swiper-slide">
									<a href="<?php echo $item['support_item_button_link']['url']; ?>">
										<div class="pic">
											<img src="<?php echo $item['support_image']['url']; ?>" alt="" class="imgScale">
											<div class="btn">
												<span><?php echo $item['support_item_button_label']; ?></span>
												<span class="iconfont icon-youjiantou11"></span>
											</div>
										</div>
										<div class="text-box">
                                        <?php echo $item['support_details']; ?>
										</div>
									</a>
								</li>
                                <?php } ?>
							</ul>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
        <?php
    }
}