
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sansara
 */
?>			
			<?php if(sansara_styles()['footer'] == 'show' || sansara_styles()['footer'] == 'minified') { ?>
				<footer class="site-footer <?php echo esc_attr(sansara_styles()['site_mode']); ?> main-row">
					<?php if(sansara_styles()['footer_scroll_up'] == 'show') { ?>
						<div class="scroll-top" id="scroll-top"><?php echo esc_html__('up', 'sansara') ?></div>
					<?php } if(sansara_styles()['footer'] != 'minified') { ?>
						<div class="footer-wrap">
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-<?php echo esc_attr(sansara_styles()['footer_col_1']) ?>">
										<div class="logo"><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo wp_kses_post(sansara_styles()['logo_content']) ?></a></div>
										<?php if(is_active_sidebar('footer-1')) { ?>
											<?php dynamic_sidebar('footer-1'); ?>
										<?php } ?>
									</div>
									<?php if(is_active_sidebar('footer-2')) { ?>
									<div class="col-xs-12 col-sm-6 col-md-<?php echo esc_attr(sansara_styles()['footer_col_2']) ?>">
										<?php dynamic_sidebar('footer-2'); ?>
									</div>
									<?php } if(is_active_sidebar('footer-3')) { ?>
									<div class="col-xs-12 col-sm-6 col-md-<?php echo esc_attr(sansara_styles()['footer_col_3']) ?>">
										<?php dynamic_sidebar('footer-3'); ?>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } if(!empty(sansara_styles()['copyright_text']) || (sansara_styles()['footer_social_buttons'] == 'show' && !empty(sansara_styles()['social_buttons_content']))) { ?>
						<div class="footer-bottom">
							<div class="container">
								<div class="copyright"><?php echo wp_kses_post(sansara_styles()['copyright_text']) ?></div>
								<?php if(sansara_styles()['footer_social_buttons'] == 'show' && !empty(sansara_styles()['social_buttons_content'])) { ?>
									<div class="social-buttons-text">
										<?php echo wp_kses_post(sansara_styles()['social_buttons_content']); ?>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</footer>
			<?php } ?>
		</div>
		
		<?php wp_footer(); ?>

	</body>
</html>