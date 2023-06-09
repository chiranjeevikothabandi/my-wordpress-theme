<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     4.5.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		
		<h5 class="woocommerce-Reviews-title"><?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) )
				printf( _n( '%s review for %s%s%s', '%s reviews for %s%s%s', $count, 'sansara' ), $count, '<span>', get_the_title(), '</span>' );
			else
				_e( 'Reviews', 'sansara' );
		?></h5>

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'sansara' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					add_filter('comment_form_fields', 'sansara_reorder_comment_fields' );
					function sansara_reorder_comment_fields( $fields ){
						// die(print_r( $fields ));

						$new_fields = array(); 

						$myorder = array('author','email','comment');

						foreach( $myorder as $key ){
							$new_fields[ $key ] = $fields[ $key ];
							unset( $fields[ $key ] );
						}

						if( $fields )
							foreach( $fields as $key => $val )
								$new_fields[ $key ] = $val;

						return $new_fields;
					}

					$comment_form = array(
						'title_reply'          => have_comments() ? esc_html__( 'Add a review', 'sansara' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'sansara' ), get_the_title() ),
						'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'sansara' ),
						'comment_notes_after'  => '',
						'fields' => array(
							'author' => '<div class="col-xs-12 col-sm-6">' . '<input id="author" class="style1" name="author" type="text" placeholder="'. esc_attr__( 'Enter your Name...','sansara' ) .'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></div>',
							'email'  => '<div class="col-xs-12 col-sm-6"><input id="email" class="style1" name="email" type="text" placeholder="'. esc_attr__( 'Enter your e-mail...','sansara' ) .'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" /></div>',
						),
						'label_submit'  => esc_html__( 'Send', 'sansara' ),
						'logged_in_as'  => '',
						'title_reply_before'   => '<div class="col-xs-12"><h5>',
						'title_reply_after'    => '</h5></div>',
						'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="button-style2 submit" value="%4$s" />',
						'submit_field'         => '<div class="col-xs-12">%1$s %2$s</div>',
						'comment_field' => ''
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'sansara' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['title_reply_after'] .= '<div class="col-xs-12"><p class="comment-form-rating"><label class="h6" for="rating">' . esc_html__( 'Your Rating', 'sansara' ) .'</label><select name="rating" id="rating" aria-required="true" required>
							<option value="">' . esc_html__( 'Rate&hellip;', 'sansara' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'sansara' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'sansara' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'sansara' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'sansara' ) . '</option>
							<option value="1">' . esc_html__( 'Very Poor', 'sansara' ) . '</option>
						</select></p></div>';
					}

					$comment_form['comment_field'] .= '<div class="col-xs-12"><textarea id="comment" class="style1" name="comment" placeholder="'. esc_attr__( 'Enter your comment...','sansara' ) .'" rows="5" maxlength="65525" required="required"></textarea></div>';

					echo '<div class="row">';
					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
					echo '</div>';
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'sansara' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
