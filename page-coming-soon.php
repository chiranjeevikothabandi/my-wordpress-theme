<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sansara
 */

/*
Template Name: Coming soon page
*/

get_header(); 
$id = uniqid('countdown-');

if(get_field('date')) {
	$year = mysql2date('Y', get_field('date'));
	$month = mysql2date('m', get_field('date'))-1;
	$day = mysql2date('j', get_field('date'));
	$hour = mysql2date('H', get_field('date'));
	$minutes = mysql2date('i', get_field('date'));

	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/js/jquery.countdown.js' );
	wp_enqueue_script( 'sansara-script', get_template_directory_uri() . '/js/script.js' );

	wp_add_inline_script('sansara-script', "jQuery(document).ready(function(jQuery) {
	  	/*------------------------------------------------------------------
		[ Coming soon countdown ]
		*/

		var ts = new Date(".esc_js($year).", ".esc_js($month).", ".esc_js($day).", ".esc_js($hour).", ".esc_js($minutes).");

		if(jQuery('.".esc_js($id)."').length > 0){
			jQuery('.".esc_js($id)."').countdown({
				timestamp	: ts,
				callback	: function(days, hours, minutes, seconds){
				}
			});
		}
	});");
}
?>
<section class="block-coming-soon <?php echo esc_attr(sansara_styles()['header_color_mode_coming_soon']) ?>" style="<?php echo esc_attr(sansara_styles()['coming_soon_bg']) ?>">
	<div class="container">
		<div class="cell">
			<?php if(!empty(sansara_styles()['coming_soon_sub_heading'])) { ?>
				<h6 class="sub-h"><?php echo wp_kses_post(sansara_styles()['coming_soon_sub_heading']) ?></h6>
			<?php } if(!empty(sansara_styles()['coming_soon_heading'])) { ?>
				<h1 class="h"><?php echo wp_kses_post(sansara_styles()['coming_soon_heading']) ?></h1>
			<?php } if(sansara_styles()['coming_soon_subscribe_code']) { ?>
				<?php if(!empty(sansara_styles()['coming_soon_text'])) { ?>
					<p><?php echo wp_kses_post(sansara_styles()['coming_soon_text']) ?></p>
				<?php } ?>
				<div class="form"><?php echo do_shortcode(sansara_styles()['coming_soon_subscribe_code']) ?></div>
			<?php } if(get_field('date')) { ?>
				<div id="countdown" class="<?php echo esc_attr($id) ?>"></div>
			<?php } ?>
		</div>
	</div>
</section>
<?php get_footer('empty');
