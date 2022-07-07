<?php
   /**
    * Template to show the Image Banner
    *
    * @package drop_shipping_pro
    */
   $banner_img_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_banner_bgimage')).'\')';
   ?>
<div class="banner-image py-2 mt-4" style="<?php echo esc_attr($banner_img_backg);?>" class="mt-4">
   <div class="banner-image-inner-box"></div>
   <div class="tm-titlebar-inner-wrapper">
      <div class="entry-title-watermark">
         <h1 class="text-center entry-title">Blog</h1>
      </div>
         <div class="container pt-xl-5 pt-lg-4 pt-md-4 pt-sm-5 pt-5 pb-xl-5 pb-lg-4 pb-md-4 pb-sm-4 pb-4">
         <h2 class="text-center entry-title"><?php echo get_the_title() ?></h2>
         <div class="bradcrumbs text-center">
            <?php bwt_breadcrumbs(); ?>
         </div>
      </div>
   </div>
</div>