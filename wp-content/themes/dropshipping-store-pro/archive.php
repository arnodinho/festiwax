<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dropshipping-store-pro
 */
get_header(); 

$banner_img_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_banner_bgimage')).'\')';
   ?>
<div class="banner-image py-2" style="<?php echo esc_attr($banner_img_backg);?>">
   <div class="banner-image-inner-box"></div>
   <div class="tm-titlebar-inner-wrapper">
      <div class="entry-title-watermark">
         <h1 class="text-center entry-title">Event</h1>
      </div>
      <div class="container pt-xl-5 pt-lg-4 pt-md-4 pt-sm-5 pt-5 pb-xl-5 pb-lg-4 pb-md-4 pb-sm-4 pb-4">
         <div class="bradcrumbs text-center">
            <?php bwt_breadcrumbs(); ?>
         </div>
         <?php the_archive_title( '<h1 class="entry-title text-center pt-4">', '</h1>' ); ?>
      </div>
   </div>
</div>
<div class="container my-5">
	<div class="middle-align">
		<div class="row">
          
			<div class="col-lg-8 col-md-7">
				<div class="row">
               <?php  
               $queried_object = get_queried_object();

               $post_type = get_taxonomy( $queried_object->taxonomy )->object_type[0];


               $args = array(
               'post_type' => $post_type,
               'tax_query' => array(
                   array(
                       'taxonomy' => $queried_object->taxonomy,
                       'field'    => 'slug',
                       'terms'    => $queried_object->slug,
                       ),
                   ),
               );

               $query = new WP_Query( $args );
               if ( $query -> have_posts() ):
                  while ( $query -> have_posts() ) :
                   $query -> the_post() ;
               ?>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-md-4 mt-sm-4 mt-4 mt-lg-5">
                  <div class="inner-page-image-box card">
                     <div class="inner-page-image">
                        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="">
                        <div class="inner-page-info-box text-start ms-3 mb-3">
                           <p class="inner-page-info-box-name mt-3 mb-2">
                              <a href="<?php the_permalink(); ?>" class="inner-page-name-link text-capitalize"><?php the_title(); ?>
                              </a>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endwhile;
                  else:?>
                     <h6><?php esc_html_e('Sorry, No Post found','dropshipping-store-pro');?></h6>
               <?php endif; ?>
				</div>
			</div>

			<div class="col-lg-4 col-md-5">
				<?php dynamic_sidebar( 'page' ); ?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>