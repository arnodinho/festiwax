<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dropshipping-store-pro
 */
get_header();
 $banner_img_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_banner_bgimage')).'\')';
?>
<div class="banner-image py-2 mt-4" style="<?php echo esc_attr($banner_img_backg);?>" class="mt-4">
   <div class="banner-image-inner-box"></div>
   <div class="tm-titlebar-inner-wrapper">
      <div class="entry-title-watermark">
         <h1 class="text-center entry-title">Blog</h1>
      </div>
         <div class="container pt-xl-5 pt-lg-4 pt-md-4 pt-sm-5 pt-5 pb-xl-5 pb-lg-4 pb-md-4 pb-sm-4 pb-4">
         <h2 class="text-center entry-title">Blog</h2>
         <div class="bradcrumbs text-center">
            Home/Blog
         </div>
      </div>
   </div>
</div>
<div class="mt-4 pt-1">
	<div class="" id="single_post">
	<?php if ( get_theme_mod('drop_shipping_pro_blog_featured_image_enable',true) == "1" ) { ?>
		<div class="feature-box">
			<?php if(get_post_meta($post->ID,'meta-single-banner',true)) { ?>
                 <img src="<?php echo esc_html(get_post_meta($post->ID,'meta-single-banner',true)); ?>" alt="Banner Image">
            <?php } ?>
		</div>
	<?php } ?>
		<div class="container">
			<div class="row">
				<div class="content_page col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12 mt-5">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php //gt_set_post_view(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="img">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="feature-box">
									<img src="<?php the_post_thumbnail_url( 'full' ); ?>">
								</div>
							<?php } ?>
						</div>
						<div class="metabox py-xl-4 px-xl-4 mx-xl-4 py-lg-3 px-lg-3 mx-lg-3 px-md-3 py-md-4 px-sm-3 py-sm-4 px-4 py-4">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-5">
									<?php if ( get_theme_mod('drop_shipping_pro_general_settings_post_date',true) == "1" ) { ?>
										<span class="entry-date">
											<i class="fas fa-calendar-alt"></i>
								            <?php the_time( 'M d Y' ) ?>
							            </span>
									<?php } ?>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-5">
									<?php if ( get_theme_mod('drop_shipping_pro_general_settings_post_comments',true) == "1" ) { ?>
										<span class="entry-comments">
											<i class="far fa-comments"></i>
											<?php comments_number( '(0) Comment ', '(1) Comment', 'Comments % ' ); ?>
										</span>
									<?php } ?>
								</div>
							</div>
							<div>
								<div class="title mb-1">
									<?php the_title(); ?>
								</div>
								<?php the_content(); ?>
								<div class="post_share col-xl-5 col-lg-8 col-md-12 col-sm-12 my-xl-3 my-lg-2 my-md-3 my-sm-3 my-3">
									<?php if ( get_theme_mod('drop_shipping_pro_general_settings_post_share',true) ) {
											if ( function_exists('drop_shipping_pro_social_share') ) {
												drop_shipping_pro_social_share();
											}
					                } ?>
					        	</div>
					        	<div>
							        <p>
			                			<div class="post_tag font-weight-bold pt-1">
			                				<span><?php echo esc_html('Categories: ','dropshipping-store-pro'); ?>
			                				</span>
			                				<?php the_category();?>
			                			</div>
							        </p>
					        	</div>
							</div>
							<div class="single-post-nav">
							<?php the_post_navigation( array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( get_theme_mod('drop_shipping_pro_blog_category_next_title'), 'dropshipping-store-pro' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'dropshipping-store-pro' ) . '</span> ' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( get_theme_mod('drop_shipping_pro_blog_category_prev_title'), 'dropshipping-store-pro' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'dropshipping-store-pro' ) . '</span> ' .
								'<span class="post-title">%title</span>',
							) ); ?>
						</div>

						<div class="single-post-comment mx-auto mt-lg-5 mt-md-1 mt-lg-1 pt-lg-5 pt-md-1 pt-sm-1">
							<div class="mt-4">
								<?php 
									if ( comments_open() || '0' != get_comments_number() ) {
				                    	comments_template();
				                	}
								?>
							</div>
						</div>
						</div>
					</article>
				<?php 
				endwhile; // end of the loop. ?>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-12 col-12">
					<?php get_sidebar('sidebar-1'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>