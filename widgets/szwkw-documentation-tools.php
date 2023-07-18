<?php
use \Elementor\Widget_Base;
class Tools_and_Documentation extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_tools_and_documentation';
	}

	public function get_title() {
		return esc_html__( 'Tools & Documentation', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-menu-toggle';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'documentation', 'tools' ];
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
			'tools_list',
			[
                'label' => 'Related tools',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'tools_name',
                        'label' => esc_html__( 'Tools name', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'name', 'textdomain' ),
                        'default' => esc_html__( 'Setup tool', 'textdomain' ),
                    ],
                    [
                        'name' => 'publication_date',
                        'label' => esc_html__( 'Date', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Ex: 12.22 / 2022', 'textdomain' ),
                        'default' => '12.22 / 2022',
                    ],
                    [
                        'name' => 'tool_link',
                        'label' => esc_html__( 'Tools link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
			]
		);
        $this->add_control(
			'documentation_list',
			[
                'label' => 'Documentations',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'doc_name',
                        'label' => esc_html__( 'Tools name', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'name', 'textdomain' ),
                        'default' => esc_html__( 'Setup Doc', 'textdomain' ),
                    ],
                    [
                        'name' => 'publication_date',
                        'label' => esc_html__( 'Date', 'elementor-addon' ),
                        'label_block' => true,
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Ex: 12.22 / 2022', 'textdomain' ),
                        'default' => '12.22 / 2022',
                    ],
                    [
                        'name' => 'doc_link',
                        'label' => esc_html__( 'Document link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
			]
		);

        $this->add_control(
			'card_bg',
			[
				'label' => esc_html__( 'Showcase background', 'textdomain' ),
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
        $documents = $settings['documentation_list'];
        $tools = $settings['tools_list'];
        if ($tools || $documents) {
        ?>
        <style>
            .product-details .box4 .box-c .items .swiper-slide:hover a{
                    background-image: url(<?php echo $settings['card_bg']['url']; ?>);
                    background-size: cover;
                    background-color: #0071cf;
                }
        </style>
        <div class="product-details">
        <div class="box4">
					<div class="content1400">
						<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">Document</p>
						<div class="box-t wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                            <?php if($documents) { ?>
							<a href="javascript:;" class="active">Documentation</a>
                            <?php 
                            }
                            if($tools) {
                            ?>
							<a href="javascript:;">Design Tools</a>
                            <?php } ?>
						</div>
						<div class="box-c wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
							<div class="items active">
								<div class="swiper">
									<div class="swiper-wrapper">
                                        <?php foreach($documents as $document) { ?>
										<div class="swiper-slide">
											<a href="<?php echo $document['doc_link']['url']; ?>">
												<div class="text-box">
													<p class="text-des">Application Note</p>
													<p class="text-title"><?php echo $document['doc_name']; ?></p>
													<p class="date"><?php echo $document['publication_date']; ?></p>
												</div>
												<div class="downloadBtn">
													<span>Click Download</span>
													<div class="icon"><span class="iconfont icon-xiazai"></span></div>
												</div>
											</a>
										</div>
										<?php } ?>
									</div>
									<div class="swiper-pagination">
										
									</div>
								</div>
							</div>
							<div class="items">
								<div class="swiper">
									<div class="swiper-wrapper">
                                        
                                    <?php foreach($tools as $tool) { ?>
										<div class="swiper-slide">
											<a href="<?php echo $tool['tool_link']['url']; ?>">
												<div class="text-box">
													<p class="text-des">Application Note</p>
													<p class="text-title"><?php echo $tool['tools_name']; ?></p>
													<p class="date"><?php echo $tool['publication_date']; ?></p>
												</div>
												<div class="downloadBtn">
													<span>Click Download</span>
													<div class="icon"><span class="iconfont icon-xiazai"></span></div>
												</div>
											</a>
										</div>
										<?php } ?>
										
									</div>
									<div class="swiper-pagination">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
        </div>
        <script type="text/javascript">
            new WOW().init()
            var length = $(".product-details .box4 .box-c .items").length
            for(var i = 0;i<length;i++){
                var ele = $(".product-details .box4 .box-c .items").eq(i).find(".swiper")
                new Swiper(ele[0],{
                    observer: true,  //开启动态检查器，监测swiper和slide
                    observeParents: true,  //监测Swiper 的祖/父元素
                    slidesPerView: "auto",
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                })
            }
            $(".product-details .box4 .box-t a").hover(function(){
                $(this).addClass("active").siblings().removeClass("active")
                $(".product-details .box4 .box-c .items").eq($(this).index()).addClass("active").siblings().removeClass("active")
            })
        </script>
        <?php
        }
    }
}