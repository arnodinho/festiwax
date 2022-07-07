<?php
/**
 * The Template for displaying all Blog with Left Sidebar.
 *
 * @package dropshipping-store-pro
 */
?>
<?php
/**
 * Template Name:Blog with Left Sidebar
 */

get_header();

get_template_part('template-parts/banner/banner-blog'); ?>

<?php do_action('drop_shipping_pro_before_blog'); ?>

<div id="blog-left-sidebar">
	<div class="container mt-5">
	    <div class="middle-align">
		    <div class="row">
		    	<?php if ( get_theme_mod('drop_shipping_pro_general_settings_post_sidebar',true) == "1" ) { ?>
					<div class="col-lg-4 col-md-5 col-sm-12" id="sidebar">
						<?php get_sidebar('sidebar-left'); ?>
					</div>
				<?php } ?>
				<div class="col-lg-8 col-md-7 col-sm-12 content_page">
					<div class="row">
						<?php if ( have_posts() ) : ?>
					      	<?php $bwp_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
								$args = array(
								   'paged' => $bwp_paged,
								   'category_name' => get_theme_mod('drop_shipping_pro_category_setting')
								);
								$custom_query = new WP_Query( $args );
								while($custom_query->have_posts()) :
						 		   $custom_query->the_post(); 
								   	get_template_part( 'template-parts/post/post-content' );
								endwhile; // end of the loop.
								wp_reset_postdata(); ?>
						<?php else : ?>
							<h3><?php _e('Not Found','dropshipping-store-pro'); ?></h3>
						<?php endif; ?>
					</div>
					<div class="navigation">
		              	<?php 
							$big = 999999999;
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => 'paged=%#%',
								'current' =>  (get_query_var('paged') ? get_query_var('paged') : 1),
								'total' => $custom_query->max_num_pages
							) );
						?>
		            </div>
				</div>
		        <div class="clearfix"></div>
		    </div>
	    </div>
	</div>
</div>

<?php do_action('drop_shipping_pro_after_blog'); ?>

<?php get_footer(); ?>