<?php
use \Elementor\Widget_Base;
class Recomended_Product extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_recomended_product';
	}

	public function get_title() {
		return esc_html__( 'Recommended Products', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-product-stock';
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
			'recomended_product_list',
			[
                'label' => 'Recommended Products',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'item_img',
                        'label' => esc_html__( 'Product image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'item_name',
                        'label' => esc_html__( 'Product name', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'name', 'textdomain' ),
                        'default' => esc_html__( 'Divided By Scale', 'textdomain' ),
                    ],
                    [
                        'name' => 'item_desc',
                        'label' => esc_html__( 'Description', 'elementor-addon' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'description', 'textdomain' ),
                        'default' => esc_html__( 'Allegro provides a unique solution for current sensing by developing proprietary packaging using flip chip technology. This technology can generate excellent magnetic coupling effect in coreless packaging design and provide electrical isolation up to 4800 VRMS.', 'textdomain' ),
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
						'item_name' => esc_html__( 'Divided By Scale', 'textdomain' ),
						'item_desc' => esc_html__( 'Allegro provides a unique solution for current sensing by developing proprietary packaging using flip chip technology. This technology can generate excellent magnetic coupling effect in coreless packaging design and provide electrical isolation up to 4800 VRMS.', 'textdomain' ),
					],
					[
						'item_name' => esc_html__( 'Divided By Scale', 'textdomain' ),
						'item_desc' => esc_html__( 'Allegro provides a unique solution for current sensing by developing proprietary packaging using flip chip technology. This technology can generate excellent magnetic coupling effect in coreless packaging design and provide electrical isolation up to 4800 VRMS.', 'textdomain' ),
					],
					[
						'item_name' => esc_html__( 'Divided By Scale', 'textdomain' ),
						'item_desc' => esc_html__( 'Allegro provides a unique solution for current sensing by developing proprietary packaging using flip chip technology. This technology can generate excellent magnetic coupling effect in coreless packaging design and provide electrical isolation up to 4800 VRMS.', 'textdomain' ),
					],
					[
						'item_name' => esc_html__( 'Divided By Scale', 'textdomain' ),
						'item_desc' => esc_html__( 'Allegro provides a unique solution for current sensing by developing proprietary packaging using flip chip technology. This technology can generate excellent magnetic coupling effect in coreless packaging design and provide electrical isolation up to 4800 VRMS.', 'textdomain' ),
					],
					[
						'item_name' => esc_html__( 'Divided By Scale', 'textdomain' ),
						'item_desc' => esc_html__( 'Allegro provides a unique solution for current sensing by developing proprietary packaging using flip chip technology. This technology can generate excellent magnetic coupling effect in coreless packaging design and provide electrical isolation up to 4800 VRMS.', 'textdomain' ),
					],
					[
						'item_name' => esc_html__( 'Divided By Scale', 'textdomain' ),
						'item_desc' => esc_html__( 'Allegro provides a unique solution for current sensing by developing proprietary packaging using flip chip technology. This technology can generate excellent magnetic coupling effect in coreless packaging design and provide electrical isolation up to 4800 VRMS.', 'textdomain' ),
					],
					[
						'item_name' => esc_html__( 'Divided By Scale', 'textdomain' ),
						'item_desc' => esc_html__( 'Allegro provides a unique solution for current sensing by developing proprietary packaging using flip chip technology. This technology can generate excellent magnetic coupling effect in coreless packaging design and provide electrical isolation up to 4800 VRMS.', 'textdomain' ),
					],
					
				]
			]
		);

        $this->end_controls_section();
	}


    protected function render() {
		$settings = $this->get_settings_for_display();
        $recomended_product_list = $settings['recomended_product_list'];
        if ($recomended_product_list) {
		?>
            <div class="current-sensor">
                <div class="box2">
					<div class="content1400">
						<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">Recommended Products</p>
						<div class="box-c wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
							<div class="swiper">
								<div class="swiper-wrapper">
                                    <?php foreach($recomended_product_list as $product) { ?>
									<div class="swiper-slide hoverLi">
										<a href="<?php echo $product['item_link']['url']; ?>">
											<div class="img">
												<div class="pic">
													<img src="<?php echo $product['item_img']['url']; ?>" alt="" class="imgScale">
												</div>
											</div>
											<div class="text-box">
												<p class="text-title"><?php echo $product['item_name']; ?></p>
												<p class="text-des"><?php echo $product['item_desc']; ?></p>
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
            </div>
            <script type="text/javascript">
                new WOW().init()
                var box2 = new Swiper(".box2 .swiper",{
                    slidesPerView: "auto",
                    pagination: {
                        el: ".box2 .swiper-pagination",
                        clickable: true,
                    },
                })
            </script>
        <?php
        }
    }
}