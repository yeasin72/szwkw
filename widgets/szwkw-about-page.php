<?php
use \Elementor\Widget_Base;
class About_Page extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_about_page';
	}

	public function get_title() {
		return esc_html__( 'About Page', 'elementor-addon' );
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




        // About us area

        $this->add_control(
			'news_link',
			[
                        'label' => __( 'News Link', 'elementor-video-widget' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'placeholder' => __( 'news link', 'elementor-video-widget' ),
			]
		);
        $this->add_control(
			'about_us_heading',
			[
				'label' => esc_html__( 'About us heading', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Write heading' ),
				'default' => esc_html__( 'About us', 'textdomain' ),
			]
		);
        $this->add_control(
			'about_us_sub_heading',
			[
				'label' => esc_html__( 'About us su heading', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Write sub heading' ),
				'default' => esc_html__( 'Suppliers Of Hall Effect Current Sensors', 'textdomain' ),
			]
		);
        $this->add_control(
			'about_us_description',
			[
				'label' => esc_html__( 'About company', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Write about company', 'textdomain' ),
				'default' => esc_html__( 'Shenzhen VICORV technology Co., Ltd is dedicated to the professional market fields of aviation, railroad and marine, providing customers with comprehensive solutions for current sensors, circuit breakers, contactors, SSPC, solid state power controllers, etc.The company has set up an office and factory in Shenzhen, and an import and export company in Hong Kong, as a platform to provide customers with fast, stable, durable, high-quality "one-stop" service, providing a full range of products and solutions in the customer\'s research and development and production process.', 'textdomain' ),
			]
		);

        $this->add_control(
			'abut_us_image',
			[
				'label' => esc_html__( 'Abut us image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);

        //supply capacity

        $this->add_control(
			'supply_section_heading',
			[
				'label' => esc_html__( 'Supply Section Heading', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Section heading', 'textdomain' ),
				'default' => esc_html__( 'Supply Capacity', 'textdomain' ),
			]
		);


        $this->add_control(
			'supply_items',
			[
                'label' => esc_html__( 'Supply Items', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'item_name',
                        'label' => esc_html__( 'Name', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Name', 'textdomain' ),
                        'default' => esc_html__( 'Mission', 'textdomain' ),
                    ],
                    [
                        'name' => 'item_image',
                        'label' => esc_html__( 'Item icon', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'item_description',
                        'label' => esc_html__( 'Item Description', 'elementor-addon' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'Description', 'textdomain' ),
                        'default' => esc_html__( 'To achieve both material and spiritual happiness for all members', 'textdomain' ),
                    ],
				],
				'default' => [
					[
                        'item_name' => 'Mission',
                        'item_description' => 'To achieve both material and spiritual happiness for all members',
						'item_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
                        'item_name' => 'Vision',
                        'item_description' => 'Becoming a brand supplier of intelligent distribution device systems in China',
						'item_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
                        'item_name' => 'Values',
                        'item_description' => 'Diligence, dedication, unity, and win-win situation',
						'item_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					
				]
			]
		);


        $this->add_control(
			'supply_capacity_image',
			[
				'label' => esc_html__( 'Supply capacity image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);


        $this->add_control(
			'capacity_list',
			[
                'label' => esc_html__( 'Capacity List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'item_number',
                        'label' => esc_html__( 'Number', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Name', 'textdomain' ),
                        'default' => esc_html__( '01', 'textdomain' ),
                    ],
                    [
                        'name' => 'item_title',
                        'label' => esc_html__( 'Title', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Name', 'textdomain' ),
                        'default' => esc_html__( 'Innovation', 'textdomain' ),
                    ],
                    [
                        'name' => 'item_description',
                        'label' => esc_html__( 'Item Description', 'elementor-addon' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'Description', 'textdomain' ),
                        'default' => esc_html__( 'Continuously innovate to meet market demand, while also innovating one\'s own marketing strategies.', 'textdomain' ),
                    ],
				],
				'default' => [
					[
                        'item_number' => '01',
                        'item_title' => 'Innovation',
						'item_description' => 'Continuously innovate to meet market demand, while also innovating one\'s own marketing strategies.',
					],
					[
                        'item_number' => '02',
                        'item_title' => 'Entrepreneurship',
						'item_description' => 'Maintain entrepreneurial spirit and continuously expand new markets and businesses.',
					],
					[
                        'item_number' => '03',
                        'item_title' => 'Customer',
						'item_description' => 'Putting customers first and aiming to meet their needs.',
					],
					[
                        'item_number' => '04',
                        'item_title' => 'Team',
						'item_description' => 'A good team atmosphere, emphasizing the cultivation and development of employees.',
					],
					[
                        'item_number' => '05',
                        'item_title' => 'Rigorous',
						'item_description' => 'Maintain a rigorous work attitude and ensure that every aspect is done to the best.',
					],
					[
                        'item_number' => '06',
                        'item_title' => 'Harmony',
						'item_description' => 'Establishing a harmonious corporate culture, promoting internal communication and collaboration.',
					],
					[
                        'item_number' => '07',
                        'item_title' => 'Fighting spirit',
						'item_description' => 'Maintain a high level of fighting spirit and constantly challenge oneself.',
					],
				]
			]
		);



        //Authentication

        $this->add_control(
			'authentication_section_heading',
			[
				'label' => esc_html__( 'Authentication Section Heading', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Section heading', 'textdomain' ),
				'default' => esc_html__( 'Authentication', 'textdomain' ),
			]
		);

        $this->add_control(
			'authentication_bg_image',
			[
				'label' => esc_html__( 'Authentication bg image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);

        $this->add_control(
			'authentication_list',
			[
                'label' => esc_html__( 'Authentication List', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'authentication_image',
                        'label' => esc_html__( 'Authentication Image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'authentication_name',
                        'label' => esc_html__( 'Authentication name', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Section heading', 'textdomain' ),
                        'default' => esc_html__( 'CCC认证', 'textdomain' ),
                    ],
				],
				'default' => [
					[
                        'authentication_name' => 'CCC认证',
						'authentication_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					
				]
			]
		);


        // Video Section
        $this->add_control(
			'video_section_heading',
			[
				'label' => esc_html__( 'Video Section Heading', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Section heading', 'textdomain' ),
				'default' => esc_html__( 'Supply Capacity', 'textdomain' ),
			]
		);

        $this->add_control(
			'video_section_description',
			[
				'label' => esc_html__( 'Video Section Description', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Description', 'textdomain' ),
				'default' => esc_html__( 'Shenzhen Weikewei Technology Co., Ltd. is a high-tech enterprise specializing in the design, manufacturing, and sales of current sensor chips, with advanced technological strength and large-scale production capacity. Having a high-quality R&D team, advanced production equipment, and complete production processes, we can ensure the high quality and stable supply of our products, making us the preferred supplier for many well-known enterprises.', 'textdomain' ),
			]
		);

        $this->add_control(
			'video_section_list',
			[
                'label' => esc_html__( 'Video section list', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'item_title',
                        'label' => esc_html__( 'Title', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'title', 'textdomain' ),
                        'default' => esc_html__( 'Production Capacity', 'textdomain' ),
                    ],
                    [
                        'name' => 'item_description',
                        'label' => esc_html__( 'Description', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'Description', 'textdomain' ),
                        'default' => esc_html__( 'The company has modern production equipment and complete production processes, which can ensure the high quality and stable supply of products. In addition, we have a series of technical accumulation and experience in the design, manufacturing, and testing of current sensor chips, which can meet the needs of different customers. In addition, there is also a high level of supply chain management that can ensure timely procurement of raw materials and components.', 'textdomain' ),
                    ],
				],
				'default' => [
					[
                        'item_title' => 'Production Capacity',
						'item_description' => 'The company has modern production equipment and complete production processes, which can ensure the high quality and stable supply of products. In addition, we have a series of technical accumulation and experience in the design, manufacturing, and testing of current sensor chips, which can meet the needs of different customers. In addition, there is also a high level of supply chain management that can ensure timely procurement of raw materials and components.',
					],
					[
                        'item_title' => 'Delivery Deadline',
						'item_description' => 'The company has established a comprehensive import and export management system, which can provide customized services according to customer needs, including order processing, logistics delivery, etc. In addition, Wakeway Technology has established strategic partnerships with multiple international logistics companies to ensure timely and safe delivery of goods to customers.',
					],
					[
                        'item_title' => 'Price advantage',
						'item_description' => 'The company optimizes production processes and reduces manufacturing costs, resulting in relatively low product prices. At the same time, Wakeway Technology also focuses on improving product quality and R&D innovation capabilities, providing customers with cost-effective products.',
					],
					
				]
			]
		);



        $this->add_control(
			'video_slider',
			[
                'label' => esc_html__( 'Video Slider', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'video_avater',
                        'label' => esc_html__( 'Thumbnail', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'video_source',
                        'label' => __( 'Video Source', 'elementor-video-widget' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'external',
                        'options' => [
                            'external' => __( 'External URL', 'elementor-video-widget' ),
                            'self_hosted' => __( 'Self Hosted', 'elementor-video-widget' ),
                        ],
                    ],
                    [
                        'name' => 'video_url',
                        'label' => __( 'Video URL', 'elementor-video-widget' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'placeholder' => __( 'Enter the video URL', 'elementor-video-widget' ),
                        'condition' => [
                            'video_source' => 'external',
                        ],
                    ],
                    [
                        'name' => 'video_file',
                        'label' => __( 'Video File', 'elementor-video-widget' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [],
                        'dynamic' => [
                            'active' => true,
                        ],
                        'media_type' => 'video',
                        'condition' => [
                            'video_source' => 'self_hosted',
                        ],
                    ],
				],
				'default' => [
					
					
				]
			]
		);


        // note
        $this->add_control(
			'little_note',
			[
				'label' => esc_html__( 'Note', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'note', 'textdomain' ),
				'default' => esc_html__( 'At the same time, the company also provides customers with a series of customized services, including product customization, after-sales support, etc., which has won the trust and praise of customers.', 'textdomain' ),
			]
		);


        //Advantages section
        $this->add_control(
			'advantages_section_heading',
			[
				'label' => esc_html__( 'Advantages section heading', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Section heading', 'textdomain' ),
				'default' => esc_html__( 'The Company\'s Current Sensor Chips Have The Following Advantages', 'textdomain' ),
			]
		);


        $this->add_control(
			'advantage_list',
			[
                'label' => esc_html__( 'Advantage list', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'item_title',
                        'label' => esc_html__( 'Title', 'elementor-addon' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'title', 'textdomain' ),
                        'default' => esc_html__( 'High Measurement Accuracy', 'textdomain' ),
                    ],
                    [
                        'name' => 'icon',
                        'label' => esc_html__( 'Icon', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'item_description',
                        'label' => esc_html__( 'Item Description', 'elementor-addon' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'Description', 'textdomain' ),
                        'default' => esc_html__( 'The measurement error is less than ± 0.5%.', 'textdomain' ),
                    ],
				],
				'default' => [
					[
                        'item_title' => 'High Measurement Accuracy',
                        'item_description' => 'The measurement error is less than ± 0.5%.',
					],
					[
                        'item_title' => 'Low temperature drift',
                        'item_description' => 'The temperature coefficient is small and can maintain stable measurement accuracy in different temperature environments.',
					],
					[
                        'item_title' => 'Wide working voltage range',
                        'item_description' => 'Capable of stable operation over a wide voltage range.',
					],
					[
                        'item_title' => 'High stability',
                        'item_description' => 'After prolonged operation, the performance of the sensor will not change.',
					],
					[
                        'item_title' => 'High reliability',
                        'item_description' => 'Adopting high-quality materials and strict production processes to ensure product life and stability.',
					],
					
					
				]
			]
		);



        //Qute
        // note
        $this->add_control(
			'qute_message',
			[
				'label' => esc_html__( 'Message', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'message', 'textdomain' ),
				'default' => esc_html__( 'In terms of market expansion, Wakeway Technology will continue to strengthen cooperation with domestic and foreign customers, actively expanding new application fields and markets. At the same time, the company will also increase research and development investment, continuously launching more advanced and efficient current sensor chip products to meet the growing needs of customers. In short, we have strong supply capacity and technical strength. In the future, we will continue to maintain our leading position in technology and provide customers with higher quality products and services.', 'textdomain' ),
			]
		);


        $this->end_controls_section();

		

	}


    protected function render() {
		$settings = $this->get_settings_for_display();
        ?>
            <style>
                .about .box4{
                    background-image: url(<?php echo $settings['authentication_bg_image']['url']; ?>)!important;
                    position: relative;
                    padding: 142px 0;
                    background-size: 100% 100%;
                    background-position: center;
                    background-color: RGBA(247, 249, 252, 1);
                }
                .box4 .box-c .swiper-slide::before{
                    position: relative!important;
                }
                .commonBtns .btn .iconfont{
                    color: rgba(1, 58, 174, 1)!important;
                }
            </style>
			<div class="about">
				<div class="commonNav wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
					<div class="content1400">
						<div class="swiper">
							<div class="swiper-wrapper">
								<div class="swiper-slide active"><a href="#box1">About us</a></div>
								<div class="swiper-slide"><a href="#box2">Supply Capacity</a></div>
								<div class="swiper-slide"><a href="#box4">Authentication</a></div>
								<div class="swiper-slide"><a href="#box5">Aulture</a></div>
								<div class="swiper-slide"><a href="<?php echo $settings['news_link']['url']; ?>">News</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="commonBread content1400 wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
					<a href=""><span class="iconfont icon-home"></span></a>
					<span class="iconfont icon-youjiantou11"></span>
					<a href="<?php echo home_url( $_SERVER['REQUEST_URI'] ); ?>">About VICORV</a>
					<span class="iconfont icon-youjiantou11"></span>
					<a href="#top">About us</a>
				</div>
				<div class="box1" id="top">
					<div class="content1400">
						<div class="box-c">
							<div class="l wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s"><?php echo $settings['about_us_heading']; ?></p>
								<p class="des wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s"><?php echo $settings['about_us_sub_heading']; ?></p>
								<div class="text wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
									<p><?php echo $settings['about_us_description']; ?></p>
								</div>
							</div>
							<div class="r hoverLi wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<div class="pic">
									<img class="imgScale" src="<?php echo $settings['abut_us_image']['url']; ?>" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box2">
					<div class="content1400">
						<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s"><?php echo $settings['supply_section_heading']; ?></p>
						<div class="box-c">
							<ul class="list wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">

                                <?php foreach ($settings['supply_items'] as $item) { ?>
								<li>
                                    <div class="icon icon-img">
                                        <img src="<?php echo $item['item_image']['url']; ?>" alt="">
                                    </div>
									
									<p class="text-title"><?php echo $item['item_name']; ?></p>
									<p class="line"></p>
									<p class="text-des"><?php echo $item['item_description']; ?>
									</p>
								</li>
                                <?php } ?>
								<i></i>
								<i></i>
								<i></i>
							</ul>
						</div>
					</div>
				</div>
				<div class="box3">
					<div class="content1400">
						<div class="box-c">
							<div class="l hoverLi wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<div class="pic">
									<img src="<?php echo $settings['supply_capacity_image']['url']; ?>" alt="" class="imgScale">
								</div>
							</div>
							<div class="r">
								<ul class="list wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                                    <?php foreach ($settings['capacity_list'] as $item) { ?>
									<li>
										<div class="li-l"><?php echo $item['item_number']; ?></div>
										<div class="li-r">
											<p class="text-title"><?php echo $item['item_title']; ?>:</p>
											<p class="text-des"><?php echo $item['item_description']; ?></p>
										</div>
									</li>
                                    <?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="box4">
					<div class="content1400">
						<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s"><?php echo $settings['authentication_section_heading']; ?></p>
						<div class="box-c wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
							<div class="swiper">
								<div class="swiper-wrapper">
                                    <?php foreach ($settings['authentication_list'] as $item) {  ?>
									<div class="swiper-slide hoverLi">
										<div class="img">
											<div class="pic">
												<img src="<?php echo $item['authentication_image']['url']; ?>" alt="" class="imgScale">
											</div>
										</div>
										<p class="text"><?php echo $item['authentication_name']; ?></p>
									</div>
                                    <?php } ?>
									
								</div>
							</div>
							<div class="commonBtns">
								<div class="btn btn-prev">
									<span class="iconfont icon-zuojiantou1"></span>
								</div>
								<div class="btn btn-next">
									<span class="iconfont icon-youjiantou11"></span>
								</div>
							</div>
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				<div class="box5">
					<div class="content1400">
						<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s"><?php echo $settings['video_section_heading']; ?></p>
						<p class="des wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s"><?php echo $settings['video_section_description']; ?></p>
						<div class="box-c">
							<div class="l wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<ul class="list wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                                    <?php foreach ($settings['video_section_list'] as $item) { ?>
									<li>
										<p class="li-title"><?php echo $item['item_title']; ?></p>
										<p class="li-des"><?php echo $item['item_description']; ?></p>
									</li>
									<?php } ?>
								</ul>
							</div>
							<div class="r wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<div class="swiper swiper-no-swiping">
									<div class="swiper-wrapper">
                                        <?php foreach($settings['video_slider'] as $item) { ?>
										<div class="swiper-slide hoverLi">
											<div class="pic">
												<img src="<?php echo $item['video_avater']['url']; ?>" alt="" class="imgScale">
											</div>
											<div class="playBtn" data-src="<?php echo $item['video_url']['url']; ?>"><span class="iconfont icon-bofang"></span>
											</div>
										</div>
                                        <?php } ?>
										
									</div>
									<div class="commonBtns">
										<div class="btn btn-prev">
											<span class="iconfont icon-zuojiantou1"></span>
										</div>
										<div class="btn btn-next">
											<span class="iconfont icon-youjiantou11"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box6 wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
					<div class="content1400">
						<div class="text-box">
							<p><?php echo $settings['little_note']; ?></p>
						</div>
					</div>
				</div>
				<div class="box7">
					<div class="content1400">
						<div class="box-t">
							<div class="box-t-l wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<p class="innerTitle">
									<?php echo $settings['advantages_section_heading']; ?>
								</p>
							</div>
							<div class="box-t-r wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<ul class="list">
									<?php foreach($settings['advantage_list'] as $item) { ?>
									<li>
										<div class="icon"><img src="<?php echo $item['icon']['url']; ?>" alt=""></div>
										<div class="text-box">
											<p class="text-title"><?php echo $item['item_title']; ?>: </p>
											<p class="text-des"><?php echo $item['item_description']; ?></p>
										</div>
									</li>
                                    <?php } ?>
								</ul>
							</div>
						</div>
						<div class="box-c">
							<div class="text-title wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s"><span class="iconfont icon-yinhao"></span></div>
							<div class="text-box wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<?php echo $settings['qute_message']; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
            <script type="text/javascript">
		new WOW().init()
		var box4 = new Swiper(".box4 .swiper", {
			slidesPerView: "auto",
			navigation: {
				nextEl: ".box4  .btn-next",
				prevEl: ".box4  .btn-prev",
			},
			pagination: {
				type: 'progressbar',
				el: ".box4 .swiper-pagination",
				clickable: true,
			},
		})
		var certifySwiper = new Swiper('.box5 .swiper', {
			watchSlidesProgress: true,
			slidesPerView: 'auto',
			centeredSlides: true,
			loop: true,
			// autoplay: true,
			navigation: {
				nextEl: ".box5  .btn-next",
				prevEl: ".box5  .btn-prev",
			},
			on: {
				progress: function(progress) {
					for (i = 0; i < this.slides.length; i++) {
						var slide = this.slides.eq(i);
						var slideProgress = this.slides[i].progress;
						modify = 1;
						if (Math.abs(slideProgress) > 1) {
							modify = (Math.abs(slideProgress) - 1) * 0.3 + 1;
						}
						translate = slideProgress * modify * ( $(slide).width()/2) + 'px'
						// translate = slideProgress * modify * 360 + 'px';
						scale = 1 - Math.abs(slideProgress) / 7;
						zIndex = 999 - Math.abs(Math.round(10 * slideProgress));
						slide.transform('translateX(' + translate + ') scale(' + scale + ')');
						slide.css('zIndex', zIndex);
						// slide.css('opacity', 1);
						// if (Math.abs(slideProgress) > 2) {
						// 	slide.css('opacity', 0);
						// }
					}
				},
				setTransition: function(transition) {
					for (var i = 0; i < this.slides.length; i++) {
						var slide = this.slides.eq(i)
						slide.transition(transition);
					}

				}
			}

		})
	</script>
        <?php
    }
}