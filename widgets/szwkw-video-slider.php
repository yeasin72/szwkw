<?php
use \Elementor\Widget_Base;
class Video_Slider extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_video_slider';
	}

	public function get_title() {
		return esc_html__( 'Video Slider', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-video-playlist';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'video', 'slider', 'list' ];
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
			'video_slider_section_heading',
			[
				'label' => esc_html__( 'Section Heading', 'elementor-addon' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Write section heading', 'textdomain' ),
				'default' => esc_html__( 'Watching Videos', 'textdomain' ),
			]
		);
        
        $this->add_control(
			'video_slider_section_bg',
			[
				'label' => esc_html__( 'Section background image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);

        $this->add_control(
			'video_slider',
			[
                'label' => esc_html__( 'Video Slider', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'video_avater',
                        'label' => esc_html__( 'Thumbnail', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'video_source',
                        'label' => __( 'Video Source', 'elementor-video-widget' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'external',
                        'options' => [
                            'external' => __( 'External URL', 'elementor-video-widget' ),
                            'self_hosted' => __( 'Self Hosted', 'elementor-video-widget' ),
                        ],
                    ],
                    [
                        'name' => 'video_url',
                        'label' => __( 'Video URL', 'elementor-video-widget' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'placeholder' => __( 'Enter the video URL', 'elementor-video-widget' ),
                        'condition' => [
                            'video_source' => 'external',
                        ],
                    ],
                    [
                        'name' => 'video_file',
                        'label' => __( 'Video File', 'elementor-video-widget' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [],
                        'dynamic' => [
                            'active' => true,
                        ],
                        'media_type' => 'video',
                        'condition' => [
                            'video_source' => 'self_hosted',
                        ],
                    ],
				],
				'default' => [
					
					
				]
			]
		);



        $this->end_controls_section();

		

	}


    protected function render() {
			$settings = $this->get_settings_for_display();

		?>
        <style>
            
        </style>
        <div class="fae-support">
            <div class="box2" style="background-image: url(<?php echo $settings['video_slider_section_bg']['url']; ?>);">
					<div class="content1400">
						<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s"><?php echo $settings['video_slider_section_heading']; ?></p>
						<div class="box-c wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
							<div class="swiper">
								<div class="swiper-wrapper">
                                    <?php foreach ($settings['video_slider'] as $slide) { ?>
									<div class="swiper-slide hoverLi">
										<div class="pic">
											<img src="<?php echo $slide['video_avater']['url']; ?>" alt="" class="imgScale">
										</div>
										<div class="playBtn" data-src="<?php echo $slide['video_url']['url']; ?>"><span class="iconfont icon-bofang"></span></div>
									</div>
									<?php } ?>
								</div>
								<div class="commonBtns">
									<div class="btn btn-prev">
										<span class="iconfont icon-zuojiantou1"></span>
									</div>
									<div class="btn btn-next">
										<span class="iconfont icon-youjiantou11"></span>
									</div>
								</div>
							</div>
							<div class="swiper-pagination"></div>
						</div>
					</div>
			</div>
        </div>
                <!-- Video player -->
        <div class="modal video-modal">
			<div class="shadow"></div>
			<div class="video-content">
				<span class="close iconfont icon-guanbi"></span>
				<video src="" controls autoplay muted></video>
			</div>
		</div>
        <script type="text/javascript">
		new WOW().init()
		new Swiper(".box2 .swiper",{
			slidesPerView: "auto",
			loop:true,
			centeredSlides: true,
			on:{
				slideChangeTransitionStart: function(){
				this.update()
				},
				
			},
			navigation: {
				nextEl: ".box2  .btn-next",
				prevEl: ".box2  .btn-prev",
			},
			pagination: {
				el: ".box2 .swiper-pagination",
				clickable: true,
			},
			// slidesOffsetBefore : 100,
		})
	</script>
        <?php
    }
}