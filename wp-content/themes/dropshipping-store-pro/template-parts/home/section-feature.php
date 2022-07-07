<?php
$attorneys_enable = get_theme_mod( 'drop_shipping_pro_radio_feature_enable' );
if ( 'Disable' == $attorneys_enable ) {
  return;
}
if( get_theme_mod('drop_shipping_pro_feature_bgcolor') ) {
  $feature_backg = 'background-color:'.esc_attr(get_theme_mod('drop_shipping_pro_feature_bgcolor')).';';
}elseif( get_theme_mod('drop_shipping_pro_feature_bgimage') ){
  $feature_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_feature_bgimage')).'\')';
}else{
  $feature_backg = '';
}

$img_bg = get_theme_mod('drop_shipping_pro_feature_bgimage_setting',true);

?>

<section id="feature-block" style="<?php echo esc_attr($feature_backg); ?>" class="<?php echo esc_attr($img_bg); ?> wow fadeInUp delay-1000 animated" data-wow-duration="2s">
  <div class="container">
    <div class="feature-block-box">
      <div class="owl-carousel">
          <?php
           $number =  get_theme_mod('drop_shipping_pro_feature_number',4);
            for ($i=1; $i<=$number; $i++) { ?>
            <div class="hvr-shutter-in-vertical feature-block-inner feature-block<?php echo $i ?> <?php if($i == 1){ echo 'active';}?> wow pulse delay-2000 animated text-md-start text-sm-start-features text-center" data-wow-duration="2s">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-12 ">
                  <i class="<?php echo esc_html(get_theme_mod('drop_shipping_pro_feature_icon'.$i)); ?> align-middle"></i>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-12 text-md-start">
                  <div>
                    <h3 class="feature-block-title">
                      <?php echo esc_html(get_theme_mod('drop_shipping_pro_feature_heading'.$i)); ?>
                    </h3>
                  </div>
                  <div>
                    <p class="feature-block-text ">
                      <?php echo esc_html(get_theme_mod('drop_shipping_pro_feature_text'.$i)); ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
      </div>
    </div>
  </div>
</section>
