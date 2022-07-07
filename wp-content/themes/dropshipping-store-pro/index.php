<?php
/**
 * The template for displaying index page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package dropshipping-store-pro
 */
get_header();
get_template_part( 'template-parts/banner/banner' );
?>
<?php do_action( 'drop_shipping_pro_after_defaulttitle' ); ?>
<div class="post-section">
	<div class="container my-5">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/post/post-content' );
					endwhile; ?>
				</div>
			  <div class="navigation">
				<?php // Previous/next page navigation.
				  the_posts_pagination( array(
					  'prev_text'          => __( 'Previous page', 'dropshipping-store-pro' ),
					  'next_text'          => __( 'Next page', 'dropshipping-store-pro' ),
					  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'dropshipping-store-pro' ) . ' </span>',
				  )); ?>
			  </div>
			</div>
			<div class="col-md-3"><?php get_sidebar( 'sidebar-1' ); ?></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>