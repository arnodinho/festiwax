<?php
/**
 * Template part for displaying hot deals
 *
 * @package dropshipping-store-pro
 */

$about_section = get_theme_mod( 'drop_shipping_pro_product_category_enable' );

if ( 'Disable' == $about_section ) {
 return;
}
$img_bg = get_theme_mod('drop_shipping_pro_product_category_image_attachment');
if( get_theme_mod('drop_shipping_pro_product_category_bgcolor','') ) {
 $about_backg = 'background-color:'.esc_attr(get_theme_mod('drop_shipping_pro_product_category_bgcolor','')).';';
}elseif( get_theme_mod('drop_shipping_pro_product_category_bgimage','') ){
 $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_product_category_bgimage')).'\')';
}else{
 $about_backg = '';
}

?>
<section id="product-category" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($img_bg); ?> wow slideInUp delay-1000 animated" data-wow-duration="2s">
  <div class="container">
    <?php if ( class_exists( 'WooCommerce' ) ) {?>
      <div class="row">
        <div class="col-lg-3 col-md-6" id="product-category1">
          <div class="product-cat-title position-relative">
            <?php if(get_theme_mod('drop_shipping_pro_product_category_trending_heading')!=''){ ?>
              <h4>
                <?php echo esc_html(get_theme_mod('drop_shipping_pro_product_category_trending_heading')); ?>
              </h4>
            <?php } ?>
          </div>
          <div class="slick-carousel-trending">
            <?php
              $args = array( 
              'post_type' => 'product', 
              'product_tag' => get_theme_mod('drop_shipping_pro_trending_now_category'),
              'order' => 'ASC'
              ); 

            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global 
              $product; ?>
              <div class="hot-deals-content col-12 mb-3">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-4 align-self-center">
                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="pt-1">
                      <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                    </div>
                    <h5 class="mb-0">
                      <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>">
                      <?php the_title(); ?>
                      </a>
                    </h5>
                    <?php echo $product->get_price_html(); ?>
                  </div>
                </div>
              </div>
            <?php 
              endwhile; wp_reset_query();  ?>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" id="product-category2">
          <div class="product-cat-title position-relative">
            <?php if(get_theme_mod('drop_shipping_pro_product_category_top_rated_heading')!=''){ ?>
              <h4>
                <?php echo esc_html(get_theme_mod('drop_shipping_pro_product_category_top_rated_heading')); ?>
              </h4>
            <?php } ?>
          </div>
          <div class="slick-carousel-rated">
            <?php
           
              $args = array( 
              'post_type' => 'product', 
              'product_tag' => get_theme_mod('drop_shipping_pro_top_rated_category'),
              'order' => 'ASC'
              ); 

            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
              <div class="hot-deals-content col-12 mb-3">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-4 align-self-center">
                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="pt-1">
                      <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                    </div>
                    <h5 class="mb-0">
                      <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>">
                      <?php the_title(); ?>
                      </a>
                    </h5>
                    <?php echo $product->get_price_html(); ?>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_query();  ?>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" id="product-category3">
          <div class="product-cat-title position-relative">
            <?php if(get_theme_mod('drop_shipping_pro_product_category_most_popular_heading')!=''){ ?>
              <h4>
                <?php echo esc_html(get_theme_mod('drop_shipping_pro_product_category_most_popular_heading')); ?>
              </h4>
            <?php } ?>
          </div>
          <div class="slick-carousel-popular">
            <?php
              $args = array( 
              'post_type' => 'product', 
              'product_tag' => get_theme_mod('drop_shipping_pro_most_popular_category'),
              'order' => 'ASC'
              ); 

            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
              <div class="hot-deals-content col-12 mb-3">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-4 align-self-center">
                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="pt-1">
                      <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                    </div>
                    <h5 class="mb-0">
                      <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>">
                      <?php the_title(); ?>
                      </a>
                    </h5>
                    <?php echo $product->get_price_html(); ?>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_query();  ?>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" id="product-category4">
          <div class="product-cat-title position-relative">
            <?php if(get_theme_mod('drop_shipping_pro_product_category_top_selling_heading')!=''){ ?>
              <h4>
                <?php echo esc_html(get_theme_mod('drop_shipping_pro_product_category_top_selling_heading')); ?>
              </h4>
            <?php } ?>
          </div>
          <div class="slick-carousel-selling">
              <?php
              $args = array( 
              'post_type' => 'product', 
              'product_tag' => get_theme_mod('drop_shipping_pro_top_selling_category'),
              'order' => 'ASC'
              ); 

              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <div class="hot-deals-content col-12 mb-3">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-4 align-self-center">
                      <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                      <div class="pt-1">
                        <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                      </div>
                      <h5 class="mb-0">
                        <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>">
                        <?php the_title(); ?>
                        </a>
                      </h5>
                      <?php echo $product->get_price_html(); ?>
                    </div>
                  </div>
                </div>
              <?php endwhile; wp_reset_query();  ?>
          </div>
        </div>
      </div>

    <?php } else{ ?>
      <h6 class="text-center"><?php echo esc_html('Please install Woocommerce plugin and add your products to enable this section','dropshipping-store-pro')?></h6>
    <?php }?>
  </div>
</section>