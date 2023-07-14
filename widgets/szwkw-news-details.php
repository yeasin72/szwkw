<?php
use \Elementor\Widget_Base;
class News_Details extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_news_details';
	}

	public function get_title() {
		return esc_html__( 'News Details', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-twitter-feed';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'news', 'details' ];
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
						'item_name' => esc_html__( 'About VICORV', 'textdomain' ),
					],
					[
						'item_name' => esc_html__( 'News', 'textdomain' ),
					],
					
				]
			]
		);

        $this->end_controls_section();

		

	}


    protected function render() {
			$settings = $this->get_settings_for_display();
            $post_id = get_the_ID();
            $post_title = get_the_title($post_id);
            $post_date = get_the_date('Y.m.d', $post_id);
            $post_excerpt = get_the_excerpt($post_id);
            $post_featured_image_url = get_the_post_thumbnail_url($post_id, 'full');
            // Previous and Next post buttons with titles
            $previous_post = get_previous_post();
            $next_post = get_next_post();
		?>
            <style>
                .news-details .box1 .box-c img{
                    width: 100%;
                }
            </style>
            <div class="news-details">
				<div class="commonBread content1300 wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
					<a href="/"><span class="iconfont icon-home"></span></a>
					<?php foreach($settings['breadcumb_list'] as $menu) { ?>
					<span class="iconfont icon-youjiantou11"></span>
					<a href="<?php echo $menu['item_link']['url']; ?>"><?php echo $menu['item_name']; ?></a>
                    <?php } ?>
				</div>
				<div class="box1">
					<div class="content1300">
						<p class="title wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s"><?php echo $post_title; ?></p>
						<div class="msg wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
							<div class="msg-l">
								<span class="time">Time</span> <span class="bullet">•</span> <?php echo $post_date; ?>
							</div>
							<div class="msg-r">
								<span>Share to: </span>
								<!-- <a href=""><span class="iconfont icon-weixin"></span></a> -->
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank"><span class="iconfont icon-facebook"></span></a>
								<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><span class="iconfont icon-lingying"></span></a>
								<a href="http://connect.qq.com/widget/shareqq/index.html?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><span class="iconfont icon-qq"></span></a>
							</div>
                            
						</div>
						<div class="box-c wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
							
								<img src="<?php echo $post_featured_image_url; ?>" alt="">
									<br/>
                            <?php echo $post_excerpt; ?>
						</div>
						<div class="box-b wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                        <?php 
                            if ($previous_post) {
                                $previous_post_title = get_the_title($previous_post);
                                $previous_post_url = get_permalink($previous_post);
                                ?>
                                <a href="<?php echo $previous_post_url; ?>">
                                    <p class="a-title">Prev</p>
                                    <p class="a-des"><?php echo $previous_post_title; ?></p>
                                </a>
                                <?php
                            }
                            ?> 

                            <a href="#"><span class="iconfont icon-ai238"></span></a>
                            <?php
                            if ($next_post) {
                                $next_post_url = get_permalink($next_post);
                                $next_post_title = get_the_title($next_post);
                                ?>
                                
                                <a href="<?php echo $next_post_url; ?>">
                                    <p class="a-title">Next</p>
                                    <p class="a-des"><?php echo $next_post_title; ?></p>
                                </a>
                                <?php
                            }
                            ?>
							
							<!-- <a class="box-b-l"></div>
							<div class="box-b-l"></div> -->
						</div>
					</div>
				</div>
			</div>
        <?php
    }
}