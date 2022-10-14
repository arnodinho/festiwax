<div class="container main-menu">
   <div class="row">
      <div class="col-xl-10 col-lg-10 col-md-9 col-sm-8 col-6">
         <div class=""  id="site-sticky-menu">
         <span class="responsive-menu-title">
         <?php echo esc_html('MENU','dropshipping-store-pro'); ?>
         </span>
         <div id="sticky-menu">
            <div class="innermenubox">
               <div class="toggle-nav mobile-menu">
                  <div role="button" on="tap:sidebar1.toggle" tabindex="0" class="hamburger text-xl-end text-lg-start text-md-start text-sm-start-hamburger text-start" id="open_nav"><i class="fa fa-bars"></i></div>
               </div>
               <div class="main-header">
                  <div id="mySidenav" class="sidenav navbar">
                     <nav id="site-navigation" class="main-navigation">
                        <?php
                           wp_nav_menu( array(
                             'theme_location' => 'primary',
                             'container_class' => 'menu clearfix' ,
                             'menu_class' => 'clearfix',
                             'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                             'fallback_cb' => 'wp_page_menu',
                           ) );
                           ?>
                     </nav>
                  </div>
               </div>
               <amp-sidebar id="sidebar1" layout="nodisplay" side="right">
                  <div id="mySidenav" class="sidenav navbar">
                     <nav id="site-navigation" class="main-navigation">
                        <div role="button" aria-label="close sidebar" on="tap:sidebar1.toggle" tabindex="0" class="close-sidebar" id="close_nav">
                           <!-- <i class="fa fa-times"></i> -->
                              <a class="mobile-menu-close" href="#"><i class="close-icon"></i></a>

                           </div>
                        <?php
                           wp_nav_menu( array(
                             'theme_location' => 'primary',
                             'container_class' => 'menu clearfix' ,
                             'menu_class' => 'clearfix',
                             'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                             'fallback_cb' => 'wp_page_menu',
                           ) );
                           ?>
                     </nav>
                     <!-- #site-navigation -->
                  </div>
               </amp-sidebar>
            </div>
         </div>
      </div>
      </div>
      <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 align-self-center">
         <div class="row">
                 <div class="col-lg-4 col-md-4 col-sm-4 col-4 topbar-cart-icon align-self-end">
                     <a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('Cart View', 'woothemes'); ?>">
                   <img src="<?php echo esc_url(get_theme_mod('drop_shipping_pro_header_shopping_basket_image')); ?>" alt="Shopping Basket" width="49" height="49">
                     </a>
                </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-8 p-0 cart-btn-box align-self-center position-relative">
               <?php if ( class_exists( 'WooCommerce' ) ) { ?>
               <div class="text-uppercase mt-2">

                  <?php echo esc_html(get_theme_mod('drop_shipping_pro_header_shopping_text')); ?>
               </div>
               <div class="">

                    <?php global $woocommerce; ?>
                <a class="top-cart"  href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('Cart View', 'woothemes'); ?>">
                  <span class="cart-customlocation">
                    <?php echo $woocommerce->cart->get_cart_total(); ?>
                  </span>

                </a>
                     <div class="top-cart" id="cart">
                      <div id="top-add-to-cart">
                        <div class="top-cart-inner">
                          <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
                        </div>
                      </div>
                     </div>


               </div>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>
