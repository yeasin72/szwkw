<?php
use \Elementor\Widget_Base;
class Browse_By_Category extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_browse_by_category';
	}

	public function get_title() {
		return esc_html__( 'Browse by category', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-tabs';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'category', 'list' ];
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
						'item_name' => esc_html__( 'Current Sensor', 'textdomain' ),
					],
					
				]
			]
		);


        $this->add_control(
			'category_list',
			[
                'label' => 'Category List',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'item_img',
                        'label' => esc_html__( 'Category image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'item_name',
                        'label' => esc_html__( 'Category name', 'elementor-addon' ),
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
					
				]
			]
		);

        $this->end_controls_section();
	}


    protected function render() {
		$settings = $this->get_settings_for_display();
        $category_list = $settings['category_list'];
		?>
            <div class="current-sensor">
				<div class="commonBread content1400 wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                    <a href="/"><span class="iconfont icon-home"></span></a>
					<?php foreach($settings['breadcumb_list'] as $menu) { ?>
					<span class="iconfont icon-youjiantou11"></span>
					<a href="<?php echo $menu['item_link']['url']; ?>"><?php echo $menu['item_name']; ?></a>
                    <?php } ?>
				</div>
                
                <?php if($category_list) { ?>
				<div class="box1">
					<div class="content1400">
						<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">Browse By Category</p>
						<div class="box-c">
							<ul class="list wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                                <?php foreach($category_list as $category) { ?>
								<li class="hoverLi">
									<a href="<?php echo $category['item_link']['url']; ?>">
										<div class="img">
											<div class="pic">
												<img src="<?php echo $category['item_img']['url']; ?>" alt="" class="imgScale">
											</div>
										</div>
										<div class="text-box">
											<p class="text-title"><?php echo $category['item_name']; ?></p>
											<p class="text-des"><?php echo $category['item_desc']; ?></p>
										</div>
										<div class="commonMore"><span>Learn More</span><span class="iconfont icon-youjiantou11"></span></div>
									</a>
								</li>
                                <?php } ?>
								<i></i>
								<i></i>
								<i></i>
								<i></i>
							</ul>
						</div>
					</div>
				</div>
                <?php } ?>
			</div>
        <?php
    }
}