<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

class Header_Widget extends Widget_Base {

    public function get_name() {
        return 'app-header-widget';
    }

    public function get_title() {
        return 'Header';
    }

    public function get_icon() {
        return 'eicon-header';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Header section', 'elementor-nested-repeater-widget' ),
            ]
        );

        $this->add_control(
			'header_logo',
			[
				'label' => esc_html__( 'Header Logo', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);
        $this->add_control(
			'header_white_logo',
			[
				'label' => esc_html__( 'Header white Logo', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);
        $this->add_control(
			'header_right_button_name',
			[
				'label' => __( 'Header Right Button Name', 'elementor-nested-repeater-widget' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'CONTACT', 'elementor-nested-repeater-widget' ),
                'label_block' => true,
			]
		);
        $this->add_control(
			'header_right_button_url',
			[
				'label' => esc_html__( 'Button Link', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
			]
		);

        $repeater_main = new Repeater();

        $repeater_inner = new Repeater();

        $repeater_inner->add_control(
            'submenu_item',
            [
                'label' => __( 'Submenu name', 'elementor-nested-repeater-widget' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Browse By Category', 'elementor-nested-repeater-widget' ),
                'label_block' => true,
            ]
        );

        $repeater_inner->add_control(
            'submenu_item_link',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
			]
        );
        
        $repeater_inner->add_control(
            'show_submenu_image',
			[
				'label' => esc_html__( 'Show Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
        );
        $repeater_inner->add_control(
            'submenu_image',
			[
				'label' => esc_html__( 'Submenu image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
        );

        $repeater_main->add_control(
            'menu_item',
            [
                'label' => __( 'Menu name', 'elementor-nested-repeater-widget' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Current Sensor ', 'elementor-nested-repeater-widget' ),
                'label_block' => true,
            ]
        );
        $repeater_main->add_control(
            'menu_item_link',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
			]
        );

        $repeater_main->add_control(
            'nested_items',
            [
                'label' => __( 'Nested Items', 'elementor-nested-repeater-widget' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater_inner->get_controls(),
                'title_field' => '{{{ submenu_item }}}',
            ]
        );

        $this->add_control(
            'main_items',
            [
                'label' => __( 'Header Menu', 'elementor-nested-repeater-widget' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater_main->get_controls(),
                'title_field' => '{{{ menu_item }}}',
            ]
        );

        $this->add_control(
            'search_input',
            [
                'label' => __( 'Search Input', 'elementor-search-widget' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => __( 'Enter your search query', 'elementor-search-widget' ),
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        ?>
            <div class="header">
				<div class="content1600">
					<a href="/" class="logo">
						<img src="<?php echo $settings['header_white_logo']['url']; ?>" alt="" class="img1">
						<img src="<?php echo $settings['header_logo']['url']; ?>" alt="" class="img2">
					</a>
					<div class="r">
						<ul class="nav">
                            <?php foreach($settings['main_items'] as $menu) {  ?>
							<li>
								<a href="<?php echo $menu['menu_item_link']['url']; ?>"><?php echo $menu['menu_item']; ?></a>
								<div class="subNav">
									<div class="subNavContainer">
										<p class="sub-title"><?php echo $menu['menu_item']; ?></p>
										<div class="subNav-c">


											<div class="productList">

                                                <?php foreach($menu['nested_items'] as $item) { 
                                                
                                                if ($item['show_submenu_image'] == "yes") {
                                                    ?>
                                                    <a href="<?php echo $item['submenu_item_link']['url']; ?>" class="item">
													<div class="icon">
														<div class="icon-container">
															<img src="<?php echo $item['submenu_image']['url']; ?>" alt="">
														</div>
													</div>
													<div class="text-box">
														<p class="title"><?php echo $item['submenu_item']; ?></p>
													</div>
												</a>
                                                    <?php
                                                }}
                                                ?>
											</div>
                                            <div class="navList navList1">
                                            <?php foreach($menu['nested_items'] as $item) { 
                                                
                                                if ($item['show_submenu_image'] != "yes") {
                                                    ?>
												<a href="<?php echo $item['submenu_item_link']['url']; ?>"><?php echo $item['submenu_item']; ?></a>
                                                <?php
                                                }}
                                                ?>
											</div>
										</div>
									</div>
								</div>
							</li>
                            <?php } ?>
						</ul>
						<div class="language">
							<div class="language-t">EN <span class="iconfont icon-zuojiantou1"></span></div>
							<div class="language-b">中文</div>
						</div>
						<div class="headerSearch">
							<span class="iconfont icon-sousuo searchBtn"></span>
							<div class="searchContainer">
								<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input type="text" placeholder="<?php echo esc_attr( $settings['search_input'] ); ?>" value="<?php echo get_search_query(); ?>" name="s" >
									<div class="submit"><span class="iconfont icon-sousuo"></span></div>
								</form>
							</div>
						</div>
						<div class="m-right-buttom">
							<div class="in"><span></span></div>
						</div>
						<a href="<?php echo $settings['header_right_button_url']['url']; ?>" class="contactBtn"><?php echo $settings['header_right_button_name']; ?></a>
					</div>
				</div>
			</div>
			<div class="m-navbar">
				<ul class="">
                <?php foreach($settings['main_items'] as $menu) {  ?>
					<li class="">
						<a href="<?php echo $menu['menu_item_link']['url']; ?>" class=""><span><?php echo $menu['menu_item']; ?></span></a>
					</li>
					<?php } ?>
				</ul>
			</div>
            <script>
                $(".index-form .icon-guanbi").on("click", function() {
	$(".index-form").addClass("active");
	setTimeout(function() {
		$(".index-form").removeClass("active");
	}, 8000)
})
$(".header .header-search  .icon-sousuo").on("click", function() {
	var this_ = $(".header .header-search .searchbox")
	this_.hasClass("active") ? this_.removeClass("active") : this_.addClass("active")
})
var thisH = 0;
$(document).ready(function() {
	var swi = true;
	$(document).on("scroll", scro)
	scro();

	function scro() {
		thisH = $(this).scrollTop();
		if(!$(".header").hasClass("active1")){
			if (thisH >= 20 && swi) {
				$(".header").addClass("active")
				swi = false;
			} else if (thisH < 20 && !swi) {
				$(".header").removeClass("active")
				swi = true;
			}
		}
		if (thisH > 0) {
			$(".backTop").show()
		} else {
			$(".backTop").hide()
		}
	}
});
$(".m-right-buttom").click(function() {
	$(this).hasClass("active") ? $(this).removeClass("active") : $(this).addClass("active");
	if (!$(".m-navbar").hasClass("active")) {
		$('.m-navbar').fadeIn(360).addClass("active")
		var liTime = 0.12;
		$(".m-navbar li").each(function() {
			$(this).css('transition-delay', liTime + 's');
			liTime += 0.12;
		});
	} else {
		$('.m-navbar').fadeOut(360).removeClass("active")
		$(".m-navbar li").css('transition-delay', '0s')
	}
})
var innerNav;
if ($(".commonNav .swiper").length > 0) {
	innerNav = new Swiper(".commonNav .swiper", {
		slidesPerView: "auto",
	})
	innerNav.slideTo($(".commonNav .swiper-slide.active").index())
}

$(".backTop").click(function() {
	$('body,html').stop().animate({
		scrollTop: 0
	}, 400)

})
$(function() {
	// setLoaction()
	var href = window.location.href;
	var array = href.split("#");
	if (array.length > 1) {
		var offset = $("." + array[1]).offset().top
		$("html,body").animate({
			scrollTop: offset - $(".header").height()
		}, 300);
	}
}())

window.onhashchange = function() {
	setLoaction()
};
$(".header .nav ul li .subNav .subNav-b a").click(function() {
	setLoaction()
})

function setLoaction() {
	var href = window.location.href;
	var array = href.split("#");
	if (array.length > 1) {
		var offset = $("." + array[1]).offset().top
		$("html,body").animate({
			// scrollTop: offset - $(".header").height()
			scrollTop: offset - $(".header").height()
		}, 300);
	}
}
$(".m-navbar li>a").click(function() {
	var $this = $(this).parent();
	if ($this.find(".subNav").length > 0) {
		$this.siblings("").find(".subNav").slideUp();
		$this.siblings("").removeClass("active");
		$this.toggleClass("active");
		$this.find(".subNav").slideToggle();
	}

})
new WOW().init()
// $(".m_right_buttom").on("click",function(){
// 	$(".m_aside").hasClass("active")? $(".m_aside").removeClass("active"):$(".m_aside").addClass("active")
// })
// $(".m_searchbox_li .icon-sousuo").click(function(){
// 	$(".m_searchbox").hasClass("active")? $(".m_searchbox").removeClass("active"): $(".m_searchbox").addClass("active")
// })
// $(".m_right .m_aside li").click(function(){
// 	$(this).siblings(".active").find(".sub-nav").slideToggle();
// 	$(this).siblings(".active").removeClass("active");
// 	$(this).addClass("active");
// 	$(this).find(".sub-nav").slideToggle();
// })
$(".header .r .nav").hover(function(){
	$(".header").addClass("active")
},function(){
	if(thisH==0&&!$(".header").hasClass("active")){
		$(".header").removeClass("active")
	}
})
$(".header .headerSearch").click(function(e){
	e.stopPropagation()
	e.preventDefault()
})
$(".header .headerSearch .searchBtn,.header .headerSearch .searchContainer .submit").click(function(e){
	$(".header .headerSearch .searchContainer").slideToggle()
})
$(document).click(function(){
	$(".header .headerSearch .searchContainer").slideUp()
})
$(".video-content .close,.video-modal .shadow").click(function(){
	$(".video-modal").hide()
	$(".video-content").find("video")[0].pause()
})
$(".playBtn").click(function(){
	$(".video-modal").show()
	$(".video-content").find("video").attr("src",$(this).data("src"))
	$(".video-content").find("video")[0].play()
})
$(".modal .close").click(function(){
	$(this).parents(".modal").hide()
	$(".video-content").find("video")[0].pause()
})
$(".contactBtn").click(function(){
	$(".form-modal").show()
})
if($(".header").width()<=768){
	$(".header").addClass("active1 active")
}
            </script>
        <?php
    }

   
}