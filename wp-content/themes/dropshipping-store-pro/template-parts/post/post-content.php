<?php
   /**
    * Template part for displaying All Post Content
    *
    * @package drop_shipping_pro
    */
   ?>
<?php
  
   
   $theme_lay = get_theme_mod('drop_shipping_pro_plugin_single_blog_option', 'two_col'); 
   if($theme_lay == 'one_col'){
       $col_class = 'col-md-12 col-sm-12';
     }else if($theme_lay == 'two_col'){
       $col_class = 'col-lg-6 col-md-12 col-sm-6 two-column';
     }
   
   ?>
<div class="postbox smallpostimage <?php echo esc_attr($col_class); ?> mt-lg-5 mt-xl-5 mt-md-5 mt-sm-4 mt-4">
   <div class="post-featured mx-2">
    <div class="post-featured-img position-relative">
      <?php if ( get_theme_mod('drop_shipping_pro_blog_featured_image_enable',true) == "1" ) { ?>
        <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
         </a>
      <?php } ?>
      <div class="featured-box-date text-center">
         <?php if ( get_theme_mod('drop_shipping_pro_general_settings_post_date',true) == "1" ) { ?>
            <?php if ( has_post_thumbnail() ) { ?>
               <span class="entry-date py-2 px-2">
                  <?php the_time( 'd M' ) ?>
               </span>
          <?php } } ?>
      </div>
    </div>
      <div class="featured-box align-items-center my-4 mx-4 pb-4 pt-2">
     
         <div class="blog-meta metabox">
            <ul class="d-flex position-relative mb-xl-2 mb-lg-1">
               <li class="me-3">
                  <span class="blog-meta-category">
                      <?php $cat = get_the_category(); echo $cat[0]->cat_name; ?>
                  </span>
               </li>
               <li class="ms-3 meta-comment-box position-relative">
                  <?php if ( get_theme_mod('drop_shipping_pro_general_settings_post_comments',true) == "1" ) { ?>
                     <span class="entry-comments "> 
                        <?php comments_number( 'Comment 0', 'Comment 1', 'Comments % ' ); ?>
                     </span>
                  <?php } ?>
               </li>
            </ul>
         </div>

         <h4 class="posttitle me-xl-5 pe-xl-4">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
            </a>
         </h4>
      </div>
   </div>
</div>