<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 7.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="woocommerce-customer-details">
	
	<div class="heading-decor">
		<h3><?php _e( 'Customer details', 'sansara' ); ?></h3>
	</div>

	<table class="woocommerce-table woocommerce-table--customer-details shop_table customer_details">

		<?php if ( $order->get_customer_note() ) : ?>
			<tr>
				<th><?php _e( 'Note:', 'sansara' ); ?></th>
				<td><?php echo wptexturize( $order->get_customer_note() ); ?></td>
			</tr>
		<?php endif; ?>

		<?php if ( $order->get_billing_email() ) : ?>
			<tr>
				<th><?php _e( 'Email:', 'sansara' ); ?></th>
				<td><?php echo esc_html( $order->get_billing_email() ); ?></td>
			</tr>
		<?php endif; ?>

		<?php if ( $order->get_billing_phone() ) : ?>
			<tr>
				<th><?php _e( 'Phone:', 'sansara' ); ?></th>
				<td><?php echo esc_html( $order->get_billing_phone() ); ?></td>
			</tr>
		<?php endif; ?>

		<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>

	</table>

	<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

	<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">

		<div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">

			<?php endif; ?>
			<div class="heading-decor">
				<h4 class="woocommerce-column__title"><?php _e( 'Billing address', 'sansara' ); ?></h4>
			</div>

			<address>
				<?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : esc_html__( 'N/A', 'sansara' ); ?>
			</address>

			<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

		</div><!-- /.col-1 -->

		<div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
			
			<div class="heading-decor">
				<h4 class="woocommerce-column__title"><?php _e( 'Shipping address', 'sansara' ); ?></h4>
			</div>

			<address>
				<?php echo ( $address = $order->get_formatted_shipping_address() ) ? $address : esc_html__( 'N/A', 'sansara' ); ?>
			</address>

		</div><!-- /.col-2 -->

	</section><!-- /.col2-set -->

	<?php endif; ?>

</section>
