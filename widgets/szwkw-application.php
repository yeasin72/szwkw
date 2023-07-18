<?php
use \Elementor\Widget_Base;
class Home_Application extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_home_applications';
	}

	public function get_title() {
		return esc_html__( 'Application Section', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-gallery-masonry';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'Application', 'grid', 'list' ];
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
			'app_section_heading',
			[
				'label' => esc_html__( 'Section Heading', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Write section heading', 'textdomain' ),
				'default' => esc_html__( 'Applications', 'textdomain' ),
			]
		);
        $this->add_control(
			'app_section_description',
			[
				'label' => esc_html__( 'Section Description', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Write section description', 'textdomain' ),
				'default' => esc_html__( 'Enhanced design solution evaluation and assistance with functional testing services', 'textdomain' ),
			]
		);
        $this->add_control(
			'app_section_button_name',
			[
				'label' => esc_html__( 'Button name', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Button name', 'textdomain' ),
				'default' => esc_html__( 'Learn More', 'textdomain' ),
			]
		);
        $this->add_control(
			'app_section_button_link',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
			]
		);
        $this->add_control(
			'app_section_bg_image',
			[
				'label' => esc_html__( 'Section Background', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);

        $this->add_control(
			'application_list_heading',
			[
				'label' => esc_html__( 'Applications', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'application_items',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'application_name',
						'label' => esc_html__( 'Application name', 'textdomain' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Motor Control', 'textdomain' ),
                        'placeholder' => esc_html__( 'App name', 'textdomain' ),
					],
					[
						'name' => 'application_details',
						'label' => esc_html__( 'App details', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'placeholder' => esc_html__( 'App Details', 'textdomain' ),
						'default' => esc_html__( 'Our integrated current sensor ICs can handle your high
                        voltages, while our digital position sensors provide robustness and
                        reliability for your motor drives', 'textdomain' ),
					],
                    [
                        'name' => 'application_image',
                        'label' => esc_html__( 'App Image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
						'name' => 'app_item_button_label',
						'label' => esc_html__( 'Button label', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Label', 'textdomain' ),
						'default' => esc_html__( 'Learn More', 'textdomain' ),
					],
                    [
                        'name' => 'app_item_button_link',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
				'default' => [
					[
						'application_name' => esc_html__( 'Motor Control', 'textdomain' ),
						'application_details' => esc_html__( 'Our integrated current sensor ICs can handle your high
                        voltages, while our digital position sensors provide robustness and
                        reliability for your motor drives', 'textdomain' ),
						'app_item_button_label' => esc_html__( 'Learn More', 'textdomain' ),
						'application_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'application_name' => esc_html__( 'Motor Control', 'textdomain' ),
						'application_details' => esc_html__( 'Our integrated current sensor ICs can handle your high
                        voltages, while our digital position sensors provide robustness and
                        reliability for your motor drives', 'textdomain' ),
						'app_item_button_label' => esc_html__( 'Learn More', 'textdomain' ),
						'application_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'application_name' => esc_html__( 'Motor Control', 'textdomain' ),
						'application_details' => esc_html__( 'Our integrated current sensor ICs can handle your high
                        voltages, while our digital position sensors provide robustness and
                        reliability for your motor drives', 'textdomain' ),
						'app_item_button_label' => esc_html__( 'Learn More', 'textdomain' ),
						'application_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'application_name' => esc_html__( 'Motor Control', 'textdomain' ),
						'application_details' => esc_html__( 'Our integrated current sensor ICs can handle your high
                        voltages, while our digital position sensors provide robustness and
                        reliability for your motor drives', 'textdomain' ),
						'app_item_button_label' => esc_html__( 'Learn More', 'textdomain' ),
						'application_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'application_name' => esc_html__( 'Motor Control', 'textdomain' ),
						'application_details' => esc_html__( 'Our integrated current sensor ICs can handle your high
                        voltages, while our digital position sensors provide robustness and
                        reliability for your motor drives', 'textdomain' ),
						'app_item_button_label' => esc_html__( 'Learn More', 'textdomain' ),
						'application_image' => [
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
            <style>
				
                .box2{
                    position: relative;
                    padding: 123px 0 158px;
                    background-image: url(<?php echo $settings['app_section_bg_image']['url']; ?>);
                    background-position: left bottom;
                    background-size: 100% auto;
                    background-repeat: no-repeat;
                    z-index: 2;
                }
            </style>
        
						<div class="box2">
				<div class="content1600">
					<div class="box-t wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
						<div class="index-title">
							<p class="title"><?php echo $settings['app_section_heading']; ?></p>
							<div class="line"></div>
						</div>
						<div class="des wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
							<p><?php echo $settings['app_section_description']; ?></p>
						</div>
						<a class="commonMore wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s"
							href="<?php echo $settings['app_section_button_link']['url']; ?>"><span><?php echo $settings['app_section_button_name']; ?></span><span class="iconfont icon-youjiantou11"></span></a>
					</div>
					<div class="box-c">
						<div class="swiper">
							<div class="swiper-wrapper">
                                <?php foreach ( $settings['application_items'] as $index => $item ) : ?>

                                <?php 
                                    if ($index == 2) {
                                        ?>
                                            <div class="c swiper-slide">
                                        <?php }
                                        if($index == 0) {
                                            ?>
                                            <div class="l swiper-slide">
                                                <?php
                                        } if($index == 3) {
                                            ?>
                                            <div class="r swiper-slide">
                                            <?php
                                        } ?>
									<div class="picBox hoverLi wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
										<a href="<?php echo $item['app_item_button_link']['url']; ?>">
											<div class="pic">
												<img src="<?php echo $item['application_image']['url']; ?>" alt="" class="imgScale">
											</div>
											<div class="picContainer">
												<p class="text-title"><?php echo $item['application_name']; ?></p>
												<p class="text-des"><?php echo $item['application_details']; ?></p>
												<div class="commonMore" href="<?php echo $item['app_item_button_link']['url']; ?>"><span><?php echo $item['app_item_button_label']; ?></span><span
														class="iconfont icon-youjiantou11"></span></div>
											</div>
										</a>
									</div>
                                    
                                
                                    <?php 
                                    if ($index == 2) {
                                        ?>
                                            </div>
                                        <?php }
                                        if($index == 1) {
                                            ?>
                                            </div>
                                                <?php
                                        } if($index == 4) {
                                            ?>
                                            </div>
                                            <?php
                                        } ?>
								
                                <?php endforeach; ?>
							</div>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		<?php
    }
}