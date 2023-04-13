<?php
/**
 * sansara functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sansara
 */

if ( ! function_exists( 'sansara_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sansara_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sansara, use a find and replace
	 * to change 'sansara' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sansara', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'navigation' => esc_html__( 'Primary navigation', 'sansara' ),
		'side-navigation' => esc_html__( 'Side navigation', 'sansara' ),
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add theme support for WooCommerce.
	add_theme_support( 'woocommerce' );

	if ( ! isset( $content_width ) ) $content_width = 900;
}
endif;
add_action( 'after_setup_theme', 'sansara_setup' ); 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sansara_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sansara' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'sansara' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'sansara' ),
		'id'            => 'shop_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'sansara' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer col 1', 'sansara' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'sansara' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer col 2', 'sansara' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'sansara' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer col 3', 'sansara' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'sansara' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'sansara_widgets_init' );

/*
Remove default woocommerce css
*/
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Add Google fonts.
 */
function sansara_fonts_url() {
    $font_url = add_query_arg( 'family', 'IBM+Plex+Sans+Condensed:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i|IBM+Plex+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i', "//fonts.googleapis.com/css" );
    return $font_url;
}

/**
 * Enqueue scripts and styles.
 */
function sansara_scripts() {
	wp_enqueue_style( 'sansara-style-default', get_stylesheet_uri() );

	wp_enqueue_style( 'sansara-fonts', sansara_fonts_url(), array(), '1.0.0' );


	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css');
	wp_enqueue_style( 'sansara-iconsss', get_template_directory_uri() . '/css/iconfont.css');
	

	wp_enqueue_style( 'sansara-frontend-grid', get_template_directory_uri() . '/css/frontend-grid.css');
	wp_style_add_data('sansara-frontend-grid', 'rtl', 'replace');

	wp_enqueue_style( 'photoswipe', get_template_directory_uri() . '/css/photoswipe.css');

	wp_enqueue_style( 'photoswipe-default-skin', get_template_directory_uri() . '/css/default-skin.css');

	wp_enqueue_style( 'sansara-circle-animations', get_template_directory_uri() . '/css/circle_animations.css');

	wp_enqueue_style( 'sansara-style', get_template_directory_uri() . '/css/style.css');
	wp_style_add_data('sansara-style', 'rtl', 'replace');

	wp_enqueue_style( 'woocommerce-general', get_template_directory_uri() . '/css/woocommerce.css');
	wp_style_add_data('woocommerce-general', 'rtl', 'replace');

	wp_enqueue_style( 'woocommerce-layout', get_template_directory_uri() . '/css/woocommerce-layout.css');
	wp_style_add_data('woocommerce-layout', 'rtl', 'replace');

	wp_add_inline_style( 'sansara-style', do_action('inline_css') );

	wp_enqueue_style( 'sansara-mobile', get_template_directory_uri() . '/css/mobile.css');
	wp_style_add_data('sansara-mobile', 'rtl', 'replace');

	wp_enqueue_script( 'sansara-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '', true );

	wp_enqueue_script( 'imagesloaded' );

	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'photoswipe', get_template_directory_uri() . '/js/photoswipe.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'photoswipe-ui-default', get_template_directory_uri() . '/js/photoswipe-ui-default.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'sansara-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '', true );

	wp_enqueue_script( 'sansara-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sansara_scripts', 100 );

function sansara_add_editor_styles() {
	add_editor_style( get_template_directory_uri() . '/css/style.css' );
}
add_action( 'current_screen', 'sansara_add_editor_styles' );

add_action( 'admin_enqueue_scripts', 'load_admin_styles', 1000 );
function load_admin_styles() {
	wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css');
	wp_enqueue_style( 'fontawesome');
	wp_enqueue_style( 'sansara-backend', get_template_directory_uri() . '/css/admin.css', array(), '1.0', false );
	wp_enqueue_style( 'sansara-shortcode-icons', get_template_directory_uri() . '/css/shortcode-icons.css', array(), '1.0', false );

  wp_enqueue_script('sansara-admin', get_parent_theme_file_uri() . '/js/admin.js', array('jquery'), null, true);
}

/**
 * Admin Pages
 */
require get_template_directory() . '/inc/admin-pages.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Video Parser.
 */
require get_template_directory() . '/inc/video-parser.php';

/**
 * Hooks
 */
require get_template_directory() . '/inc/v-hook.php';

/**
 * Load TGM file.
 */
require get_template_directory() . '/tgm/tgm.php';

/**
 * Load Breadcrumbs.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Load ACF.
 */
require get_template_directory() . '/inc/acf.php';
define( 'ACF_LITE', true );

/**
 * Load Theme Settings.
 */
require get_template_directory() . '/theme-settings/config.php';

/**
 * Setup Wizard
 */

if (is_admin()) {
  require_once get_template_directory() . '/inc/setup-wizard/envato_setup_init.php';
  require_once get_template_directory() . '/inc/setup-wizard/envato_setup.php';
}

/**
 * Site pagination.
 */
function sansara_wp_corenavi($max_count = '') {
	global $wp_query;
	$pages = '';
	if(isset($max_count) && $max_count > 0) {
		$max = $max_count;
	} else {
		$max = $wp_query->max_num_pages;
	}

	if(get_query_var('paged') != 0) {
		$paged = get_query_var('paged');
	} else {
		$paged = get_query_var('page');
	}

	if (!$current = $paged) $current = 1;
	$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	$a['total'] = $max;
	$a['current'] = $current;

	$a['mid_size'] = 5;
	$a['end_size'] = 1;
	$a['prev_text'] = '<';
	$a['next_text'] = '>';

	$html = "";
	if ($max > 1) $html .= '<div class="pagination col-xs-12">';
	$html .= paginate_links($a);
	if ($max > 1) $html .= '</div>';

	return $html;
}

add_action( 'admin_init', 'sansara_hide_editor' );

function sansara_hide_editor() {

        // Get the Post ID.
        if ( isset ( $_GET['post'] ) )
        $post_id = $_GET['post'];
        else if ( isset ( $_POST['post_ID'] ) )
        $post_id = $_POST['post_ID'];

    if( !isset ( $post_id ) || empty ( $post_id ) )
        return;

    // Get the name of the Page Template file.
    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    if($template_file == 'page-coming-soon.php'){ // edit the template name
        remove_post_type_support('page', 'editor');
    }

}

add_filter('get_the_excerpt', 'shortcode_unautop');
add_filter('get_the_excerpt', 'do_shortcode');

add_action( 'vc_before_init', 'sansara_vc_before_init_actions' );
 
function sansara_vc_before_init_actions() {
    if( function_exists('vc_set_shortcodes_templates_dir') ){ 
        vc_set_shortcodes_templates_dir( get_template_directory() . '/vc-elements' );
    }
}

function sansara_load_custom_fonts($init) {
	$init['fontsize_formats'] = "10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 32px 33px 34px 35px 36px 37px 38px 39px 40px";

	return $init;
}
add_filter('tiny_mce_before_init', 'sansara_load_custom_fonts');

function sansara_styles() {
	global $sansara_theme;

	$style = array();

	$style['site_mode'] = 'dark';

	$style['header_style'] = 'logo_left';
	$style['header_color_mode'] = 'dark';
	$style['header_color_mode_404'] = 'dark';
	$style['header_color_mode_coming_soon'] = 'light';
	$style['header_container'] = 'container';
	$style['navigation_type'] = 'visible_menu';
	$style['css_classes'] = '';
	$style['mobile_adaptation'] = 'no';
  $style['cat_prefix'] = 'on';
	
	$style['working_time'] = '';
	$style['phone_number'] = '';

	$style['logo_content'] = '<span class="l-b">'.get_bloginfo( 'name' ).'</span>';
	$style['logo_default_url'] = '';
	$style['logo_light_url'] = '';
	$style['logo_dark_url']  = '';
	$style['logo_dark_url_scheme2']  = '';

	$style['google_maps_api_key'] = '';

	$style['search'] = 'yes';
	$style['cart'] = 'yes';
	$style['grid_lines'] = 'no';
	$style['wrap_lines'] = 'no';
	$style['wl_social_links'] = 'yes';
	$style['header_social_buttons'] = 'yes';
	$style['header_space'] = 'yes';
	$style['footer'] = 'show';
	$style['footer_logo'] = 'show';
	$style['footer_social_buttons'] = 'show';
	$style['footer_scroll_up'] = 'show';
	$style['footer_col_1'] = '4';
	$style['footer_col_2'] = '4';
	$style['footer_col_3'] = '4';
	$style['copyright_text']  = '';
	$style['sidebar_copyright_text']  = '';

	$style['social_target'] = '_self';
	$style['social_buttons_content'] = '';

	$style['404_bg'] = '';
	$style['404_page_content_align'] = 'tac';
	$style['404_sub_heading'] = esc_html__('wrong page', 'sansara');
	$style['404_heading'] = esc_html__('404 Error', 'sansara');
	$style['404_text'] = esc_html__('The page you\'re looking for doesn\'t exist', 'sansara');

	$style['coming_soon_bg'] = '';
	$style['coming_soon_subscribe_code'] = '';
	$style['coming_soon_sub_heading'] = esc_html__('Our site is under maintance', 'sansara');
	$style['coming_soon_heading'] = esc_html__('Coming Soon', 'sansara');
	$style['coming_soon_text'] = esc_html__('Subscribe to get the latest news and updates', 'sansara');

	$style['project_in_popup'] = 'no';
	$style['project_style'] = 'slider';
	$style['project_image'] = 'full';
	$style['single_post_image_show'] = 'yes';
	$style['custom_mouse_cursor'] = 'yes';
	$style['project_year'] = '';
	$style['project_location'] = '';
	$style['project_photography'] = '';
	$style['project_retouching'] = '';
	$style['project_count_cols'] = 'col2';
	$style['project_count_images'] = '';
	$style['project_portfolio_link'] = '';
	$style['project_before_image'] = '';
	$style['project_after_image'] = '';
	$style['project_sub_heading'] = '';
	$style['project_video_url'] = '';


	$style['preloader_show'] = '1';
	$style['preloader_type'] = '1';
	$style['preloader_label'] = '';
	$style['preloader_img'] = '';
	$style['download_link'] = 'yes';
  $style['project_details'] = 'yes';
  
	$style['code_in_head'] = '';
	$style['code_before_body'] = '';
  
  $style['tr_load_more'] = esc_html__('Load more', 'sansara');
  $style['tr_all'] = esc_html__('All', 'sansara');
  $style['tr_view_full_project'] = esc_html__('view full project', 'sansara');
  $style['tr_prev'] = esc_html__('Prev', 'sansara');
  $style['tr_next'] = esc_html__('Next', 'sansara');
  $style['tr_close'] = esc_html__('Close', 'sansara');

	$style['right_click_disable'] = '0';
	$style['right_click_disable_message'] = __('<p style="text-align: center"><strong><span style="font-size: 18px">Content is protected. Right-click function is disabled.</span></strong></p>', 'sansara');

	$style['protected_message'] = esc_html__( 'This content is password protected. To view it please enter your password below:', 'sansara' );

	if ( isset($sansara_theme) && !empty($sansara_theme) ) {
		if(isset($sansara_theme['single_post_image_show']) && $sansara_theme['single_post_image_show'] == '1') {
			$style['single_post_image_show'] = 'yes';
		} else {
			$style['single_post_image_show'] = 'no';
		}

		if(isset($sansara_theme['custom_mouse_cursor']) && $sansara_theme['custom_mouse_cursor'] == '1') {
			$style['custom_mouse_cursor'] = 'yes';
		} else {
			$style['custom_mouse_cursor'] = 'no';
		}

		if(isset($sansara_theme['show_social_buttons_header']) && $sansara_theme['show_social_buttons_header'] == '1') {
			$style['header_social_buttons'] = 'yes';
		} else {
			$style['header_social_buttons'] = 'no';
		}

		if(isset($sansara_theme['header_cart']) && $sansara_theme['header_cart'] == '1') {
			$style['cart'] = 'yes';
		} else {
			$style['cart'] = 'no';
		}

		if(isset($sansara_theme['header_search']) && $sansara_theme['header_search'] == '1') {
			$style['search'] = 'yes';
		} else {
			$style['search'] = 'no';
		}

		if(isset($sansara_theme['header_style']) && !empty($sansara_theme['header_style'])) {
			$style['header_style'] = $sansara_theme['header_style'];
		}

		if(isset($sansara_theme['site_mode']) && !empty($sansara_theme['site_mode'])) {
			$style['site_mode'] = $sansara_theme['site_mode'];
		}

		if(isset($sansara_theme['default_logo']['background-image']) && $sansara_theme['default_logo']['background-image']) { 
			$style['logo_default_url'] = $sansara_theme['default_logo']['background-image'];
		}
		if(isset($sansara_theme['dark_logo']['background-image']) && $sansara_theme['dark_logo']['background-image']) {
			$style['logo_dark_url'] = $sansara_theme['dark_logo']['background-image'];
		}
 		if(isset($sansara_theme['light_logo']['background-image']) && $sansara_theme['light_logo']['background-image']) {
			$style['logo_light_url'] = $sansara_theme['light_logo']['background-image'];
		}

		if(!empty($style['logo_light_url']) && !empty($style['logo_dark_url'])) {
			$style['logo_content'] = '<img class="light l-b" src="'.esc_url($style['logo_light_url']).'" alt="'.get_bloginfo( 'name' ).'"><img class="dark l-b" src="'.esc_url($style['logo_dark_url']).'" alt="'.get_bloginfo( 'name' ).'">';
		} elseif(!empty($style['logo_light_url']) || !empty($style['logo_dark_url'])) {
			if(!empty($style['logo_light_url'])) {
				$style['logo_content'] = '<img class="l-b" src="'.esc_url($style['logo_light_url']).'" alt="'.get_bloginfo( 'name' ).'">';
			}
			if(!empty($style['logo_dark_url'])) {
				$style['logo_content'] = '<img class="l-b" src="'.esc_url($style['logo_dark_url']).'" alt="'.get_bloginfo( 'name' ).'">';
			}
		} elseif(!empty($style['logo_default_url'])) {
			$style['logo_content'] = '<img class="l-b" src="'.esc_url($style['logo_default_url']).'" alt="'.get_bloginfo( 'name' ).'">';
		} elseif(isset($sansara_theme['logo_text']) && $sansara_theme['logo_text']) {
			$style['logo_content'] = '<span class="l-b">'.esc_html($sansara_theme['logo_text']).'</span>';
		} else {
			$style['logo_content'] = '<span class="l-b">'.get_bloginfo( 'name' ).'</span>';
		}

		if(isset($sansara_theme['working_time']) && !empty($sansara_theme['working_time'])) {
			$style['working_time'] = $sansara_theme['working_time'];
		}

		if(isset($sansara_theme['phone_number']) && !empty($sansara_theme['phone_number'])) {
			$style['phone_number'] = $sansara_theme['phone_number'];
		}

		if(isset($sansara_theme['right_click_disable'])) {
			$style['right_click_disable'] = $sansara_theme['right_click_disable'];
		}

		if(isset($sansara_theme['right_click_disable_message']) && !empty($sansara_theme['right_click_disable_message'])) {
			$style['right_click_disable_message'] = $sansara_theme['right_click_disable_message'];
		}

		if(isset($sansara_theme['protected_message']) && !empty($sansara_theme['protected_message'])) {
			$style['protected_message'] = $sansara_theme['protected_message'];
		}

		if(isset($sansara_theme['google_maps_api_key']) && !empty($sansara_theme['google_maps_api_key'])) {
			$style['google_maps_api_key'] = $sansara_theme['google_maps_api_key'];
		}

		if(isset($sansara_theme['navigation_type']) && !empty($sansara_theme['navigation_type'])) {
			$style['navigation_type'] = $sansara_theme['navigation_type'];
		}

		if(isset($sansara_theme['header_container']) && !empty($sansara_theme['header_container'])) {
			$style['header_container'] = $sansara_theme['header_container'];
		}

		if(isset($sansara_theme['header_color_mode']) && !empty($sansara_theme['header_color_mode'])) {
			$style['header_color_mode'] = $sansara_theme['header_color_mode'];
		}

		if(isset($sansara_theme['header_color_mode_404']) && !empty($sansara_theme['header_color_mode_404'])) {
			$style['header_color_mode_404'] = $sansara_theme['header_color_mode_404'];
		}

		if(isset($sansara_theme['header_color_mode_coming_soon']) && !empty($sansara_theme['header_color_mode_coming_soon'])) {
			$style['header_color_mode_coming_soon'] = $sansara_theme['header_color_mode_coming_soon'];
		}

		if(isset($sansara_theme['tr_load_more']) && !empty($sansara_theme['tr_load_more'])) {
			$style['tr_load_more'] = $sansara_theme['tr_load_more'];
		}

		if(isset($sansara_theme['tr_all']) && !empty($sansara_theme['tr_all'])) {
			$style['tr_all'] = $sansara_theme['tr_all'];
		}

		if(isset($sansara_theme['tr_view_full_project']) && !empty($sansara_theme['tr_view_full_project'])) {
			$style['tr_view_full_project'] = $sansara_theme['tr_view_full_project'];
		}

		if(isset($sansara_theme['tr_prev']) && !empty($sansara_theme['tr_prev'])) {
			$style['tr_prev'] = $sansara_theme['tr_prev'];
		}

		if(isset($sansara_theme['tr_next']) && !empty($sansara_theme['tr_next'])) {
			$style['tr_next'] = $sansara_theme['tr_next'];
		}

		if(isset($sansara_theme['tr_close']) && !empty($sansara_theme['tr_close'])) {
			$style['tr_close'] = $sansara_theme['tr_close'];
		}

		if(isset($sansara_theme['copyright_text']) && !empty($sansara_theme['copyright_text'])) {
			$style['copyright_text'] = $sansara_theme['copyright_text'];
		}

		if(isset($sansara_theme['sidebar_copyright_text']) && !empty($sansara_theme['sidebar_copyright_text'])) {
			$style['sidebar_copyright_text'] = $sansara_theme['sidebar_copyright_text'];
		}

		if(isset($sansara_theme['footer']) && $sansara_theme['footer']) {
			$style['footer'] = $sansara_theme['footer'];
		}

		if(isset($sansara_theme['footer_social_buttons']) && $sansara_theme['footer_social_buttons']) {
			$style['footer_social_buttons'] = $sansara_theme['footer_social_buttons'];
		}

		if(isset($sansara_theme['footer_scroll_up']) && $sansara_theme['footer_scroll_up']) {
			$style['footer_scroll_up'] = $sansara_theme['footer_scroll_up'];
		}

		if(isset($sansara_theme['footer_col_1'])) {
			$style['footer_col_1'] = $sansara_theme['footer_col_1'];
		}

		if(isset($sansara_theme['footer_col_2'])) {
			$style['footer_col_2'] = $sansara_theme['footer_col_2'];
		}

		if(isset($sansara_theme['footer_col_3'])) {
			$style['footer_col_3'] = $sansara_theme['footer_col_3'];
		}

		if(isset($sansara_theme['404_bg']) && !empty($sansara_theme['404_bg'])) {
			$style['404_bg'] = "background-image: url(".$sansara_theme['404_bg']['background-image'].")";
		}

		if(isset($sansara_theme['404_sub_heading'])) {
			$style['404_sub_heading'] = $sansara_theme['404_sub_heading'];
		}

		if(isset($sansara_theme['404_page_content_align']) && !empty($sansara_theme['404_page_content_align'])) {
			$style['404_page_content_align'] = $sansara_theme['404_page_content_align'];
		}

		if(isset($sansara_theme['404_heading'])) {
			$style['404_heading'] = $sansara_theme['404_heading'];
		}

		if(isset($sansara_theme['404_text'])) {
			$style['404_text'] = $sansara_theme['404_text'];
		}

		if(isset($sansara_theme['coming_soon_bg']) && !empty($sansara_theme['coming_soon_bg'])) {
			$style['coming_soon_bg'] = "background-image: url(".$sansara_theme['coming_soon_bg']['background-image'].")";
		}

		if(isset($sansara_theme['coming_soon_subscribe_code']) && $sansara_theme['coming_soon_subscribe_code']) {
			$style['coming_soon_subscribe_code'] = $sansara_theme['coming_soon_subscribe_code'];
		}

		if(isset($sansara_theme['coming_soon_sub_heading'])) {
			$style['coming_soon_sub_heading'] = $sansara_theme['coming_soon_sub_heading'];
		}

		if(isset($sansara_theme['coming_soon_heading'])) {
			$style['coming_soon_heading'] = $sansara_theme['coming_soon_heading'];
		}

		if(isset($sansara_theme['coming_soon_text'])) {
			$style['coming_soon_text'] = $sansara_theme['coming_soon_text'];
		}

		if(isset($sansara_theme['project_style']) && $sansara_theme['project_style']) {
			$style['project_style'] = $sansara_theme['project_style'];
		}

		if(isset($sansara_theme['project_count_cols']) && $sansara_theme['project_count_cols']) {
			$style['project_count_cols'] = $sansara_theme['project_count_cols'];
		}

		if(isset($sansara_theme['project_count_images']) && $sansara_theme['project_count_images']) {
			$style['project_count_images'] = +$sansara_theme['project_count_images'];
		}

		if(isset($sansara_theme['project_portfolio_link']) && $sansara_theme['project_portfolio_link']) {
			$style['project_portfolio_link'] = $sansara_theme['project_portfolio_link'];
		}

		if(isset($sansara_theme['project_image']) && $sansara_theme['project_image']) {
			$style['project_image'] = $sansara_theme['project_image'];
		}

		if(isset($sansara_theme['project_in_popup']) && $sansara_theme['project_in_popup']) {
			$style['project_in_popup'] = $sansara_theme['project_in_popup'];
		}

		if(isset($sansara_theme['mobile_adaptation']) && $sansara_theme['mobile_adaptation'] == 1) {
			$style['mobile_adaptation'] = 'yes';
		}

		if(isset($sansara_theme['cat_prefix']) && $sansara_theme['cat_prefix'] == 0) {
			$style['cat_prefix'] = 'off';
		}

		if(isset($sansara_theme['code_in_head'])) {
			$style['code_in_head'] = $sansara_theme['code_in_head'];
		}

		if(isset($sansara_theme['code_before_body'])) {
			$style['code_before_body'] = $sansara_theme['code_before_body'];
		}

		if(isset($sansara_theme['preloader_show'])) {
			$style['preloader_show'] = $sansara_theme['preloader_show'];
		}

		if(isset($sansara_theme['preloader_type'])) {
			$style['preloader_type'] = $sansara_theme['preloader_type'];
		}

		if(isset($sansara_theme['preloader_label'])) {
			$style['preloader_label'] = $sansara_theme['preloader_label'];
		}
		
		if(isset($sansara_theme['preloader_img']) && $sansara_theme['preloader_img']) {
			$style['preloader_img'] = $sansara_theme['preloader_img'];
		}
		
		if(isset($sansara_theme['social_target']) && $sansara_theme['social_target']) {
			$style['social_target'] = $sansara_theme['social_target'];
		}

		if(isset($sansara_theme['social_icon1']) && isset($sansara_theme['social_link1']) && $sansara_theme['social_icon1'] && $sansara_theme['social_link1']) {
			$social_array = explode(',', $sansara_theme['social_icon1']);
			$style['social_buttons_content'] .= '<a href="'.esc_url($sansara_theme['social_link1']).'" target="'.esc_attr($style['social_target']).'"><i class="'.esc_attr($social_array[0]).'"></i> <span>'.esc_html($social_array[1]).'</span></a>';
		}

		if(isset($sansara_theme['social_icon2']) && isset($sansara_theme['social_link2']) && $sansara_theme['social_icon2'] && $sansara_theme['social_link2']) {
			$social_array = explode(',', $sansara_theme['social_icon2']);
			$style['social_buttons_content'] .= '<a href="'.esc_url($sansara_theme['social_link2']).'" target="'.esc_attr($style['social_target']).'"><i class="'.esc_attr($social_array[0]).'"></i> <span>'.esc_html($social_array[1]).'</span></a>';
		}

		if(isset($sansara_theme['social_icon3']) && isset($sansara_theme['social_link3']) && $sansara_theme['social_icon3'] && $sansara_theme['social_link3']) {
			$social_array = explode(',', $sansara_theme['social_icon3']);
			$style['social_buttons_content'] .= '<a href="'.esc_url($sansara_theme['social_link3']).'" target="'.esc_attr($style['social_target']).'"><i class="'.esc_attr($social_array[0]).'"></i> <span>'.esc_html($social_array[1]).'</span></a>';
		}

		if(isset($sansara_theme['social_icon4']) && isset($sansara_theme['social_link4']) && $sansara_theme['social_icon4'] && $sansara_theme['social_link4']) {
			$social_array = explode(',', $sansara_theme['social_icon4']);
			$style['social_buttons_content'] .= '<a href="'.esc_url($sansara_theme['social_link4']).'" target="'.esc_attr($style['social_target']).'"><i class="'.esc_attr($social_array[0]).'"></i> <span>'.esc_html($social_array[1]).'</span></a>';
		}

		if(isset($sansara_theme['social_icon5']) && isset($sansara_theme['social_link5']) && $sansara_theme['social_icon5'] && $sansara_theme['social_link5']) {
			$social_array = explode(',', $sansara_theme['social_icon5']);
			$style['social_buttons_content'] .= '<a href="'.esc_url($sansara_theme['social_link5']).'" target="'.esc_attr($style['social_target']).'"><i class="'.esc_attr($social_array[0]).'"></i> <span>'.esc_html($social_array[1]).'</span></a>';
		}

		if(isset($sansara_theme['social_icon6']) && isset($sansara_theme['social_link6']) && $sansara_theme['social_icon6'] && $sansara_theme['social_link6']) {
			$social_array = explode(',', $sansara_theme['social_icon6']);
			$style['social_buttons_content'] .= '<a href="'.esc_url($sansara_theme['social_link6']).'" target="'.esc_attr($style['social_target']).'"><i class="'.esc_attr($social_array[0]).'"></i> <span>'.esc_html($social_array[1]).'</span></a>';
		}

		if(isset($sansara_theme['social_icon7']) && isset($sansara_theme['social_link7']) && $sansara_theme['social_icon7'] && $sansara_theme['social_link7']) {
			$social_array = explode(',', $sansara_theme['social_icon7']);
			$style['social_buttons_content'] .= '<a href="'.esc_url($sansara_theme['social_link7']).'" target="'.esc_attr($style['social_target']).'"><i class="'.esc_attr($social_array[0]).'"></i> <span>'.esc_html($social_array[1]).'</span></a>';
		}

		if(isset($sansara_theme['download-link']) && !empty($sansara_theme['download-link'])) {
			$style['download_link'] = $sansara_theme['download-link'];
		}

		if(isset($sansara_theme['project-details']) && !empty($sansara_theme['project-details'])) {
			$style['project_details'] = $sansara_theme['project-details'];
		}
	}

	if(function_exists("get_field")) {

		if(get_field('header_container') == 'container') {
			$style['header_container'] = 'container';
		} elseif(get_field('header_container') == 'container-fluid') {
			$style['header_container'] = 'container-fluid';
		}

		if(get_field('header_color_mode') == 'light') {
			$style['header_color_mode'] = 'light';
		}

		if(get_field('header_color_mode') == 'dark') {
			$style['header_color_mode'] = 'dark';
		}

		if(get_field('header_space')) {
			$style['header_space'] = get_field('header_space');
		}

		if(get_field('grid_lines')) {
			$style['grid_lines'] = get_field('grid_lines');
		}

		if(get_field('wrap_lines')) {
			$style['wrap_lines'] = get_field('wrap_lines');
		}

		if(get_field('wl_social_links')) {
			$style['wl_social_links'] = get_field('wl_social_links');
		}

		if(get_field('navigation_type') && get_field('navigation_type') != 'default') {
			$style['navigation_type'] = get_field('navigation_type');
		}

		if(get_field('site_mode') && get_field('site_mode') != 'default') {
			$style['site_mode'] = get_field('site_mode');
		}

		if(get_field('header_style') && get_field('header_style') != 'default') {
			$style['header_style'] = get_field('header_style');
		}

		if(get_field('header_container') && get_field('header_container') != 'default') {
			$style['header_container'] = get_field('header_container');
		}

		if(get_field('footer_social_buttons') && get_field('footer_social_buttons') != 'default') {
			$style['footer_social_buttons'] = get_field('footer_social_buttons');
		}

		if(get_field('footer') && get_field('footer') != 'default') {
			$style['footer'] = get_field('footer');
		}

		if(get_field('project_style') && get_field('project_style') != 'default') {
			$style['project_style'] = get_field('project_style');
		}

		if(get_field('project_image') && get_field('project_image') != 'default') {
			$style['project_image'] = get_field('project_image');
		}

		if(get_field('custom_mouse_cursor') && get_field('custom_mouse_cursor') != 'default') {
			$style['custom_mouse_cursor'] = get_field('custom_mouse_cursor');
		}

		if(get_field('project_client_name')) {
			$style['project_client_name'] = get_field('project_client_name');
		}
		
		if(get_field('project_year')) {
			$style['project_year'] = get_field('project_year');
		}

		if(get_field('project_location')) {
			$style['project_location'] = get_field('project_location');
		}

		if(get_field('project_photography')) {
			$style['project_photography'] = get_field('project_photography');
		}

		if(get_field('project_retouching')) {
			$style['project_retouching'] = get_field('project_retouching');
		}

		if(get_field('project_count_cols') && get_field('project_count_cols') != 'default') {
			$style['project_count_cols'] = get_field('project_count_cols');
		}

		if(get_field('project_count_images')) {
			$style['project_count_images'] = +get_field('project_count_images');
		}

		if(get_field('project_before_image')) {
			$style['project_before_image'] = get_field('project_before_image');
		}

		if(get_field('project_after_image')) {
			$style['project_after_image'] = get_field('project_after_image');
		}

		if(get_field('project_sub_heading')) {
			$style['project_sub_heading'] = get_field('project_sub_heading');
		}

		if(get_field('project_video_url')) {
			$style['project_video_url'] = get_field('project_video_url');
		}
	}


	$style['css_classes'] = 'header_'.$style['header_style'];

	if($style['header_style'] == 'left_side' || is_404() || is_page_template('page-coming-soon.php')) {
		$style['header_space'] = 'no';
	}

	if(is_404()) {
		$style['css_classes'] .= ' '.$style['header_color_mode_404'];
		$style['site_mode'] = $style['header_color_mode_404'];
		$style['wrap_lines'] = 'yes';
		$style['header_container'] = 'container-fluid';
	} else if(is_page_template('page-coming-soon.php')) {
		$style['header_container'] = 'container-fluid';
		$style['css_classes'] .= ' '.$style['header_color_mode_coming_soon'];
		$style['site_mode'] = $style['header_color_mode_coming_soon'];
		$style['wrap_lines'] = 'yes';
		$style['navigation_type'] = 'disabled';
		$style['header_space'] = 'no';
		$style['cart'] = 'no';
		$style['search'] = 'no';
	} else if(is_search()) {
		$style['header_container'] = 'container';
		$style['css_classes'] = ' '.$style['header_color_mode'];
		$style['site_mode'] = $style['site_mode'];
		$style['wrap_lines'] = 'no';
		$style['header_space'] = 'yes';
	} else {
		$style['css_classes'] .= ' '.$style['header_color_mode'];
	}

	if(get_post_type() == 'fw-portfolio' && $style['project_style'] == 'horizontal') {
		$style['header_container'] = 'container-fluid';
		$style['footer'] = 'hide';
	}

	if(get_post_type() == 'fw-portfolio' && ($style['project_style'] == 'grid' || $style['project_style'] == 'masonry')) {
		$style['grid_lines'] = 'yes';
	}

	if(get_post_type() == 'fw-portfolio' && $style['project_style'] == 'parallax') {
		$style['header_space'] = 'no';
		$style['header_style'] = 'left_side';
		$style['footer'] = 'hide';
	}

	if($style['header_space'] == 'yes' && !is_404() && !is_page_template('page-coming-soon.php')) {
		$style['css_classes'] .= ' header-space-on';
	}

	return $style;
}

add_filter( 'body_class', 'sansara_custom_body_classes');
function sansara_custom_body_classes( $classes ) {
	global $sansara_theme;
	$site_mode = sansara_styles()['site_mode'];

	$classes[] = 'header-type-'.sansara_styles()['header_style'];
	$classes[] = 'header-nav-type-'.sansara_styles()['navigation_type'];
	$classes[] = 'header-space-'.sansara_styles()['header_space'];
	$classes[] = 'header-container-'.sansara_styles()['header_container'];
    $classes[] = 'popup_download_'.sansara_styles()['download_link'];
    $classes[] = 'project_details_'.sansara_styles()['project_details'];
    $classes[] = 'wrap_lines_'.sansara_styles()['wrap_lines'];
    $classes[] = 'mobile_'.sansara_styles()['mobile_adaptation'];
    $classes[] = 'site-'.$site_mode;

    if(sansara_styles()['right_click_disable'] == '1') {
		$classes[] = 'right-click-disable';
	}

	if(!class_exists('WPBakeryShortCode')) {
		$classes[] = 'site-nav-arr';
	}
 
    return $classes;
}

/**
 * Yprm Custom Head Script
 */

if (!function_exists('yprm_custom_head_script')) {
  function yprm_custom_head_script() {
    if (function_exists('sansara_styles') && !empty(sansara_styles()['code_in_head'])) {
      echo sansara_styles()['code_in_head'];
    }
  }
  add_action( 'wp_head', 'yprm_custom_head_script', 500 );
}

/**
 * Yprm Custom Footer Script
 */

if (!function_exists('yprm_custom_footer_script')) {
  function yprm_custom_footer_script() {
    if (function_exists('sansara_styles') && !empty(sansara_styles()['code_before_body'])) {
      echo sansara_styles()['code_before_body'];
    }
  }
  add_action( 'wp_footer', 'yprm_custom_footer_script', 500 );
}

add_action('wp_footer', 'sansara_right_click_disable'); 
function sansara_right_click_disable() {
	if(function_exists('sansara_styles') && sansara_styles()['right_click_disable'] == '1') {
	    echo '<div class="right-click-disable-message main-row"><div class="container"><div class="cell">'.wp_kses_post(sansara_styles()['right_click_disable_message']).'</div></div></div>';
    } 
}

function sansara_get_the_archive_title( $title ) {
  if(function_exists('sansara_styles') && sansara_styles()['cat_prefix'] == 'off') {
    return preg_replace('~^[^:]+: ~', '', $title );
  } else {
    return $title;
  }
}

add_filter( 'get_the_archive_title', 'sansara_get_the_archive_title');

/**
 * Portfolio widget
 */
class sansara_portfolio_widget extends WP_Widget {
 
	function __construct() {
		parent::__construct(
			'portfolio', 
			'Portfolio'
		);
	}
 
	public function widget( $args, $instance ) {
		$title = $instance['title'];
		$amount = $instance['amount'];
		$cols = $instance['cols'];
		$orderby = $instance['orderby'];
		$order = $instance['order'];
 
		switch ($cols) {
			case '1':
			$class = "col-xs-12";
			break;
			case '2':
			$class = "col-xs-6 col-sm-6";
			break;
			case '3':
			$class = "col-xs-4";
			break;
			case '4':
			$class = "col-xs-6 col-md-3";
			break;

			default:
			$class = "";
			break;
		}

		$porfolio_array = get_posts( array(
			'numberposts'     => $amount,
			'orderby'         => $orderby,
			'order'           => $order,
			'post_type'       => 'fw-portfolio',
			'post_status'     => 'publish'
			)
		);

		echo wp_kses_post($args['before_widget']);
		if ( ! empty( $title ) ) echo wp_kses_post($args['before_title'] . strip_tags($title) . $args['after_title']);
		?>
		<div class="gallery-module row">
			<?php foreach ($porfolio_array as $item) {
				setup_postdata($item);
				$id = $item->ID;
				$name = $item->post_title;

				$thumb = get_post_meta( $id, '_thumbnail_id', true );

				$link = get_permalink($id);
			?>
			<div class="<?php echo esc_attr($class) ?> item"><a href="<?php echo esc_url($link) ?>"><?php echo wp_get_attachment_image( $thumb , 'thumbnail', true, array('title'=>$name) ) ?></a></div>
			<?php } ?>
		</div>
		<?php
		echo wp_kses_post($args['after_widget']);
	}
 
	public function form( $instance ) {
		$title = "";
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		$amount = "";
		if ( isset( $instance[ 'amount' ] ) ) {
			$amount = $instance[ 'amount' ];
		}
		$cols = "";
		if ( isset( $instance[ 'cols' ] ) ) {
			$cols = $instance[ 'cols' ];
		}
		$orderby = "";
		if ( isset( $instance[ 'orderby' ] ) ) {
			$orderby = $instance[ 'orderby' ];
		}
		$order = "";
		if ( isset( $instance[ 'order' ] ) ) {
			$order = $instance[ 'order' ];
		}
		?>
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Heading:', 'sansara') ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_html($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'amount' )); ?>"><?php esc_html_e( 'Amount:', 'sansara') ?></label> 
			<input id="<?php echo esc_html($this->get_field_id( 'amount' )); ?>" name="<?php echo esc_html($this->get_field_name( 'amount' )); ?>" type="text" value="<?php echo ($amount) ? esc_attr( $amount ) : '9'; ?>" size="3" />
		</p>
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'cols' )); ?>"><?php esc_html_e( 'Cols:', 'sansara') ?></label> 
			<input id="<?php echo esc_html($this->get_field_id( 'cols' )); ?>" name="<?php echo esc_html($this->get_field_name( 'cols' )); ?>" type="text" value="<?php echo ($cols) ? esc_attr( $cols ) : '3'; ?>" size="3" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>"><?php esc_html_e( 'Order by:', 'sansara') ?></label>
			<select name="<?php echo esc_attr($this->get_field_name( 'orderby' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>">
				<option value="date" <?php echo ($orderby =='date')?'selected':''; ?>><?php echo esc_html__('Date' ,'sansara') ?></option>
				<option value="author" <?php echo ($orderby =='author')?'selected':''; ?>><?php echo esc_html__('Author' ,'sansara') ?></option>
				<option value="category" <?php echo ($orderby =='category')?'selected':''; ?>><?php echo esc_html__('Category' ,'sansara') ?></option>
				<option value="ID" <?php echo ($orderby =='ID')?'selected':''; ?>><?php echo esc_html__('ID' ,'sansara') ?></option>
				<option value="title" <?php echo ($orderby =='title')?'selected':''; ?>><?php echo esc_html__('Title' ,'sansara') ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'order' )); ?>"><?php esc_html_e( 'Order:', 'sansara') ?></label>
			<select name="<?php echo esc_attr($this->get_field_name( 'order' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'order' )); ?>">
				<option value="DESC"<?php echo ($order =='DESC')?'selected':''; ?>><?php echo esc_html__('Descending order' ,'sansara') ?></option>
				<option value="ASC"<?php echo ($order =='ASC')?'selected':''; ?>><?php echo esc_html__('Ascending order' ,'sansara') ?></option>
			</select>
		</p>
		<?php 
	}
 
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['amount'] = ( is_numeric( $new_instance['amount'] ) ) ? $new_instance['amount'] : '8';
		$instance['cols'] = ( is_numeric( $new_instance['cols'] ) ) ? $new_instance['cols'] : '5';
		$instance['orderby'] = ( !empty( $new_instance['orderby'] ) ) ? $new_instance['orderby'] : 'date';
		$instance['order'] = ( !empty( $new_instance['order'] ) ) ? $new_instance['order'] : 'DESC';
		return $instance;
	}
}

function sansara_portfolio_widget() {
	register_widget( 'sansara_portfolio_widget' );
}
add_action( 'widgets_init', 'sansara_portfolio_widget' );

function fb_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'thin',
            'inline' => 'span',
            'styles' => array(
                'fontWeight'    => '100',
            )
        ),
        array(
            'title' => 'extra-light',
            'inline' => 'span',
            'styles' => array(
                'fontWeight'    => '200',
            )
        ),
        array(
            'title' => 'light',
            'inline' => 'span',
            'styles' => array(
                'fontWeight'    => '300',
            )
        ),
        array(
            'title' => 'regular',
            'inline' => 'span',
            'styles' => array(
                'fontWeight'    => '400',
            )
        ),
        array(
            'title' => 'medium',
            'inline' => 'span',
            'styles' => array(
                'fontWeight'    => '500',
            )
        ),
        array(
            'title' => 'semi-bold',
            'inline' => 'span',
            'styles' => array(
                'fontWeight'    => '600',
            )
        ),
        array(
            'title' => 'bold',
            'inline' => 'span',
            'styles' => array(
                'fontWeight'    => '700',
            )
        ),
        array(
            'title' => 'extra-bold',
            'inline' => 'span',
            'styles' => array(
                'fontWeight'    => '800',
            )
        ),
        array(
            'title' => 'black',
            'inline' => 'span',
            'styles' => array(
                'fontWeight'    => '900',
            )
        ),
        array(
            'title' => 'UPPERCASE',
            'inline' => 'span',
            'styles' => array(
                'textTransform'    => 'uppercase',
            )
        ),
        array(
            'title' => 'Button style 1',
            'inline' => 'a',
            'classes' => 'button-style1',
			'wrapper' => true,
        ),
        array(
            'title' => 'Button style 2',
            'inline' => 'a',
            'classes' => 'button-style2',
			'wrapper' => true,
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}
add_filter( 'tiny_mce_before_init', 'fb_mce_before_init' );

if(function_exists('vc_add_param')) {
	vc_add_params( 'vc_custom_heading', array(
		array(
		    "type"        => "switch",
		    "heading"     => esc_html__( "Decor text on background", "sansara" ),
		    "param_name"  => "decor_text_switch",
		    "value"       => "off",
		    "options"     => array(
		        "on" => array(
		            "on"    => "On",
		            "off"   => "Off",
		        ),
		    ),
		    "default_set" => false,
		),
		array(
		    "type"        => "textfield",
		    "heading"     => esc_html__( "Enter Decor text", "sansara" ),
		    "param_name"  => "decor_text",
		    "dependency" => Array( "element" => "decor_text_switch", "value" => array( "on" ) ),
		),
		array(
		    "type"        => "textfield",
		    "heading"     => esc_html__( "Enter font size Decor text", "sansara" ),
		    "param_name"  => "decor_font_size_text",
		    "dependency" => Array( "element" => "decor_text_switch", "value" => array( "on" ) ),
		),
		array(
		    "type"        => "colorpicker",
		    "heading"     => esc_html__( "Enter Decor text color", "sansara" ),
		    "param_name"  => "decor_text_color",
		    "dependency" => Array( "element" => "decor_text_switch", "value" => array( "on" ) ),
		),
		array(
		    "type"        => "switch",
		    "class"       => "",
		    "heading"     => esc_html__( "Decor line", "sansara" ),
		    "param_name"  => "decor_line",
		    "value"       => "off",
		    "options"     => array(
		        "on" => array(
		            "on"    => "On",
		            "off"   => "Off",
		        ),
		    ),
		    "default_set" => false,
		),
		array(
		    "type"        => "switch",
		    "class"       => "",
		    "heading"     => esc_html__( "Uppercase", "sansara" ),
		    "param_name"  => "uppercase",
		    "value"       => "off",
		    "options"     => array(
		        "on" => array(
		            "on"    => "On",
		            "off"   => "Off",
		        ),
		    ),
		    "default_set" => false,
		),
	));

	vc_add_params("vc_row", array(
		array(
		    "type"        => "switch",
		    "heading"     => esc_html__( "Stick cols", "sansara" ),
		    "param_name"  => "stick",
		    "value"       => "off",
		    "options"     => array(
		        "on" => array(
		            "on"    => "On",
		            "off"   => "Off",
		        ),
		    ),
		    "default_set" => false,
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Custom text color', 'sansara' ),
			'param_name' => 'custom_text_color',
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__( "Background position", "sansara" ),
			"param_name" => "background_position",
			"value" => array(
				esc_html__('Auto', 'sansara') => '',
				"left center" => "left center",
				"left top" => "left top",
				"left bottom" => "left bottom",
				"center center" => "center center",
				"center top" => "center top",
				"center bottom" => "center bottom",
				"right center" => "right center",
				"right top" => "right top",
				"right bottom" => "right bottom"
			)
		),
        array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Gradient background', 'sansara' ),
			'param_name' => 'show_background_gradient',
		),
		array(
			'type' => 'gradient',
			'heading' => esc_html__( 'Gradient', 'sansara' ),
			'param_name' => 'background_gradient',
			'dependency' => array(
				'element' => 'show_background_gradient',
				'not_empty' => true,
			),
		),
        array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Color overlay', 'sansara' ),
			'param_name' => 'color_overlay',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Color overlay hex', 'sansara' ),
			'param_name' => 'color_overlay_color',
			'dependency' => array(
				'element' => 'color_overlay',
				'not_empty' => true,
			),
		),
	));

	vc_add_params("vc_row_inner", array(
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Custom text color', 'sansara' ),
			'param_name' => 'custom_text_color',
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__( "Background position", "sansara" ),
			"param_name" => "background_position",
			"value" => array(
				esc_html__('Auto', 'sansara') => '',
				"left center" => "left center",
				"left top" => "left top",
				"left bottom" => "left bottom",
				"center center" => "center center",
				"center top" => "center top",
				"center bottom" => "center bottom",
				"right center" => "right center",
				"right top" => "right top",
				"right bottom" => "right bottom"
			)
		),
        array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Gradient background', 'sansara' ),
			'param_name' => 'show_background_gradient',
		),
		array(
			'type' => 'gradient',
			'heading' => esc_html__( 'Gradient', 'sansara' ),
			'param_name' => 'background_gradient',
			'dependency' => array(
				'element' => 'show_background_gradient',
				'not_empty' => true,
			),
		),
        array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Color overlay', 'sansara' ),
			'param_name' => 'color_overlay',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Color overlay hex', 'sansara' ),
			'param_name' => 'color_overlay_color',
			'dependency' => array(
				'element' => 'color_overlay',
				'not_empty' => true,
			),
		),
	));

	vc_add_params("vc_column", array(
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Custom text color', 'sansara' ),
			'param_name' => 'custom_text_color',
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__( "Background position", "sansara" ),
			"param_name" => "background_position",
			"value" => array(
				esc_html__('Auto', 'sansara') => '',
				"left center" => "left center",
				"left top" => "left top",
				"left bottom" => "left bottom",
				"center center" => "center center",
				"center top" => "center top",
				"center bottom" => "center bottom",
				"right center" => "right center",
				"right top" => "right top",
				"right bottom" => "right bottom"
			)
		),
        array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Gradient background', 'sansara' ),
			'param_name' => 'show_background_gradient',
		),
		array(
			'type' => 'gradient',
			'heading' => esc_html__( 'Gradient', 'sansara' ),
			'param_name' => 'background_gradient',
			'dependency' => array(
				'element' => 'show_background_gradient',
				'not_empty' => true,
			),
		),
        array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Color overlay', 'sansara' ),
			'param_name' => 'color_overlay',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Color overlay hex', 'sansara' ),
			'param_name' => 'color_overlay_color',
			'dependency' => array(
				'element' => 'color_overlay',
				'not_empty' => true,
			),
		),
	));

	vc_remove_param( "vc_icon", "background_color" );
	vc_remove_param( "vc_icon", "custom_color" );
	vc_remove_param( "vc_icon", "background_style" );
	vc_remove_param( "vc_icon", "background_color" );
	vc_remove_param( "vc_icon", "custom_background_color" );
	vc_remove_param( "vc_icon", "size" );
	vc_remove_param( "vc_icon", "align" );
	vc_remove_param( "vc_icon", "link" );
	vc_remove_param( "vc_icon", "el_id" );
	vc_remove_param( "vc_icon", "el_class" );
	vc_remove_param( "vc_icon", "css" );

	vc_add_params("vc_icon", array(
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Custom color', 'sansara' ),
			'param_name' => 'custom_color',
			'description' => esc_html__( 'Select custom icon color.', 'sansara' ),
			'dependency' => array(
				'element' => 'color',
				'value' => 'custom',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Background shape', 'sansara' ),
			'param_name' => 'background_style',
			'value' => array(
				esc_html__( 'None', 'sansara' ) => '',
				esc_html__( 'Circle', 'sansara' ) => 'rounded',
				esc_html__( 'Square', 'sansara' ) => 'boxed',
				esc_html__( 'Rounded', 'sansara' ) => 'rounded-less',
				esc_html__( 'Outline Circle', 'sansara' ) => 'rounded-outline',
				esc_html__( 'Outline Square', 'sansara' ) => 'boxed-outline',
				esc_html__( 'Outline Rounded', 'sansara' ) => 'rounded-less-outline',
			),
			'description' => esc_html__( 'Select background shape and style for icon.', 'sansara' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Background color', 'sansara' ),
			'param_name' => 'background_color',
			'value' => array_merge( getVcShared( 'colors' ), array( esc_html__( 'Custom color', 'sansara' ) => 'custom' ), array( esc_html__( 'Gradient', 'sansara' ) => 'gradient' ) ),
			'std' => 'grey',
			'description' => esc_html__( 'Select background color for icon.', 'sansara' ),
			'param_holder_class' => 'vc_colored-dropdown',
			'dependency' => array(
				'element' => 'background_style',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Custom background color', 'sansara' ),
			'param_name' => 'custom_background_color',
			'description' => esc_html__( 'Select custom icon background color.', 'sansara' ),
			'dependency' => array(
				'element' => 'background_color',
				'value' => 'custom',
			),
		),
		array(
			'type' => 'gradient',
			'heading' => esc_html__( 'Custom background gradient', 'sansara' ),
			'param_name' => 'custom_background_gradient',
			'dependency' => array(
				'element' => 'background_color',
				'value' => 'gradient',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Size', 'sansara' ),
			'param_name' => 'size',
			'value' => array_merge( getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
			'std' => 'md',
			'description' => esc_html__( 'Icon size.', 'sansara' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon alignment', 'sansara' ),
			'param_name' => 'align',
			'value' => array(
				__( 'Left', 'sansara' ) => 'left',
				__( 'Right', 'sansara' ) => 'right',
				__( 'Center', 'sansara' ) => 'center',
			),
			'description' => esc_html__( 'Select icon alignment.', 'sansara' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => esc_html__( 'URL (Link)', 'sansara' ),
			'param_name' => 'link',
			'description' => esc_html__( 'Add link to icon.', 'sansara' ),
		),
		vc_map_add_css_animation(),
		array(
			'type' => 'el_id',
			'heading' => esc_html__( 'Element ID', 'sansara' ),
			'param_name' => 'el_id',
			'description' => sprintf( __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'sansara' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'sansara' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'sansara' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'sansara' ),
			'param_name' => 'css',
			'group' => esc_html__( 'Design Options', 'sansara' ),
		),
	));

	vc_remove_param( "vc_tta_accordion", "no_fill" );
	vc_remove_param( "vc_tta_accordion", "spacing" );
	vc_remove_param( "vc_tta_accordion", "gap" );
	vc_remove_param( "vc_tta_accordion", "c_align" );
	vc_remove_param( "vc_tta_accordion", "autoplay" );
	vc_remove_param( "vc_tta_accordion", "collapsible_all" );
	vc_remove_param( "vc_tta_accordion", "c_icon" );
	vc_remove_param( "vc_tta_accordion", "c_position" );
	vc_remove_param( "vc_tta_accordion", "active_section" );
	vc_remove_param( "vc_tta_accordion", "el_id" );
	vc_remove_param( "vc_tta_accordion", "el_class" );
	vc_remove_param( "vc_tta_accordion", "css" );

	vc_add_params("vc_tta_accordion", array(
        array(
            "type" => "gradient",
            "base_gradient" => "#ff6884 0%,#620044 100%",
            "base_orientation" => "horizontal",
            "heading" => esc_html__("Gradient on active", "sansara"),
            "param_name" => "active_gradient",
			'dependency' => array(
				'element' => 'style',
				'value' => 'classic',
			),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text color active block", "sansara"),
            "param_name" => "active_color",
			'dependency' => array(
				'element' => 'style',
				'value' => 'classic',
			),
        ),
		array(
			'type' => 'checkbox',
			'param_name' => 'no_fill',
			'heading' => esc_html__( 'Do not fill content area?', 'sansara' ),
			'description' => esc_html__( 'Do not fill content area with color.', 'sansara' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'spacing',
			'value' => array(
				esc_html__( 'None', 'sansara' ) => '',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
			),
			'heading' => esc_html__( 'Spacing', 'sansara' ),
			'description' => esc_html__( 'Select accordion spacing.', 'sansara' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'gap',
			'value' => array(
				esc_html__( 'None', 'sansara' ) => '',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
			),
			'heading' => esc_html__( 'Gap', 'sansara' ),
			'description' => esc_html__( 'Select accordion gap.', 'sansara' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'c_align',
			'value' => array(
				esc_html__( 'Left', 'sansara' ) => 'left',
				esc_html__( 'Right', 'sansara' ) => 'right',
				esc_html__( 'Center', 'sansara' ) => 'center',
			),
			'heading' => esc_html__( 'Alignment', 'sansara' ),
			'description' => esc_html__( 'Select accordion section title alignment.', 'sansara' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'autoplay',
			'value' => array(
				esc_html__( 'None', 'sansara' ) => 'none',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'10' => '10',
				'20' => '20',
				'30' => '30',
				'40' => '40',
				'50' => '50',
				'60' => '60',
			),
			'std' => 'none',
			'heading' => esc_html__( 'Autoplay', 'sansara' ),
			'description' => esc_html__( 'Select auto rotate for accordion in seconds (Note: disabled by default).', 'sansara' ),
		),
		array(
			'type' => 'checkbox',
			'param_name' => 'collapsible_all',
			'heading' => esc_html__( 'Allow collapse all?', 'sansara' ),
			'description' => esc_html__( 'Allow collapse all accordion sections.', 'sansara' ),
		),
		// Control Icons
		array(
			'type' => 'dropdown',
			'param_name' => 'c_icon',
			'value' => array(
				esc_html__( 'None', 'sansara' ) => '',
				esc_html__( 'Chevron', 'sansara' ) => 'chevron',
				esc_html__( 'Plus', 'sansara' ) => 'plus',
				esc_html__( 'Triangle', 'sansara' ) => 'triangle',
			),
			'std' => 'plus',
			'heading' => esc_html__( 'Icon', 'sansara' ),
			'description' => esc_html__( 'Select accordion navigation icon.', 'sansara' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'c_position',
			'value' => array(
				esc_html__( 'Left', 'sansara' ) => 'left',
				esc_html__( 'Right', 'sansara' ) => 'right',
			),
			'dependency' => array(
				'element' => 'c_icon',
				'not_empty' => true,
			),
			'heading' => esc_html__( 'Position', 'sansara' ),
			'description' => esc_html__( 'Select accordion navigation icon position.', 'sansara' ),
		),
		// Control Icons END
		array(
			'type' => 'textfield',
			'param_name' => 'active_section',
			'heading' => esc_html__( 'Active section', 'sansara' ),
			'value' => 1,
			'description' => esc_html__( 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'sansara' ),
		),
		vc_map_add_css_animation(),
		array(
			'type' => 'el_id',
			'heading' => esc_html__( 'Element ID', 'sansara' ),
			'param_name' => 'el_id',
			'description' => sprintf( __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'sansara' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'sansara' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'sansara' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'sansara' ),
			'param_name' => 'css',
			'group' => esc_html__( 'Design Options', 'sansara' ),
		),
	));
}

add_action( 'vc_before_init', 'sansara_vc_before_init' );

class sansara_social_buttons_widget extends WP_Widget {
 
	function __construct() {
		parent::__construct(
			'social_buttons', 
			'Social buttons'
		);
	}
 
	public function widget( $args, $instance ) {
		$title = $instance['title'];
		if(function_exists('sansara_styles') && !empty(sansara_styles()['social_buttons_content'])) {
			echo '<div class="social-buttons-widget widget">';
				if ( ! empty( $title ) ) echo wp_kses_post($args['before_title'] . $title . $args['after_title']);
				
				echo '<div class="social-buttons">'.sansara_styles()['social_buttons_content'].'</div>';

			echo '</div>';
		}
	}

	public function form( $instance ) {
		$title = "";
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Heading:', 'sansara') ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}

function sansara_social_buttons_widget() {
	register_widget( 'sansara_social_buttons_widget' );
}
add_action( 'widgets_init', 'sansara_social_buttons_widget' );

function sansara_vc_before_init() {
    if( function_exists('vc_set_shortcodes_templates_dir') ){
        vc_set_shortcodes_templates_dir( get_template_directory() . '/vc_templates' );
    }
}

/**
 * The order of the blocks
 **/

add_action( 'vc_before_init', 'sansara_vcSetAsTheme' );
function sansara_vcSetAsTheme() {
	if(function_exists('vc_set_as_theme')) {
    	vc_set_as_theme();
	}
}


/**
 * Blog post widget
 */
class sansara_blog_post_widget extends WP_Widget {
 
	function __construct() {
		parent::__construct(
			'blog_post', 
			'Blog posts'
		);
	}
 
	public function widget( $args, $instance ) {
		$title = $instance['title'];
		$amount = $instance['amount'];
		$orderby = $instance['orderby'];
		$order = $instance['order'];
		$display_image = $instance['display_image'];
		$display_date = $instance['display_date'];


		$post_array = get_posts( array(
			'numberposts'     => $amount,
			'orderby'         => $orderby,
			'order'           => $order,
			'post_type'       => 'post',
			'post_status'     => 'publish'
			)
		);

		echo wp_kses_post($args['before_widget']);
		if ( ! empty( $title ) ) echo wp_kses_post($args['before_title'] . strip_tags($title) . $args['after_title']);
		?>
		<div class="blog-post-widget widget">
			<?php foreach ($post_array as $item) {
				setup_postdata($item);
				$id = $item->ID;
				$name = $item->post_title;

				$thumb = get_post_meta( $id, '_thumbnail_id', true );
				$image_array = wp_get_attachment_image_src( $thumb , 'thumbnail' )[0];
			?>
			<div class="item">
				<?php if($display_image == "yes" && isset($image_array) && !empty($image_array)) { ?>
				<a href="<?php echo esc_url(get_permalink($id)) ?>" class="image" style="background-image: url(<?php echo esc_url($image_array) ?>)"></a>
				<?php } ?>
				<div class="text">
					<a href="<?php echo esc_url(get_permalink($id)) ?>" class="name"><?php echo esc_html($name) ?></a>
					<?php if($display_date == "yes") { ?>
						<div class="blog-detail"><span><?php echo get_the_date('', $id) ?></span></div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php
		echo wp_kses_post($args['after_widget']);
	}
 
	public function form( $instance ) {
		$title = "";
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		$amount = "";
		if ( isset( $instance[ 'amount' ] ) ) {
			$amount = $instance[ 'amount' ];
		}
		$orderby = "";
		if ( isset( $instance[ 'orderby' ] ) ) {
			$orderby = $instance[ 'orderby' ];
		}
		$order = "";
		if ( isset( $instance[ 'order' ] ) ) {
			$order = $instance[ 'order' ];
		}
		$display_image = "";
		if ( isset( $instance[ 'display_image' ] ) ) {
			$display_image = $instance[ 'display_image' ];
		}
		$display_date = "";
		if ( isset( $instance[ 'display_date' ] ) ) {
			$display_date = $instance[ 'display_date' ];
		}
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Heading:', 'sansara') ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'amount' )); ?>"><?php esc_html_e( 'Number posts:', 'sansara') ?></label> 
			<input id="<?php echo esc_attr($this->get_field_id( 'amount' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'amount' )); ?>" type="number" value="<?php echo ($amount) ? esc_attr( $amount ) : '3'; ?>" size="3" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>"><?php esc_html_e( 'Order by:', 'sansara') ?></label>
			<select name="<?php echo esc_attr($this->get_field_name( 'orderby' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>">
				<option value="date" <?php echo ($orderby =='date')?'selected':''; ?>><?php echo esc_html__('Date' ,'sansara') ?></option>
				<option value="author" <?php echo ($orderby =='author')?'selected':''; ?>><?php echo esc_html__('Author' ,'sansara') ?></option>
				<option value="category" <?php echo ($orderby =='category')?'selected':''; ?>><?php echo esc_html__('Category' ,'sansara') ?></option>
				<option value="ID" <?php echo ($orderby =='ID')?'selected':''; ?>><?php echo esc_html__('ID' ,'sansara') ?></option>
				<option value="title" <?php echo ($orderby =='title')?'selected':''; ?>><?php echo esc_html__('Title' ,'sansara') ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'order' )); ?>"><?php esc_html_e( 'Order:', 'sansara') ?></label>
			<select name="<?php echo esc_attr($this->get_field_name( 'order' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'order' )); ?>">
				<option value="DESC"<?php echo ($order =='DESC')?'selected':''; ?>><?php echo esc_html__('Descending order' ,'sansara') ?></option>
				<option value="ASC"<?php echo ($order =='ASC')?'selected':''; ?>><?php echo esc_html__('Ascending order' ,'sansara') ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'display_image' )); ?>"><?php esc_html_e( 'Image:', 'sansara') ?></label>
			<select name="<?php echo esc_attr($this->get_field_name( 'display_image' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'display_image' )); ?>">
				<option value="yes"<?php echo ($display_image =='yes')?'selected':''; ?>><?php echo esc_html__('Yes' ,'sansara') ?></option>
				<option value="no"<?php echo ($display_image =='no')?'selected':''; ?>><?php echo esc_html__('No' ,'sansara') ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'display_date' )); ?>"><?php esc_html_e( 'Date:', 'sansara') ?></label>
			<select name="<?php echo esc_attr($this->get_field_name( 'display_date' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'display_date' )); ?>">
				<option value="yes"<?php echo ($display_date =='yes')?'selected':''; ?>><?php echo esc_html__('Yes' ,'sansara') ?></option>
				<option value="no"<?php echo ($display_date =='no')?'selected':''; ?>><?php echo esc_html__('No' ,'sansara') ?></option>
			</select>
		</p>

		<?php 
	}
 
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['amount'] = ( is_numeric( $new_instance['amount'] ) ) ? $new_instance['amount'] : '2';
		$instance['orderby'] = ( !empty( $new_instance['orderby'] ) ) ? $new_instance['orderby'] : 'date';
		$instance['order'] = ( !empty( $new_instance['order'] ) ) ? $new_instance['order'] : 'DESC';
		$instance['display_image'] = ( !empty( $new_instance['display_image'] ) ) ? $new_instance['display_image'] : 'yes';
		$instance['display_date'] = ( !empty( $new_instance['display_date'] ) ) ? $new_instance['display_date'] : 'yes';
		return $instance;
	}
}

function sansara_blog_post_widget() {
	register_widget( 'sansara_blog_post_widget' );
}
add_action( 'widgets_init', 'sansara_blog_post_widget' );

function sansara_browser_body_class($classes) {
        global $is_lynx, $is_gecko, $is_IE, $is_edge, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if($is_lynx) $classes[] = 'lynx';
        elseif($is_gecko) $classes[] = 'gecko';
        elseif($is_opera) $classes[] = 'opera';
        elseif($is_NS4) $classes[] = 'ns4';
        elseif($is_safari) $classes[] = 'safari';
        elseif($is_chrome) $classes[] = 'chrome';
        elseif($is_edge) $classes[] = 'edge';
        elseif($is_IE) {
                $classes[] = 'ie';
                if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', filter_input(INPUT_SERVER, 'HTTP_USER_AGENT'), $browser_version))
                $classes[] = 'ie'.$browser_version[1];
        } else $classes[] = 'unknown';
        if($is_iphone) $classes[] = 'iphone';
        if ( stristr( filter_input(INPUT_SERVER, 'HTTP_USER_AGENT'),"mac") ) {
                 $classes[] = 'osx';
           } elseif ( stristr( filter_input(INPUT_SERVER, 'HTTP_USER_AGENT'),"linux") ) {
                 $classes[] = 'linux';
           } elseif ( stristr( filter_input(INPUT_SERVER, 'HTTP_USER_AGENT'),"windows") ) {
                 $classes[] = 'windows';
           }
        return $classes;
}
add_filter('body_class','sansara_browser_body_class');

function sansara_phpinfo2array() {
    $entitiesToUtf8 = function($input) {
        // http://php.net/manual/en/function.html-entity-decode.php#104617
        return preg_replace_callback("/(&#[0-9]+;)/", function($m) { return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES"); }, $input);
    };
    $plainText = function($input) use ($entitiesToUtf8) {
        return trim(html_entity_decode($entitiesToUtf8(strip_tags($input))));
    };
    $titlePlainText = function($input) use ($plainText) {
        return '# '.$plainText($input);
    };
    
    ob_start();
    phpinfo(-1);
    
    $phpinfo = array('phpinfo' => array());

    // Strip everything after the <h1>Configuration</h1> tag (other h1's)
    if (!preg_match('#(.*<h1[^>]*>\s*Configuration.*)<h1#s', ob_get_clean(), $matches)) {
        return array();
    }
    
    $input = $matches[1];
    $matches = array();

    if(preg_match_all(
        '#(?:<h2.*?>(?:<a.*?>)?(.*?)(?:<\/a>)?<\/h2>)|'.
        '(?:<tr.*?><t[hd].*?>(.*?)\s*</t[hd]>(?:<t[hd].*?>(.*?)\s*</t[hd]>(?:<t[hd].*?>(.*?)\s*</t[hd]>)?)?</tr>)#s',
        $input, 
        $matches, 
        PREG_SET_ORDER
    )) {
        foreach ($matches as $match) {
            $fn = strpos($match[0], '<th') === false ? $plainText : $titlePlainText;
            if (strlen($match[1])) {
                $phpinfo[$match[1]] = array();
            } elseif (isset($match[3])) {
                $keys1 = array_keys($phpinfo);
                $phpinfo[end($keys1)][$fn($match[2])] = isset($match[4]) ? array($fn($match[3]), $fn($match[4])) : $fn($match[3]);
            } else {
                $keys1 = array_keys($phpinfo);
                $phpinfo[end($keys1)][] = $fn($match[2]);
            }

        }
    }
    
    return $phpinfo;
}

function sansara_let_to_num( $size ) {
	$l    = substr( $size, -1 );
	$ret  = substr( $size, 0, -1 );
	$byte = 1024;

	switch ( strtoupper( $l ) ) {
		case 'P':
			$ret *= 1024;
		case 'T':
			$ret *= 1024;
		case 'G':
			$ret *= 1024;
		case 'M':
			$ret *= 1024;
		case 'K':
			$ret *= 1024;
	}
	return $ret;
}
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'sansara_woocommerce_template_loop_product_thumbnail', 10);

/**
 * WooCommerce Loop Product Thumbs
 **/
if ( ! function_exists( 'sansara_woocommerce_template_loop_product_thumbnail' ) ) {
	function sansara_woocommerce_template_loop_product_thumbnail() {
		echo sansara_woocommerce_get_product_thumbnail();
	} 
}

/**
 * WooCommerce Product Thumbnail
 **/
if ( ! function_exists( 'sansara_woocommerce_get_product_thumbnail' ) ) {
	
	function sansara_woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post, $woocommerce,$product;
		if ( ! $placeholder_width )
			$placeholder_width = wc_get_image_size( 'shop_catalog' )['width'];
		if ( ! $placeholder_height )
			$placeholder_height = wc_get_image_size( 'shop_catalog' )['height'];

		$class = implode( ' ', array_filter( array(
                'button',
                'product_type_' . $product->get_type(),
                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
        ) ) );

		$output = '<div class="image">';
		$output .= apply_filters( 'woocommerce_loop_add_to_cart_link',
			sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s"><span>%s</span></a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product->get_id() ),
				esc_attr( $product->get_sku() ),
				esc_attr( $class ),
				esc_html( $product->add_to_cart_text() )
			),
		$product );
		
		$output .= '<a href="'.get_the_permalink().'" class="img">';

		if ( has_post_thumbnail() ) {

			$output .= get_the_post_thumbnail( $post->ID, $size );
			if($attachment_ids = $product->get_gallery_image_ids() ) {
				if(isset($attachment_ids[1])){
					$output .= wp_get_attachment_image( $attachment_ids[1] , 'shop_catalog', '', array('class'=>'show') );
				}
			}

		} else {
			
			$output .= '<img src="'. woocommerce_placeholder_img_src() .'" alt="'.esc_attr__('Placeholder', 'sansara').'" width="' . $placeholder_width . '" height="' . $placeholder_height . '" />';
			
		}

		$output .= '</a></div>';

		return $output;
	}
}

/**
 * WooCommerce Single Meta
 **/
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'sansara_woocommerce_template_single_meta_remove_category', 5 );

function sansara_woocommerce_template_single_meta_remove_category(){    

	global $post, $product;

	?>
	<div class="product_meta">

	  <?php do_action( 'woocommerce_product_meta_start' ); ?>

	  <?php if ( wc_product_sku_enabled() && $product->get_sku() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

	    <span class="sku_wrapper"><?php _e( 'SKU:', 'sansara' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( '---', 'sansara' ); ?></span></span>

	  <?php endif; ?>

	 
	  <?php do_action( 'woocommerce_product_meta_end' ); ?>

	</div>

<?php }

add_filter( 'woocommerce_output_related_products_args', 'sansara_related_products_args' );
function sansara_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 1; // arranged in 2 columns
	return $args;
}


/**
 * The order of the blocks
 **/

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_filter( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);

add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
	?>
	<div class="header-minicart woocommerce header-minicart-sansara">
		<?php $count = $woocommerce->cart->cart_contents_count;
		if($count == 0) { ?>
		<div class="hm-cunt"><i class="base-icons-shopping-cart"></i><span><?php echo esc_html($count) ?></span></div>
		<?php } else { ?>
		<a class="hm-cunt" href="<?php echo esc_url(wc_get_cart_url()) ?>"><i class="base-icons-shopping-cart"></i><span><?php echo esc_html($count) ?></span></a>
		<?php } ?>
		<div class="minicart-wrap">
			<?php woocommerce_mini_cart(); ?>
		</div>
	</div>
	<?php
	$fragments['.header-minicart-sansara'] = ob_get_clean();

	return $fragments;
}

add_filter( 'jpeg_quality', 'sansara_filter_theme_image_full_quality' );
add_filter( 'wp_editor_set_quality', 'sansara_filter_theme_image_full_quality' );

function sansara_filter_theme_image_full_quality( $quality ) {
    return 100;
}

add_filter( 'the_password_form', 'sansara_custom_password_form' );
function sansara_custom_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form class="protected-post-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><div class="cell">'. wp_kses_post(sansara_styles()['protected_message']) .'<div class="area"><input name="post_password" placeholder="'.esc_attr__('Type the password', 'sansara').'" id="' . $label . '" type="password" /><button type="submit" name="Submit" class="button"><i class="ui-interface-unlock"></i></button></div></div></form>';
    return $o;
}

function sansara_get_fw_index($id = null) {
	if(empty($id)) {
		$id = get_the_ID();
	}

	$args = array(
        'posts_per_page'  => '-1',
        'post_type'       => 'fw-portfolio',
        'post_status'     => 'publish',
    );

    $porfolio_array = new WP_Query( $args );

    foreach($porfolio_array->posts as $key => $post) {
    	if($post->ID == $id) {
    		$index = $key;
    		break;
    	}
    }

    $index++;

    if($index <= 9) {
    	$index = '0'.$index;
    }

    return $index;
}


