<?php
$attorneys_enable = get_theme_mod( 'drop_shipping_pro_radio_our_blog_enable' );
if ( 'Disable' == $attorneys_enable ) {
  return;
}
if( get_theme_mod('drop_shipping_pro_our_blog_bgcolor') ) {
  $our_blog_backg = 'background-color:'.esc_attr(get_theme_mod('drop_shipping_pro_our_blog_bgcolor')).';';
}elseif( get_theme_mod('drop_shipping_pro_our_blog_bgimage') ){
  $our_blog_backg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_our_blog_bgimage')).'\')';
}else{
  $our_blog_backg = '';
}

$img_bg = get_theme_mod('drop_shipping_pro_our_blog_bgimage_setting',true);

$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 3
);
$new = new WP_Query($args);
?>

<section id="our-blog" style="<?php echo esc_attr($our_blog_backg); ?>" class="<?php echo esc_attr($img_bg); ?> wow fadeInUp delay-1000 animated" data-wow-duration="2s">
  <div class="our-blog-info container">
    <div class="section-title text-sm-start-featured text-center ">
      <?php if(get_theme_mod('drop_shipping_pro_our_blog_main_title') != '' ){?>
        <h3>
          <?php echo esc_html(get_theme_mod('drop_shipping_pro_our_blog_main_title')); ?>
        </h3>
      <?php } ?>
    </div>
    <div class="our-blog-box">
      <?php
        if ( $new->have_posts() ) : ?>
        <div class="outer-our-blog">
           <div class="owl-carousel">
            <?php   for($i=1;$i<=3;$i++){
              while ( $new->have_posts() ){
                $new->the_post();  ?>
                    <div class="our-blog-row wow fadeInUp delay-1000 animated" data-wow-duration="2s">
                        <div class="our-blog-content-box mb-3">
                          <div class="our-blog-image position-relative">
                            <?php if (has_post_thumbnail()){ ?>
                              <a href="<?php the_permalink(); ?>">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                              </a>
                            <?php } ?>
                            <div class="p-2 text-sm-start text-center">
                              <h4>
                                <a href="<?php the_permalink(); ?>" target="_blank">
                                  <?php the_title(); ?>
                                </a>
                              </h4>
                                <?php the_content(); ?>
                            </div>
                          </div>
                        </div>
                    </div>
                <?php $i++;
              }
              wp_reset_query(); ?>
            <?php } ?>
          </div>
        </div>
    </div>
    <?php
      else :
        echo '<h5 class="text-center">' . esc_html__( 'Create the post to make it appear here.', 'dropshipping-store-pro' ) . '</h5>';
      endif;
    ?>
  </div>
</section>
