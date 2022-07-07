<?php
/**
 * The Template for displaying Page with Right Sidebar.
 *
 * @package dropshipping-store-pro
 */
?>
<?php
/**
 * Template Name:Page with Right Sidebar
 */

get_header();

get_template_part('template-parts/banner/banner-page'); ?>

<?php do_action('drop_shipping_pro_before_page'); ?>

<div class="container my-5">
    <div class="middle-align">
      <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-12 sidebar_content_page">
          <?php while ( have_posts() ) : the_post(); ?>
             <?php the_content();?>
             <?php
             //If comments are open or we have at least one comment, load up the comment template
              if ( comments_open() || '0' != get_comments_number() )
                  comments_template();
             ?>
           <?php endwhile; // end of the loop. ?>
        </div>
         <div class="col-lg-4 col-md-5 col-sm-12" id="sidebar">
          <?php dynamic_sidebar('sidebar-page-left'); ?>
        </div>
         <div class="clear"></div>
      </div>
    </div>
</div>
<?php do_action('drop_shipping_pro_after_page'); ?>

<?php get_footer(); ?>