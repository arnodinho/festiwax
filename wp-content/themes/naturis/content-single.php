<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="single-content">
            <?php
            /**
             * Functions hooked in to naturis_single_post_top action
             *
             * @see naturis_post_thumbnail - 10
             */
            do_action('naturis_single_post_top');

            /**
             * Functions hooked in to naturis_single_post action
             * @see naturis_post_header         - 10
             * @see naturis_post_content         - 30
             */
            do_action('naturis_single_post');

            /**
             * Functions hooked in to naturis_single_post_bottom action
             *
             * @see naturis_post_taxonomy      - 5
             * @see naturis_post_nav            - 10
             * @see naturis_display_comments    - 20
             */
            do_action('naturis_single_post_bottom');
            ?>

    </div>

</article><!-- #post-## -->
