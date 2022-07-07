<?php 
  
  $section_hide = get_theme_mod( 'drop_shipping_pro_topbar_enabledisable' );
   if ( 'Disable' == $section_hide ) {  ?>

  <?php 
    return;
   }

?>
  <div id="topbar" class="py-lg-1 py-md-2 py-sm-2 py-3">
    <div class="container">
      <div class="row">
       <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
         <div class="topbar-note text-lg-start text-md-center text-sm-center text-center">
           <p>
            <?php echo esc_html(get_theme_mod('drop_shipping_pro_topbar_notice')); ?></p>
         </div>
       </div>
       <div class="col-xl-6 col-lg-5 col-md-7 col-sm-7 col-12">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-4">
             <div class="topbar_translate text-sm-start text-center">
               <?php echo do_shortcode('[gtranslate]'); ?>
             </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 mt-1 col-3">
             <div class="topbar_currency_switcher text-sm-start text-center">
               <?php echo do_shortcode('[woocommerce_currency_switcher_drop_down_box]'); ?>
             </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-sm-5 col-5">
             <div class="topbar_account text-sm-start text-center">
                <div class=" product-search-box position-relative">
                  <div class="my-account text-lg-start text-md-start text-sm-center text-center shipping-box">
                    
                  <?php  if(get_theme_mod('drop_shipping_pro_topbar_section_shipping_title')!=''){ ?>
                    <span class="order-track">
                      <?php echo esc_html(get_theme_mod('drop_shipping_pro_topbar_section_shipping_title', 'Track Your Order', 'dropshipping-store-pro')); ?>
                    </span>
                <?php } ?>
                  <?php if(get_theme_mod('drop_shipping_pro_topbar_shipping_shortcode')!=''){ ?>
                    <div class="order-track-hover text-start">
                      <?php echo do_shortcode(get_theme_mod('drop_shipping_pro_topbar_shipping_shortcode','[woocommerce_order_tracking]', 'dropshipping-store-pro')); ?>
                    </div>
                  <?php } ?>
                  </div>
                </div>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-5 col-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-5 col-6">
              <div class="topbar-location text-sm-start text-center">
                <a href="<?php echo esc_html(get_theme_mod('drop_shipping_pro_topbar_compare_url')); ?>">
                  <?php echo esc_html(get_theme_mod('drop_shipping_pro_topbar_compare', 'Compare', 'dropshipping-store-pro')); ?>
                </a>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-5 col-6">
              <div class="topbar-regiter text-sm-start text-center">
                <a href="<?php echo esc_html(get_theme_mod('drop_shipping_pro_topbar_location_url')); ?>">
                  <i class=" <?php echo esc_html(get_theme_mod('drop_shipping_pro_topbar_location_icon', 'fas fa-map-marker-alt', 'dropshipping-store-pro')); ?> me-2"></i><?php echo esc_html(get_theme_mod('drop_shipping_pro_topbar_location', 'Location', 'dropshipping-store-pro')); ?>
                </a>
              </div>
            </div>
          </div>
        </div>
         
      </div>
    </div>
  </div>

