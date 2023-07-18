<?php

use \Elementor\Widget_Base;
class Sample_Application extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_sample_application_widget';
	}

	public function get_title() {
		return esc_html__( 'Sample Application', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-posts-group';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'application', 'grid', 'list' ];
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
            ?>
            <style>
                
            </style>
            <div class="applications">
                <div class="commonNav wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
					<div class="content1400">
						<div class="swiper">      
							<div class="swiper-wrapper">
                                <?php foreach($settings['download_navigation_list'] as $nav) { ?>
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
				<div class="box1">
					<div class="content1400">
						<div class="box-c">
							<ul class="list">
                            <?php if ($query->have_posts(  )) {
                                    while($query->have_posts(  )) { 
                                    $query->the_post();
                                    // Retrieve post information
                                    $post_title = get_the_title();
                                    $post_featured_image_id = get_post_thumbnail_id();
                                    $post_featured_image_url = wp_get_attachment_image_url( $post_featured_image_id, 'full' ); // Limit excerpt to 15 words
                                    $post_permalink = get_permalink();
                                        ?>
								<li class="hoverLi wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
									<a href="<?php echo $post_permalink; ?>">
										<div class="pic">
											<img src="<?php echo $post_featured_image_url; ?>" alt="" class="imgScale">
										</div>
										<div class="text-box">
											<span class="text"><?php echo $post_title; ?></span>
											<span class="iconfont icon-youjiantou11"></span>
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