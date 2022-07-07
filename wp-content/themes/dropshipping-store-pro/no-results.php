<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dropshipping-store-pro
 */
?>
<header>
	<h3 class="entry-title"><?php _e( 'Nothing Found', 'dropshipping-store-pro' ); ?></h3>
</header>
<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'dropshipping-store-pro' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
<?php elseif ( is_search() ) : ?>
	<p class="font-para"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'dropshipping-store-pro' ); ?></p><br />
		<?php get_search_form(); ?>
<?php else : ?>
	<p><?php _e( 'Don\'t worry &hellip; it happens to the best of us.', 'dropshipping-store-pro' ); ?></p>
	<br />
	<div class="read-moresec">
		<div><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button hvr-sweep-to-right"><?php _e( 'Back to Home Page', 'dropshipping-store-pro' ); ?></a></div>
	</div>
<?php endif; ?>