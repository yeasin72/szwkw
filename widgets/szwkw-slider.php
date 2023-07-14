<?php
use \Elementor\Widget_Base;
class Szwkw_Slider extends \Elementor\Widget_Base {




    public function get_name() {
		return 'szwkw_home_slider';
	}

	public function get_title() {
		return esc_html__( 'SZWKW Slider', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-slider-device';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'Slider', 'list' ];
	}

    protected function register_controls() {

        // Control Tab starts
        $this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Slider Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'szwkw_slides',
			[
				'label' => esc_html__( 'Slides', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'szwkw_slider_title_top',
						'label' => esc_html__( 'Top title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Top Title', 'textdomain' ),
						'default' => esc_html__( 'Hall Effect', 'textdomain' ),
					],
                    [
						'name' => 'szwkw_slider_title_down',
						'label' => esc_html__( 'Down title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Down Title', 'textdomain' ),
						'default' => esc_html__( 'Current Sensors', 'textdomain' ),
					],
					[
						'name' => 'szwkw_slider_description',
						'label' => esc_html__( 'Description', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'placeholder' => esc_html__( 'Write slide description', 'textdomain' ),
						'default' => esc_html__( 'Provide High Sensitivity With Stable Parameters Current Sensor Solutions', 'textdomain' ),
					],
                    [
                        'name' => 'szwkw_slider_iamge',
                        'label' => esc_html__( 'Slider Image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
						'name' => 'szwkw_slider_button_name',
						'label' => esc_html__( 'Button label', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Label', 'textdomain' ),
						'default' => esc_html__( 'Learn More', 'textdomain' ),
					],
                    [
                        'name' => 'szwkw_slider_button',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
				'default' => [
					[
						'szwkw_slider_title_top' => esc_html__( 'HALL EFFECT', 'textdomain' ),
						'szwkw_slider_title_down' => esc_html__( 'CURRENT SENSORS', 'textdomain' ),
						'szwkw_slider_description' => esc_html__( 'Provide High Sensitivity With Stable Parameters Current Sensor Solutions', 'textdomain' ),
						'szwkw_slider_iamge' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'szwkw_slider_title_top' => esc_html__( 'HALL EFFECT', 'textdomain' ),
						'szwkw_slider_title_down' => esc_html__( 'CURRENT SENSORS', 'textdomain' ),
						'szwkw_slider_description' => esc_html__( 'Provide High Sensitivity With Stable Parameters Current Sensor Solutions', 'textdomain' ),
						'szwkw_slider_iamge' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'szwkw_slider_title_top' => esc_html__( 'HALL EFFECT', 'textdomain' ),
						'szwkw_slider_title_down' => esc_html__( 'CURRENT SENSORS', 'textdomain' ),
						'szwkw_slider_description' => esc_html__( 'Provide High Sensitivity With Stable Parameters Current Sensor Solutions', 'textdomain' ),
						'szwkw_slider_iamge' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
				]
			]
		);



        $this->end_controls_section();

        // Style Tabs Starts
        $this->start_controls_section(
			'tags_style',
			[
				'label' => esc_html__( 'Slider Style', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'szwkw_slider_button_first_color',
			[
				'label' => esc_html__( 'Button First Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#013AAE'
			]
		);
        $this->add_control(
			'szwkw_slider_button_color',
			[
				'label' => esc_html__( 'Button Second Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#0077D3'
				]
			);
			$this->add_control(
				'szwkw_slider_button_text_color',
				[
					'label' => esc_html__( 'Button Text Color', 'elementor-addon' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#FFFFFF'
					]
				);
			$this->add_control(
					'szwkw_slider_button_text_hvr_color',
					[
						'label' => esc_html__( 'Button Hover Color', 'elementor-addon' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => '#FFFFFF'
			]
		);
        $this->add_control(
			'szwkw_slider_title_color',
			[
				'label' => esc_html__( 'Title color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
        $this->add_control(
			'szwkw_slider_description_color',
			[
				'label' => esc_html__( 'Description color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
        $this->add_control(
			'szwkw_slider_dashed_nav_color',
			[
				'label' => esc_html__( 'Dashed nav color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
        $this->add_control(
			'szwkw_slider_dashed_nav_active_color',
			[
				'label' => esc_html__( 'Dashed nav active color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
        $this->add_control(
			'szwkw_slider_arrow_nav_color',
			[
				'label' => esc_html__( 'Arrow nav color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
        $this->add_control(
			'szwkw_slider_arrow_nav_hvr_first_color',
			[
				'label' => esc_html__( 'Arrow nav first hover color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
        $this->add_control(
			'szwkw_slider_arrow_nav_hvr_color',
			[
				'label' => esc_html__( 'Arrow nav second hover color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
        $this->add_control(
			'szwkw_slider_arrow_nav_icon_color',
			[
				'label' => esc_html__( 'Arrow nav icon color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
        $this->add_control(
			'szwkw_slider_arrow_nav_icon_hvr_color',
			[
				'label' => esc_html__( 'Arrow nav icon hover color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

        

        $this->end_controls_section();
        
    }

    // Render the widget
    protected function render() { 
        $settings = $this->get_settings_for_display();
        $slides = $settings['szwkw_slides'];
        ?>
        <style>
            .banner .commonMore{
                background: linear-gradient(68deg, <?php echo $settings['szwkw_slider_button_first_color']; ?> 0%, <?php echo $settings['szwkw_slider_button_color']; ?> 99%)!important;
                color: <?php echo $settings['szwkw_slider_button_text_color']; ?>!important;
            }
            .banner .commonMore:hover {
                color: <?php echo $settings['szwkw_slider_button_text_hvr_color']; ?>!important;
            }
            .commonMore::before{
                background-color: <?php echo $settings['szwkw_slider_button_color']; ?>!important;
            }
            .banner .swiper-slide .slide-box .title{
                color: <?php echo $settings['szwkw_slider_title_color']; ?>!important;
            }
            .banner .swiper-slide .slide-box .des{
                color: <?php echo $settings['szwkw_slider_description_color']; ?>!important;
            }
            .banner .swiper-pagination-bullet, .box4 .swiper-pagination-bullet, .box2 .swiper-pagination-bullet, .box6 .swiper-pagination-bullet{
                background: <?php echo $settings['szwkw_slider_dashed_nav_color']; ?>!important;
            }
            .banner .swiper-pagination-bullet-active, .box4 .swiper-pagination-bullet-active, .box2 .swiper-pagination-bullet-active, .box6 .swiper-pagination-bullet-active{
                background: <?php echo $settings['szwkw_slider_dashed_nav_active_color']; ?>!important;
            }
            .commonBtns .btn::before{
                background-color: <?php echo $settings['szwkw_slider_arrow_nav_color']; ?>!important;
            }
            .commonBtns .btn{
                color: <?php echo $settings['szwkw_slider_arrow_nav_icon_color']; ?>!important;
            }
            .commonBtns .btn:hover{
                background: linear-gradient(68deg, <?php echo $settings['szwkw_slider_arrow_nav_hvr_first_color']; ?> 0%, <?php echo $settings['szwkw_slider_arrow_nav_hvr_color']; ?> 99%)!important;
                color: <?php echo $settings['szwkw_slider_arrow_nav_icon_hvr_color']; ?>!important;
            }
        </style>
<div class="banner">
				<div class="swiper">
					<div class="swiper-wrapper">
                        <?php if ($slides) { ?>
                            <?php foreach ($slides as $slide) { ?>
                                
						<div class="swiper-slide">
							<div class="pic">
								<img src="<?php echo $slide['szwkw_slider_iamge']['url']; ?>" alt="" class="pc">
								<img src="<?php echo $slide['szwkw_slider_iamge']['url']; ?>" alt="" class="m">
							</div>
							<div class="slide-box content1600">
								<p class="title ani the_slider_title" swiper-animate-effect="fadeInUpSmall"
									swiper-animate-duration="0.6s" swiper-animate-delay="0.5s"><?php echo $slide['szwkw_slider_title_top']; ?> <br /><?php echo $slide['szwkw_slider_title_down']; ?> </p>
								<p class="des ani" swiper-animate-effect="fadeInUpSmall" swiper-animate-duration="0.6s"
									swiper-animate-delay="0.8s"><?php echo $slide['szwkw_slider_description'] ; ?></p>
								<a class="commonMore ani" swiper-animate-effect="fadeInUpSmall"
									swiper-animate-duration="0.6s" swiper-animate-delay="1s" href="<?php echo $slide['szwkw_slider_button']['url']; ?>"><span><?php echo $slide['szwkw_slider_button_name']; ?></span><span class="iconfont icon-youjiantou11"></span></a>
							</div>
						</div>
                        <?php }} ?>

						
					</div>
				</div>
				<div class="banner-bottom content1600">
					<div class="swiper-pagination"></div>
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

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script type="text/javascript">
		new WOW().init()
		var banner = new Swiper('.banner .swiper', {
			loop: true,
			resistanceRatio: 0,
			autoplay: {
				disableOnInteraction: false,
				delay: 20000, //1秒切换一次
			},
			on: {
				init: function() {
					swiperAnimateCache(this); //隐藏动画元素 
					swiperAnimate(this); //初始化完成开始动画
				},
				slideChangeTransitionEnd: function() {
					swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
					//this.slides.eq(this.activeIndex).find('.ani').removeClass('ani'); 动画只展现一次，去除ani类名
				}
			},
			navigation: {
				nextEl: ".banner  .btn-next",
				prevEl: ".banner  .btn-prev",
			},
			pagination: {
				el: ".banner .swiper-pagination",
				clickable: true,
			},
		})
		
	</script>
        <?php
    }


    
}