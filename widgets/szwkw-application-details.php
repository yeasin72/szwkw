<?php
use \Elementor\Widget_Base;
class Application_Details extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_application_details';
	}

	public function get_title() {
		return esc_html__( 'Application Details', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-single-post';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'application', 'details' ];
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
						'item_name' => esc_html__( 'Sample Application', 'textdomain' ),
					],
					[
						'item_name' => esc_html__( 'Motor Control', 'textdomain' ),
					],
					
				]
			]
		);


        $this->add_control(
			'application_cases',
			[
                'label' => 'Application cases',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'case_name',
                        'label' => esc_html__( 'Case name', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'name', 'textdomain' ),
                        'default' => esc_html__( 'Intelligent LIN Pre Driver For DC, Stepper, And DC Brushless Motors', 'textdomain' ),
                    ],
                    [
                        'name' => 'case_image',
                        'label' => esc_html__( 'Case image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'case_link',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
				
			]
		);
        $this->add_control(
			'related_product',
			[
                'label' => 'Related products',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'product_name',
                        'label' => esc_html__( 'Product name', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'name', 'textdomain' ),
                        'default' => esc_html__( 'Divided By Scale', 'textdomain' ),
                    ],
                    [
                        'name' => 'product_desc',
                        'label' => esc_html__( 'Description', 'elementor-addon' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'Description', 'textdomain' ),
                        'default' => esc_html__( 'Allegro provides a unique solution for current sensing by developing proprietary packaging using flip chip technology. This technology can generate excellent magnetic coupling effect in coreless packaging design and provide electrical isolation up to 4800 VRMS.', 'textdomain' ),
                    ],
                    [
                        'name' => 'product_image',
                        'label' => esc_html__( 'Product image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'product_link',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
				
			]
		);

        $this->end_controls_section();

		

	}


    protected function render() {
			$settings = $this->get_settings_for_display();
            $post_id = get_the_ID();
            $post_title = get_the_title($post_id);
            $post_excerpt = get_the_excerpt($post_id);
            $post_featured_image_url = get_the_post_thumbnail_url($post_id, 'full');
            // Previous and Next post buttons with titles
            $characteristics = get_the_terms($post_id, 'application_characteristics');
            $application_case = $settings['application_cases'];
            $related_product = $settings['related_product'];
		?>
            <style>
                .applications .box1 .box-c .list li{
                    border-bottom: 0!important;
                    margin-bottom: 0!important;
                }
                .applications .box1 .box-c .list li::before{
                    content: none!important;
                }
            </style>
            <div class="applications-details">
				
				<div class="commonBread content1400 wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                    <a href="/"><span class="iconfont icon-home"></span></a>
                    <?php foreach($settings['breadcumb_list'] as $menu) { ?>
					<span class="iconfont icon-youjiantou11"></span>
					<a href="<?php echo $menu['item_link']['url']; ?>"><?php echo $menu['item_name']; ?></a>
                    <?php } ?>
				</div>
                <?php if ($characteristics && !is_wp_error($characteristics)) { ?>
				<div class="box1">
					<div class="content1400">
						<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">Application Characteristics</p>
						<div class="box-c">
                            <?php foreach($characteristics as $characteristic) { ?>
							<ul class="list wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<li>
									<span class="bullet"></span>
									<span class="text"><?php echo $characteristic->name; ?></span>
								</li>
							</ul>
                            <?php } ?>
						</div>
					</div>
				</div>
                <?php } ?>
                <?php if(!empty($application_case) ){ ?> 
                <div class="box2">
					<div class="content1400">
						<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">Application Cases</p>
						<div class="box-c wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
							<div class="swiper">
								<div class="swiper-wrapper">
                                    <?php foreach($application_case as $case) { ?>
									<div class="swiper-slide hoverLi">
										<a href="<?php echo $case['case_link']['url']; ?>">
											<div class="img">
												<div class="pic">
													<img src="<?php echo $case['case_image']['url']; ?>" alt="" class="imgScale">
												</div>
											</div>
											<div class="text-box">
												<p class="text-title"><?php echo $case['case_name']; ?></p>
												<div class="li-b">
													<div class="li-b-l">Learn More</div>
													<div class="li-b-r iconfont icon-youjiantou11"></div>
												</div>
											</div>
										</a>
									</div>

									<?php } ?>
								</div>
							</div>
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
                <?php } ?>
                <?php if(!empty($related_product)) { ?>
				<div class="box3">
					<div class="content1400">
						<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">Related Products</p>
						<div class="box-c wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
							<div class="swiper">
								<div class="swiper-wrapper">
                                    <?php foreach($related_product as $product) { ?>
									<div class="swiper-slide hoverLi">
										<a href="<?php echo $product['product_link']['url']; ?>">
											<div class="img">
												<div class="pic">
													<img src="<?php echo $product['product_image']['url']; ?>" alt="" class="imgScale">
												</div>
											</div>
											<div class="text-box">
												<p class="text-title"><?php echo $product['product_name']; ?></p>
												<p class="text-des"><?php echo $product['product_desc']; ?></p>
											</div>
											<div class="commonMore"><span>Learn More</span><span class="iconfont icon-youjiantou11"></span></div>
										</a>
									</div>
									<?php } ?>
								</div>
							</div>
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
                <?php } ?>
			</div>
            <script type="text/javascript">
		new WOW().init()
		new Swiper(".box2 .swiper",{
			slidesPerView: "auto",
			pagination: {
				el: ".box2 .swiper-pagination",
				clickable: true,
			},
			// slidesOffsetBefore : 100,
		})
		new Swiper(".box3 .swiper",{
			slidesPerView: "auto",
			pagination: {
				el: ".box3 .swiper-pagination",
				clickable: true,
			},
			// slidesOffsetBefore : 100,
		})
	</script>
        <?php
    }
}