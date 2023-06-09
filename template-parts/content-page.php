<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sansara
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="site-content">
		<?php the_title( '<div class="page-title"><h1 class="h2">', '</h1></div>' ); ?>
		<div class="clearfix post-content"><?php the_content(); ?></div>
		<?php if(function_exists('wp_link_pages')) { ?>
			<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>','link_before' => '<span>','link_after' => '</span>',)); ?>
		<?php } ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
