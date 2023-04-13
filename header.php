<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sansara
 */

if(get_post_type() == 'fw-portfolio' && (sansara_styles()['project_style'] == 'right_side' || sansara_styles()['project_style'] == 'horizontal')) {
	$prev = get_permalink(get_adjacent_post(false,'',false));
	$next = get_permalink(get_adjacent_post(false,'',true));
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
		<div id="all" class="site">
			<?php if(class_exists('WPBakeryShortCode') && sansara_styles()['custom_mouse_cursor'] == 'yes') { ?>
				<div class="mouse-cursor"></div>
			<?php } if(sansara_styles()['preloader_show'] == '1' && sansara_styles()['preloader_type'] == 'custom_image' && isset(sansara_styles()['preloader_img']['background-image']) && !empty(sansara_styles()['preloader_img']['background-image'])) { ?>
				<div class="preloader">
					<div class="preloader_img"><img src="<?php echo esc_url(sansara_styles()['preloader_img']['background-image']) ?>" alt="<?php echo get_bloginfo( 'name' ) ?>"></div>
				</div>
			<?php } else if(sansara_styles()['preloader_show'] == '1' && sansara_styles()['preloader_type'] == 'circle') { ?>
				<div class="preloader-area">
					<div class="preloader-circle">
						<div class="preloader-circle1"></div>
						<div class="preloader-circle2"></div>
						<div class="preloader-circle3"></div>
						<div class="preloader-circle4"></div>
					</div>
				</div>
			<?php } else if(sansara_styles()['preloader_show'] == '1' && sansara_styles()['preloader_type'] == 'default') { ?>
				<div class="preloader-default-area">
					<div class="preloader-default">
						<div class="label"><?php echo wp_kses_post(sansara_styles()['preloader_label']) ?></div>
					</div>
					<div class="line"></div>
				</div>
			<?php } ?>
			<?php if(sansara_styles()['header_style'] != 'left_side') { ?>
				<header class="site-header <?php echo esc_attr(sansara_styles()['css_classes']) ?> main-row">
					<div class="<?php echo esc_attr(sansara_styles()['header_container']) ?>">
						<div class="logo"><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo wp_kses_post(sansara_styles()['logo_content']) ?></a></div>
						<div class="fr">
							<?php if(has_nav_menu('navigation') && sansara_styles()['navigation_type'] != 'disabled') { ?>
								<?php if(sansara_styles()['navigation_type'] != 'on_side') { ?>
									<nav class="navigation <?php echo esc_attr(sansara_styles()['navigation_type']) ?>"><?php wp_nav_menu( array( 'theme_location' => 'navigation', 'container' => 'ul', 'menu_class' => 'menu', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?></nav>
								<?php } ?>
								<div class="butter-button <?php echo esc_attr(sansara_styles()['navigation_type']) ?>"><div></div></div>
							<?php } if(sansara_styles()['search'] == 'yes') { ?>
								<div class="search-button"><i class="base-icons-magnifying-glass"></i></div>
							<?php } if(sansara_styles()['cart'] == 'yes' && class_exists( 'WooCommerce' )) { ?>
								<div class="header-minicart woocommerce header-minicart-sansara">
									<?php global $woocommerce;
									$count = $woocommerce->cart->cart_contents_count;
									if($count == 0) { ?>
									<div class="hm-cunt"><i class="base-icons-shopping-cart"></i><span><?php echo esc_html($count) ?></span></div>
									<?php } else { ?>
									<a class="hm-cunt" href="<?php echo esc_url(wc_get_cart_url()) ?>"><i class="base-icons-shopping-cart"></i><span><?php echo esc_html($count) ?></span></a>
									<?php } ?>
									<div class="minicart-wrap">
										<?php woocommerce_mini_cart(); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</header>
				<?php if(sansara_styles()['wrap_lines'] == 'yes') { ?>
					<div class="wrap-lines main-row">
						<div class="left">
							<div class="line top"><span></span></div>
							<?php if(sansara_styles()['wl_social_links'] == 'yes' && !empty(sansara_styles()['social_buttons_content'])) { ?>
								<div class="line middle"><span></span></div>
								<div class="social-buttons-hidden">
									<div class="button social-media-elements-sharethis"></div>
									<div class="social-buttons-text">
										<?php echo wp_kses_post(sansara_styles()['social_buttons_content']); ?>
									</div>
								</div>
							<?php } ?>
							<div class="line bottom"><span></span></div>
						</div>
						<div class="right">
							<div class="line top"><span></span></div>
							<div class="line middle"><span></span></div>
							<div class="line bottom"><span></span></div>
						</div>
					</div>
				<?php } ?>
			<?php } else if(sansara_styles()['header_style'] == 'left_side') { ?>
				<header class="site-header with-side <?php echo esc_attr(sansara_styles()['css_classes']) ?> main-row">
					<div class="<?php echo esc_attr(sansara_styles()['header_container']) ?>">
						<div class="logo"><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo wp_kses_post(sansara_styles()['logo_content']) ?></a></div>
						<div class="fr">
							<?php if(has_nav_menu('navigation') && sansara_styles()['navigation_type'] != 'disabled') { ?>
								<nav class="navigation hidden-menu"><?php wp_nav_menu( array( 'theme_location' => 'navigation', 'container' => 'ul', 'menu_class' => 'menu', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?></nav>
								<div class="butter-button hidden_menu"><div></div></div>
							<?php } ?>
						</div>
					</div>
				</header>
				<div class="side-header main-row <?php echo esc_attr(sansara_styles()['css_classes']) ?>">
					<div class="logo"><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo wp_kses_post(sansara_styles()['logo_content']) ?></a></div>
					<div class="side-nav-button">
						<div></div>
					</div>
					<?php if(!empty(sansara_styles()['social_buttons_content'])) { ?>
						<div class="bottom">
							<?php if(sansara_styles()['footer_social_buttons'] == 'show' && !empty(sansara_styles()['social_buttons_content'])) { ?>
								<div class="social-buttons">
									<?php echo wp_kses_post(sansara_styles()['social_buttons_content']); ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
					<span class="dec-line"></span>
				</div>
				<div class="side-navigation-block">
					<div class="close ui-interface-delete"></div>
					<div class="wrap">
						<div class="cell">
							<?php if(has_nav_menu('side-navigation')) { ?>
								<nav class="side-navigation"><?php wp_nav_menu( array( 'theme_location' => 'side-navigation', 'container' => 'ul', 'menu_class' => 'menu', 'link_before' => '<span>', 'link_after' => '</span>', ) ); ?></nav>
							<?php } ?>
						</div>
					</div>
					<?php if(!empty(sansara_styles()['copyright_text']) || !empty(sansara_styles()['social_buttons_content'])) { ?>
						<div class="bottom">
							<?php if(sansara_styles()['footer_social_buttons'] == 'show' && !empty(sansara_styles()['social_buttons_content'])) { ?>
								<div class="social-buttons-text">
									<?php echo wp_kses_post(sansara_styles()['social_buttons_content']); ?>
								</div>
							<?php } if(!empty(sansara_styles()['sidebar_copyright_text'])) { ?>
								<div class="copyright">
									<?php echo nl2br(wp_kses_post(sansara_styles()['sidebar_copyright_text'])) ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if(sansara_styles()['header_space'] == 'yes' && !is_404() && !is_page_template('page-coming-soon.php')) { ?>
				<div class="header-space"></div>
			<?php } else { ?>
				<div class="header-space hide"></div>
			<?php } if(has_nav_menu('navigation') && sansara_styles()['navigation_type'] == 'full_screen') { ?>
				<nav class="full-screen-nav main-row">
					<div class="close ui-interface-delete"></div>
					<div class="fsn-container">
						<?php wp_nav_menu( array( 'theme_location' => 'navigation', 'container' => 'ul', 'menu_class' => 'cell' ) ); ?>
					</div>
				</nav>
			<?php } if(sansara_styles()['grid_lines'] == 'yes') { ?>
				<div class="body-grid-lines"></div>
			<?php } if(sansara_styles()['search'] == 'yes') { ?>
				<div class="search-popup main-row">
					<div class="close ui-interface-delete"></div>
					<div class="centered-container"><?php get_search_form(); ?></div>
				</div>
			<?php }
