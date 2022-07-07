<?php
/**
 * Template part for displaying hot deals
 *
 * @package dropshipping-store-pro
 */

  $section_hide = get_theme_mod( 'drop_shipping_pro_featured_product_enable' );
  if ( 'Disable' == $section_hide ) {
    return;
  }

  ?>
<section id="featured-blog" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($att_style); ?> wow slideInUp delay-1000 animated pb-0" data-wow-duration="2s">

  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <?php get_template_part('template-parts/home/featured-product'); ?>
      </div>
      <div class="col-lg-4">
        <?php get_template_part('template-parts/home/our-blog'); ?>
      </div>
    </div>
  </div>
</section>