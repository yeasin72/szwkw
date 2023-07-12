<?php
use \Elementor\Widget_Base;
class Customer_Review extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_home_customer_review';
	}

	public function get_title() {
		return esc_html__( 'Customer Review', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-rating';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'Customer', 'review', 'list' ];
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
			'review_section_heading',
			[
				'label' => esc_html__( 'Section Heading', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Write section heading', 'textdomain' ),
				'default' => esc_html__( 'Cooperative Customers', 'textdomain' ),
			]
		);
        $this->add_control(
			'review_section_background',
			[
				'label' => esc_html__( 'Section Background Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
			]
		);
        
        

        $this->add_control(
			'first_tab_heading',
			[
				'label' => esc_html__( 'Customer Reviews', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'customer_review_items',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'customer_review_author',
						'label' => esc_html__( 'Author Name', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Arthur Morgan', 'textdomain' ),
                        'placeholder' => esc_html__( 'Name', 'textdomain' ),
					],
					[
						'name' => 'customer_review_author_location',
						'label' => esc_html__( 'Author Location', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'London, England', 'textdomain' ),
                        'placeholder' => esc_html__( 'Location', 'textdomain' ),
					],
                    [
                        'name' => 'custome_rating',
                        'label' => esc_html__( 'Customer Rating', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 5,
                        'step' => 1,
                        'default' => 5,
                    ],
					[
						'name' => 'customer_comment',
						'label' => esc_html__( 'Customer Comment', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'placeholder' => esc_html__( 'Comment', 'textdomain' ),
						'default' => esc_html__( 'With our professional technical and service team, we look forward to furthe cooperation.' ),
					],
                    [
                        'name' => 'customer_avater',
                        'label' => esc_html__( 'Customer Avater', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
				],
				'default' => [
					[
						'customer_review_author' => esc_html__( 'Arthur Morgan', 'textdomain' ),
						'customer_review_author_location' => esc_html__( 'London, England', 'textdomain' ),
                        'custome_rating' => 5,
						'customer_comment' => esc_html__( 'With our professional technical and service team, we look forward to furthe cooperation.', 'textdomain' ),
						'customer_avater' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'customer_review_author' => esc_html__( 'Arthur Morgan', 'textdomain' ),
						'customer_review_author_location' => esc_html__( 'London, England', 'textdomain' ),
                        'custome_rating' => 5,
						'customer_comment' => esc_html__( 'With our professional technical and service team, we look forward to furthe cooperation.', 'textdomain' ),
						'customer_avater' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'customer_review_author' => esc_html__( 'Arthur Morgan', 'textdomain' ),
						'customer_review_author_location' => esc_html__( 'London, England', 'textdomain' ),
                        'custome_rating' => 5,
						'customer_comment' => esc_html__( 'With our professional technical and service team, we look forward to furthe cooperation.', 'textdomain' ),
						'customer_avater' => [
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
                .box4{
                    background-image: url(<?php echo $settings['review_section_background']['url']; ?>)!important;
                    background-size: cover!important;
                    padding: 100px 0 80px!important;
                }
            </style>
			<div class="box4">
				<div class="content1600">
					<div class="box-t">
						<div class="index-title wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
							<p class="title"><?php echo $settings['review_section_heading']; ?></p>
							<div class="line"></div>
						</div>
						<div class="commonBtns wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
							<div class="btn btn-prev">
								<span class="iconfont icon-zuojiantou1"></span>
							</div>
							<div class="btn btn-next">
								<span class="iconfont icon-youjiantou11"></span>
							</div>
						</div>
					</div>
					<div class="box-c wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
						<div class="swiper">
							<div class="swiper-wrapper">

                            <?php foreach ( $settings['customer_review_items'] as $item ) { ?>
								<div class="swiper-slide">
									<div class="slideContainer">
										<span class="iconfont icon-shuangyinhao1"></span>
										<div class="text">
                                        <?php echo $item['customer_comment']; ?>
										</div>
										<div class="slide-box">
											<img src="<?php echo $item['customer_avater']['url']; ?>" alt="">
											<div class="slide-box-r">
												<p class="name"><?php echo $item['customer_review_author']; ?> </p>
												<p class="address"><?php echo $item['customer_review_author_location']; ?></p>
												<div class="stars">
                                                    <?php
                                                    $count = $item['custome_rating'];
                                                    while($count > 0) {
                                                    $count--;
                                                    ?>
													<span class="iconfont icon-star-full"></span>
													<?php 
                                                    }
                                                    ?>
												</div>
											</div>
										</div>
									</div>
								</div>
                            <?php } ?>


							</div>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
            <script type="text/javascript">
                var box4 = new Swiper(".box4 .swiper", {
                slidesPerView: "auto",
                navigation: {
                    nextEl: ".box4  .btn-next",
                    prevEl: ".box4  .btn-prev",
                },
                pagination: {
                    el: ".box4 .swiper-pagination",
                    clickable: true,
                },
		        })
            </script>
		<?php
    }
}