<?php
$about_section = get_theme_mod( 'drop_shipping_pro_category_enable' );

if ( 'Disable' == $about_section ) {
 return;
}
$img_bg = get_theme_mod('drop_shipping_pro_category_image_attachment');
if( get_theme_mod('drop_shipping_pro_category_bgcolor','') ) {
 $about_backg = 'background-color:'.esc_attr(get_theme_mod('drop_shipping_pro_category_bgcolor','')).';';
}elseif( get_theme_mod('drop_shipping_pro_category_bgimage','') ){
 $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_category_bgimage')).'\')';
}else{
 $about_backg = '';
}

?>
<?php if ( class_exists( 'WooCommerce' ) ) {?>
  <section id="main-category" style="<?php echo esc_attr($about_backg); ?>" class="wow zoomIn delay-3000 animated <?php echo esc_attr($img_bg); ?>" data-wow-duration="2s">
    <div class="container" id="category">
      <div class="category-content">
        <div class="container">
          <?php if(get_theme_mod('drop_shipping_pro_category_title',true) != ''){?>
            <div class="section-title d-inline-block w-100">
              <?php if(get_theme_mod('drop_shipping_pro_category_title',true) != ''){?>
                <h3 class="text-center py-3"><?php echo esc_html(get_theme_mod('drop_shipping_pro_category_title')); ?></h3>
              <?php } ?>
            </div>
          <?php } ?>
          <div>

            <div class="owl-carousel">

              <?php
              $i=1;
              $taxonomyName = "product_cat";
              $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false));
                  foreach ($parent_terms as $pterm) { ?>

                  <?php $link = get_term_link($pterm->slug, $taxonomyName);  ?>
                 <div>
                    <a href="<?php echo esc_url($link); ?>"  class="text-center d-block"><?php echo $pterm->name ?>
                        <div class="cat-image-bg">

                        </div>
                        <div>
                        <?php
                          $thumbnail_id = get_term_meta($pterm->term_id, 'thumbnail_id', true);
                          $image = wp_get_attachment_url($thumbnail_id);
                          echo "<img src='{$image}' class='mt-2 mx-auto d-block' alt='' width='400' height='400' />";
                         ?>
                       </div>
                    </a>
                 </div>

              <?php }  ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
