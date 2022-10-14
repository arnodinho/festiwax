<?php
/**
 * Template part for displaying hot deals
 *
 * @package dropshipping-store-pro
 */


  if( get_theme_mod('drop_shipping_pro_featured_product_bgcolor','') ) {
    $about_backg = 'background-color:'.esc_attr(get_theme_mod('drop_shipping_pro_featured_product_bgcolor','')).';';
  }elseif( get_theme_mod('drop_shipping_pro_featured_product_bgimage','') ){
    $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_featured_product_bgimage')).'\')';
  }else{
    $about_backg='';
  }

  $att_style="";
  $image_att = get_theme_mod( 'drop_shipping_pro_featured_product_bgimage_attachment',true );
  if ( 'Scroll' == $image_att ) {
    $att_style="section_bg_scroll";
  }else{
    $att_style="section_bg_fixed";
  }

?>
<section id="featured-product" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($att_style); ?> wow slideInUp delay-1000 animated" data-wow-duration="2s">
	<div class="container">
    <div class="row hot-deals-head">
      <div class="section-title text-sm-start-featured text-center">
        <?php if(get_theme_mod('drop_shipping_pro_featured_product_main_heading')!=''){ ?>
          <h3 class="wel-head">
            <?php echo esc_html(get_theme_mod('drop_shipping_pro_featured_product_main_heading')); ?>
          </h3>
        <?php } ?>
      </div>
    </div>
      <?php if ( class_exists( 'WooCommerce' ) ) {?>
        <div class="row">
          <?php
          $args = array(
          'post_type' => 'product',
          'posts_per_page' => 4,
          'product_tag' => get_theme_mod('drop_shipping_pro_featured_product_tag'),
          'order' => 'ASC'
          );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
          <div class="featured-product-content col-lg-6 col-md-12 mb-4">
            <div class="row">
              <div class="col-lg-6 col-md-4 col-sm-4 col-12 featured-product-img">
                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID,'woocommerce_thumbnail' ); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
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
              <div class="col-lg-6 col-md-8 col-sm-8 col-12 align-self-center text-sm-start-featured text-center">
                <div class="py-2">
                  <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                </div>
                <h5><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>">
                    <?php the_title(); ?>
                  </a></h5>
                <?php echo $product->get_price_html(); ?>
                <div class="cart-box mt-1">
                  <span class="our-product-cart"><?php  woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?></span>
                </div>
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
