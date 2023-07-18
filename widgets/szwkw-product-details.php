<?php 

use \Elementor\Widget_Base;
class Product_Details extends \Elementor\Widget_Base {
    public function get_name() {
		return 'szwkw_product_details_widget';
	}

	public function get_title() {
		return esc_html__( 'Product details', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-product-description';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'product', 'details', 'list' ];
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
                        'default' => esc_html__( 'Product', 'textdomain' ),
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
						'item_name' => esc_html__( 'Product', 'textdomain' ),
					],
					
				]
			]
		);

        $this->add_control(
			'product_supporting_image',
			[
				'label' => esc_html__( 'Product supporting image', 'elementor-addon' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Key from ACF', 'textdomain' ),
                'default' => 'product_supporting_image'
			]
		);
        $this->add_control(
			'working_voltage',
			[
				'label' => esc_html__( 'Working voltage', 'elementor-addon' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Key from ACF', 'textdomain' ),
                'default' => 'working_voltage'
			]
		);
        $this->add_control(
			'reverse_protection_voltage',
			[
				'label' => esc_html__( 'Reverse Protection Voltage', 'elementor-addon' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Key from ACF', 'textdomain' ),
                'default' => 'reverse_protection_voltage'
			]
		);
        $this->add_control(
			'magnetic_working_point',
			[
				'label' => esc_html__( 'Magnetic Working Point', 'elementor-addon' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Key from ACF', 'textdomain' ),
                'default' => 'magnetic_working_point'
			]
		);
        $this->add_control(
			'magnetic_release_point',
			[
				'label' => esc_html__( 'Magnetic Release Points', 'elementor-addon' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Key from ACF', 'textdomain' ),
                'default' => 'magnetic_release_point'
			]
		);
        $this->add_control(
			'working_temperature',
			[
				'label' => esc_html__( 'Working Temperature', 'elementor-addon' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Key from ACF', 'textdomain' ),
                'default' => 'working_temperature'
			]
		);
        
        $this->add_control(
			'packaging_form',
			[
				'label' => esc_html__( 'Packaging Form', 'elementor-addon' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Key from ACF', 'textdomain' ),
                'default' => 'packaging_form'
			]
		);
        $this->add_control(
			'alternative_imported_models',
			[
				'label' => esc_html__( 'Alternative Imported Models', 'elementor-addon' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Key from ACF', 'textdomain' ),
                'default' => 'alternative_imported_models'
			]
		);
        $this->add_control(
			'download',
			[
				'label' => esc_html__( 'Download', 'elementor-addon' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Key from ACF', 'textdomain' ),
                'default' => 'download'
			]
		);
        $this->add_control(
			'contact_page_link',
			[
				'label' => esc_html__( 'Contact link', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
			]
		);
        $this->add_control(
			'news_page_link',
			[
				'label' => esc_html__( 'News link', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
			]
		);

        
        

        $this->end_controls_section();

		

	}


    protected function render() {
		$settings = $this->get_settings_for_display();
        global $product;
        if (is_product()) {
            $product_id = $product->get_id();
            $product_name = $product->get_name();
            $product_description = $product->get_description();
            $product_short_description = $product->get_short_description();
            $product_image_url = get_the_post_thumbnail_url($product_id, 'full');
            $product_categories = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'names'));
            $core_parameters = get_post_meta($product->get_id(), 'core_parameters', true);
            $product_supporting_image = get_field($settings['product_supporting_image']);

            // Query the "model info" posts related to the product

            $args = array(
                'post_type' => 'model_info',
                'meta_key' => 'model_info_product',
                'meta_value' => $product_id,
                'posts_per_page' => -1,
            );
            $related_model_info = new WP_Query($args);
            ?>
            <div class="product-details">
				<div class="commonBread content1400 wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                <a href="/"><span class="iconfont icon-home"></span></a>
                    <?php foreach($settings['breadcumb_list'] as $menu) { ?>
					<span class="iconfont icon-youjiantou11"></span>
					<a href="<?php echo $menu['item_link']['url']; ?>"><?php echo $menu['item_name']; ?></a>
                    <?php } ?>
				</div>
				<div class="box1">
					<div class="content1400">
						<p class="title wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s"><?php echo $product_short_description; ?></p>
						<div class="box-c">
							<div class="l hoverLi wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<div class="pic">
									<img src="<?php echo $product_image_url; ?>" alt="" class="imgScale">
								</div>
							</div>
							<div class="c wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<div class="text-box">
									<p class="text-des"><?php echo implode(', ', $product_categories); ?></p>
									<p class="text-title"><?php echo $product_name; ?></p>
									<div class="text">
										<p><?php echo $product_description; ?></p>
									</div>
								</div>
							</div>
							<div class="r wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
								<a href="<?php echo $settings['contact_page_link']['url']; ?>"><span class="iconfont icon-youxiang"></span>Contact Us</a>
								<a href="<?php echo $settings['news_page_link']['url']; ?>"><span class="iconfont icon-24gf-newspaper"></span>Product Related News</a>
							</div>
						</div>
					</div>
				</div>
                <?php if ($core_parameters) { 
                $parameters = explode("\n", $core_parameters);    
                ?>
				<div class="box2">
					<div class="content1400">
						<p class="innerTitle wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">Core Parameters & Product Advantages</p>
						<div class="line wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s"></div>
						<div class="text-box wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
                            <?php foreach($parameters as $parameter){ ?>
							<p><span class="fill-line"></span><span class="text"><?php echo esc_html(trim($parameter)); ?></span></p>
                            <?php } ?>
							<img src="<?php echo $product_supporting_image; ?>" alt="">
						</div>
					</div>
				</div>
				<?php } ?>
                
                <?php
                // Display the "model info" posts
                if ($related_model_info->have_posts()) {
                ?>
                <div class="box3 wow fadeInUpSmall"  wow fadeInUpSmall data-wow-delay=".3s">
					<div class="content1400">
						<table>
							<tr>
								<th>Model</th>
								<th>Working Voltage (v)</th>
								<th>Reverse Protection Voltage (v)</th>
								<th>Magnetic Working Point (Gs)</th>
								<th>Magnetic Release Points (Gs)</th>
								<th>Working Temperature (°C)</th>
								<th>Packaging Form</th>
								<th>Alternative Imported Models</th>
								<th>Download</th>
							</tr>
                            <?php 
                            while ($related_model_info->have_posts()) {
                                $related_model_info->the_post();
                                $model_name = get_the_title();
                                $working_voltage = get_field($settings['working_voltage']);
                                $working_voltage = get_field($settings['working_voltage']);
                                $reverse_protection_voltage = get_field($settings['reverse_protection_voltage']);
                                $magnetic_working_point = get_field($settings['magnetic_working_point']);
                                $magnetic_release_point = get_field($settings['magnetic_release_point']);
                                $working_temperature = get_field($settings['working_temperature']);
                                $packaging_form = get_field($settings['packaging_form']);
                                $alternative_imported_models = get_field($settings['alternative_imported_models']);
                                $download = get_field($settings['download']);
                            ?>
							<tr>
								<td><?php echo $model_name; ?></td>
								<td><?php echo $working_voltage; ?></td>
								<td><?php echo $reverse_protection_voltage; ?></td>
								<td><?php echo $magnetic_working_point; ?></td>
								<td><?php echo $magnetic_release_point; ?></td>
								<td><?php echo $working_temperature; ?></td>
								<td><?php echo $packaging_form; ?></td>
								<td><?php echo $alternative_imported_models; ?></td>
								<td><a target="_blank" href="<?php echo $download; ?>"><span class="iconfont icon-xiazai1"></span>DL</a></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
                <?php } ?>
			</div>
            <?php
        }
    }
}