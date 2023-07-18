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
.banner {
	position: relative;
}

.banner .swiper-slide {
	position: relative;
}

.banner .swiper-slide .pic img {
	display: block;
	width: 100%;
	min-height: 430px;
	object-fit: cover;
}

.banner .swiper-slide .pic img.m {
	display: none;
}

.banner .swiper-slide .slide-box {
	position: absolute;
	top: 25%;
	left: 50%;
	transform: translateX(-50%);
}

.banner .swiper-slide .slide-box .title {
	font-size: 60px;
	font-family: ProximaNova-bold, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
	line-height: 1.16;
	text-transform: uppercase;
}

.banner .swiper-slide .slide-box .des {
	font-size: 24px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #FFFFFF;
	line-height: 1.5;
	margin-top: 27px;
}

.banner .commonMore {
	margin-top: 63px;
}

.banner .banner-bottom {
	position: absolute;
	left: 50%;
	transform: translateX(-50%);
	bottom: 73px;
	display: flex;
	align-items: center;
	justify-content: space-between;
	z-index: 2;
}

.banner .swiper-pagination,
.box4 .swiper-pagination{
	position: relative;
	width: auto;
	display: flex;
	bottom: 0;
}
.box2 .swiper-pagination,
.box6 .swiper-pagination{
	bottom: 0;
}
.banner .swiper-pagination-bullet,
.box4 .swiper-pagination-bullet,
.box2 .swiper-pagination-bullet,
.box6 .swiper-pagination-bullet{
	width: 14px;
	height: 5px;
	background: #999999;
	opacity: 0.4;
	margin-right: 8px;
	border-radius: 0;
}

.banner .swiper-pagination-bullet-active,
.box4 .swiper-pagination-bullet-active,
.box2 .swiper-pagination-bullet-active,
.box6 .swiper-pagination-bullet-active{
	transition: all .6s;
	width: 26px;
	background: #1AA6FF;
	opacity: 1;
}

.box1 {
	padding: 100px 0 129px;
	background-color: rgba(241, 243, 246, 1);
}

.box1 .box-t {
	display: flex;
	justify-content: space-between;
	align-items: flex-end;
}

.box1 .box-t .index-title {
	padding-bottom: 12px;
}

.box1 .box-t .box-t-r {
	display: flex;
}

.box1 .box-t .box-t-r a {
	position: relative;
	padding: 0 18px;
	height: 38px;
	font-size: 20px;
	font-family: ProximaNova, sans-serif;
	font-weight: bold;
	color: #1AA6FF;
	line-height: 38px;
	transition: all .6s;
}

.box1 .box-t .box-t-r a.active {
	background-color: #1AA6FF;
	/* background: #1AA6FF;
	clip-path: polygon(7% 0, 100% 0 ,100% 27px, 93% 100%,0 100%,0 10px); */
	color: #fff;
}

.box1 .box-t .box-t-r a.active::before {
	position: absolute;
	left: 0;
	top: 0;
	content: "";
	width: 0;
	height: 0;
	border-color: RGBA(241, 243, 246, 1) transparent;
	/*上下颜色 左右颜色*/
	border-width: 0 0 10px 10px;
	border-style: solid;
	transform: rotate(-180deg);
}

.box1 .box-t .box-t-r a.active::after {
	position: absolute;
	right: 0;
	bottom: 0;
	content: "";
	width: 0;
	height: 0;
	border-color: RGBA(241, 243, 246, 1) transparent;
	/*上下颜色 左右颜色*/
	border-width: 0 0 10px 10px;
	border-style: solid;
	transform: rotate(0deg);
}

.box1 .box-t .box-t-r a:not(:last-child) {
	margin-right: 34px;
}

.box1 .des {
	font-size: 16px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #777777;
	line-height: 2.25;
	margin-top: 8px;
}

.box1 .box-c .list {
	display: none;
	justify-content: space-between;
	flex-wrap: wrap;
	animation: fadeInUpSmall 1s forwards;
}

.box1 .box-c .list.active {
	display: flex;
}

.box1 .box-c .list li {
	position: relative;
	margin-top: 37px;
	background-color: #fff;
}

.box1 .box-c .list li::before {
	position: absolute;
	right: 0;
	top: 0;
	content: "";
	width: 0;
	height: 0;
	border-color: RGBA(241, 243, 246, 1) transparent;
	/*上下颜色 左右颜色*/
	border-width: 0 0 50px 50px;
	border-style: solid;
	transform: rotate(-90deg);

}

.box1 .box-c .list li,
.box1 .box-c .list i {
	width: 23.5%;
}

.box1 .box-c .list li a {
	position: relative;
	display: block;
	padding: 10.63% 10.63% 18.61%;
}

.box1 .box-c .list li .img {
	position: relative;
	padding-top: 84.45%;
}

.box1 .box-c .list li .pic {
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
}

.box1 .box-c .list li .pic img {
	width: auto;
	max-width: 100%;
	max-height: 100%;
}

.box1 .box-c .list li .text-title {
	font-size: 30px;
	font-family: ProximaNova, sans-serif;
	font-weight: bold;
	color: #222222;
	line-height: 1.2;
	display: -webkit-box;
	-webkit-line-clamp: 1;
	-webkit-box-orient: vertical;
	overflow: hidden;
	text-overflow: ellipsis;
	margin-top: 40px;
	transition: all .6s;
}

.box1 .box-c .list li:hover .text-title {
	color: #1AA6FF;
}

.box1 .box-c .list li .text-des {
	font-size: 16px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #777777;
	line-height: 24px;
	display: -webkit-box;
	-webkit-line-clamp: 4;
	-webkit-box-orient: vertical;
	overflow: hidden;
	text-overflow: ellipsis;
	margin-top: 14px;
}

.box1 .box-c .list li .commonMore {
	position: absolute;
	left: 0;
	bottom: 0;
	transform: translateY(50%);
}

.box2 {
	position: relative;
	padding: 123px 0 158px;
	background-image: url(../img/index-box2-bg.png);
	background-position: left bottom;
	background-size: 100% auto;
	background-repeat: no-repeat;
	z-index: 2;
}

.box2 .box-t {
	display: flex;
	justify-content: space-between;
}

.box2 .box-t .index-title {
	width: 32%;
	padding-right: 25px;
}

.box2 .box-t .des {
	flex: 1;
	margin-right: 40px;
}

.box2 .box-t .des p {
	font-size: 24px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #777777;
	line-height: 1.5;
	width: 587px;
	max-width: 100%;
}

.box2 .box-c {
	margin-top: 52px;
	display: flex;
	justify-content: space-between;
}

.box2 .box-c .l,
.box2 .box-c .c,
.box2 .box-c .r {
	width: 32%;
}

.box2 .box-c .l,
.box2 .box-c .r {
	display: flex;
	flex-direction: column;
	justify-content: space-between;
}
.box2 .box-c .swiper-slide:not(:last-child){
	margin-right: 2%;
}
.box2 .box-c .picBox {
	position: relative;
}

.box2 .box-c .picBox .picContainer {
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	padding: 30px;
	background-color: rgba(3, 137, 222, 0);
	transition: backgroundColor .6s;
}

.box2 .box-c .picBox:hover .picContainer {
	background-color: rgba(3, 137, 222, .93);
	background-image: url(../img/index-box2-bg1.png);
	background-repeat: no-repeat;
	background-position: right bottom;
	background-size: 59.96% auto;
}

.box2 .box-c .picBox .text-title {
	font-size: 30px;
	font-family: ProximaNova, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
	line-height: 1.33;
}

.box2 .box-c .picBox .text-des {
	font-size: 16px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #FFFFFF;
	line-height: 1.5;
	margin-top: 11px;
	opacity: 0;
	transition: all .6s;
}

.box2 .box-c .picBox .commonMore {
	position: absolute;
	left: 30px;
	bottom: 10px;
	background: transparent;
	opacity: 0;
	transition: all .6s;
}

.box2 .box-c .picBox:hover .text-des,
.box2 .box-c .picBox:hover .commonMore {
	opacity: 1;
}

.box2 .box-c .picBox .commonMore::before {
	height: 20px;
}

.box3 {
	position: relative;
	padding: 122px 0 135px;
	z-index: 1;
}

.box3 .bg {
	position: absolute;
	top: 0;
	right: 0;
	transform: translateY(-46.14%);
	display: block;
}

.box3 .box-c {
	display: flex;
	justify-content: space-between;
}

.box3 .box-c .l {
	position: relative;
	width: 46.75%;
	height: 500px;
	z-index: 2;
}

.box3 .box-c .l .pic img {
	display: block;
	width: 100%;
	background:
		linear-gradient(135deg, transparent 80px, transparent 0) top left,
		linear-gradient(-45deg, transparent 80px, transparent 0),
		bottom right;
	overflow: hidden;
	background-size: 50% 50%;
	background-repeat: no-repeat;
}

.box3 .box-c .r {
	width: 46.52%;
	padding-top: 10px;
}

.box3 .box-c .r .des {
	font-size: 24px;
	font-family: ProximaNova, sans-serif;
	font-weight: bold;
	color: #013AAE;
	line-height: 1.5;
	margin-top: 10px;
}

.box3 .box-c .r .commonMore {
	margin-top: 40px;
}

.box3 .box-c .r .text {
	position: relative;
	font-size: 16px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #FFFFFF;
	line-height: 1.5;
	margin-top: 60px;
	padding: 56px 50px 60px 0;
	background-color: #013BAF;
}

.box3 .box-c .r .text::before {
	position: absolute;
	content: "";
	right: 0;
	top: 0;
	height: 100%;
	width: 142.7%;
	background-color: #013BAF;
	background-image: url(../img/index-box3-bg.png);
	background-repeat: no-repeat;
	background-position: left bottom;
	background-size: 26.98% auto;
}

.box3 .box-c .r .text::after {
	position: absolute;
	right: 0;
	bottom: 0;
	content: "";
	width: 0;
	height: 0;
	border-color: RGBA(255, 255, 255, 1) transparent;
	border-width: 0 0 62px 62px;
	border-style: solid;
	transform: rotate(0deg);
}

.box3 .box-c .r .text .text-box {
	position: relative;
	z-index: 2;
	width: 627px;
	max-width: 100%;
}

.box4 {
	background-image: url(../img/index-box4-bg.jpg);
	background-size: cover;
	padding: 100px 0 80px;
}

.box4 .box-t {
	display: flex;
	justify-content: space-between;
}

.box4 .box-c {
	padding-top: 50px;
	overflow: hidden;
}

.box4 .box-c .swiper {
	overflow: visible;
}

.box4 .box-c .swiper-slide {
	position: relative;
	width: 30.75%;
	background:
		linear-gradient(135deg, transparent 58px, #fff 0) top left,
		linear-gradient(-135deg, transparent 0, #fff 0) top right,
		linear-gradient(-45deg, transparent 58px, #fff 0) bottom right,
		linear-gradient(45deg, transparent 0, #fff 0) bottom left;
	background-size: 50% 50%;
	background-repeat: no-repeat;
	/* border: 3px solid #FFFFFF; */
}

.box4 .box-c .swiper-slide::before {
	position: absolute;
	content: "";
	width: calc(100% - 6px);
	height: calc(100% - 6px);
	left: 50%;
	top: 50%;
	transform: translate(-50%, -50%);
	background:
		linear-gradient(135deg, transparent 58px, #FBFCFE 0) top left,
		linear-gradient(-135deg, transparent 0, #FBFCFE 0) top right,
		linear-gradient(-45deg, transparent 58px, #FBFCFE 0) bottom right,
		linear-gradient(45deg, transparent 0, #FBFCFE 0) bottom left;
	overflow: hidden;
	background-size: 50% 50%;
	background-repeat: no-repeat;
}

.box4 .box-c .swiper-slide .slideContainer {
	position: relative;
	z-index: 2;
	padding: 17.43% 12.3%;
	/* padding: 68px 48px; */
}

.box4 .box-c .swiper-slide:not(:last-child) {
	margin-right: 3.87%;
}

.box4 .box-c .swiper-slide .icon-shuangyinhao1 {
	position: absolute;
	left: 0;
	top: 0;
	background: linear-gradient(199deg, #0389DE, #013AAE);
	text-shadow: 5px 8px 27px rgba(1, 58, 174, 0.29);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	font-size: 42px;
	left: 5px;
	top: -4px;
}

.box4 .box-c .swiper-slide .text {
	font-size: 20px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #777777;
	line-height: 1.5;
	min-height: 144px;
}

.box4 .box-c .swiper-slide .slide-box {
	display: flex;
	margin-top: 20px;
}

.box4 .box-c .swiper-slide .slide-box img {
	width: 90px;
	height: 90px;
}

.box4 .box-c .swiper-slide .slide-box .slide-box-r {
	flex: 1;
	margin-left: 33px;
}

.box4 .box-c .swiper-slide .slide-box .name {
	font-size: 24px;
	font-family: ProximaNova, sans-serif;
	font-weight: bold;
	color: #013AAE;
	line-height: 1.41;
}

.box4 .box-c .swiper-slide .slide-box .address {
	font-family: ProximaNova, sans-serif;
	color: #777777;
	font-size: 16px;
	line-height: 1.62;
	/* margin-top: ; */
}

.box4 .box-c .swiper-slide .slide-box .stars {
	color: #FFAC28;
	margin-top: 6px;
}

.box4 .box-c .swiper-slide .slide-box .stars .iconfont {
	font-size: 18px;
}

.box4 .swiper-pagination {
	margin-top: 50px;
	justify-content: center;
}

.box4 .swiper-pagination-bullet-active {
	background: #013AAE;
}

.box5 {
	margin-top: -42px;
	background-image: url(../img/index-box5-bg.png);
	background-size: cover;
	background-color: #F7F9FC;
	background-position: center;
}

.box5 .content1600 {
	position: relative;
}

.box5 .swiper {
	padding: 87px 0;
}

.box5 .swiper .swiper-slide {
	width: 15.93%;
}

.box5 .swiper .swiper-slide:not(:last-child) {
	margin-right: .87%;
}

.box5 .btn {
	position: absolute;
	top: 50%;
	transform: translateY(-50%);
	cursor: pointer;
	z-index: 2;
	color: #fff;
}

.box5 .btn.btn-prev {
	left: -3.4%;
}

.box5 .btn.btn-next {
	right: -3.4%;
}

.box6 {
	padding: 58px 0 100px;
	background-color: #F7F9FC;
}

.box6 .box-t {
	display: flex;
	justify-content: space-between;
	align-items: flex-end;
}

.box6 .box-c {
	margin-top: 20px;
}

.box6 .box-c .list {
	display: flex;
	justify-content: space-between;
	/* flex-wrap: wrap; */
}

.box6 .box-c .list li,
.box6 .box-c .list i {
	width: 23.5%;
}

.box6 .box-c .list li {
	margin-top: 40px;
}
.box6 .box-c .list li:not(:last-child){
	margin-right: 2%;
}
.box6 .box-c .list li .pic {
	position: relative;
	clip-path: polygon(0 32px, 0 100%, 100% 100%, 100% 0, 32px 0);
}

.box6 .box-c .list li .pic .btn {
	position: absolute;
	right: 0;
	bottom: 0;
	display: flex;
	align-items: center;
	justify-content: center;
	width: 272px;
	height: 80px;
	background: #013AAE;
	font-size: 20px;
	font-family: ProximaNova, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
	line-height: 1;
	clip-path: polygon(0 24px, 0 100%, 100% 100%, 100% 0, 24px 0);
}

.box6 .box-c .list li .pic .btn .iconfont {
	margin-left: 46px;
	transition: all .6s;
}

.box6 .box-c .list li .pic .btn:hover .iconfont {
	margin-left: 35px;
}

.box6 .box-c .list .text-box {
	font-size: 16px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #777777;
	line-height: 24px;
	padding: 26px 40px 35px;
	background-color: #fff;
}

@media (max-width: 1550px) {
	.box5 .btn.btn-prev {
		left: -1.5%;
	}

	.box5 .btn.btn-next {
		right: -1.5%;
	}
}

@media (max-width:1440px) {
	.banner .swiper-slide .slide-box .title {
		font-size: 42px;
	}

	.banner .swiper-slide .slide-box .des {
		font-size: 20px;
		margin-top: 10px;
	}

	.banner .commonMore {
		margin-top: 40px;
	}

	.banner .banner-bottom {
		bottom: 40px;
	}

	.box1 .box-c .list li::before {
		border-width: 0 0 35px 35px;
	}

	.box3 .box-c .r {
		width: 50%;
	}

	.box3 .box-c .r .text {
		padding: 30px 30px 30px 0;
	}

	.box3 {
		padding: 80px 0;
	}

	.box4 .box-c .swiper-slide {
		background: linear-gradient(135deg, transparent 30px, #fff 0) top left,
		linear-gradient(-135deg, transparent 0, #fff 0) top right,
		linear-gradient(-45deg, transparent 30px, #fff 0) bottom right,
		linear-gradient(45deg, transparent 0, #fff 0) bottom left;
		background-size: 50% 50%;
		background-repeat: no-repeat;
	}

	.box4 .box-c .swiper-slide::before {
		background: linear-gradient(135deg, transparent 30px, #FBFCFE 0) top left,
		linear-gradient(-135deg, transparent 0, #FBFCFE 0) top right,
		linear-gradient(-45deg, transparent 30px, #FBFCFE 0) bottom right,
		linear-gradient(45deg, transparent 0, #FBFCFE 0) bottom left;
		background-size: 50% 50%;
		background-repeat: no-repeat;
	}
	.box4 .box-c .swiper-slide .icon-shuangyinhao1{
		font-size: 34px;
	}
	.box4 .box-c .swiper-slide .slideContainer{
		padding: 10.43% 8.3%;
	}
	.box4 .box-c .swiper-slide .slide-box img{
		width: 70px;
		height: 70px;
	}
	.box4 .box-c .swiper-slide .slide-box .slide-box-r{
		margin-left: 20px;
	}
	.box4 .box-c .swiper-slide .slide-box .name{
		font-size: 18px;
	}
	.box4 .box-c .swiper-slide .slide-box .address,.box4 .box-c .swiper-slide .slide-box .stars .iconfont{
		font-size: 14px;
	}
	.box4 .box-c .swiper-slide .slide-box .stars{
		margin-top: 0;
	}
	.box4 .box-c .swiper-slide .text{
		font-size: 16px;
		min-height: 130px;
	}
	.box5 .btn.btn-next{
		right: -2%;
	}
	.box5 .btn.btn-prev{
		left: -2%;
	}
	.box6 .box-c .list li .pic .btn{
		height: 60px;
		width: 240px;
		font-size: 18px;
	}
}

@media (max-width:1280px) {
	.box2 .box-c .picBox .text-title,
	.box1 .box-c .list li .text-title{
		font-size: 26px;
	}
	.box1 .box-c .list li .text-title{
		margin-top: 20px;
	}
	.banner .swiper-slide .slide-box .title {
		font-size: 36px;
	}

	.banner .banner-bottom {
		bottom: 20px;
	}
	.box2 .box-t .des p,
	.box3 .box-c .r .des{
		font-size: 20px;
	}
	.box6 .box-c .list li .pic .btn{
		height: 50px;
		width: 200px;
		font-size: 16px;
	}
	.box6 .box-c .list li .pic .btn .iconfont{
		margin-left: 20px;
	}
	.box6 .box-c .list li .pic .btn:hover .iconfont{
		margin-left: 10px;
	}
}

@media (max-width: 1199px) {
	.box2 .box-t .des p{
		width: 100%;
	}
	.box4 .swiper-pagination{
		margin-top: 30px;
	}
	.box4 .box-c .swiper-slide .icon-shuangyinhao1{
		font-size: 24px;
	}
	.box2 .box-c .picBox .text-des{
		margin-top: 5px;
	}
	.box2 .box-c .picBox .text-title, .box1 .box-c .list li .text-title{
		font-size: 24px;
	}
	.box2 .box-c .picBox .picContainer{
		padding: 25px;
	}
	.box1,.box2,.box3,.box4{
		padding: 70px 0;
	}
	.box6{
		padding-bottom: 70px;
	}
	.banner .swiper-slide .slide-box .title {
		font-size: 30px;
	}

	.banner .commonMore {
		margin-top: 30px;
	}
	.box3 .box-c{
		flex-direction: column-reverse;
	}
	.box3 .box-c .r{
		width: 100%;
	}
	.box3 .box-c .r .commonMore{
		margin-top: 30px;
	}
	.box3 .box-c .r .text{
		margin-top: 30px;
	}
	.box3 .box-c .r .text .text-box{
		width: 100%;
	}
	.box3 .box-c .r .text::after{
		border-width: 0 0 40px 40px;
	}
	.box3 .box-c .r .text::before{
		width: 100vw;
	}
	.box3 .box-c .l{
		width: 100%;
		height: auto;
		margin-top: 45px;
	}
	.box3 .box-c .l .pic img{
		width: auto;
		max-width: 100%;
		margin: 0 auto;
	}
	.box6 .box-c .list .text-box{
		padding: 26px 20px 35px;
	}
}

@media (max-width: 1024px) {
	.box6 .swiper-pagination{
		position: relative;
		margin-top: 15px;
	}
	.box2 .box-c .picBox .text-title, .box1 .box-c .list li .text-title{
		font-size: 20px;
	}
	.banner .swiper-slide .slide-box .title {
		font-size: 26px;
	}
	.box2 .box-c .l, .box2 .box-c .c, .box2 .box-c .r{
		width: 48%;
	}
	.box2 .box-c{
		flex-wrap: wrap;
	}
	/* .box2 .box-c .r{
		flex-direction: row;
		width: 100%;
		margin-top: 40px;
	}
	.box2 .box-c .r .picBox{
		width: 48%;
	} */
	.box2 .box-t{
		flex-wrap: wrap;
	}
	.box2 .box-t .des{
		flex: none;
		width: 100%;
		margin-right: 0;
		order: 3;
		margin-top: 20px;
	}
	.box2 .box-t .index-title{
		width: auto;
		
	}
	.box2 .box-c{
		margin-top: 45px;
	}
	.box4 .box-c{
		padding-top: 45px;
	}
	.box1 .box-c .list li, .box1 .box-c .list i{
		width: 32%;
	}
	.box1 .box-c{
		margin-top: 40px;
	}
	.box1 .box-c .list li{
		margin-top: 0;
		margin-bottom: 55px;
	}
	.box1, .box2, .box3, .box4,
	.box5 .swiper{
		padding: 60px 0;
	}
	.box1{
		padding-bottom: 5px;
	}
	.box4 .box-c .swiper-slide{
		width: 48.5%;
	}
	.box4 .box-c .swiper-slide:not(:last-child){
		margin-right: 3%;
	}
	.box5 .swiper .swiper-slide{
		width: 19%;
	}
	.box5 .swiper .swiper-slide:not(:last-child){
		margin-right: 1.25%;
	}
	.box6 .box-c .list li, .box6 .box-c .list i{
		width: 32%;
	}
	.box6 .box-c{
		margin-top: 5px;
	}
	.box1 .box-t .box-t-r a{
		font-size: 16px;
	}
	.box1 .box-t{
		align-items: center;
	}
	.box1 .box-t .box-t-r a:not(:last-child){
		margin-right: 20px;
	}
	.box2 .box-t .des p, .box3 .box-c .r .des{
		font-size: 18px;
	}
	.box6{
		padding: 40px 0 60px;
	}
}

@media (max-width: 768px) {
	.box3 .box-c .r .commonMore{
		display: none;
	}
	.box2 .swiper-pagination{
		bottom: -10px;
	}
	.box6{
		padding: 30px 0 50px;
	}
	.box5 .content1600{
		padding: 0 10px;
	}
	.box2 .box-c .c{
		/* margin: 30px 0; */
	}
	.box2 .box-c .picBox:not(:last-child){
		margin-bottom: 30px;
	}
	.box2 .box-c .l, .box2 .box-c .c, .box2 .box-c .r{
		width: 100%;
	}
	.box2 .box-c .r{
		flex-direction: column;
		margin-top: 0;
	}
	.box2 .box-c .r .picBox{
		width: 100%;
	}
	.box2 .box-c{
		margin-top: 35px;
	}
	.box2 .box-t .des p, .box3 .box-c .r .des{
		font-size: 16px;
	}
	.box1 .box-c{
		margin-top: 35px;
	}
	.box1, .box2, .box3, .box4, .box5 .swiper{
		padding: 50px 0;
	}
	.box1{
		padding-bottom: 0;
	}
	.box1 .box-c .list li, .box1 .box-c .list i{
		width: 48%;
	}
	.banner .swiper-slide .pic img.m {
		display: block;
	}

	.banner .swiper-slide .pic img.pc {
		display: none;
	}

	.banner .swiper-slide .slide-box .title {
		font-size: 24px;
	}

	.banner .swiper-slide .slide-box .des {
		font-size: 18px;
	}
	.box6 .box-c .list li, .box6 .box-c .list i{
		width: 48%;
	}
	.box4 .box-c .swiper-slide{
		width: 100%;
	}
	.box5 .swiper .swiper-slide{
		width: 24%;
	}
	.box1 .des{
		line-height: 1.5;
	}
}

@media (max-width:500px) {
	.box6 .box-c .list li .pic .btn{
		font-size: 13px;
	}
	.box1 .box-t .index-title{
		margin-bottom: 5px;
		/* width: 100%; */
	}
	.box1 .des{
		margin-top: 10px;
	}
	.box1 .box-t{
		flex-direction: column;
		align-items: center;
	}
	.box6 .box-c .list li .pic .btn{
		width: 160px;
		height: 40px;
		line-height: 40px;
	}
	.box6 .box-c .list li .pic .btn .iconfont{
		margin-left: 10px;
		font-size: 12px;
	}
	.box2 .box-c .picBox .text-title, .box1 .box-c .list li .text-title{
		font-size: 18px;
	}
	.box1 .box-c .list li .text-des{
		margin-top: 5px;
		font-size: 14px;
		line-height: 1.5;
	}
	.box1 .box-c{
		margin-top: 30px;
	}
	.box1 .box-t .box-t-r a{
		padding: 0 12px;
	}
	.box2, .box3, .box4, .box5 .swiper{
		padding: 40px 0;
	}
	.box1{
		padding-top: 40px;
	}
	.box6{
		padding: 20px 0 40px;
	}
	.banner .swiper-slide .slide-box .title {
		font-size: 22px;
	}

	.banner .swiper-slide .slide-box .des {
		font-size: 16px;
	}
	.box6 .box-c .list li{
		margin-top: 30px;
	}
	.box6 .box-c .list li, .box6 .box-c .list i{
		width: 100%;
	}
	.box5 .swiper .swiper-slide{
		width: 32%;
	}
	.box5 .swiper .swiper-slide:not(:last-child){
		margin-right: 2%;
	}
}
		</style>
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