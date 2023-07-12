<?php
use \Elementor\Widget_Base;
class Home_Brand extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_home_brand';
	}

	public function get_title() {
		return esc_html__( 'Partners', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-carousel';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'partners', 'brands', 'list' ];
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
			'partner_section_background',
			[
				'label' => esc_html__( 'Section Background Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
			]
		);
        
        

        $this->add_control(
			'partner_list_heading',
			[
				'label' => esc_html__( 'Partner List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'partner_image_list',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'partner_image',
                        'label' => esc_html__( 'Partner Logo', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'partner_website_link',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
				'default' => [
					[
						'partner_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'partner_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'partner_image' => [
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
                .box5{
                    margin-top: -42px;
                    background-image: url(<?php echo $settings['partner_section_background']['url']; ?>);
                    background-color: #F7F9FC;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: 100% 100%;
}
                }
            </style>
            <div class="box5 wow fadeInUpSmall" wow fadeInUpSmall data-wow-delay=".3s">
				<div class="content1600">
					<div class="swiper">
						<div class="swiper-wrapper">
                        <?php foreach ( $settings['partner_image_list'] as $item ) { ?>
							<div class="swiper-slide hoverLi">
								<div class="pic">
									<img src="<?php echo $item['partner_image']['url']; ?>" alt="" class="imgScale">
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="btns">
						<div class="btn btn-prev">
							<span class="iconfont icon-zuojiantou1"></span>
						</div>
						<div class="btn btn-next">
							<span class="iconfont icon-youjiantou11"></span>
						</div>
					</div>
				</div>
			</div>
            <script type="text/javascript">
                var box5 = new Swiper(".box5 .swiper", {
                    slidesPerView: "auto",
                    navigation: {
                        nextEl: ".box5  .btn-next",
                        prevEl: ".box5  .btn-prev",
                    },
                })
            </script>
		<?php
    }
}