<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sansara
 */

get_header(); ?>

	<main class="main-row">
		<div class="container">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<div class="page-title">
					<h1 class="h2"><?php single_post_title(); ?></h1>
				</div>

			<?php
			endif;
			if(is_active_sidebar('sidebar')) {
				echo '<div class="row index-row">';
				echo '<div class="col-xs-12 col-md-8">';
			}
			
			if(!class_exists('WPBakeryShortCode')) {
				echo '<div class="post-items">';
			} else {
				echo '<div class="row blog-type-standart offset-top">';
			}
				/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;
				echo '</div>';

				if (function_exists('sansara_wp_corenavi')) {
					echo sansara_wp_corenavi();
				} else {
					wp_link_pages(); 
				};
			if(is_active_sidebar('sidebar')) {
				echo '</div>';
				echo '<div class="s-sidebar col-xs-12 col-md-4">';
					echo '<div class="w">';
					dynamic_sidebar('sidebar');
					echo '</div>';
				echo '</div>';
				echo '</div>';
			};

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div>
	</main>

<?php
get_footer();
