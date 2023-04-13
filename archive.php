<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sansara
 */

get_header(); ?>

	<main class="main-row">
		<div class="container">

		<?php
		if ( have_posts() ) : ?>

			<div class="page-title">
				<?php the_archive_title( '<h2>', '</h2>' ); ?>
			</div>
			
			<?php
			/* Start the Loop */
			if(get_post_type() == 'fw-portfolio') {
				if(sansara_styles()['project_in_popup'] == 'yes') {
					$css_class = ' popup-gallery';
				} else {
					$css_class = '';
				}
				echo '<div class="portfolio-items row portfolio-type-grid portfolio_hover_type_1 '.esc_attr($css_class).'"><div class="grid-sizer col-xs-12 col-sm-6 col-md-4"></div>';
			} else {
				if(class_exists('WPBakeryShortCode')) {
					echo '<div class="blog-items blog-type-standart row">';
				} else {
					echo '<div class="post-items">';
				}
			}

			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			echo '</div>';
			
			if (function_exists('sansara_wp_corenavi')) {
				echo sansara_wp_corenavi();
			} else {
				wp_link_pages(); 
			};

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div>
	</main>

<?php
get_footer();
