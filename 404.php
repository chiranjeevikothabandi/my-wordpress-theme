<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Sansara
 */

get_header(); ?>

	<section class="block-404 <?php echo esc_attr(sansara_styles()['header_color_mode_404']) ?>" style="<?php echo esc_attr(sansara_styles()['404_bg']) ?>">
		<?php if(!class_exists('WPBakeryShortCode')) { ?>
			<div class="dotted-404"></div>
		<?php } ?>
		<div class="container">
			<div class="cell <?php echo esc_attr(sansara_styles()['404_page_content_align']) ?>">
				<?php if(!empty(sansara_styles()['404_sub_heading'])) { ?>
					<h6 class="sub-h"><?php echo wp_kses_post(sansara_styles()['404_sub_heading']) ?></h6>
				<?php } if(!empty(sansara_styles()['404_heading'])) { ?>
					<h1 class="h"><?php echo wp_kses_post(sansara_styles()['404_heading']) ?></h1>
				<?php } if(!empty(sansara_styles()['404_text'])) { ?>
					<p><?php echo wp_kses_post(sansara_styles()['404_text']) ?></p>
				<?php } ?>
				<a href="<?php echo esc_url(home_url('/')) ?>" class="button-style2"><?php echo esc_html__('Get back home', 'sansara') ?></a>
			</div>
		</div>
	</section>

<?php
get_footer('empty');
