<div class="middle-header py-lg-3 py-md-3 py-sm-3 py-4">
   <div class="container">
      <div class="row">
         <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-12 header-logo-box">
              <div class="logo" id="site-sticky-menu1">
                 <?php
                    if( has_custom_logo() ){  drop_shipping_pro_the_custom_logo();  }
                    $logo= get_theme_mod( 'custom_logo' );
                    if($logo){ ?>
                 <div class="logo-text">
                    <?php if( get_theme_mod('drop_shipping_pro_display_title', true) != ''){ ?>

                    <?php }
                       if( get_theme_mod('drop_shipping_pro_display_tagline', true) != ''){
                         $description = get_bloginfo( 'description', 'display' );
                         if ( $description || is_customize_preview() ) : ?>
                    <p class="logo-slogan">
                       <?php echo esc_html($description); ?>
                    </p>
                    <?php endif; }
                       ?>
                 </div>
                 <?php } else { ?>
                 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo( 'name' ); ?>"/></a>
                 <?php }?>
              </div>
         </div>
         <div class="col-xl-6 col-lg-6 col-md-5 col-sm-9 col-12 header-search-bar mb-sm-0 mb-4">
            <div class="row me-lg-4">
               <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                  <div class="cat_togglee ms-2" id="cat_togglee">
                     <?php if(get_theme_mod('drop_shipping_pro_header_category_title')!=''){ ?>
                        <?php echo esc_html(get_theme_mod('drop_shipping_pro_header_category_title')); ?>
                        <span class="caret"></span>
                     <?php } ?>
                     <?php if(get_theme_mod('drop_shipping_pro_category_title_icon',true)!=''){ ?>
                        <i class="<?php echo esc_html(get_theme_mod('drop_shipping_pro_category_title_icon')); ?> ms-2"></i>
                     <?php }?>
                  </div>
                  <div id="cart_animate" class="dropdown-menu cat_box">
                     <?php if ( class_exists( 'woocommerce' ) ) {
                     the_widget( 'WC_Widget_Product_Categories', 'title=' );
                     } ?>
                  </div>
               </div>
               <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                  <div class="side_search">
                     <div class="search_form">
                        <?php if ( class_exists( 'woocommerce' ) )  {
                           the_widget( 'WC_Widget_Product_Search', 'title=' ); }?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-2 col-lg-2 col-md-3 col-sm-9 col-7 support-box mt-md-0 mt-3">
            <div class="row topbar-support-box">
               <div class="col-lg-4 col-md-4 col-sm-2 col-3">
                  <i class="<?php echo esc_html(get_theme_mod('drop_shipping_pro_header_support_icon')); ?>"></i>
               </div>
               <div class="col-lg-8 col-md-8 col-sm-10 align-self-center ps-lg-0 ps-sm-0 col-9">
                  <div class="topbar-support-title">
                     <?php echo esc_html(get_theme_mod('drop_shipping_pro_header_support_text')); ?>
                  </div>
                  <div class="topbar-support-text">
                     <a href="tel:<?php echo esc_html(get_theme_mod('drop_shipping_pro_header_number')); ?>">
                        <?php echo esc_html(get_theme_mod('drop_shipping_pro_header_number')); ?>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-0 col-sm-1 col-1 mt-md-0 mt-3 middle-header-off-col">

         </div>
      </div>
   </div>
</div>
