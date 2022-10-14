<?php
$attorneys_enable = get_theme_mod( 'drop_shipping_pro_radio_product_banner1_enable' );
if ( 'Disable' == $attorneys_enable ) {
  return;
}
if( get_theme_mod('drop_shipping_pro_product_banner1_bgcolor') ) {
  $feature_stores_backg = 'background-color:'.esc_attr(get_theme_mod('drop_shipping_pro_product_banner1_bgcolor')).';';
}elseif( get_theme_mod('drop_shipping_pro_product_banner1_bgimage') ){
  $feature_stores_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_product_banner1_bgimage')).'\')';
}else{
  $feature_stores_backg = '';
}

$banner_backg1 = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_product_banner1_box_bgimage1')).'\')';
$banner_backg2 = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_product_banner1_box_bgimage2')).'\')';

$img_bg = get_theme_mod('drop_shipping_pro_product_banner1_bgimage_setting',true);

?>

<section id="product-banner1" style="<?php echo esc_attr($feature_stores_backg); ?>" class="<?php echo esc_attr($img_bg); ?>">
  <div class="container">
    <div class="">
      <div class="row mt-sm-5 mt-lg-3 mt-md-0 mt-sm-0 mt-4">
          <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-4 mb-4">
            <div class="popular-stores-box animated fadeInUp pt-sm-4 ps-sm-4 pe-sm-4 pb-sm-0 pt-4 ps-4 pe-4 pb-4 popular-stores-box1" style="<?php echo esc_attr($banner_backg1); ?>">
              <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-7 align-self-center">
                  <h4>
                    <?php echo esc_html(get_theme_mod('drop_shipping_pro_product_banner1_main_title1')); ?>
                  </h4>
                  <p>
                    <?php echo esc_html(get_theme_mod('drop_shipping_pro_product_banner1_small_title1')); ?>
                  </p>
                  <a href="<?php echo esc_html(get_theme_mod('drop_shipping_pro_product_banner1_btn_url1')); ?>" class="px-3 py-2"><?php echo esc_html(get_theme_mod('drop_shipping_pro_product_banner1_btn_text1')); ?></a>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-5">
                  <img  src="<?php echo esc_url(get_theme_mod('drop_shipping_pro_product_banner1_image1')); ?>" alt="Store Image">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6  col-md-12 col-sm-12 col-12">
            <div class="popular-stores-box animated fadeInUp pt-sm-4 ps-sm-4 pe-sm-4 pb-sm-0 pt-4 ps-4 pe-4 pb-4 popular-stores-box2" style="<?php echo esc_attr($banner_backg2); ?>">
              <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-7 align-self-center">
                  <h4>
                    <?php echo esc_html(get_theme_mod('drop_shipping_pro_product_banner1_main_title2')); ?>
                  </h4>
                  <p>
                    <?php echo esc_html(get_theme_mod('drop_shipping_pro_product_banner1_small_title2')); ?>
                  </p>
                  <a href="<?php echo esc_html(get_theme_mod('drop_shipping_pro_product_banner1_btn_url2')); ?>" class="px-3 py-2 ">   <?php echo esc_html(get_theme_mod('drop_shipping_pro_product_banner1_btn_text2')); ?></a>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-5">
                  <img  src="<?php echo esc_url(get_theme_mod('drop_shipping_pro_product_banner1_image2')); ?>" alt="Store Image">
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
