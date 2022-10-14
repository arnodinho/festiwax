<?php
/**
 * Template part for displaying hot deals
 *
 * @package dropshipping-store-pro
 */

  $section_hide = get_theme_mod( 'drop_shipping_pro_deals_enable' );
  if ( 'Disable' == $section_hide ) {
    return;
  }

  if( get_theme_mod('drop_shipping_pro_deals_bgcolor','') ) {
    $about_backg = 'background-color:'.esc_attr(get_theme_mod('drop_shipping_pro_deals_bgcolor','')).';';
  }elseif( get_theme_mod('drop_shipping_pro_deals_bgimage','') ){
    $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_deals_bgimage')).'\')';
  }else{
    $about_backg='';
  }

  $image_att = get_theme_mod( 'drop_shipping_pro_deals_bgimage_attachment',true );



?>
<section id="deals" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($image_att); ?> wow slideInUp delay-1000 animated" data-wow-duration="2s">
	<div class="container">
    <div class="row hot-deals-head">
      <div class="section-title text-center">
        <?php if(get_theme_mod('drop_shipping_pro_deals_section_main_heading')!=''){ ?>
          <h3 class="wel-head mb-4">
            <?php echo esc_html(get_theme_mod('drop_shipping_pro_deals_section_main_heading')); ?>
          </h3>
        <?php } ?>
      </div>
    </div>
      <?php if ( class_exists( 'WooCommerce' ) ) {?>
        <div class="owl-carousel">
          <?php
          $args = array(
          'post_type' => 'product',
          'product_tag' => get_theme_mod('drop_shipping_pro_deals_section_category'),
          'order' => 'ASC'
          );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="row p-lg-3 ">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 deals-col py-3">
                <div class="mt-3">
                  <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'woocommerce_thumbnail'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                </div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 text-md-start text-sm-center text-center deals-col py-3">
                <h5>
                  <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>">
                  <?php the_title(); ?>
                  </a>
                </h5>
                <div>
                  <?php the_content(); ?>
                </div>
                <div class="py-2">
                  <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                </div>
                <div class="price">
                  <?php echo $product->get_price_html(); ?>
                </div>
                <div class="countdowntimer mt-3">
                  <p id="timer" class="countdown">
                    <?php
                    $dateday = get_theme_mod('drop_shipping_pro_deals_section_clock_timer_end','December 12, 2022 11:00:00'); ?>
                    <input type="hidden" class="date" value="<?php echo esc_html($dateday); ?>"></p>
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_query(); ?>
        </div>
       <?php } else{ ?>
      <h6 class="text-center"><?php echo esc_html('Please install Woocommerce plugin and add your products to enable this section','dropshipping-store-pro')?></h6>
    <?php }?>
  </div>

</section>
