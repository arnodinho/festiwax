<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package dropshipping-store-pro
 */
if ( ! function_exists( 'drop_shipping_pro_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function drop_shipping_pro_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'drop_shipping_pro_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );
	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}
		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );
		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}
	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;
/**
 * Returns true if a blog has more than 1 category
 */
function drop_shipping_pro_categorized_blog() {
	if ( false === ( $drop_shipping_pro_all_the_cool_cats = get_transient( 'drop_shipping_pro_all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$drop_shipping_pro_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );
		// Count the number of categories that are attached to the posts
		$drop_shipping_pro_all_the_cool_cats = count( $drop_shipping_pro_all_the_cool_cats );
		set_transient( 'drop_shipping_pro_all_the_cool_cats', $drop_shipping_pro_all_the_cool_cats );
	}
	if ( '1' != $drop_shipping_pro_all_the_cool_cats ) {
		// This blog has more than 1 category so drop_shipping_pro_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so drop_shipping_pro_categorized_blog should return false
		return false;
	}
}
if ( ! function_exists( 'drop_shipping_pro_the_custom_logo' ) ) :
	/**
	 * Displays the optional custom logo.
	 *
	 * Does nothing if the custom logo is not available.
	 *
	 * @since dropshipping-store-pro
	 */
	function drop_shipping_pro_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			if( has_custom_logo() ){
				the_custom_logo();
			}else{
				echo "<a href='".esc_url( home_url() )."' rel='home'><img src='".esc_url(get_template_directory_uri())."/images/logo.png' alt='" . esc_attr__("Dropshipping Store Pro logo", 'dropshipping-store-pro') . "'/></a>";
			}
		}
	}
endif;
/**
 * Flush out the transients used in drop_shipping_pro_categorized_blog
 */
function drop_shipping_pro_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'drop_shipping_pro_all_the_cool_cats' );
}
add_action( 'edit_category', 'drop_shipping_pro_category_transient_flusher' );
add_action( 'save_post',     'drop_shipping_pro_category_transient_flusher' );