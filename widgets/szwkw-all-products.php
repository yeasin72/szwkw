<?php 

use \Elementor\Widget_Base;
class All_Products extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_all_products_widget';
	}

	public function get_title() {
		return esc_html__( 'All Products', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-products';
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

        
        
        $this->add_control(
            'product_count',
            [
                'label' => __( 'Number of Product', 'elementor-custom-post-widget' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5,
            ]
        );


        function get_all_product_categories() {
            $categories = get_terms(array(
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
            ));
        
            $category_options = array();
        
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    $category_options[$category->term_id] = $category->name;
                }
            }
        
            return $category_options;
        }

        $this->add_control(
            'product_category',
            [
                'label' => 'Product Category',
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => get_all_product_categories(),
            ]
        );

        $this->end_controls_section();

		

	}


    protected function render() {
		$settings = $this->get_settings_for_display();
        $product_per_page = $settings['product_count'];
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $product_per_page,
			'paged' => $paged,
        );
        $products = new WP_Query($args);
		$total_pages = $products->max_num_pages;
		$categories = get_terms(array(
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
		));
		$tags = get_terms(array(
			'taxonomy' => 'product_tag',
			'hide_empty' => false,
		));
        ?>
<style>
	.current-sensor{
		background-color: RGBA(247, 249, 252, 1);
	}
	.current-sensor .box1{
		padding: 70px 0 127px;
	}
	.current-sensor .box1 .box-c .list{
		display: flex;
		justify-content: space-between;
		flex-wrap: wrap;
	} 
	.current-sensor .box1 .box-c .list li{
		margin-top: 40px;
		background-color: #fff;
	}
	.current-sensor .box1 .box-c .list li,
	.current-sensor .box1 .box-c .list i{
		width: 32%;
	}
	.current-sensor .box1 .box-c .list li a,
	.current-sensor .box2 .box-c .swiper-slide a{
		position: relative;
	}
	.current-sensor .box1 .box-c .list li .img{
		position: relative;
		padding-top: 66.73%;
	}
	.current-sensor .box1 .box-c .list li .pic,
	.current-sensor .box2 .box-c .swiper-slide .pic{
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.current-sensor .box1 .box-c .list li .pic img,
	.current-sensor .box2 .box-c .swiper-slide .pic img{
		max-width: 100%;
		max-height: 100%;
		object-fit: cover;
		width: auto;
	}
	.current-sensor .box1 .box-c .list .text-box{
		border-top: 1px solid rgba(51, 51, 51, .07);
		padding: 37px 50px 60px;
	}
	.current-sensor .box1 .box-c .list .text-title,
	.current-sensor .box2 .box-c .swiper-slide .text-title{
		font-size: 24px;
		font-family: ProximaNova-bold, sans-serif;
		color: #222222;
		line-height: 1.25;
		display: -webkit-box;
		-webkit-box-orient: vertical;
		-webkit-line-clamp: 1;
		overflow: hidden;
		text-overflow: ellipsis;
		transition: all .6s;
	}
	.current-sensor .box1 .box-c .list li:hover .text-title,
	.current-sensor .box2 .box-c .swiper-slide:hover .text-title{
		color: rgba(26, 166, 255, 1);
	}
	.current-sensor .box1 .box-c .list .text-des{
		font-size: 16px;
		font-family: ProximaNova, sans-serif;
		font-weight: 300;
		color: #777777;
		line-height: 1.5;
		margin-top: 19px;
		display: -webkit-box;
		-webkit-box-orient: vertical;
		-webkit-line-clamp: 4;
		overflow: hidden;
		text-overflow: ellipsis;
	}
	.current-sensor .box1 .box-c .list .commonMore,
	.current-sensor .box2 .box-c .swiper-slide .commonMore{
		position: absolute;
		left: 0;
		bottom: 0;
		transform: translateY(50%);
	}
	.current-sensor .box2{
		padding: 100px 0;
		background-color: #fff;
	}
	.current-sensor .box2 .box-c{
		margin-top: 50px;
	}
	.current-sensor .box2 .box-c .swiper{
		padding-bottom: 27px;
	}
	.current-sensor .box2 .box-c .swiper-slide{
		width: 23.5%;
		background-color: #fff;
		border: 1px solid rgba(241, 241, 241, 1);
	}
	.current-sensor .box2 .box-c .swiper-slide:not(:last-child){
		margin-right: 2%;
	}
	.current-sensor .box2 .box-c .swiper-slide .img{
		position: relative;
		padding-top: 66.56%;
	}
	.current-sensor .box2 .box-c .swiper-slide .text-box{
		border-top: 1px solid rgba(241, 241, 241, 1);
	}
	.current-sensor .box2 .box-c .swiper-slide .text-box{
		padding: 27px 29px 60px;
	}
	.current-sensor .box2 .box-c .swiper-slide .text-des{
		font-size: 16px;
		font-family: ProximaNova, sans-serif;
		font-weight: 300;
		color: #777777;
		line-height: 1.5;
		margin-top: 17px;
		display: -webkit-box;
		-webkit-box-orient: vertical;
		-webkit-line-clamp: 4;
		overflow: hidden;
		text-overflow: ellipsis;
	}
	.current-sensor .box2 .swiper-pagination,
	.product-details .box4 .swiper-pagination{
		position: relative;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-top: 77px;
	}
	.current-sensor .box2 .swiper-pagination-bullet,
	.product-details .box4 .swiper-pagination-bullet{
		width: 14px;
		height: 5px;
		background: rgba(153, 153, 153, .4);
		transition: all .6s;
		border-radius: 0;
		opacity: 1;
	}
	.current-sensor .box2 .swiper-pagination-bullet-active,
	.product-details .box4 .swiper-pagination-bullet-active{
		width: 26px;
		background: #1AA6FF;
	}
	.current-sensor .box3{
		padding: 63px 0 100px;
	}
	.current-sensor .box3 .box-c{
		display: flex;
		justify-content: space-between;
	}
	.current-sensor .box3 .l{
		width: 290px;
	}
	.current-sensor .box3 .l .l-title{
		font-size: 20px;
		font-family: ProximaNova-bold, sans-serif;
		font-weight: bold;
		color: #FFFFFF;
		line-height: 86px;
		background-color: rgba(1, 60, 176, 1);
		padding: 0 24px;
	}
	.current-sensor .box3 .l .list .li-t{
		padding: 23px 0;
		border-bottom: 1px solid rgba(51, 51, 51, .05);
		display: flex;
		align-items: center;
		justify-content: space-between;
		color: #222222;
		transition: all .6s;
	}
	.current-sensor .box3 .l .list .li-t .text{
		font-family: ProximaNova-bold, sans-serif;
		font-size: 20px;
		line-height: 25px;
		flex: 1;
		margin-right: 20px;
	}
	.current-sensor .box3 .l .list li.active .li-t{
		color: #1AA6FF;
		
	}
	.current-sensor .box3 .l .list li .li-t .icon-xia{
		font-size: 26px;
		transform: rotate(-90deg);
		transition: all .6s;
	}
	.current-sensor .box3 .l .list li.active .li-t .icon-xia{
		transform: rotate(0deg);
	}
	.current-sensor .box3 .l .list li .li-b{
		padding: 18px 0 32px;
		display: none;
		border-bottom: 1px solid rgba(51, 51, 51, .05);
	}
	.current-sensor .box3 .l .list li .li-b a{
		display: block;
		font-size: 16px;
		font-family: ProximaNova, sans-serif;
		font-weight: 300;
		color: #666666;
		line-height: 30px;
		padding: 0 10px;
	}
	.current-sensor .box3 .l .list li .li-b a.active,
	.current-sensor .box3 .l .list li .li-b a:hover{
		color: #1AA6FF;
	}
	.current-sensor .box3 .r{
		flex: 1;
		margin-left: 60px;
	}
	.current-sensor .box3 .r .list li{
		border-top: 1px solid rgba(22, 26, 33, .05);
	}
	.current-sensor .box3 .r .list li:not(:last-child){
		margin-bottom: 40px;
	}
	.current-sensor .box3 .r .list li a{
		display: flex;
		justify-content: space-between;
	}
	.current-sensor .box3 .r .list li .pic{
		width: 46.15%;
		min-height: 320px;
		display: flex;
		align-items: center;
		justify-content: center;
		background-color: #fff;
	}
	.current-sensor .box3 .r .list li .pic img{
		max-width: 100%;
		max-height: 100%;
		width: auto;
	}
	.current-sensor .box3 .r .list li .text-box{
		width: 486px;
		max-width: 50%;
		padding-top: 48px;
	}
	.current-sensor .box3 .r .list li .text-des{
		font-size: 18px;
		font-family: ProximaNova-bold, sans-serif;
		color: #013CB0;
		line-height: 1;
	}
	.current-sensor .box3 .r .list li .text-title{
		font-size: 36px;
		font-family: ProximaNova-bold, sans-serif;
		color: #222222;
		line-height: 1.27;
	}
	.current-sensor .box3 .r .list li .text{
		font-size: 16px;
		font-family: ProximaNova, sans-serif;
		font-weight: 300;
		color: #777777;
		line-height: 1.37;
		margin-top: 15px;
		display: -webkit-box;
		-webkit-box-orient: vertical;
		-webkit-line-clamp: 3;
		overflow: hidden;
		text-overflow: ellipsis;
	}
	.current-sensor .box3 .r .list li .commonMore{
		margin-top: 48px;
	}
	.current-sensor .box3 .pagination{
		margin-top: 75px;
	}
	.product-details{
		padding-top: 90px;
		background-color: rgba(247, 249, 252, 1);
	}
	.product-details .box1{
		padding: 50px 0 0;
		background-color: #fff;
	}
	.product-details .box1 .title{
		font-size: 36px;
		font-family: ProximaNova-bold, sans-serif;
		color: #222222;
		line-height: 1.22;
	}
	.product-details .box1 .box-c{
		margin-top: 42px;
		display: flex;
		justify-content: space-between;
	}
	.product-details .box1 .box-c .l{
		width: 34.28%;
		height: 320px;
	}
	.product-details .box1 .box-c .pic{
		display: flex;
		align-items: center;
		justify-content: center;
		height: 100%;
		border: 1px solid #E3E3E3;
	}
	.product-details .box1 .box-c .pic img{
		width: auto;
		max-width: 100%;
		max-height: 100%;
	}
	.product-details .box1 .box-c .c{
		flex: 1;
		margin: 0 75px;
		padding-top: 20px;
	}
	.product-details .box1 .box-c .c .text-box{
		width: 485px;
		max-width: 100%;
	}
	.product-details .box1 .box-c .c .text-des{
		font-size: 18px;
		font-family: ProximaNova-bold, sans-serif;
		color: #013CB0;
		line-height: 1;
	}
	.product-details .box1 .box-c .c .text-title{
		font-size: 48px;
		font-family: ProximaNova-bold, sans-serif;
		color: #222222;
		line-height: 1.2;
	}
	.product-details .box1 .box-c .c .text{
		font-size: 16px;
		font-family: ProximaNova, sans-serif;
		font-weight: 300;
		color: #777777;
		line-height: 24px;
		margin-top: 20px;
	}
	.product-details .box1 .box-c .r{
		align-self: center;
	}
	.product-details .box1 .box-c .r a{
		display: flex;
		font-size: 16px;
		font-family: ProximaNova-bold, sans-serif;
		color: #013BAF;
		line-height: 36px;
		align-items: center;
	}
	.product-details .box1 .box-c .r a .iconfont{
		margin-right: 10px;
	}
	.product-details .box2{
		padding: 80px 0 65px;
		background-color: #fff;
	}
	.product-details .box2 .innerTitle{
		text-align: left;
	}
	.product-details .box2 .line{
		position: relative;
		margin-top: 30px;
		border-top: 1px solid rgba(51, 51, 51, .07);
	}
	.product-details .box2 .line:before{
		position: absolute;
		bottom: 0;
		top: 0;
		content: "";
		height: 2px;
		width: 85px;
		background-color: rgba(1, 58, 174, 1);
		box-sizing: border-box;
	}
	.product-details .box2 .text-box{
		font-size: 16px;
		font-family: ProximaNova, sans-serif;
		font-weight: 300;
		color: #777777;
		line-height: 24px;
		margin-top: 50px;
	}
	.product-details .box2 .text-box img{
		display: block;
		margin: 0 auto;
		max-width: 100%;
	}
	.product-details .box2 .text-box p{
		display: flex;
		align-items: center;
		flex-wrap: wrap;
	}
	.product-details .box2 .text-box p:not(:last-child){
		margin-bottom: 12px;
	}
	.product-details .box2 .text-box p .text{
		flex: 1;
	}
	.product-details .box2 .text-box .fill-line{
		display: inline-block;
		width: 8px;
		height: 3px;
		background: #013BAF;
		opacity: 0.5;
		margin-right: 8px;
	}
	.product-details .box3{
		background-color: #fff;
		padding-bottom: 86px;
	}
	.product-details .box3 .content1400{
		overflow: auto;
	}
	.product-details .box3 table{
		width: 100%;
		border-collapse:collapse;
		text-align: center;
		min-width: 1260px;
	}
	.product-details .box3 table th{
		background-color: rgba(1, 58, 174, 1);
		font-size: 18px;
		font-family: ProximaNova, sans-serif;
		font-weight: bold;
		color: #FFFFFF;
		line-height: 20px;
		padding: 18px 20px;
		border-right: 1px solid rgba(249, 250, 252, .1);
	}
	.product-details .box3 table tr{
		background: #EEF2F9;
	}
	.product-details .box3 table tr:nth-child(2n+1){
		background-color: rgba(238, 242, 249, .5);
	}
	.product-details .box3 table tr:hover{
		outline: 1px solid rgba(1, 58, 174, .2);
	}
	.product-details .box3 table td{
		font-size: 16px;
		font-family: ProximaNova, sans-serif;
		font-weight: 300;
		color: #53617C;
		line-height: 20px;
		padding: 13px 10px;
		border-right: 1px solid rgba(0, 22, 66, .05);
	}
	.product-details .box3 table td a{
		display: flex;
		align-items: center;
		justify-content: center;
		width: 80px;
		height: 34px;
		border: 1px solid rgba(1, 58, 174, .2);
		font-size: 16px;
		font-family: ProximaNova-bold, sans-serif;
		color: #013AAE;
		line-height: 20px;
		margin: 0 auto;
	}
	.product-details .box3 table tr:hover td a{
		color: #fff;
		background: linear-gradient(68deg, #013AAE 0%, #0077D3 99%);
	}
	.product-details .box3 table td a .iconfont{
		margin-right: 5px;
	}
	.product-details .box4{
		padding: 80px 0 0;
		background-color: rgba(247, 249, 252, 1);
	}
	.product-details .box4 .box-t{
		display: flex;
		align-items: center;
		justify-content: center;
		margin-top: 30px;
	}
	.product-details .box4 .box-t a{
		min-width: 154px;
		padding: 0 10px;
		height: 40px;
		background: rgba(1,58,174,0.1);
		border: 1px solid rgba(1, 58, 174, .2);
		line-height: 38px;
		text-align: center;
		font-size: 18px;
		font-family: ProximaNova-bold, sans-serif;
		color: #013AAE;
		margin: 0 5px;
	}
	.product-details .box4 .box-t a.active{
		color: #FFFFFF;
		border: none;
		background: linear-gradient(68deg, #013AAE 0%, #0077D3 99%);
	}
	.product-details .box4 .box-c{
		padding-bottom: 100px;
		overflow: hidden;
	}
	.product-details .box4 .box-c .items{
		display: none;
		animation: fadeInUpSmall 1s forwards;
	}
	.product-details .box4 .box-c .items.active{
		display: block;
	}
	.product-details .box4 .box-c .swiper{
		padding-top: 50px;
		overflow: visible;
	}
	.product-details .box4 .box-c .swiper-slide{
		position: relative;
		width: 32%;
	}
	.product-details .box4 .box-c .swiper-slide:not(:last-child){
		margin-right: 2%;
	}
	.product-details .box4 .box-c .swiper-slide a::before{
		position: absolute;
		right: -1px;
		top: -1px;
		content: "";
		border: 1px solid #fff;
		border-color: RGBA(247, 249, 252, 1) RGBA(247, 249, 252, 1) rgba(235, 239, 245, 1) rgba(235, 239, 245, 1) ; 
		border-width: 20px 30px 20px 30px;
		z-index: 2;
	}
	.product-details .box4 .box-c .swiper-slide:hover a::before{
		border-left-color: rgba(27, 78, 182, 1);
		border-bottom-color: rgba(27, 78, 182, 1);
	}
	.product-details .box4 .box-c .swiper-slide:hover a{
		background-image: url(../img/product-details-box4-bg.png);
		background-size: cover;
		background-color: #0071cf;
	}
	.product-details .box4 .box-c .swiper-slide:hover{
		filter: drop-shadow(0px 24px 38px rgba(1,78,174,0.32))
	}
	.product-details .box4 .box-c .swiper-slide a{
		position: relative;
		display: block;
		padding: 45px 40px 37px;
		clip-path: polygon( 0 0, calc(100% - 60px) 0, 100% 40px,100% 100%,0 100%,0 0);
		background-color: rgba(255, 255, 255, 1);
	}
	.product-details .box4 .box-c .swiper-slide .text-box{
		min-height: 130px;
	}
	.product-details .box4 .box-c .swiper-slide .text-des{
		font-size: 16px;
		font-family: ProximaNova, sans-serif;
		font-weight: bold;
		color: #013AAE;
		line-height: 1;
	}
	.product-details .box4 .box-c .swiper-slide:hover .text-des,
	.product-details .box4 .box-c .swiper-slide:hover .date{
		color: #fff;
		opacity: .5;
	}
	.product-details .box4 .box-c .swiper-slide .text-title{
		font-size: 22px;
		font-family: ProximaNova-bold, sans-serif;
		color: #1C1C1C;
		line-height: 1.36;
		margin-top: 5px;
	}
	.product-details .box4 .box-c .swiper-slide:hover .text-title{
		color: #fff;
	}
	.product-details .box4 .box-c .swiper-slide .date{
		font-size: 16px;
		font-family: ProximaNova, sans-serif;
		font-weight: 300;
		color: #999999;
		line-height: 1;
		margin-top: 20px;
	}
	.product-details .box4 .box-c .swiper-slide .downloadBtn{
		display: flex;
		align-items: center;
		justify-content: space-between;
		font-size: 16px;
		font-family: ProximaNova, sans-serif;
		font-weight: bold;
		color: #C8C8C8;
		line-height: 1;
	}
	.product-details .box4 .box-c .swiper-slide:hover .downloadBtn{
		color: #fff;
	}
	.product-details .box4 .box-c .swiper-slide .icon{
		width: 40px;
		height: 40px;
		line-height: 40px;
		text-align: center;
		background: rgba(235, 239, 245, .7);
		border-radius: 4px;
		color: rgba(153, 153, 153, 1);
	}
	.product-details .box4 .box-c .swiper-slide:hover .icon{
		background-color: rgba(255, 255, 255, .07);
	}
	.product-details .box4 .box-c .swiper-slide .icon .iconfont{
		font-size: 18px;
	}
	.product-details .box4 .box-c .swiper-slide:hover .icon .iconfont{
		color: rgba(255, 255, 255, 1);
	}
	.product-details .box4 .swiper-pagination{
		margin-top: 60px;
	}
	.product-details .box4 .swiper-pagination-bullet-active{
		background-color: rgba(1, 58, 174, 1);
	}
	@media (max-width: 1440px) {
		.product-details .box1 .box-c .c .text-box{
			width: 100%;
		}
		.product-details .box1 .box-c .c{
			margin: 0 40px;
		}
		.product-details .box1 .title{
			font-size: 30px;
		}
		.product-details .box1 .box-c .c .text-title{
			font-size: 36px;
		}
	}
	@media (max-width:1280px) {
		.product-details .box1 .title{
			font-size: 28px;
		}
		.product-details .box1 .box-c .c .text-title{
			font-size: 30px;
		}
		.current-sensor .box3 .r .list li .text-title{
			font-size: 30px;
		}
		.product-details{
			padding-top: 70px;
		}
	}
	@media (max-width: 1199px) {
		.product-details .box3{
			padding-bottom: 70px;
		}
		.product-details .box4{
			padding-top: 70px;
		}
		.product-details .box1 .title{
			font-size: 26px;
		}
		.product-details .box1 .box-c .c .text-title{
			font-size: 28px;
		}
		.product-details{
			padding-top: 60px;
		}
		.current-sensor .box3 .r .list li .text-title{
			font-size: 26px;
		}
		.current-sensor .box1{
			padding: 50px 0 70px;
		}
		.current-sensor .box2{
			padding: 70px 0;
		}
		.current-sensor .box1 .box-c .list .text-title, .current-sensor .box2 .box-c .swiper-slide .text-title{
			font-size: 20px;
		}
		.product-details .box4 .box-c .swiper-slide a{
			padding: 30px;
			clip-path: polygon( 0 0, calc(100% - 50px) 0, 100% 30px,100% 100%,0 100%,0 0);
		}
		.product-details .box4 .box-c .swiper-slide a::before{
			border-width: 15px 25px 15px 25px;
		}
		.product-details .box4 .box-c .swiper-slide .text-title{
			font-size: 20px;
		}
		.product-details .box4 .box-c{
			padding-bottom: 70px;
		}
		.current-sensor .box3{
			padding: 50px 0 70px;
		}
		.current-sensor .box3 .r .list li .commonMore{
			margin-top: 30px;
		}
		.current-sensor .box3 .r .list li .text-box{
			padding-top: 30px;
		}
		.current-sensor .box3 .r .list li .pic{
			min-height: 280px;
		}
		.current-sensor .box3 .r{
			margin-left: 30px;
		}
		.product-details .box2{
			padding: 70px 0;
		}
	}
	@media (max-width: 1024px) {
		.product-details .box3{
			padding-bottom: 60px;
		}
		.product-details .box4{
			padding-top: 60px;
		}
		.product-details .box1 .title{
			font-size: 24px;
		}
		.product-details .box1 .box-c .c .text-title{
			font-size: 26px;
		}
		.current-sensor .box3 .l .l-title,
		.current-sensor .box3 .l .list .li-t .text{
			font-size: 18px;
		}
		.current-sensor .box3 .box-c{
			flex-direction: column;
		}
		.current-sensor .box3 .l{
			width: 100%;
		}
		.current-sensor .box3 .l .l-title{
			line-height: 60px;
		}
		.current-sensor .box3 .l .list .li-t{
			padding: 15px 0;
		}
		.current-sensor .box3 .l .list li .li-b{
			padding: 12px 0 20px;
		}
		.current-sensor .box3 .r{
			flex: none;
			margin-left: 0;
			margin-top: 40px;
		}
		.current-sensor .box3 .r .list li .text-title{
			font-size: 24px;
		}
		.product-details .box4 .box-c .swiper-slide{
			width: 48%;
		}
		.product-details .box4 .box-c{
			padding-bottom: 60px;
		}
		.current-sensor .box1{
			padding: 40px 0 60px;
		}
		.current-sensor .box2{
			padding: 60px 0;
		}
		.current-sensor .box2 .swiper-pagination, .product-details .box4 .swiper-pagination{
			margin-top: 30px;
		}
		.current-sensor .box2 .box-c{
			margin-top: 40px;
		}
		.current-sensor .box2 .box-c .swiper-slide{
			width: 32%;
		}
		.current-sensor .box1 .box-c .list .text-box{
			padding: 25px 25px 50px;
		}
		.current-sensor .box3{
			padding: 40px 0 60px;
		}
		.current-sensor .box3 .pagination{
			margin-top: 40px;
		}
		.product-details .box1 .box-c{
			margin-top: 40px;
			flex-direction: column;
		}
		.product-details .box1 .box-c .l{
			width: 100%;
		}
		.product-details .box1 .box-c .c{
			flex: none;
			width: 100%;
			margin: 30px 0;
			padding-top: 0;
		}
		.product-details .box1 .box-c .r{
			align-self: flex-start;
		}
		.product-details .box2{
			padding: 60px 0;
		}
		.product-details .box2 .line{
			margin-top: 15px;
		}
		.product-details .box4 .box-c .swiper{
			padding-top: 40px;
		}
		.product-details .box2 .text-box{
			margin-top: 40px;
		}
	}
	@media (max-width: 768px) {
		.product-details .box3 table th{
			font-size: 14px;
			padding: 10px;
			line-height: 1.5;
		}
		.product-details .box3 table td{
			font-size: 12px;
			line-height: 1.5;
			padding: 10px;
		}
		.product-details .box3 table td a{
			height: 25px;
			width: 60px;
			font-size: 12px;
		}
		.product-details .box4 .box-t a{
			height: 36px;
			line-height: 34px;
			min-width: 120px;
			font-size: 14px;
		}
		.product-details{
			padding-top: 0;
		}
		.product-details .box3{
			padding-bottom: 50px;
		}
		.product-details .box2 .text-box{
			margin-top: 35px;
		}
		.product-details .box4 .box-c .swiper{
			padding-top: 35px;
		}
		.product-details .box4{
			padding-top: 50px;
		}
		.product-details .box2{
			padding: 50px 0;
		}
		.product-details .box1 .title{
			font-size: 22px;
		}
		.product-details .box1 .box-c .c .text-title{
			font-size: 24px;
		}
		.current-sensor .box3{
			padding: 30px 0 50px;
		}
		.current-sensor .box3 .r .list li .text-title{
			font-size: 22px;
		}
		.product-details .box4 .box-c{
			padding-bottom: 50px;
		}
		.product-details .box4 .box-c .swiper-slide{
			width: 100%;
		}
		.current-sensor .box1 .box-c .list .text-title, .current-sensor .box2 .box-c .swiper-slide .text-title{
			font-size: 18px;
		}
		.current-sensor .box1{
			padding: 30px 0 50px;
		}
		.current-sensor .box2{
			padding: 50px 0;
		}
		.current-sensor .box2 .box-c,.current-sensor .box1 .box-c .list li{
			margin-top: 35px;
		}
		.current-sensor .box2 .box-c .swiper-slide,
		.current-sensor .box1 .box-c .list li, .current-sensor .box1 .box-c .list i{
			width: 49%;
		}
		.current-sensor .box1 .box-c .list li{
			margin-bottom: 10px;
		}
		.current-sensor .box3 .pagination{
			margin-top: 35px;
		}
		.product-details .box1{
			padding-top: 40px;
		}
		.product-details .box1 .box-c{
			margin-top: 35px;
		}
	}
	@media (max-width: 650px) {
		.current-sensor .box3 .r .list li a{
			flex-direction: column;
		}
		.current-sensor .box3 .r .list li .pic{
			width: 100%;
		}
		.current-sensor .box3 .r .list li .text-box{
			width: 100%;
			max-width: 100%;
		}
	}
	@media (max-width: 500px) {
		.product-details .box4 .box-t{
			margin-top: 20px;
		}
		.product-details .box3{
			padding-bottom: 50px;
		}
		.product-details .box2 .text-box{
			margin-top: 30px;
		}
		.product-details .box1 .box-c .c{
			margin: 25px 0;
		}
		.product-details .box1 .box-c{
			margin-top: 30px;
		}
		.product-details .box1{
			padding-top: 30px;
		}
		.product-details .box4 .box-c .swiper{
			padding-top: 30px;
		}
		.product-details .box4{
			padding-top: 40px;
		}
		.product-details .box2{
			padding: 30px 0 40px;
		}
		.product-details .box1 .title{
			font-size: 20px;
		}
		.product-details .box1 .box-c .c .text-title{
			font-size: 22px;
		}
		.product-details{
			padding-top: 50px;
		}
		.current-sensor .box3 .r .list li .text{
			margin-top: 5px;
		}
		.current-sensor .box3 .r .list li .text-box{
			padding-top: 20px;
		}
		.current-sensor .box3 .r .list li .commonMore{
			margin-top: 20px;
		}
		.current-sensor .box3 .pagination{
			margin-top: 30px;
		}
		.current-sensor .box3{
			padding: 20px 0 40px;
		}
		.current-sensor .box3 .r .list li .text-title{
			font-size: 20px;
		}
		.product-details .box4 .box-c{
			padding-bottom: 40px;
		}
		.current-sensor .box1{
			padding: 20px 0 40px;
		}
		.current-sensor .box2{
			padding: 40px 0;
		}
		.current-sensor .box2 .box-c,.current-sensor .box1 .box-c .list li{
			margin-top: 30px;
		}
		.current-sensor .box2 .box-c .swiper-slide,.current-sensor .box1 .box-c .list li, .current-sensor .box1 .box-c .list i{
			width: 100%;
		}
		.product-details .box1 .box-c .c .text{
			margin-top: 10px;
		}
	}
</style>
            <div class="current-sensor">
				<div class="commonBread content1400 wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
					<a href="/"><span class="iconfont icon-home"></span></a>
                    <?php foreach($settings['breadcumb_list'] as $menu) { ?>
					<span class="iconfont icon-youjiantou11"></span>
					<a href="<?php echo $menu['item_link']['url']; ?>"><?php echo $menu['item_name']; ?></a>
                    <?php } ?>
				</div>
				<div class="box3">
					<div class="content1400">
						<div class="box-c">
							<div class="l">
								<div class="l-title wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">Products</div>
								<ul class="list wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
									<li class="active">
										<a href="javascript:;" class="li-t">
											<span class="text">Categories</span>
											<span class="iconfont icon-xia"></span>
										</a>
										<div class="li-b" style="display: block;">
										<?php foreach($categories as $category) { ?>
											<a href=""><?php echo $category->name; ?></a>
										<?php } ?>
											
										</div>
									</li>
								</ul>
							</div>
							<div class="r">
								<ul class="list wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
									<?php if ($products->have_posts()) {
    								while ($products->have_posts()) {
        							$products->the_post();
									// Get product data
									$product = wc_get_product(get_the_ID());
									$product_name = get_the_title();
									$product_categories = wp_get_post_terms(get_the_ID(), 'product_cat', array('fields' => 'names'));
									$product_description = wp_trim_words(get_the_content(), 20);
									$product_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
									$product_details_link = get_permalink();
									?>
									<li class="hoverLi">
										<a href="<?php echo $product_details_link; ?>">
											<div class="pic">
												<img src="<?php echo $product_image_url; ?>" alt="" class="imgScale">
											</div>
											<div class="text-box">
												<p class="text-des"><?php echo implode(', ', $product_categories); ?></p>
												<p class="text-title"><?php echo $product_name; ?></p>
												<div class="text">
													<p><?php echo $product_description; ?></p>
												</div>
												<div class="commonMore"><span>Learn More</span><span class="iconfont icon-youjiantou11"></span></div>
											</div>
										</a>
									</li>
									<?php }
								} ?>
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
			</div>
			<script type="text/javascript">
				$(".current-sensor .box3 .l .list li").click(function(){
					$(this).toggleClass("active")
					$(this).find(".li-b").slideToggle("active")
					$(this).siblings().removeClass("active").find(".li-b").slideUp();
				})
			</script>
        <?php
    }
}