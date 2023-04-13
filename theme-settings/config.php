<?php

if (!class_exists('Redux')) {
  return;
}

$opt_name = "sansara_theme";
$opt_name = apply_filters('sansara_theme/opt_name', $opt_name);

$theme = wp_get_theme();

$args = array(
  'opt_name' => $opt_name,
  'display_name' => $theme->get('Name'),
  'display_version' => $theme->get('Version'),
  'menu_type' => 'submenu',
  'allow_sub_menu' => true,
  'menu_title' => esc_html__('Theme Options', 'sansara'),
  'page_title' => esc_html__('Theme Options', 'sansara'),
  'google_api_key' => '',
  'google_update_weekly' => false,
  'async_typography' => true,
  'admin_bar' => false,
  'admin_bar_icon' => 'dashicons-portfolio',
  'admin_bar_priority' => 50,
  'global_variable' => '',
  'dev_mode' => false,
  'update_notice' => true,
  'customizer' => true,
  'page_priority' => null,
  'page_parent' => 'sansara_dashboard',
  'page_permissions' => 'manage_options',
  'menu_icon' => '',
  'last_tab' => '',
  'page_icon' => 'icon-themes',
  'page_slug' => '',
  'save_defaults' => true,
  'default_show' => false,
  'default_mark' => '',
  'show_import_export' => true,
  'transient_time' => 60 * MINUTE_IN_SECONDS,
  'output' => true,
  'output_tag' => true,
  'database' => '',
  'use_cdn' => true,
  'show_options_object' => false,
);

Redux::setArgs($opt_name, $args);

function pt_social_icon() {
  return array(
    '' => esc_html__('---', 'sansara'),
    'fab fa-500px,500px' => esc_html__('500px', 'sansara'),
    'fab fa-adn,App.net' => esc_html__('App.net', 'sansara'),
    'fab fa-bitbucket,Bitbucket' => esc_html__('Bitbucket', 'sansara'),
    'fab fa-behance,Behance' => esc_html__('Behance', 'sansara'),
    'fab fa-dribbble,Dribbble' => esc_html__('Dribbble', 'sansara'),
    'fab fa-dropbox,Dropbox' => esc_html__('Dropbox', 'sansara'),
    'fab fa-facebook,Facebook' => esc_html__('Facebook', 'sansara'),
    'fab fa-flickr,Flickr' => esc_html__('Flickr', 'sansara'),
    'fab fa-foursquare,Foursquare' => esc_html__('Foursquare', 'sansara'),
    'fab fa-github,GitHub' => esc_html__('GitHub', 'sansara'),
    'fab fa-google,Google' => esc_html__('Google', 'sansara'),
    'fab fa-instagram,Instagram' => esc_html__('Instagram', 'sansara'),
    'fab fa-linkedin,LinkedIn' => esc_html__('LinkedIn', 'sansara'),
    'fab fa-windows,Windows' => esc_html__('Windows', 'sansara'),
    'fab fa-odnoklassniki,Odnoklassniki' => esc_html__('Odnoklassniki', 'sansara'),
    'fab fa-openid,OpenID' => esc_html__('OpenID', 'sansara'),
    'fab fa-pinterest,Pinterest' => esc_html__('Pinterest', 'sansara'),
    'fab fa-reddit,Reddit' => esc_html__('Reddit', 'sansara'),
    'fab fa-soundcloud,SoundCloud' => esc_html__('SoundCloud', 'sansara'),
    'fab fa-tumblr,Tumblr' => esc_html__('Tumblr', 'sansara'),
    'fab fa-twitter,Twitter' => esc_html__('Twitter', 'sansara'),
    'fab fa-tiktok,TikTok' => esc_html__('TikTok', 'sansara'),
    'fab fa-vimeo,Vimeo' => esc_html__('Vimeo', 'sansara'),
    'fab fa-vk,VK' => esc_html__('VK', 'sansara'),
    'fab fa-yahoo,Yahoo' => esc_html__('Yahoo', 'sansara'),
    'fab fa-youtube,Youtube' => esc_html__('Youtube', 'sansara'),
  );
}

Redux::setSection($opt_name, array(
  'title' => esc_html__('General', 'sansara'),
  'id' => 'general',
  'customizer_width' => '400px',
  'icon' => 'fa fa-home',
  'fields' => array(
    array(
      'id' => 'site_mode',
      'type' => 'select',
      'title' => esc_html__('Color mode', 'sansara'),
      'options' => array(
        'dark' => esc_html__('Dark', 'sansara'),
        'light' => esc_html__('Light', 'sansara'),
      ),
      'default' => 'dark',
    ),
    array(
      'id' => 'color_scheme',
      'type' => 'color',
      'title' => esc_html__('Site color', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array(
        'background-color' => '.woocommerce div.product form.cart .button,.woocommerce div.product .woocommerce-tabs .tabs li a:after,.minicart-wrap a.checkout, .widget_shopping_cart_content a.checkout, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .button-style2.dark:hover, .woocommerce .products .product .image .button',

        'background' => '.full-screen-area .fc-navigation .current-line, .one-screen-area .dec-line, .side-header .dec-line, .slider-navigation .line div, .button-style2, .hm-cunt span, .skill-item-line .line div, .price-list-item .options .o-row:not(:last-of-type):after, .site-dark .full-screen-area.navigation-style3 .fc-navigation .item.active, .site-light .full-screen-area.navigation-style3 .fc-navigation .item.active, .woocommerce span.onsale, div.pagination > span, div.pagination .current, .hover-style3 .portfolio-item a:after, .hover-style6 .portfolio-item a:after, .hover-style6 .portfolio-item a span:after, .project-detail .item:before, .wpb_text_column ul li:before, .site-content ul li:before, .pt-special-heading.decor-line-on-bottom:after, .input-row-s1:before, .woocommerce div.product div.summary div[itemprop="description"] ul li:before, .banner-area .dec-line',

        'border-color' => '.portfolio-slider > .owl-dots .owl-dot.active, .portfolio-cols-slider .pcs-item .pcs-cell:after, .heading-container:before, .pt-special-heading.tac .heading-container:after, .filter-button-group button.active, .filter-button-group a.active, .category-buttons a.active',

        'color' => '.button-style1 span:nth-child(2), .button-style1:after, .portfolio-slider .categories a, .testimonial-item:before, .testimonial-item .bottom h6, .icon-box-in-row .count, .button-style2:hover, .social-buttons a:hover i, .side-navigation li.current-menu-item > a, .side-navigation li.current-menu-parent > a, .side-navigation li.current-menu-ancestor > a, .side-navigation li.current_page_item > a, .side-navigation li:hover > a, .social-buttons-text a:not(:last-of-type):after, .one-screen-area .os-buttons .button.active, .one-screen-about-me .top-right-text span, .one-screen-contact .top-right-text span, .one-screen-contact .content .sub-h, .bottom-contact .c i, .one-screen-about-me .top-right-text i, .one-screen-contact .top-right-text i, .navigation li:hover > a, .navigation li.current-menu-item > a, .navigation li.current-menu-ancestor > a, .navigation li.current_page_item > a, .navigation li.current-menu-ancestor > a, .team-item .team-container h6, .categories-grid-item:hover a, .woocommerce div.product .product_meta .sku_wrapper, .woocommerce table.shop_table .product-price > span,.woocommerce table.shop_table .product-subtotal > span,.woocommerce-cart .cart-collaterals .cart_totals tr td .woocommerce-Price-amount,.woocommerce .cart-collaterals table.shop_table.woocommerce-checkout-review-order-table td .amount, .minicart-wrap .cart_list .mini_cart_item .quantity, .widget_shopping_cart_content .cart_list .mini_cart_item .quantity, .minicart-wrap .total > span, .widget_shopping_cart_content .total > span, .price-list-item .top h6, .price-list-item .top .price span, .button-style2.dark, .contact-row i, .wrap-lines .social-buttons-hidden:hover .button, .tab-items .tabs-head li.current, .filter-button-group button.active, .filter-button-group a.active, .category-buttons a.active, .testimonial-item-type2 .bottom h6, .banner .price, .woocommerce .products div.product p.price > span, .woocommerce .products div.product span.price > span, .product_list_widget .text .price, .woocommerce .products .product .price ins, .woocommerce-grouped-product-list-item__price, .woocommerce-grouped-product-list-item__price ins, .navigation .sub-menu li.menu-item-has-children > a:after, .navigation .children li.page_item_has_children > a:after, .hover-style5 .portfolio-item:hover a:before, .blog-detail span, blockquote:before, .comment-items .comment-item .top h5, .logged-links, .widget_archive ul li a:hover, .widget_categories ul li a:hover, .widget_pages ul li a:hover, .widget_meta ul li a:hover, .widget_nav_menu ul li a:hover, .widget_recent_entries ul li a:hover, .product-categories li a:hover, .searchform .searchsubmit:hover, .tagcloud .tag-cloud-link:hover, .woocommerce div.product .price-area, .woocommerce div.product .woocommerce-tabs .tabs li.active a, .woocommerce table.shop_table td.product-price > span, .woocommerce table.shop_table td.product-subtotal > span, .contact-row.color, .portfolio-categories-slider .item:hover a, .one-screen-about-me .sub-h, .team-item .team-social-buttons a:hover, .team-item-style2 .image .team-social-buttons a:hover, .button-style3:hover, blockquote h6, .one-screen-area .os-buttons .button:hover, .site-light .full-screen-area .fc-navigation .item.active, .blog-detail i, .tab-items .tabs-head li:hover, .team-item-style2 .team-container h6, .banner-social-buttons a:hover, .banner-social-buttons a:not(:last-of-type):after',

        'stroke' => '',
      ),
    ),
    array(
      'id' => 'single_post_image_show',
      'type' => 'switch',
      'title' => esc_html__('Show Featured image on single post', 'sansara'),
      'default' => true,
    ),
    array(
      'id' => 'custom_mouse_cursor',
      'type' => 'switch',
      'title' => esc_html__('Custom mouse cursor', 'sansara'),
      'default' => true,
    ),
    array(
      'id' => 'right_click_disable',
      'type' => 'switch',
      'title' => esc_html__('Right click disable', 'sansara'),
      'default' => false,
    ),
    array(
      'id' => 'right_click_disable_message',
      'type' => 'editor',
      'title' => esc_html__('Right click Message', 'sansara'),
      'default' => __('<p style="text-align: center"><strong><span style="font-size: 18px">Content is protected. Right-click function is disabled.</span></strong></p>', 'sansara'),
      'args' => array(
        'teeny' => false,
        'textarea_rows' => 5,
      ),
      'required' => array('right_click_disable', '=', 1),
    ),
    array(
      'id' => 'protected_message',
      'type' => 'editor',
      'title' => esc_html__('Protected Page Message', 'sansara'),
      'default' => esc_html__('This content is password protected. To view it please enter your password below:', 'sansara'),
      'args' => array(
        'teeny' => false,
        'textarea_rows' => 5,
      ),
    ),
    array(
      'id' => 'mobile_adaptation',
      'type' => 'switch',
      'title' => esc_html__('Mobile Adaptation', 'sansara'),
      'on' => esc_html__('Original', 'sansara'),
      'off' => esc_html__('Cropped', 'sansara'),
      'default' => false,
    ),
    array(
      'id' => 'cat_prefix',
      'type' => 'switch',
      'title' => esc_html__('Category prefix', 'sansara'),
      'desc' => __('Show/Hide Category prefix. Example:<br><b>Show</b> Category: Lifestyle<br><b>Hide</b> Lifestyle', 'sansara'),
      'on' => esc_html__('Show', 'sansara'),
      'off' => esc_html__('Hide', 'sansara'),
      'default' => true,
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Preloader', 'sansara'),
  'id' => 'general_preloader',
  'customizer_width' => '450px',
  'icon' => 'fa fa-spinner',
  'fields' => array(
    array(
      'id' => 'preloader_show',
      'type' => 'switch',
      'title' => esc_html__('Preloader', 'sansara'),
      'default' => true,
    ),
    array(
      'id' => 'preloader_type',
      'type' => 'select',
      'title' => esc_html__('Preloader type', 'sansara'),
      'options' => array(
        'default' => esc_html__('Default', 'sansara'),
        'circle' => esc_html__('Circles', 'sansara'),
        'custom_image' => esc_html__('Custom image', 'sansara'),
      ),
      'default' => 'default',
      'required' => array('preloader_show', '=', 1),
    ),
    array(
      'id' => 'preloader_label',
      'type' => 'text',
      'title' => esc_html__('Preloader label', 'sansara'),
      'required' => array('preloader_type', '=', 'default'),
    ),
    array(
      'id' => 'preloader_bg_color',
      'type' => 'color',
      'title' => esc_html__('Preloader background color', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('background' => '.preloader, .preloader-area, .preloader-default-area, .site-dark .preloader-area, .site-dark .preloader-default-area, .site-dark .preloader, .preloader-default .label, .site-dark .preloader-default .label'),
      'required' => array('preloader_show', '=', 1),
    ),
    array(
      'id' => 'preloader_color',
      'type' => 'color',
      'title' => esc_html__('Preloader color', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array(
        'background' => '.preloader-folding-cube .preloader-cube:before',
        'color' => '.preloader-default .label, .site-dark .preloader-default .label',
      ),
      'required' => array('preloader_show', '=', 1),
    ),
    array(
      'id' => 'preloader_img',
      'type' => 'background',
      'title' => esc_html__('Prelaoder image', 'sansara'),
      'desc' => esc_html__('Choose a default logo image to display', 'sansara'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
      'required' => array('preloader_type', '=', 'custom_image'),
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Logo', 'sansara'),
  'id' => 'header_logo',
  'customizer_width' => '450px',
  'icon' => 'fa fa-flag',
  'fields' => array(
    array(
      'id' => 'logo_text',
      'type' => 'text',
      'title' => esc_html__('Logo text', 'sansara'),
    ),
    array(
      'id' => 'default_logo',
      'type' => 'background',
      'title' => esc_html__('Logo Image - normal', 'sansara'),
      'desc' => esc_html__('Choose a default logo image to display', 'sansara'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
    ),
    array(
      'id' => 'light_logo',
      'type' => 'background',
      'title' => esc_html__('Logo Image - light', 'sansara'),
      'desc' => esc_html__('Choose a logo image to display for "Light" header skin', 'sansara'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
    ),
    array(
      'id' => 'dark_logo',
      'type' => 'background',
      'title' => esc_html__('Logo Image - Dark', 'sansara'),
      'desc' => esc_html__('Choose a logo image to display for "Dark" header skin', 'sansara'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
    ),
    array(
      'id' => 'logo_size',
      'units' => 'px',
      'type' => 'dimensions',
      'units_extended' => 'false',
      'title' => esc_html__('Logo max width', 'sansara'),
      'output' => array('.site-header .logo img, .side-header .logo img, .site-header .logo a, .side-header .logo a'),
      'height' => true,
      'default' => array(
        'Width' => '85',
      ),
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Header style', 'sansara'),
  'id' => 'header_style_area',
  'customizer_width' => '450px',
  'icon' => 'fa fa-sliders-h',
  'fields' => array(
    array(
      'id' => 'header_container',
      'type' => 'select',
      'title' => esc_html__('Header container', 'sansara'),
      'options' => array(
        'container' => esc_html__('Center container', 'sansara'),
        'container-fluid' => esc_html__('Full witdh', 'sansara'),
      ),
      'default' => 'container',
    ),
    array(
      'id' => 'header_color_mode',
      'type' => 'select',
      'title' => esc_html__('Header color mode', 'sansara'),
      'options' => array(
        'dark' => esc_html__('Dark', 'sansara'),
        'light' => esc_html__('Light', 'sansara'),
      ),
      'default' => 'dark',
    ),
    array(
      'id' => 'header_style',
      'type' => 'select',
      'title' => esc_html__('Header style', 'sansara'),
      'options' => array(
        'left_side' => esc_html__('Left Side', 'sansara'),
        'logo_left' => esc_html__('Logo left', 'sansara'),
      ),
      'default' => 'logo_left',
    ),
    array(
      'id' => 'header_bg_color_light',
      'type' => 'color',
      'title' => esc_html__('Header Background Color for Light', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('background-color' => '.site-header.light:before'),
    ),
    array(
      'id' => 'header_bg_color_dark',
      'type' => 'color',
      'title' => esc_html__('Header Background Color for Dark', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('background-color' => '.site-header.dark:before'),
    ),
    array(
      'id' => 'header_text_light_color',
      'type' => 'color',
      'title' => esc_html__('Header Text Color for Light', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('color' => '.site-header.light, .site-header.light .navigation, .site-header.light .search-button, .site-header.light .hm-cunt, .site-header.light .butter-button, .site-header.light .logo'),
    ),
    array(
      'id' => 'header_text_dark_color',
      'type' => 'color',
      'title' => esc_html__('Header Text Color for Dark', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('color' => '.site-header.dark, .site-header.dark .navigation, .site-header.dark .search-button, .site-header.dark .hm-cunt, .site-header.dark .butter-button, .site-header.dark .logo'),
    ),
    array(
      'id' => 'header_cart',
      'type' => 'switch',
      'title' => esc_html__('Cart', 'sansara'),
      'default' => true,
    ),
    array(
      'id' => 'header_search',
      'type' => 'switch',
      'title' => esc_html__('Search', 'sansara'),
      'default' => true,
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Navigation', 'sansara'),
  'id' => 'header_navigation',
  'customizer_width' => '450px',
  'icon' => 'fa fa-bars',
  'fields' => array(
    array(
      'id' => 'navigation_type',
      'type' => 'select',
      'title' => esc_html__('Navigation type', 'sansara'),
      'options' => array(
        'disabled' => esc_html__('Disabled', 'sansara'),
        'hidden_menu' => esc_html__('Hidden menu', 'sansara'),
        'visible_menu' => esc_html__('Visible menu', 'sansara'),
        'centered_menu' => esc_html__('Centered menu', 'sansara'),
      ),
      'default' => 'visible_menu',
    ),
    array(
      'id' => 'sidebar_copyright_text',
      'type' => 'textarea',
      'title' => esc_html__('Copyright', 'sansara'),
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Typography', 'sansara'),
  'id' => 'typography',
  'customizer_width' => '400px',
  'icon' => 'fa fa-font',
  'fields' => array(
		array(
			'id' => 'body-font-face',
			'type' => 'yprm_typography',
			'title' => esc_html__('Body', 'sansara'),
			'output' => array('body'),
			'default' => array(
				'weight' => 'regular',
				'family' => 'IBM Plex Sans',
				'font-size' => '16px',
				'backup-family' => 'Arial, Helvetica, sans-serif'
			),
		),
		array(
			'id' => 'h1-font-face',
			'type' => 'yprm_typography',
			'title' => esc_html__('H1', 'sansara'),
			'output' => array('h1, .h1'),
			'default' => array(
				'weight' => '700',
				'family' => 'IBM Plex Sans',
				'font-size' => '60px',
				'backup-family' => 'Arial, Helvetica, sans-serif'
			),
		),
		array(
			'id' => 'h2-font-face',
			'type' => 'yprm_typography',
			'title' => esc_html__('H2', 'sansara'),
			'output' => array('h2, .h2'),
			'default' => array(
				'weight' => '700',
				'family' => 'IBM Plex Sans',
				'font-size' => '48px',
				'backup-family' => 'Arial, Helvetica, sans-serif'
			),
		),
		array(
			'id' => 'h3-font-face',
			'type' => 'yprm_typography',
			'title' => esc_html__('H3', 'sansara'),
			'output' => array('h3, .h3'),
			'default' => array(
				'weight' => '700',
				'family' => 'IBM Plex Sans',
				'font-size' => '36px',
				'backup-family' => 'Arial, Helvetica, sans-serif'
			),
		),
		array(
			'id' => 'h4-font-face',
			'type' => 'yprm_typography',
			'title' => esc_html__('H4', 'sansara'),
			'output' => array('h4, .h4'),
			'default' => array(
				'weight' => '700',
				'family' => 'IBM Plex Sans',
				'font-size' => '30px',
				'backup-family' => 'Arial, Helvetica, sans-serif'
			),
		),
		array(
			'id' => 'h5-font-face',
			'type' => 'yprm_typography',
			'title' => esc_html__('H5', 'sansara'),
			'output' => array('h5, .h5'),
			'default' => array(
				'weight' => '700',
				'family' => 'IBM Plex Sans',
				'font-size' => '24px',
				'backup-family' => 'Arial, Helvetica, sans-serif'
			),
		),
		array(
			'id' => 'h6-font-face',
			'type' => 'yprm_typography',
			'title' => esc_html__('H6', 'sansara'),
			'output' => array('h6, .h6'),
			'default' => array(
				'weight' => '700',
				'family' => 'IBM Plex Sans',
				'font-size' => '18px',
				'backup-family' => 'Arial, Helvetica, sans-serif'
			),
		),
  ),
));

Redux::setSection($opt_name, array(
	'title' => esc_html__('Theme Fonts', 'sansara'),
	'id' => 'theme_fonts',
	'icon' => 'fa fa-i-cursor',
));

Redux::setSection($opt_name, array(
	'title' => esc_html__('Fonts', 'sansara'),
	'id' => 'theme_fonts_array',
	'subsection' => true,
	'fields' => array(
		array(
			'id' => 'custom_fonts',
			'type' => 'yprm_fonts',
			'default' => array(
				'fonts' => '{"type":"google","family":"IBM Plex Sans","variants":"100, 100italic, 200, 200italic, 300, 300italic, regular, italic, 500, 500italic, 600, 600italic, 700, 700italic","subsets":"cyrillic, cyrillic-ext, greek, latin, latin-ext, vietnamese"},{"type":"google","family":"IBM Plex Sans Condensed","variants":"100, 100italic, 200, 200italic, 300, 300italic, regular, italic, 500, 500italic, 600, 600italic, 700, 700italic","subsets":"latin, latin-ext, vietnamese"}',
			),
		),
	),
));

Redux::setSection($opt_name, array(
	'title' => esc_html__('Icon Fonts', 'sansara'),
	'id' => 'theme_icon_fonts_array',
	'subsection' => true,
	'fields' => array(
		array(
			'id' => 'icon_fonts',
			'type' => 'yprm_icon_fonts',
			'title' => esc_html__('Upload Custom Icon Fonts', 'sansara'),
		),
	),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Social buttons', 'sansara'),
  'id' => 'social_buttons',
  'customizer_width' => '400px',
  'icon' => 'fab fa-twitter',
  'fields' => array(
    array(
      'id' => 'social_target',
      'type' => 'select',
      'title' => esc_html__('Open link in', 'sansara'),
      'options' => array(
        '_self' => esc_html__('Current Tab', 'sansara'),
        '_blank' => esc_html__('New Tab', 'sansara'),
      ),
    ),
    array(
      'id' => 'sl1',
      'type' => 'raw',
      'title' => esc_html__('Social button 1', 'sansara'),
    ),
    array(
      'id' => 'social_icon1',
      'type' => 'select',
      'title' => esc_html__('Social icon', 'sansara'),
      'options' => pt_social_icon(),
      'default' => '',
    ),
    array(
      'id' => 'social_link1',
      'type' => 'text',
      'title' => esc_html__('Link', 'sansara'),
    ),
    array(
      'id' => 'sb2',
      'type' => 'raw',
      'title' => esc_html__('Social button 2', 'sansara'),
    ),
    array(
      'id' => 'social_icon2',
      'type' => 'select',
      'title' => esc_html__('Social icon', 'sansara'),
      'options' => pt_social_icon(),
      'default' => '',
    ),
    array(
      'id' => 'social_link2',
      'type' => 'text',
      'title' => esc_html__('Link', 'sansara'),
    ),
    array(
      'id' => 'sb3',
      'type' => 'raw',
      'title' => esc_html__('Social button 3', 'sansara'),
    ),
    array(
      'id' => 'social_icon3',
      'type' => 'select',
      'title' => esc_html__('Social icon', 'sansara'),
      'options' => pt_social_icon(),
      'default' => '',
    ),
    array(
      'id' => 'social_link3',
      'type' => 'text',
      'title' => esc_html__('Link', 'sansara'),
    ),
    array(
      'id' => 'sb4',
      'type' => 'raw',
      'title' => esc_html__('Social button 4', 'sansara'),
    ),
    array(
      'id' => 'social_icon4',
      'type' => 'select',
      'title' => esc_html__('Social icon', 'sansara'),
      'options' => pt_social_icon(),
      'default' => '',
    ),
    array(
      'id' => 'social_link4',
      'type' => 'text',
      'title' => esc_html__('Link', 'sansara'),
    ),
    array(
      'id' => 'sb5',
      'type' => 'raw',
      'title' => esc_html__('Social button 5', 'sansara'),
    ),
    array(
      'id' => 'social_icon5',
      'type' => 'select',
      'title' => esc_html__('Social icon', 'sansara'),
      'options' => pt_social_icon(),
      'default' => '',
    ),
    array(
      'id' => 'social_link5',
      'type' => 'text',
      'title' => esc_html__('Link', 'sansara'),
    ),
    array(
      'id' => 'sb6',
      'type' => 'raw',
      'title' => esc_html__('Social button 6', 'sansara'),
    ),
    array(
      'id' => 'social_icon6',
      'type' => 'select',
      'title' => esc_html__('Social icon', 'sansara'),
      'options' => pt_social_icon(),
      'default' => '',
    ),
    array(
      'id' => 'social_link6',
      'type' => 'text',
      'title' => esc_html__('Link', 'sansara'),
    ),
    array(
      'id' => 'sb7',
      'type' => 'raw',
      'title' => esc_html__('Social button 7', 'sansara'),
    ),
    array(
      'id' => 'social_icon7',
      'type' => 'select',
      'title' => esc_html__('Social icon', 'sansara'),
      'options' => pt_social_icon(),
      'default' => '',
    ),
    array(
      'id' => 'social_link7',
      'type' => 'text',
      'title' => esc_html__('Link', 'sansara'),
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Footer', 'sansara'),
  'id' => 'footer',
  'customizer_width' => '400px',
  'icon' => 'fa fa-th-list',
  'fields' => array(
    array(
      'id' => 'footer',
      'type' => 'select',
      'title' => esc_html__('Footer', 'sansara'),
      'options' => array(
        'show' => esc_html__('Show', 'sansara'),
        'hide' => esc_html__('Hide', 'sansara'),
        'minified' => esc_html__('Minified', 'sansara'),
      ),
      'default' => 'show',
    ),
    array(
      'id' => 'footer_social_buttons',
      'type' => 'select',
      'title' => esc_html__('Footer Social Buttons', 'sansara'),
      'options' => array(
        'show' => esc_html__('Show', 'sansara'),
        'hide' => esc_html__('Hide', 'sansara'),
      ),
      'default' => 'show',
    ),
    array(
      'id' => 'footer_scroll_up',
      'type' => 'select',
      'title' => esc_html__('Footer Scroll Up', 'sansara'),
      'options' => array(
        'show' => esc_html__('Show', 'sansara'),
        'hide' => esc_html__('Hide', 'sansara'),
      ),
      'default' => 'show',
    ),
    array(
      'id' => 'copyright_text',
      'type' => 'textarea',
      'title' => esc_html__('Copyright text', 'sansara'),
    ),
    array(
      'id' => 'footer_logo_size',
      'units' => 'px',
      'type' => 'dimensions',
      'units_extended' => 'false',
      'title' => esc_html__('Logo max width', 'sansara'),
      'output' => array('.site-footer .logo img'),
      'height' => false,
      'default' => array(
        'Width' => '46',
      ),
    ),
    array(
      'id' => 'footer_bg_color',
      'type' => 'color',
      'title' => esc_html__('Footer Background Color', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('background-color' => '.site-footer, .site-dark .site-footer'),
    ),
    array(
      'id' => 'footer_text_color',
      'type' => 'color',
      'title' => esc_html__('Footer Text Color', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('color' => '.site-footer, .site-dark .site-footer, .site-footer.dark .widget-title'),
    ),
    array(
      'id' => 'footer_bottom_bg_color',
      'type' => 'color',
      'title' => esc_html__('Footer Bottom Background Color', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('background-color' => '.site-footer .footer-bottom, .site-dark .site-footer .footer-bottom'),
    ),
    array(
      'id' => 'footer_bottom_text_color',
      'type' => 'color',
      'title' => esc_html__('Footer Bottom Text Color', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('color' => '.site-footer .footer-bottom, .site-dark .site-footer .footer-bottom'),
    ),
    array(
      'id' => 'footer_col_1',
      'type' => 'select',
      'title' => esc_html__('Footer col 1', 'sansara'),
      'options' => array(
        '1' => 'Col 1',
        '2' => 'Col 2',
        '3' => 'Col 3',
        '4' => 'Col 4',
        '5' => 'Col 5',
        '6' => 'Col 6',
        '7' => 'Col 7',
        '8' => 'Col 8',
        '9' => 'Col 9',
        '10' => 'Col 10',
        '11' => 'Col 11',
        '12' => 'Col 12',
      ),
      'default' => '4',
    ),
    array(
      'id' => 'footer_col_2',
      'type' => 'select',
      'title' => esc_html__('Footer col 2', 'sansara'),
      'options' => array(
        '1' => 'Col 1',
        '2' => 'Col 2',
        '3' => 'Col 3',
        '4' => 'Col 4',
        '5' => 'Col 5',
        '6' => 'Col 6',
        '7' => 'Col 7',
        '8' => 'Col 8',
        '9' => 'Col 9',
        '10' => 'Col 10',
        '11' => 'Col 11',
        '12' => 'Col 12',
      ),
      'default' => '4',
    ),
    array(
      'id' => 'footer_col_3',
      'type' => 'select',
      'title' => esc_html__('Footer col 3', 'sansara'),
      'options' => array(
        '1' => 'Col 1',
        '2' => 'Col 2',
        '3' => 'Col 3',
        '4' => 'Col 4',
        '5' => 'Col 5',
        '6' => 'Col 6',
        '7' => 'Col 7',
        '8' => 'Col 8',
        '9' => 'Col 9',
        '10' => 'Col 10',
        '11' => 'Col 11',
        '12' => 'Col 12',
      ),
      'default' => '4',
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('404 Page', 'sansara'),
  'id' => '404_page',
  'customizer_width' => '400px',
  'icon' => 'fa fa-exclamation-circle',
  'fields' => array(
    array(
      'id' => 'header_color_mode_404',
      'type' => 'select',
      'title' => esc_html__('Header color mode', 'sansara'),
      'options' => array(
        'dark' => esc_html__('Dark', 'sansara'),
        'light' => esc_html__('Light', 'sansara'),
      ),
      'default' => 'dark',
    ),
    array(
      'id' => '404_bg',
      'type' => 'background',
      'title' => esc_html__('Background image', 'sansara'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
    ),
    array(
      'id' => '404_page_color',
      'type' => 'color',
      'title' => esc_html__('Text color', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('color' => '.block-404'),
    ),
    array(
      'id' => '404_page_heading_color',
      'type' => 'color',
      'title' => esc_html__('Heading color', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('color' => '.block-404 .h'),
    ),
    array(
      'id' => '404_page_content_align',
      'type' => 'select',
      'title' => esc_html__('Content align', 'sansara'),
      'options' => array(
        'tal' => esc_html__('Left', 'sansara'),
        'tac' => esc_html__('Center', 'sansara'),
        'tar' => esc_html__('Right', 'sansara'),
      ),
      'default' => 'tac',
    ),
    array(
      'id' => '404_sub_heading',
      'type' => 'textarea',
      'title' => esc_html__('Sub Heading', 'sansara'),
      'default' => esc_html__('wrong page', 'sansara'),
    ),
    array(
      'id' => '404_heading',
      'type' => 'textarea',
      'title' => esc_html__('Heading', 'sansara'),
      'default' => esc_html__('404 Error', 'sansara'),
    ),
    array(
      'id' => '404_text',
      'type' => 'textarea',
      'title' => esc_html__('Text', 'sansara'),
      'default' => esc_html__('The page you\'re looking for doesn\'t exist', 'sansara'),
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Coming soon page', 'sansara'),
  'id' => 'coming_soon',
  'customizer_width' => '400px',
  'icon' => 'fa fa-clock',
  'fields' => array(
    array(
      'id' => 'header_color_mode_coming_soon',
      'type' => 'select',
      'title' => esc_html__('Header color mode', 'sansara'),
      'options' => array(
        'dark' => esc_html__('Dark', 'sansara'),
        'light' => esc_html__('Light', 'sansara'),
      ),
      'default' => 'light',
    ),
    array(
      'id' => 'coming_soon_bg',
      'type' => 'background',
      'title' => esc_html__('Background image', 'sansara'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
    ),
    array(
      'id' => 'coming_soon_color',
      'type' => 'color',
      'title' => esc_html__('Text color', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('color' => '.banner-coming-soon'),
    ),
    array(
      'id' => 'coming_soon_heading_color',
      'type' => 'color',
      'title' => esc_html__('Heading color', 'sansara'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('color' => '.banner-coming-soon .b-coming-heading'),
    ),
    array(
      'id' => 'coming_soon_subscribe_code',
      'type' => 'text',
      'title' => esc_html__('Subscribe form code', 'sansara'),
    ),
    array(
      'id' => 'coming_soon_sub_heading',
      'type' => 'textarea',
      'title' => esc_html__('Sub Heading', 'sansara'),
      'default' => esc_html__('Our site is under maintance', 'sansara'),
    ),
    array(
      'id' => 'coming_soon_heading',
      'type' => 'textarea',
      'title' => esc_html__('Heading', 'sansara'),
      'default' => esc_html__('Coming Soon', 'sansara'),
    ),
    array(
      'id' => 'coming_soon_text',
      'type' => 'textarea',
      'title' => esc_html__('Text', 'sansara'),
      'default' => esc_html__('Subscribe to get the latest news and updates', 'sansara'),
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Project page', 'sansara'),
  'id' => 'project_page',
  'customizer_width' => '400px',
  'icon' => 'fa fa-file-archive',
  'fields' => array(
    array(
      'id' => 'project_in_popup',
      'type' => 'select',
      'title' => esc_html__('Open project in popup', 'sansara'),
      'options' => array(
        'yes' => esc_html__('Yes', 'sansara'),
        'no' => esc_html__('No', 'sansara'),
      ),
      'default' => 'no',
    ),
    array(
      'id' => 'project_style',
      'type' => 'select',
      'title' => esc_html__('Style project page', 'sansara'),
      'options' => array(
        'right_side' => esc_html__('Images on right side', 'sansara'),
        'grid' => esc_html__('Grid', 'sansara'),
        'masonry' => esc_html__('Masonry', 'sansara'),
        'slider' => esc_html__('Slider', 'sansara'),
        'before_after' => esc_html__('Before/After', 'sansara'),
        'horizontal' => esc_html__('Horizontal', 'sansara'),
        'parallax' => esc_html__('Parallax', 'sansara'),
      ),
      'default' => 'slider',
    ),
    array(
      'id' => 'project_count_cols',
      'type' => 'select',
      'title' => esc_html__('Cols count', 'sansara'),
      'options' => array(
        'col2' => esc_html__('Col 2', 'sansara'),
        'col3' => esc_html__('Col 3', 'sansara'),
        'col4' => esc_html__('Col 4', 'sansara'),
      ),
      'required' => array('project_style', '=', array('masonry', 'grid')),
      'default' => 'col2',
    ),
    array(
      'id' => 'project_count_images',
      'type' => 'text',
      'title' => esc_html__('Images count (optional)', 'sansara'),
      'required' => array('project_style', '=', array('masonry', 'grid')),
    ),
    array(
      'id' => 'project_portfolio_link',
      'type' => 'text',
      'title' => esc_html__('Portfolio link', 'sansara'),
    ),
    array(
      'id' => 'project_image',
      'type' => 'select',
      'title' => esc_html__('Project image', 'sansara'),
      'options' => array(
        'disable' => esc_html__('Disable', 'sansara'),
        'full' => esc_html__('Full', 'sansara'),
        'adaptive' => esc_html__('Adaptive', 'sansara'),
      ),
      'default' => 'full',
    ),
    array(
      'id' => 'download-link',
      'type' => 'select',
      'title' => esc_html__('Download link on popup', 'sansara'),
      'options' => array(
        'yes' => esc_html__('Show', 'sansara'),
        'no' => esc_html__('Hide', 'sansara'),
      ),
      'default' => 'yes',
    ),
    array(
      'id' => 'project-details',
      'type' => 'select',
      'title' => esc_html__('Project details', 'sansara'),
      'options' => array(
        'yes' => esc_html__('Show', 'sansara'),
        'no' => esc_html__('Hide', 'sansara'),
      ),
      'default' => 'yes',
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Translation', 'sansara'),
  'id' => 'translation',
  'customizer_width' => '400px',
  'icon' => 'fa fa-language',
  'fields' => array(
    array(
      'id' => 'tr_load_more',
      'type' => 'text',
      'title' => esc_html__('Load More', 'sansara'),
    ),
    array(
      'id' => 'tr_all',
      'type' => 'text',
      'title' => esc_html__('All', 'sansara'),
    ),
    array(
      'id' => 'tr_view_full_project',
      'type' => 'text',
      'title' => esc_html__('view full project', 'sansara'),
    ),
    array(
      'id' => 'tr_prev',
      'type' => 'text',
      'title' => esc_html__('Prev', 'sansara'),
    ),
    array(
      'id' => 'tr_next',
      'type' => 'text',
      'title' => esc_html__('Next', 'sansara'),
    ),
    array(
      'id' => 'tr_close',
      'type' => 'text',
      'title' => esc_html__('Close', 'sansara'),
    ),
  ),
));


Redux::setSection($opt_name, array(
  'title' => esc_html__('Custom code & analytics & Map API', 'sansara'),
  'id' => 'custom_code_analytics',
  'customizer_width' => '400px',
  'icon' => 'fa fa-code',
  'fields' => array(
    array(
      'id' => 'code_in_head',
      'type' => 'ace_editor',
      'mode' => 'html',
      'title' => esc_html__('Code in <head>', 'sansara'),
    ),
    array(
      'id' => 'code_before_body',
      'type' => 'ace_editor',
      'mode' => 'html',
      'title' => esc_html__('Code before </body> tag', 'sansara'),
    ),
    array(
      'id' => 'google_maps_api_key',
      'type' => 'text',
      'title' => esc_html__('Google Map API Key', 'sansara'),
      'description' => __('Create an application in <a href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">Google Console</a> and add the Key here.', 'sansara'),
    ),
  ),
));