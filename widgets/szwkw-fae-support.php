<?php

use \Elementor\Widget_Base;
class Fae_Support extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_fae_support_widget';
	}

	public function get_title() {
		return esc_html__( 'Fae Support', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-anchor';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'support', 'grid', 'list' ];
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
			'download_navigation_list',
			[
                'label' => 'Navigation List',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'navigation_name',
                        'label' => esc_html__( 'Navigation name', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'name', 'textdomain' ),
                        'default' => esc_html__( 'About us', 'textdomain' ),
                    ],
                    [
                        'name' => 'navigation_link',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
				'default' => [
					[
						'navigation_name' => esc_html__( 'Sample Application', 'textdomain' ),
					],
					[
						'navigation_name' => esc_html__( 'Data Download', 'textdomain' ),
					],
					[
						'navigation_name' => esc_html__( 'Testing Laborato', 'textdomain' ),
					],
					[
						'navigation_name' => esc_html__( 'Fae Support', 'textdomain' ),
					]
					
					
				]
			]
		);
        $this->add_control(
			'breadcumb_list',
			[
                'label' => 'Breadcrumb List',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'item_name',
                        'label' => esc_html__( 'Navigation name', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'name', 'textdomain' ),
                        'default' => esc_html__( 'About VICORV', 'textdomain' ),
                    ],
                    [
                        'name' => 'item_link',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
				'default' => [
					[
						'item_name' => esc_html__( 'technical-support', 'textdomain' ),
					],
					[
						'item_name' => esc_html__( 'Testing Laboratory', 'textdomain' ),
					],
					
				]
			]
		);

        

        $this->add_control(
			'fae_support_heading',
			[
				'label' => esc_html__( 'Fae support heading', 'elementor-addon' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Heading', 'textdomain' ),
                'default' => esc_html__( 'Fae Support', 'textdomain' ),
			]
		);
        $this->add_control(
			'fae_support_desc',
			[
				'label' => esc_html__( 'Fae description', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Description', 'textdomain' ),
                'default' => esc_html__( 'Shenzhen Weikewei Technology Co., Ltd. has rich technical support experience, a professional technical support team, diversified technical support channels, and a leading level of technical support. These advantages enable Wakeway Technology to provide customers with more high-quality and efficient technical support services.', 'textdomain' ),
			]
		);

        $this->add_control(
			'support_middle_img',
			[
				'label' => esc_html__( 'Support middle image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);


        $this->add_control(
			'support_left_list',
			[
                'label' => 'Left list',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'item_title',
                        'label' => esc_html__( 'Title', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'title', 'textdomain' ),
                        'default' => esc_html__( 'Rich Experience In Foreign Trade', 'textdomain' ),
                    ],
                    [
                        'name' => 'item_desc',
                        'label' => esc_html__( 'Description', 'elementor-addon' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'description', 'textdomain' ),
                        'default' => esc_html__( 'Wakeway Technology has been committed to exploring the foreign trade market for a long time. The company has accumulated rich foreign trade experience in the research and development, production, and sales of current sensor chips, and can provide targeted technical solutions for customers in different countries.', 'textdomain' ),
                    ],
				],
				'default' => [
					[
						'item_title' => esc_html__( 'Rich Experience In Foreign Trade', 'textdomain' ),
						'item_desc' => esc_html__( 'Wakeway Technology has been committed to exploring the foreign trade market for a long time. The company has accumulated rich foreign trade experience in the research and development, production, and sales of current sensor chips, and can provide targeted technical solutions for customers in different countries.', 'textdomain' ),
					],
					[
						'item_title' => esc_html__( 'Global Technical Support Network', 'textdomain' ),
						'item_desc' => esc_html__( 'Wakeway Technology has established a comprehensive technical support network worldwide, which can respond to customer needs in a timely manner and provide efficient technical support services. The company has established a strategic partnership with international logistics companies to ensure timely and safe delivery of goods to customers. In addition, Wakeway Technology also has a multilingual technical support team that can communicate with customers without barriers.', 'textdomain' ),
					],
					
				]
			]
		);
        $this->add_control(
			'support_right_list',
			[
                'label' => 'Right list',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'item_title',
                        'label' => esc_html__( 'Title', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'title', 'textdomain' ),
                        'default' => esc_html__( 'Professional FAE Team', 'textdomain' ),
                    ],
                    [
                        'name' => 'item_desc',
                        'label' => esc_html__( 'Description', 'elementor-addon' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'description', 'textdomain' ),
                        'default' => esc_html__( 'The FAE technical support team of Wakeway Technology is composed of a group of experienced engineers with solid professional knowledge and technical capabilities. They are able to provide customers with fast and accurate technical support, solving various technical problems and difficulties.', 'textdomain' ),
                    ],
				],
				'default' => [
					[
						'item_title' => esc_html__( 'Professional FAE Team', 'textdomain' ),
						'item_desc' => esc_html__( 'The FAE technical support team of Wakeway Technology is composed of a group of experienced engineers with solid professional knowledge and technical capabilities. They are able to provide customers with fast and accurate technical support, solving various technical problems and difficulties.', 'textdomain' ),
					],
					[
						'item_title' => esc_html__( 'Advanced R&D Capabilities', 'textdomain' ),
						'item_desc' => esc_html__( 'Wakeway Technology has advanced technological research and development capabilities in the field of current sensor chips. The company has a high-level R&D team, continuously investing a large amount of R&D resources and launching competitive products. Provide customers with higher quality technical support services.', 'textdomain' ),
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
            .box1 .box-c .list{
                display: block;
                width: 100%!important;
            }
            .box1 .box-c .list li{
                width: 100%;
                background: transparent;
            }
            .box1 .box-c .c{
                padding-top: 50px;
            }
        </style>
        <div class="fae-support">
				<div class="commonNav wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
					<div class="content1400">
						<div class="swiper">      
							<div class="swiper-wrapper">
                            <?php foreach($settings['download_navigation_list'] as $nav) { ?>
								<div class="swiper-slide"><a href="<?php echo $nav['navigation_link']['url']; ?>"><?php echo $nav['navigation_name']; ?></a></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="commonBread content1400 wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                <a href="/"><span class="iconfont icon-home"></span></a>
					<?php foreach($settings['breadcumb_list'] as $menu) { ?>
					<span class="iconfont icon-youjiantou11"></span>
					<a href="<?php echo $menu['item_link']['url']; ?>"><?php echo $menu['item_name']; ?></a>
                    <?php } ?>
				</div>
				<div class="box1">
					<div class="content1400">
						<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s"><?php echo $settings['fae_support_heading']; ?></p>
						<div class="des wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
							<p><?php echo $settings['fae_support_desc']; ?></p>
						</div>
						<div class="box-c">
							<div class="l">
								<ul class="list wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                                    <?php foreach($settings['support_left_list'] as $item) { ?>
									<li>
										<p class="li-title"><?php echo $item['item_title']; ?></p>
										<div class="li-des"><?php echo $item['item_desc']; ?></div>
									</li>
                                    <?php } ?>
								</ul>
							</div>
							<div class="c wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<img src="<?php echo $settings['support_middle_img']['url']; ?>" alt="">
							</div>
							<div class="r wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<ul class="list">
                                <?php foreach($settings['support_right_list'] as $item) { ?>
									<li>
										<p class="li-title"><?php echo $item['item_title']; ?></p>
										<div class="li-des"><?php echo $item['item_desc']; ?></div>
									</li>
                                    <?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
        <?php
    }
}