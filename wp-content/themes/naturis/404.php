<?php
get_header(); ?>

    <div id="primary" class="content">
        <main id="main" class="site-main" role="main">
            <div class="error-404 not-found">
                <div class="page-content">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('404', 'naturis'); ?></h1>
                        <h3 class="page-title"><?php esc_html_e('Oops! That page can\'t be found', 'naturis'); ?></h3>
                    </header><!-- .page-header -->

                    <div class="error-text">
                        <span><?php esc_html_e("We're really sorry but we can't seem to find the page you were looking for.", 'naturis') ?><br></span>

                    </div>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="button-404">
                            <span class="button-text"><?php esc_html_e('Back The Homepage', 'naturis'); ?></span>
                            <i class="naturis-icon-long-arrow-right"></i>
                        </a>
                </div><!-- .page-content -->
            </div><!-- .error-404 -->
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
