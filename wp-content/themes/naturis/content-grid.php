<article id="post-<?php the_ID(); ?>" <?php post_class('column-item article-grid'); ?>>
    <div class="post-inner">
        <?php if (has_post_thumbnail()): ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('naturis-post-grid'); ?>
            </div>
        <?php endif; ?>
        <div class="entry-header">
            <div class="entry-meta">
                <?php naturis_post_meta(array('show_author' => 0, 'show_cats' => 0)); ?>
            </div>
            <?php the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
            <div class="entry-content">
                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            </div>
            <?php echo '<div><a class="more-link" href="' . get_permalink() . '">' . esc_html__('Read More', 'naturis') . '</a></div>'; ?>
        </div>
    </div>
</article><!-- #post-##  -->
