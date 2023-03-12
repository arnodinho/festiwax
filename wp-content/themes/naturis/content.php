<article id="post-<?php the_ID(); ?>" <?php post_class('article-default'); ?>>
    <div class="post-inner">
        <?php naturis_post_thumbnail('post-thumbnail'); ?>
        <div class="post-content">
            <?php
            /**
             * Functions hooked in to naturis_loop_post action.
             *
             * @see naturis_post_header          - 15
             * @see naturis_post_content         - 30
             */
            do_action('naturis_loop_post');
            ?>
        </div>
    </div>
</article><!-- #post-## -->