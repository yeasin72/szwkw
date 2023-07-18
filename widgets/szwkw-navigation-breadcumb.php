<?php
use \Elementor\Widget_Base;
class Navigation_And_Breadcumb extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_nav_and_breadcumb';
	}

	public function get_title() {
		return esc_html__( 'Navigation Breadcumb', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-product-breadcrumbs';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'breadcumb', 'navigation' ];
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
			'news_navigation_list',
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
					[
                        'name' => 'active_link',
                        'label' => esc_html__( 'Show Title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'textdomain' ),
						'label_off' => esc_html__( 'Hide', 'textdomain' ),
						'return_value' => 'yes',
						'default' => 'yes',
                    ],
				],
				'default' => [
					[
						'navigation_name' => esc_html__( 'About us', 'textdomain' ),
					],
					[
						'navigation_name' => esc_html__( 'Supply Capacity', 'textdomain' ),
					],
					[
						'navigation_name' => esc_html__( 'Authentication', 'textdomain' ),
					],
					[
						'navigation_name' => esc_html__( 'Aulture', 'textdomain' ),
					],
					[
						'navigation_name' => esc_html__( 'News', 'textdomain' ),
					],
					
					
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
						'item_name' => esc_html__( 'About VICORV', 'textdomain' ),
					],
					[
						'item_name' => esc_html__( 'News', 'textdomain' ),
					],
					
				]
			]
		);

	}


    protected function render() {
			$settings = $this->get_settings_for_display();
            
            ?>
            <div class="news">
				<div class="commonNav wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
					<div class="content1400">
						<div class="swiper">
							<div class="swiper-wrapper">
							<?php foreach($settings['news_navigation_list'] as $nav) { ?>
								<div class="swiper-slide <?php if($nav['active_link'] == "yes") { echo "active"; } ?>"><a href="<?php echo $nav['navigation_link']['url']; ?>"><?php echo $nav['navigation_name']; ?></a></div>
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
			
			</div>
            <?php
    }
}