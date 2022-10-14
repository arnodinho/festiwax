<?php

/**
 * Template part for displaying Top Deals
 *
 * @package dropshipping-store-pro-pro
 */

  $section_hide = get_theme_mod( 'drop_shipping_pro_all_product_enabledisable' );
  if ( 'Disable' == $section_hide ) {
    return;
  }
  if( get_theme_mod('drop_shipping_pro_all_product_bg_color','') ) {
    $about_backg = 'background-color:'.esc_attr(get_theme_mod('drop_shipping_pro_all_product_bg_color','')).';';
  }elseif( get_theme_mod('drop_shipping_pro_all_product_bg_image','') ){
    $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_all_product_bg_image')).'\');';
  }else{
    $about_backg= '';
  }

  $image_att = get_theme_mod( 'drop_shipping_pro_all_product_image_attachment',true );

?>
<section id="our-products" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($image_att); ?>">
  <div class="container">
    <div class="text-center section-title">
      <?php if(get_theme_mod('drop_shipping_pro_our_product_heading')!=''){ ?>
        <h3 class=" d-inline-block w-100">
          <?php echo esc_html(get_theme_mod('drop_shipping_pro_our_product_heading')); ?>
        </h3>
      <?php } ?>
    </div>
    <div class="our-product-box">
      <?php if ( class_exists( 'WooCommerce' ) ) { ?>
      <div class="owl-carousel">
        <?php
          $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'product_tag' => get_theme_mod('drop_shipping_pro_our_product_tag')
          );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="our-product-content inner_product">
              <div class="row">
                <div class="col-12">
                  <div class="p-4 our-product-img position-relative">
                    <div>
                      <div class="product-sale ">
                        <?php
                          echo ingredients_product_tab_content($post);
                         ?>
                      </div>
                        <a class=""  href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>">
                        <?php
                        if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'woocommerce_thumbnail'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" alt="'.esc_html(get_the_title()) .' post thumbnail" />'; ?>
                        </a>
                            <div class="bwt-wishlist-cart-view textcenter">
                            <ul class="d-flex">

                                <!-- Whishlist -->

                              <li>
                                <!-- View Product  -->
                                <div class="bwtview-box text-center">
                                  <span class="bwtbutton-cart">
                                    <a class="" target="_blank" href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                  <span>
                                </div>
                              </li>
                              <li>
                                <!-- Quick View Button -->
                                <div class="quickview_text"><a href="#" class="button yith-wcqv-button" data-product_id="<?php echo $product->get_id();?>"><i class="fas fa-expand-arrows-alt"></i></a></div>
                              </li>
                            </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="our-product-right-box p-4 mb-3">
                  <div class="our-product-details text-center">
                    <h5 class="prod-title product_head">
                      <a class="" target="_blank" href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>">
                        <?php the_title(); ?>
                      </a>
                    </h5>
                    <div class="py-2">
                      <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                    </div>
                    <div class="price">
                      <?php echo $product->get_price_html(); ?>
                    </div>
                    <div class="cart-box">
                      <span class="our-product-cart"><?php woocommerce_template_loop_add_to_cart( $loop->post, $product );  ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php endwhile; wp_reset_query(); ?>
      </div>
      <?php }else{ ?>
        <h5 class="woo-smg text-center">
          <?php esc_html_e('Install WooCommerce plugin to display this section','dropshipping-store-pro-pro'); ?>
        </h5>
      <?php } ?>
    </div>
    <div class="col-12">
      <div class="text-center section-button mt-sm-2 mt-2 pt-sm-2 pt-0">
         <a class="px-3 py-3" target="_blank" href="<?php echo esc_html(get_theme_mod('drop_shipping_pro_our_product_btnurl')); ?>"><?php echo esc_html(get_theme_mod('drop_shipping_pro_our_product_text')); ?></a>
      </div>
    </div>
  </div>
</section>
