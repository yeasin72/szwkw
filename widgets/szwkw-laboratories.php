<?php

use \Elementor\Widget_Base;
class Laboratory_Widget extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_laboratory_widget';
	}

	public function get_title() {
		return esc_html__( 'Laboratory', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-inner-section';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'laboratory', 'grid', 'list' ];
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
			'laboratory_navigation_list',
			[
                'label' => 'Laboratory List',
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
.technical-support .box1{
	padding: 38px 0 90px;
	background-image: url(../img/technical-support-bg.png);
	background-position: left bottom;
	background-repeat: no-repeat;
	background-size: auto;
}
.technical-support .box1 .innerTitle{
	width: 260px;
	text-align: left;
	line-height: 1.25;
}
.technical-support .box1 .box-c{
	display: flex;
	justify-content: space-between;
}
.technical-support .box1 .r{
	/* flex: 1; */
	margin-left: 40px;
	width: 900px;
}
.technical-support .box1 .r .inputs{
	display: flex;
	justify-content: space-between;
	flex-wrap: wrap;
}
.technical-support .box1 .r .input{
	width: 49.44%;
	margin-bottom: 10px;
}
.technical-support .box1 .r .input.textarea{
	width: 100%;
}
.technical-support .box1 .r .input input,
.technical-support .box1 .r .input.textarea textarea{
	width: 100%;
	height: 56px;
	background: rgba(1,58,174,.01);
	border: 1px solid rgba(1, 59, 174, .1);
	padding: 0 20px;
	font-size: 16px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #00236A;
	outline-color: rgba(1, 59, 174, 1);
	resize: none;
}
.technical-support .box1 .r .input input::placeholder,
.technical-support .box1 .r .input textarea::placeholder{
	color: rgba(0, 35, 106, .3);
}
.technical-support .box1 .r .input.textarea textarea{
	height: 168px;
	padding: 15px 20px;
}
.technical-support .box1 .r .commonMore{
	margin-top: 20px;
}
.downlaod{
	background-color: RGBA(247, 249, 252, 1);
}
.downlaod .box1{
	padding: 0 0 100px;
}
.downlaod .box1 .box-c .list{
	display: flex;
	justify-content: space-between;
	flex-wrap: wrap;
}
.downlaod .box1 .box-c .list li,
.downlaod .box1 .box-c .list i{
	width: 32%;
}
.downlaod .box1 .box-c .list li{
	margin-top: 40px;
}
.downlaod .box1 .box-c .list li a::before{
	position: absolute;
	right: -1px;
	top: -1px;
	content: "";
	border: 1px solid #fff;
	border-color: RGBA(247, 249, 252, 1) RGBA(247, 249, 252, 1) rgba(235, 239, 245, 1) rgba(235, 239, 245, 1) ; 
	border-width: 20px 30px 20px 30px;
	z-index: 2;
}
.downlaod .box1 .box-c .list li:hover a::before{
	border-left-color: rgba(27, 78, 182, 1);
	border-bottom-color: rgba(27, 78, 182, 1);
}
.downlaod .box1 .box-c .list li:hover a{
	background-image: url(../img/product-details-box4-bg.png);
	background-size: cover;
	background-color: #0071cf;
}
.downlaod .box1 .box-c .list li:hover{
	filter: drop-shadow(0px 24px 38px rgba(1,78,174,0.32))
}
.downlaod .box1 .box-c .list li a{
	position: relative;
	display: block;
	padding: 45px 40px 37px;
	clip-path: polygon( 0 0, calc(100% - 60px) 0, 100% 40px,100% 100%,0 100%,0 0);
	background-color: rgba(255, 255, 255, 1);
}
.downlaod .box1 .box-c .list li .text-box{
	min-height: 130px;
}
.downlaod .box1 .box-c .list li .text-des{
	font-size: 16px;
	font-family: ProximaNova, sans-serif;
	font-weight: bold;
	color: #013AAE;
	line-height: 1;
}
.downlaod .box1 .box-c .list li:hover .text-des,
.downlaod .box1 .box-c .list li:hover .date{
	color: #fff;
	opacity: .5;
}
.downlaod .box1 .box-c .list li .text-title{
	font-size: 22px;
	font-family: ProximaNova-bold, sans-serif;
	color: #1C1C1C;
	line-height: 1.36;
	margin-top: 5px;
}
.downlaod .box1 .box-c .list li:hover .text-title{
	color: #fff;
}
.downlaod .box1 .box-c .list li .date{
	font-size: 16px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #999999;
	line-height: 1;
	margin-top: 20px;
}
.downlaod .box1 .box-c .list li .downloadBtn{
	display: flex;
	align-items: center;
	justify-content: space-between;
	font-size: 16px;
	font-family: ProximaNova, sans-serif;
	font-weight: bold;
	color: #C8C8C8;
	line-height: 1;
}
.downlaod .box1 .box-c .list li:hover .downloadBtn{
	color: #fff;
}
.downlaod .box1 .box-c .list li .icon{
	width: 40px;
	height: 40px;
	line-height: 40px;
	text-align: center;
	background: rgba(235, 239, 245, .7);
	border-radius: 4px;
	color: rgba(153, 153, 153, 1);
}
.downlaod .box1 .box-c .list li:hover .icon{
	background-color: rgba(255, 255, 255, .07);
}
.downlaod .box1 .box-c .list li .icon .iconfont{
	font-size: 18px;
}
.downlaod .box1 .box-c .list li:hover .icon .iconfont{
	color: rgba(255, 255, 255, 1);
}
.downlaod .box1 .box-c .pagination{
	margin-top: 60px;
}
.laboratory{
	background-color: RGBA(247, 249, 252, 1);
}
.laboratory .box1{
	padding: 0  0 100px;
}
.laboratory .box1 .list{
	display: flex;
	justify-content: space-between;
	flex-wrap: wrap;
}
.laboratory .box1 .list li{
	width: 49%;
	margin-top: 50px;
}
.laboratory .box1 .list li .pic{
	position: relative;
}
.laboratory .box1 .list li .pic .picBox{
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 4, 7, .8);
	display: flex;
	flex-direction: column;
	justify-content: flex-end;
	padding: 7.28%;
	opacity: 0;
	transition: all .6s;
}
.laboratory .box1 .list li:hover .pic .picBox{
	opacity: 1;
}
.laboratory .box1 .list li .pic .text-title{
	font-size: 22px;
	font-family: ProximaNova-bold, sans-serif;
	color: #FFFFFF;
	line-height: 1.36;
}
.laboratory .box1 .list li .pic .text-des{
	font-size: 16px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #FFFFFF;
	line-height: 1.87;
	opacity: 0.7;
	margin-top: 8px;
}
.laboratory .box1 .list li .title{
	font-size: 22px;
	font-family: ProximaNova-bold, sans-serif;
	color: #1C1C1C;
	line-height: 1.36;
	margin-top: 25px;
}
.laboratory .box1 .list li:hover .title{
	color: rgba(1, 58, 174, 1);
}
.laboratory .box1 .pagination{
	margin-top: 70px;
}
.fae-support{
	background-image: url(../img/fae-support-bg.png);
	background-size: 100% auto;
	background-position: top center;
	background-repeat: no-repeat;
	background-color: #fff;
}
.fae-support .box1{
	padding: 40px 0 95px;
}
.fae-support .box1 .des{
	width: 1117px;
	max-width: 100%;
	font-size: 20px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #222222;
	line-height: 1.5;
	margin: 13px auto 0;
	text-align: center;
}
.fae-support .box1 .box-c{
	margin-top: 80px;
	display: flex;
	justify-content: space-between;
}
.fae-support .box1 .box-c .l,
.fae-support .box1 .box-c .r{
	width: 33.33%;
}
.fae-support .box1 .box-c li{
	min-height: 218px;
	padding-bottom: 20px;
}
.fae-support .box1 .box-c .l li{
	padding-right: 30px;
}
.fae-support .box1 .box-c .r li{
	padding-left: 30px;
}
.fae-support .box1 .box-c li:not(:last-child){
	border-bottom: 1px solid rgba(1, 58, 174, .1);
	margin-bottom: 60px;
}
.fae-support .box1 .box-c .li-title{
	font-size: 24px;
	font-family: ProximaNova-bold, sans-serif;
	color: #013AAE;
	line-height: 1.25;
}
.fae-support .box1 .box-c .li-des{
	font-size: 16px;
	font-family: ProximaNova, sans-serif;
	font-weight: 300;
	color: #777777;
	line-height: 24px;
	margin-top: 15px;
}
.fae-support .box1 .box-c .c{
	width: 26.14%;
}
.fae-support .box1 .box-c .c img{
	display: block;
	width: 100%;
}
.fae-support .box2{
	padding: 100px 0 80px;
	background-image: url(../img/fae-support-box2-bg.jpg);
	background-size: cover;
}
.fae-support .box2 .innerTitle{
	color: #fff;
}
.fae-support .box2 .box-c{
	margin-top: 50px;
}
.fae-support .box2 .box-c .swiper{
	position: relative;
	overflow: visible;
	width: 375px;
}
.fae-support .box2 .box-c .swiper-wrapper{
	transition-duration: 300ms !important;
	align-items: center;
}
.fae-support .box2 .box-c .swiper-slide{
	position: relative;
	width: 339px;
	opacity: .5;
	cursor: pointer;
}
.fae-support .box2 .box-c .swiper-slide .playBtn{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 64px;
	height: 64px;
	line-height: 64px;
	text-align: center;
	background: rgba(255,255,255,.9);
	opacity: 0;
}
.fae-support .box2 .box-c .swiper-slide:not(:last-child){
	margin-right: 74px;
}
.fae-support .box2 .box-c .swiper-slide.swiper-slide-prev{
	margin-right: 0;
}
.fae-support .box2 .box-c .swiper-slide-active{
	margin: 0 183px !important;
	transform: scale(1);
	opacity: 1;
	width: 375px;
}
.fae-support .box2 .box-c .swiper-slide-active .playBtn{
	opacity: 1;
}
.fae-support .box2 .box-c .btn{
	position: absolute;
	top: 50%;
	transform: translateY(-50%);
	z-index: 2;
}
.fae-support .box2 .box-c .btn-prev{
	left: -110px;
}
.fae-support .box2 .box-c .btn-next{
	right: -110px;
}
.fae-support .box2 .swiper-pagination{
	position: relative;
	width: auto;
	display: flex;
	margin-top: 50px;
	justify-content: center;
	bottom: 0;
}
.fae-support .box2 .swiper-pagination-bullet{
	width: 14px;
	height: 5px;
	background: #999999;
	opacity: 0.4;
	margin-right: 8px;
	border-radius: 0;
}
.fae-support .box2 .swiper-pagination-bullet-active{
	transition: all .6s;
	width: 26px;
	background: #1AA6FF;
	opacity: 1;
}
@media (max-width:1280px) {
	.technical-support .box1 .r{
		flex: 1;
	}
}
@media (max-width:1199px) {
	.downlaod .box1 .box-c .list li a{
		padding: 30px;
		clip-path: polygon( 0 0, calc(100% - 50px) 0, 100% 30px,100% 100%,0 100%,0 0);
	}
	.downlaod .box1 .box-c .list li a::before{
		border-width: 15px 25px 15px 25px;
	}
	.downlaod .box1 .box-c .list li .text-title{
		font-size: 20px;
	}
	.downlaod .box1{
		padding-bottom: 70px;
	}
	.fae-support .box1{
		padding: 40px 0 70px;
	}
	.fae-support .box2{
		padding: 70px 0;
	}
	.fae-support .box1 .des{
		font-size: 18px;
	}
	.fae-support .box1 .box-c{
		margin-top: 50px;
	}
	.laboratory .box1 .list li .pic .picBox{
		padding: 5%;
	}
	.laboratory .box1 .list li .pic .text-des{
		line-height: 1.4;
	}
	.laboratory .box1 .list li .title{
		margin-top: 16px;
	}
	.laboratory .box1{
		padding-bottom: 70px;
	}
	.technical-support .box1{
		padding-bottom: 70px;
	}
}
@media (max-width: 1024px) {
	.technical-support .box1{
		padding-bottom: 60px;
	}
	.technical-support .box1 .box-c{
		flex-direction: column;
	}
	.technical-support .box1 .r{
		flex: none;
		width: 100%;
		margin-left: 0;
		margin-top: 40px;
	}
	.laboratory .box1 .list li{
		margin-top: 30px;
	}
	.laboratory .box1 .list li .pic .text-title,
	.laboratory .box1 .list li .title{
		font-size: 20px;
	}
	.fae-support .box2 .box-c,
	.fae-support .box1 .box-c{
		margin-top: 40px;
	}
	.fae-support .box1{
		padding: 30px 0 60px;
	}
	.fae-support .box2{
		padding: 60px 0;
	}
	.downlaod .box1 .box-c .list li, .downlaod .box1 .box-c .list i{
		width: 48%;
	}
	.downlaod .box1{
		padding-bottom: 60px;
	}
	.downlaod .box1 .box-c .pagination{
		margin-top: 40px;
	}
	.fae-support .box1 .des{
		font-size: 16px;
	}
	.fae-support .box1 .box-c{
		flex-direction: column;
	}
	.fae-support .box1 .box-c .l, .fae-support .box1 .box-c .r{
		width: 100%;
	}
	.fae-support .box1 .box-c li{
		min-height: 0;
	}
	.fae-support .box1 .box-c li:not(:last-child){
		margin-bottom: 40px;
	}
	.fae-support .box1 .box-c .li-title{
		font-size: 20px;
	}
	.fae-support .box1 .box-c .c{
		width: 100%;
	}
	.fae-support .box1 .box-c .c img{
		width: auto;
		max-width: 100%;
		display: block;
		margin: 30px auto;
	}
	.fae-support .box2 .box-c .swiper-slide .playBtn{
		width: 50px;
		height: 50px;
		line-height: 50px;
	}
	.fae-support .box2 .box-c .swiper-slide-active{
		margin: 0 100px !important;
	}
	.fae-support .box2 .box-c .btn-prev{
		left: -74px;
	}
	.fae-support .box2 .box-c .btn-next{
		right: -74px;
	}
	.fae-support .box2 .swiper-pagination{
		margin-top: 30px;
	}
	.fae-support .box1 .box-c .l li{
		padding-right: 0;
	}
	.fae-support .box1 .box-c .l li:last-child{
		padding-bottom: 0;
	}
	.fae-support .box1 .box-c .r li{
		padding-left: 0;
	}
	.laboratory .box1{
		padding-bottom: 60px;
	}
	.laboratory .box1 .pagination{
		margin-top: 40px;
	}	
}
@media (max-width: 768px) {
	.technical-support .box1{
		padding: 20px 0 50px;
	}
	.fae-support .box2 .box-c,
	.fae-support .box1 .box-c{
		margin-top: 35px;
	}
	.fae-support .box1{
		padding: 30px 0 50px;
	}
	.fae-support .box2{
		padding: 50px 0;
	}
	.downlaod .box1{
		padding-bottom: 50px;
	}
	.downlaod .box1 .box-c .list li{
		margin-top: 35px;
	}
	.downlaod .box1 .box-c .list li, .downlaod .box1 .box-c .list i{
		width: 100%;
	}
	.downlaod .box1 .box-c .pagination{
		margin-top: 35px;
	}
	.laboratory .box1{
		padding-bottom: 50px;
	}
	.laboratory .box1 .pagination{
		margin-top: 35px;
	}
	.laboratory .box1 .list li{
		width: 100%;
	}
	.laboratory .box1 .list li .title{
		margin-top: 6px;
	}
	.technical-support .box1 .r{
		margin-top: 35px;
	}
}
@media (max-width: 600px) {
	.fae-support .box2 .box-c .swiper{
		width: 100%;
	}
	.fae-support .box2 .box-c .swiper .swiper-slide{
		width: 250px;
		padding: 0;
	}
	.fae-support .box2 .box-c .swiper-slide:not(:last-child){
		margin-right: 30px;
	}
	.fae-support .box2 .box-c .swiper-slide-active{
		margin: 0 30px !important;
	}
	.fae-support .box2 .box-c .btn-prev{
		left: 0;
	}
	.fae-support .box2 .box-c .btn-next{
		right: 0;
	}
	.fae-support .box2 .box-c .swiper-slide.swiper-slide-prev{
		margin-right: 0;
	}
}
@media (max-width: 500px) {
	.fae-support .box1 .box-c .li-des{
		margin-top: 5px;
	}
	.fae-support .box1 .box-c{
		margin-top: 25px;
	}
	.fae-support .box1 .box-c li:not(:last-child){
		margin-bottom: 20px;
		padding-bottom: 10px;
	}
	.technical-support .box1 .r .input input, .technical-support .box1 .r .input.textarea textarea{
		height: 40px;
	}
	.technical-support .box1 .r .input{
		width: 100%;
	}
	.technical-support .box1 .r{
		margin-top: 25px;
	}
	.technical-support .box1{
		padding:  10px 0 40px;
	}
	.laboratory .box1 .pagination{
		margin-top: 30px;
	}
	.laboratory .box1{
		padding-bottom: 40px;
	}
	.fae-support .box1 .box-c .c img{
		width: 270px;
	}
	.fae-support .box2{
		padding: 40px 0;
	}
	.fae-support .box2 .box-c,
	.fae-support .box1 .box-c{
		margin-top: 30px;
	}
	.fae-support .box1{
		padding: 20px 0 40px;
	}
	.fae-support .box2{
		padding: 40px 0;
	}
	.downlaod .box1{
		padding-bottom: 40px;
	}
	.downlaod .box1 .box-c .list li{
		margin-top: 30px;
	}
	.downlaod .box1 .box-c .pagination{
		margin-top: 30px;
	}
	.technical-support .box1 .r .input.textarea textarea{
		height: 100px;
	}
}
</style>
            <div class="laboratory">
				<div class="commonNav wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
					<div class="content1400">
						<div class="swiper">      
							<div class="swiper-wrapper">
                            <?php foreach($settings['laboratory_navigation_list'] as $nav) { ?>
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
							<ul class="list wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                            <?php if ($query->have_posts(  )) {
                                    while($query->have_posts(  )) { 
                                    $query->the_post();
                                    // Retrieve post information
                                    $post_title = get_the_title();
                                    $post_featured_image_id = get_post_thumbnail_id();
                                    $post_featured_image_url = wp_get_attachment_image_url( $post_featured_image_id, 'full' );
                                    $post_date = get_the_date( 'Y.m.d' );
                                    $post_excerpt = wp_trim_words( get_the_excerpt(), 32 ); // Limit excerpt to 15 words
                                    $post_permalink = get_permalink();
                                        ?>
								<li class="hoverLi">
									<a href="<?php echo $post_permalink; ?>">
										<div class="pic">
											<img src="<?php echo $post_featured_image_url; ?>" alt="" class="imgScale">
											<div class="picBox">
												<p class="text-title"><?php echo $post_title; ?></p>
												<p class="text-des"><?php echo $post_excerpt; ?></p>
											</div>
										</div>
										<div class="text-box">
											<p class="title"><?php echo $post_title; ?></p>
										</div>
									</a>
								</li>
								<?php }} ?>
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