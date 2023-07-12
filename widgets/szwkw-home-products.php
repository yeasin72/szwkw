<?php
use \Elementor\Widget_Base;
class Home_products extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_home_products';
	}

	public function get_title() {
		return esc_html__( 'Home products', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-product-related';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'products', 'list' ];
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
			'section_heading',
			[
				'label' => esc_html__( 'Section Heading', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Write section heading', 'textdomain' ),
				'default' => esc_html__( 'Products', 'textdomain' ),
			]
		);
        $this->add_control(
			'section_description',
			[
				'label' => esc_html__( 'Section Description', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Write section description', 'textdomain' ),
				'default' => esc_html__( '0 to 1000A Hall effect current sensor with integrated conductor', 'textdomain' ),
			]
		);
        $this->add_control(
			'first_tab_button_name',
			[
				'label' => esc_html__( 'First tab button name', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Tab name', 'textdomain' ),
				'default' => esc_html__( 'Hall Sensor', 'textdomain' ),
			]
		);

        $this->add_control(
			'first_tab_heading',
			[
				'label' => esc_html__( 'First tab items', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'first_tab_items',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'tab_item_name',
						'label' => esc_html__( 'Product name', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Switching Hall', 'textdomain' ),
                        'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
					],
					[
						'name' => 'tab_item_description',
						'label' => esc_html__( 'Description', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'placeholder' => esc_html__( 'Product description', 'textdomain' ),
						'default' => esc_html__( 'Economic version for applications in current detection, motor control, position detection, magnetometers, rotary encoders, metal detectors.', 'textdomain' ),
					],
                    [
                        'name' => 'tab_item_image',
                        'label' => esc_html__( 'Product Image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
						'name' => 'tab_item_button_name',
						'label' => esc_html__( 'Button label', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Label', 'textdomain' ),
						'default' => esc_html__( 'Learn More', 'textdomain' ),
					],
                    [
                        'name' => 'tab_item_button_link',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
				'default' => [
					[
						'tab_item_name' => esc_html__( 'Switching Hall', 'textdomain' ),
						'tab_item_description' => esc_html__( 'Economic version for applications in current detection, motor control, position detection, magnetometers, rotary encoders, metal detectors.', 'textdomain' ),
						'tab_item_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'tab_item_name' => esc_html__( 'Switching Hall', 'textdomain' ),
						'tab_item_description' => esc_html__( 'Economic version for applications in current detection, motor control, position detection, magnetometers, rotary encoders, metal detectors.', 'textdomain' ),
						'tab_item_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'tab_item_name' => esc_html__( 'Switching Hall', 'textdomain' ),
						'tab_item_description' => esc_html__( 'Economic version for applications in current detection, motor control, position detection, magnetometers, rotary encoders, metal detectors.', 'textdomain' ),
						'tab_item_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
				]
			]
		);


		$this->add_control(
			'second_tab_button_name',
			[
				'label' => esc_html__( 'Second tab button name', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Tab name', 'textdomain' ),
				'default' => esc_html__( 'Current Chip', 'textdomain' ),
			]
		);

        $this->add_control(
			'second_tab_heading',
			[
				'label' => esc_html__( 'Second tab items', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'second_tab_items',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'tab_item_name',
						'label' => esc_html__( 'Product name', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Switching Hall', 'textdomain' ),
                        'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
					],
					[
						'name' => 'tab_item_description',
						'label' => esc_html__( 'Description', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'placeholder' => esc_html__( 'Product description', 'textdomain' ),
						'default' => esc_html__( 'Economic version for applications in current detection, motor control, position detection, magnetometers, rotary encoders, metal detectors.', 'textdomain' ),
					],
                    [
                        'name' => 'tab_item_image',
                        'label' => esc_html__( 'Product Image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
						'name' => 'tab_item_button_name',
						'label' => esc_html__( 'Button label', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Label', 'textdomain' ),
						'default' => esc_html__( 'Learn More', 'textdomain' ),
					],
                    [
                        'name' => 'tab_item_button_link',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
				'default' => [
					[
						'tab_item_name' => esc_html__( 'Switching Hall', 'textdomain' ),
						'tab_item_description' => esc_html__( 'Economic version for applications in current detection, motor control, position detection, magnetometers, rotary encoders, metal detectors.', 'textdomain' ),
						'tab_item_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'tab_item_name' => esc_html__( 'Switching Hall', 'textdomain' ),
						'tab_item_description' => esc_html__( 'Economic version for applications in current detection, motor control, position detection, magnetometers, rotary encoders, metal detectors.', 'textdomain' ),
						'tab_item_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'tab_item_name' => esc_html__( 'Switching Hall', 'textdomain' ),
						'tab_item_description' => esc_html__( 'Economic version for applications in current detection, motor control, position detection, magnetometers, rotary encoders, metal detectors.', 'textdomain' ),
						'tab_item_image' => [
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
				<div class="box1">
				<div class="content1600">
					<div class="box-t">
						<div class="index-title wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
							<p class="title"><?php echo $settings['section_heading']; ?></p>
							<div class="line"></div>
						</div>
						<div class="box-t-r wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
							<a href="javascript:;" class="active"><?php echo $settings['first_tab_button_name']; ?></a>
							<a href="javascript:;"><?php echo $settings['second_tab_button_name']; ?></a>
						</div>
					</div>
					<p class="des wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s"><?php echo $settings['section_description']; ?></p>
					<div class="box-c wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
						<ul class="list active">

						<?php foreach ( $settings['first_tab_items'] as $item ) { ?>
							<li class="hoverLi">
								<a href="<?php echo $item['tab_item_button_link']['url']; ?>">
									<div class="img">
										<div class="pic">
											<img src="<?php echo $item['tab_item_image']['url']; ?>" alt="" class="imgScale">
										</div>
									</div>
									<div class="text-box">
										<p class="text-title"><?php echo $item['tab_item_name']; ?></p>
										<p class="text-des">
										<?php echo $item['tab_item_description']; ?>
										</p>
									</div>
									<div class="commonMore" href="<?php echo $item['tab_item_button_link']['url']; ?>"><span><?php echo $item['tab_item_button_name']; ?></span><span
											class="iconfont icon-youjiantou11"></span></div>
								</a>
							</li>
							<?php } ?>

							<i></i>
							<i></i>
						</ul>
						<ul class="list">

						<?php foreach ( $settings['second_tab_items'] as $item ) { ?>
							<li class="hoverLi">
								<a href="<?php echo $item['tab_item_button_link']['url']; ?>">
									<div class="img">
										<div class="pic">
											<img src="<?php echo $item['tab_item_image']['url']; ?>" alt="" class="imgScale">
										</div>
									</div>
									<div class="text-box">
										<p class="text-title"><?php echo $item['tab_item_name']; ?></p>
										<p class="text-des">
										<?php echo $item['tab_item_description']; ?>
										</p>
									</div>
									<div class="commonMore" href="<?php echo $item['tab_item_button_link']['url']; ?>"><span><?php echo $item['tab_item_button_name']; ?></span><span
											class="iconfont icon-youjiantou11"></span></div>
								</a>
							</li>
							<?php } ?>

							<i></i>
							<i></i>
						</ul>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$(".box1 .box-t .box-t-r a").click(function() {
			$(this).addClass("active").siblings().removeClass("active")
			$(".box1 .box-c .list").eq($(this).index()).addClass("active").siblings().removeClass("active")
		})
			</script>
		<?php
    }
}