<?php
   /**
    * Template to show the content of Slider
    *
    * @package dropshipping-store-pro
    */

   $section_hide = get_theme_mod( 'drop_shipping_pro_slider_enabledisable' );
   if ( 'Disable' == $section_hide ) { ?>

    <?php
    return;
   }
   $number = get_theme_mod('drop_shipping_pro_slide_number');
   $slide_delay = get_theme_mod('drop_shipping_pro_slide_delay');
   if($number != ''){
   ?>
<section id="slider" class="p-0">
   <div id="carouselExampleIndicators" class="carousel slide <?php if ( get_theme_mod('drop_shipping_pro_slide_remove_fade',true) == 1 ) { ?> carousel-fade <?php } ?> " data-bs-ride="carousel" data-interval="<?php echo esc_attr($slide_delay); ?>">
      <div class="carousel-inner" role="listbox">
         <?php for ($i=1; $i<=$number; $i++) { ?>
         <?php if ( get_theme_mod('drop_shipping_pro_slide_image',true) != "" ) {?>
         <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <div class="slider-main-image">
               <img src="<?php echo esc_url(get_theme_mod('drop_shipping_pro_slide_image'.$i)); ?>">
            </div>
            <?php } ?>
            <div class="carousel-caption d-md-block">
               <div class="container">
                  <div class="inner_carousel" id="slidemainbox">
                     <div class="row">
                        <div class="col-xl-7 col-lg-6 col-md-6 col-sm-7 col-8 slidemainbox-col1">
                           <div class="Slider-left-box text-center" data-wow-duration="2s">
                              <div class="slider-box pt-xxl-5 pt-xl-5 pt-lg-3 pt-md-3 pt-sm-2 pt-0 text-lg-start text-md-start text-sm-start text-start">
                                 <?php if( get_theme_mod('drop_shipping_pro_slide_small_heading'.$i, true) != ''){ ?>
                                    <h3 class="slide-small-heading animated fadeInDown delay-2s">
                                       <?php echo esc_html(get_theme_mod('drop_shipping_pro_slide_small_heading'.$i)); ?>
                                    </h3>
                                 <?php }
                                  if( get_theme_mod('drop_shipping_pro_slide_main_heading'.$i, true) != ''){ ?>
                                    <h1 class="slide-heading animated fadeInUp delay-1s">
                                       <?php echo esc_html(get_theme_mod('drop_shipping_pro_slide_main_heading'.$i)); ?>
                                    </h1>
                                 <?php }
                                  if( get_theme_mod('drop_shipping_pro_slide_text'.$i, true) != ''){ ?>
                                    <p class="slidesmalltext mt-2 animated fadeInUp delay-1s">
                                       <?php echo esc_html(get_theme_mod('drop_shipping_pro_slide_text'.$i)); ?>
                                    </p>
                                 <?php }
                                  if( get_theme_mod('drop_shipping_pro_slide_btnurl'.$i, true) != ''){ ?>
                                    <div class=" text-lg-start mt-sm-2 mt-2 pt-sm-2 pt-0">
                                       <a class="read-more first effect-1 font-weight-bold btn btn-primary py-xl-2 py-lg-2 py-md-2 py-sm-2 py-1 px-xl-3 px-lg-3 px-md-3 px-sm-3 px-1 slide-btn animated fadeInUp delay-1s" href="<?php echo esc_html(get_theme_mod('drop_shipping_pro_slide_btnurl'.$i)); ?>"><?php echo esc_html(get_theme_mod('drop_shipping_pro_slide_btntext'.$i)); ?></a>
                                    </div>
                                 <?php } ?>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-5
                        col-4">
                           <img  src="<?php echo esc_url(get_theme_mod('drop_shipping_pro_slide_right_image'.$i)); ?>" class="slider-left-image animated fadeInRight delay-1s">
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         </div>
         <?php } ?>
      </div>
      <?php if ( get_theme_mod('drop_shipping_pro_slider_arrows',true) == "1" ) { ?>
         <a class="carousel-control-prev" data-bs-target="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <i class="fas fa-long-arrow-alt-left slider-icon rounded-circle"></i>
            <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true">
            </span>
           <span class="visually-hidden">
            <?php esc_html_e('Previous:','dropshipping-store-pro'); ?></span>
         </a>
         <a class="carousel-control-next" data-bs-target="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <i class="fas fa-long-arrow-alt-right slider-icon rounded-circle"></i>
           <span class="carousel-control-next-icon visually-hidden" aria-hidden="true">
           </span>
           <span class="visually-hidden">
            <?php esc_html_e('Next:','dropshipping-store-pro'); ?></span>
         </a>
      <?php }?>


   </div>
</section>
<?php } ?>
