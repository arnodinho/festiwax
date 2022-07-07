<?php
/**
 * Template Name: FAQ
*/
get_header(); ?>

<?php 
    get_template_part( 'template-parts/banner/banner' );

    do_action('drop_shipping_pro_before_faq_title'); 

    $faq_bg = 'background-image:url(\''.esc_url(get_theme_mod('drop_shipping_pro_faq_bgimage')).'\')';
?>

<section id="faq">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="section-title faq-main-box px-lg-5 px-md-5 px-sm-5 px-0">
                    <?php if(get_theme_mod('drop_shipping_pro_faq_page_main_title') != '' ){?>
                            <h3 class="text-sm-start text-center px-md-0 px-sm-2 px-2 mb-4">
                                <?php echo esc_html(get_theme_mod('drop_shipping_pro_faq_page_main_title')); ?>
                            </h3>
                    <?php } ?>
                    <div class="col-lg-12 col-md-12" id="accordionExample">
                           <?php
                              $fcount="";
                              $fcount = get_theme_mod("drop_shipping_pro_faq_temp_faq_number");

                              for( $j = 1; $j <= $fcount; $j++ ) {
                                ?>
                               <div class="accordion-item mt-3 wow zoomIn delay-2000 animated" data-wow-duration="2s">
                                  <div class="accordion-header" id="heading<?php echo esc_attr($j); ?>">
                                    <a class="accordion-button <?php if( $j != 1 ) { echo "collapsed"; } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($j); ?>" aria-expanded="true" aria-controls="collapse<?php echo esc_attr($j); ?>">
                                        <?php echo esc_html(get_theme_mod('drop_shipping_pro_faq_temp_faq_que'.$j)); ?>
                                    </a>
                                  </div>
                                  <div id="collapse<?php echo esc_attr($j);?>" class="accordion-collapse collapse <?php if( $j == 1 ) { echo "show"; } ?>" aria-labelledby="heading<?php echo esc_attr($j); ?>" data-bs-parent="#accordionExample" id="collapse<?php echo esc_attr($j);?>">
                                     <div class="accordion-body">
                                        <?php echo esc_html(get_theme_mod('drop_shipping_pro_faq_temp_faq_ans'.$j)); ?>
                                     </div>
                                  </div>
                               </div>
                           <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php do_action('drop_shipping_pro_before_footer'); ?>

<?php get_footer(); ?>