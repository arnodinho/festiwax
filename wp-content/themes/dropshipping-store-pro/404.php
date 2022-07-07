<?php
   /**
    * The template for displaying 404 pages (Not Found).
    *
    * @package drop_shipping_pro
    */


   ?>

<head>
   <?php wp_head(); ?>
</head>

<section id="maincontent" role="main" class="error_top">
   <div class="content_page">
      <div class="container">
         <div class="content_page wow fadeInUp delay-1000 animated" data-wow-duration="2s" style="<?php echo esc_attr($error_img_bg); ?>" id="error_page">
            <div class="container">
               <div class="page-content">
                  <div class="error-box py-5">
                     <h2 class="text-md-start text-center">
                        <span class="heading3 pt-5"><?php echo esc_html(get_theme_mod('drop_shipping_pro_error_page_title'));?></span>
                     </h2>
                     <h4 class="anim-typewriter text-md-start text-center mb-4">
                        <?php echo esc_html(get_theme_mod('drop_shipping_pro_error_page_small_head'));?>
                     </h4>
                     <h6 class="text-404 text-md-start text-center mb-4"><?php echo esc_html(get_theme_mod('drop_shipping_pro_error_page_content'));?></h6>  
                     <div>
                        <a class="view-more font-weight-bold btn btn-primary theme_button px-3 py-2 rounded-0 m-0" href="<?php echo esc_url( home_url() ); ?>">
                         <?php echo esc_html(get_theme_mod('drop_shipping_pro_error_page_button_text')); ?>
                        </a>
                     </div>  
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php get_footer(); ?>