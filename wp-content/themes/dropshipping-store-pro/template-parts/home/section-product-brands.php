<?php 
$attorneys_enable = get_theme_mod( 'drop_shipping_pro_radio_productbrand_enable' );
if ( 'Disable' == $attorneys_enable ) {
  return;
}
if( get_theme_mod('drop_shipping_pro_popular_brands_bgcolor') ) { 
  $feature_stores_backg = 'background-color:'.esc_attr(get_theme_mod('drop_shipping_pro_popular_brands_bgcolor')).';';
}elseif( get_theme_mod('drop_shipping_pro_popular_brands_bgimage') ){
  $feature_stores_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_popular_brands_bgimage')).'\')';
}else{
  $feature_stores_backg = '';   
}

$img_bg = get_theme_mod('drop_shipping_pro_popular_brands_bgimage_setting',true);

?>

<section id="popular-brand" style="<?php echo esc_attr($feature_stores_backg); ?>" class="<?php echo esc_attr($img_bg); ?> pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12 mt-sm-5 mt-lg-3 mt-md-0 mt-sm-0 mt-4">
        <div class="owl-carousel">
        <?php 
        $feature_store =  get_theme_mod('drop_shipping_pro_popular_brands_box_number');
        for($i=1; $i<=$feature_store; $i++) { ?>
          <div class="mb-lg-0 mb-md-5 mb-sm-3 mb-0 popular-stores-box<?php echo esc_attr($i); ?> animated fadeInUp">
            <div class="popular-stores-box wow zoomInUp delay-1000 animated" data-wow-duration="2s">
              <div class="popular-stores-img">
                <img  src="<?php echo esc_url(get_theme_mod('drop_shipping_pro_popular_brands_image'.$i)); ?>" alt="Brand Image">
              </div>
            </div>
          </div>
        <?php } ?> 
        </div>  
      </div>
    </div>
  </div>
</section>