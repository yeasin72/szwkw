<?php
use \Elementor\Widget_Base;
class News_Widget extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_news_widget';
	}

	public function get_title() {
		return esc_html__( 'News', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'news', 'post', 'list' ];
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

        $post_types = get_post_types( array( 'public' => true ), 'objects' );

        $post_type_options = array();
        foreach ( $post_types as $post_type => $post_type_object ) {
            $post_type_options[ $post_type ] = $post_type_object->labels->singular_name;
        }

        $this->add_control(
            'post_type',
            [
                'label' => __( 'Post Type', 'elementor-custom-post-widget' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'post',
                'options' => $post_type_options,
            ]
        );
        
        $this->add_control(
            'post_count',
            [
                'label' => __( 'Number of Posts', 'elementor-custom-post-widget' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5,
            ]
        );

        $this->add_control(
			'category_bg_img',
			[
				'label' => esc_html__( 'Category Background', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);

        $this->end_controls_section();

		

	}


    protected function render() {
			$settings = $this->get_settings_for_display();
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = [
                'post_type' => $settings['post_type'],
                'posts_per_page' => $settings['post_count'],
                'paged' => $paged
                // Add more arguments as needed
            ];
        
            $query = new \WP_Query( $args );
            $total_pages = $query->max_num_pages;
            $categories = get_terms( array(
                'taxonomy' => 'news_category',
                'hide_empty' => false,
            ) );
            ?>
            <style>
                .news .box1 .box-t a:before {
                    position: absolute;
                    left: 0;
                    top: 0;
                    content: "";
                    width: 100%;
                    height: 100%;
                    background-image: url(<?php echo $settings['category_bg_img']['url']; ?>);
                    background-size: cover;
                }
                
                .hoverLi .pic {
                    display: block!important;
                }
            </style>
            <div class="news">
				<div class="commonNav wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
					<div class="content1400">
						<div class="swiper">
							<div class="swiper-wrapper">
                                <?php foreach($settings['news_navigation_list'] as $nav) { ?>
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
						<div class="box-t wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                            <?php 
                            foreach ( $categories as $index => $category ) {
                                $category_name = $category->name;
                                $category_link = get_term_link( $category );
                            ?>
							<a href="<?php echo $category_link; ?>" class="<?php if($index == 0) { echo "active"; } ?>">
								<div class="icon"><span class="iconfont icon-gongsiguanli"></span></div>
								<p class="text"><?php echo $category_name; ?></p>
							</a>
                            <?php } ?>
						</div>
						<div class="box-c wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
							<ul class="list">
                                <?php if ($query->have_posts(  )) {
                                    while($query->have_posts(  )) { 
                                    $query->the_post();
                                    // Retrieve post information
                                    $post_title = get_the_title();
                                    $post_featured_image_id = get_post_thumbnail_id();
                                    $post_featured_image_url = wp_get_attachment_image_url( $post_featured_image_id, 'full' );
                                    $post_date = get_the_date( 'Y.m.d' );
                                    $post_excerpt = wp_trim_words( get_the_excerpt(), 15 ); // Limit excerpt to 15 words
                                    $post_permalink = get_permalink();
                                        ?>
								<li class="hoverLi">
									<a href="<?php echo $post_permalink; ?>">
										<div class="pic">
											<img src="<?php echo $post_featured_image_url; ?>" alt="" class="imgScale">
										</div>
										<div class="text-box" style="padding: 0; margin-top: 177px;">
											<p class="text-title"><?php echo $post_title; ?></p>
											<p class="text-des"><?php echo $post_excerpt; ?></p>
											<div class="li-b">
												<div class="li-b-l">
													<span class="time">Time</span> <span class="bullet">•</span> <?php echo $post_date; ?>
												</div>
												<div class="li-b-r">
													<span class="iconfont icon-youjiantou11"></span>
												</div>	
											</div>
										</div>
									</a>
								</li>
                                <?php }} ?>
								
								<i></i>
								<i></i>
								<i></i>
								<i></i>
							</ul>
							<div class="pagination">
								<ul>
                                    
                                    <?php 
                                        if (get_previous_posts_link()) {
                                            echo '<li>' .get_previous_posts_link( '<span class="iconfont icon-zuojiantou1"></span>' ) . '</li>';
                                        }

                                        // Numbered page links
                                        for ( $i = 1; $i <= $total_pages; $i++ ) {
                                            if ( $i == $paged ) {
                                                echo '<li class="active"><a href="' . esc_url( get_pagenum_link( $i ) ) . '">' . $i . '</a></li>';
                                            } else {
                                                echo '<li><a href="' . esc_url( get_pagenum_link( $i ) ) . '">' . $i . '</a></li>';
                                            }
                                        }

                                        // Next page link
                                        if ( $total_pages > 1 && $paged < $total_pages ) {
                                            echo '<li><a href="' . esc_url( get_next_posts_page_link() ) . '"><span class="iconfont icon-youjiantou11"></span></a></li>';
                                        }
                                    ?>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php
    }
}