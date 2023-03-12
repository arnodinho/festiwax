<?php

if (!function_exists('naturis_display_comments')) {
    /**
     * naturis display comments
     *
     * @since  1.0.0
     */
    function naturis_display_comments() {
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || 0 !== intval(get_comments_number())) :
            comments_template();
        endif;
    }
}

if (!function_exists('naturis_comment')) {
    /**
     * naturis comment template
     *
     * @param array $comment the comment array.
     * @param array $args the comment args.
     * @param int $depth the comment depth.
     *
     * @since 1.0.0
     */
    function naturis_comment($comment, $args, $depth) {
        if ('div' === $args['style']) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo esc_attr($tag) . ' '; ?><?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-body">
        <div class="comment-meta commentmetadata">
            <a href="<?php echo esc_url(htmlspecialchars(get_comment_link($comment->comment_ID))); ?>"
               class="comment-date">
                <?php echo '<time datetime="' . get_comment_date('c') . '">' . get_comment_date() . '</time>'; ?>
            </a>
            <div class="comment-author vcard">
                <?php echo get_avatar($comment, 128); ?>
                <?php printf('<cite class="fn">%s</cite>', get_comment_author_link()); ?>
            </div>
            <?php if ('0' === $comment->comment_approved) : ?>
                <em class="comment-awaiting-moderation"><?php esc_attr_e('Your comment is awaiting moderation.', 'naturis'); ?></em>
                <br/>
            <?php endif; ?>

        </div>
        <?php if ('div' !== $args['style']) : ?>
        <div id="div-comment-<?php comment_ID(); ?>" class="comment-content">
    <?php endif; ?>
        <div class="comment-text">
            <?php comment_text(); ?>
        </div>
        <div class="reply">
            <?php
            comment_reply_link(
                array_merge(
                    $args, array(
                        'add_below' => $add_below,
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                    )
                )
            );
            ?>
            <?php edit_comment_link(esc_html__('Edit', 'naturis'), '  ', ''); ?>
        </div>
        </div>
        <?php if ('div' !== $args['style']) : ?>
            </div>
        <?php endif; ?>
        <?php
    }
}

if (!function_exists('naturis_credit')) {
    /**
     * Display the theme credit
     *
     * @return void
     * @since  1.0.0
     */
    function naturis_credit() {
        ?>
        <div class="site-info">
            <?php echo apply_filters('naturis_copyright_text', $content = '&copy; ' . date('Y') . ' ' . '<a class="site-url" href="' . esc_url(site_url()) . '">' . esc_html(get_bloginfo('name')) . '</a>' . esc_html__('. All Rights Reserved.', 'naturis')); ?>
        </div><!-- .site-info -->
        <?php
    }
}

if (!function_exists('naturis_social')) {
    function naturis_social() {
        $social_list = naturis_get_theme_option('social_text', []);
        if (empty($social_list)) {
            return;
        }
        ?>
        <div class="naturis-social">
            <ul>
                <?php

                foreach ($social_list as $social_item) {
                    ?>
                    <li><a href="<?php echo esc_url($social_item); ?>"></a></li>
                    <?php
                }
                ?>

            </ul>
        </div>
        <?php
    }
}

if (!function_exists('naturis_site_branding')) {
    /**
     * Site branding wrapper and display
     *
     * @return void
     * @since  1.0.0
     */
    function naturis_site_branding() {
        ?>
        <div class="site-branding">
            <?php echo naturis_site_title_or_logo(); ?>
        </div>
        <?php
    }
}

if (!function_exists('naturis_site_title_or_logo')) {
    /**
     * Display the site title or logo
     *
     * @param bool $echo Echo the string or return it.
     *
     * @return string
     * @since 2.1.0
     */
    function naturis_site_title_or_logo() {
        ob_start();
        the_custom_logo(); ?>
        <div class="site-branding-text">
            <?php if (is_front_page()) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                          rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                         rel="home"><?php bloginfo('name'); ?></a></p>
            <?php endif; ?>

            <?php
            $description = get_bloginfo('description', 'display');

            if ($description || is_customize_preview()) :
                ?>
                <p class="site-description"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div><!-- .site-branding-text -->
        <?php
        $html = ob_get_clean();
        return $html;
    }
}

if (!function_exists('naturis_primary_navigation')) {
    /**
     * Display Primary Navigation
     *
     * @return void
     * @since  1.0.0
     */
    function naturis_primary_navigation() {
        ?>
        <nav class="main-navigation" role="navigation"
             aria-label="<?php esc_html_e('Primary Navigation', 'naturis'); ?>">
            <?php
            $args = apply_filters('naturis_nav_menu_args', [
                'fallback_cb'     => '__return_empty_string',
                'theme_location'  => 'primary',
                'container_class' => 'primary-navigation',
            ]);
            wp_nav_menu($args);
            ?>
        </nav>
        <?php
    }
}

if (!function_exists('naturis_mobile_navigation')) {
    /**
     * Display Handheld Navigation
     *
     * @return void
     * @since  1.0.0
     */
    function naturis_mobile_navigation() {
        ?>
        <div class="mobile-nav-tabs">
            <ul>
                <?php if (isset(get_nav_menu_locations()['handheld'])) { ?>
                    <li class="mobile-tab-title mobile-pages-title active" data-menu="pages">
                        <span><?php echo esc_html(get_term(get_nav_menu_locations()['handheld'], 'nav_menu')->name); ?></span>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <nav class="mobile-menu-tab mobile-navigation mobile-pages-menu active"
             aria-label="<?php esc_html_e('Mobile Navigation', 'naturis'); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'handheld',
                    'container_class' => 'handheld-navigation',
                )
            );
            ?>
        </nav>
        <?php
    }
}

if (!function_exists('naturis_homepage_header')) {
    /**
     * Display the page header without the featured image
     *
     * @since 1.0.0
     */
    function naturis_homepage_header() {
        edit_post_link(esc_html__('Edit this section', 'naturis'), '', '', '', 'button naturis-hero__button-edit');
        ?>
        <header class="entry-header">
            <?php
            the_title('<h1 class="entry-title">', '</h1>');
            ?>
        </header><!-- .entry-header -->
        <?php
    }
}

if (!function_exists('naturis_page_header')) {
    /**
     * Display the page header
     *
     * @since 1.0.0
     */
    function naturis_page_header() {

        if (is_front_page() || !is_page_template('default')) {
            return;
        }

        if (naturis_is_elementor_activated() && function_exists('hfe_init')) {
            if (naturis_breadcrumb::get_template_id() !== '') {
                return;
            }
        }

        ?>
        <header class="entry-header">
            <?php
            if (has_post_thumbnail()) {
                naturis_post_thumbnail('full');
            }
            the_title('<h1 class="entry-title">', '</h1>');
            ?>
        </header><!-- .entry-header -->
        <?php
    }
}

if (!function_exists('naturis_page_content')) {
    /**
     * Display the post content
     *
     * @since 1.0.0
     */
    function naturis_page_content() {
        ?>
        <div class="entry-content">
            <?php the_content(); ?>
            <?php
            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'naturis'),
                    'after'  => '</div>',
                )
            );
            ?>
        </div><!-- .entry-content -->
        <?php
    }
}

if (!function_exists('naturis_post_header')) {
    /**
     * Display the post header with a link to the single post
     *
     * @since 1.0.0
     */
    function naturis_post_header() {
        ?>
        <header class="entry-header">
            <?php
            if (is_single()) {
                ?>
                <div class="entry-meta">
                    <?php naturis_post_meta(); ?>
                </div>
                <?php
                the_title('<h1 class="alpha entry-title">', '</h1>');
            } else {
                ?>
                <div class="entry-meta">
                    <?php
                    naturis_post_meta();
                    ?>
                </div>
                <?php
                the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
            }
            ?>
        </header><!-- .entry-header -->
        <?php
    }
}

if (!function_exists('naturis_post_content')) {
    /**
     * Display the post content with a link to the single post
     *
     * @since 1.0.0
     */
    function naturis_post_content() {
        ?>
        <div class="entry-content">
            <?php

            /**
             * Functions hooked in to naturis_post_content_before action.
             *
             */
            do_action('naturis_post_content_before');


            if (is_single()) {
                the_content(
                    sprintf(
                    /* translators: %s: post title */
                        esc_html__('Read More', 'naturis') . ' %s',
                        '<span class="screen-reader-text">' . get_the_title() . '</span>'
                    )
                );
            } else {
                the_excerpt();
                echo '<div><a class="more-link" href="' . get_permalink() . '">' . esc_html__('Read More', 'naturis') . '</a></div>';
            }

            /**
             * Functions hooked in to naturis_post_content_after action.
             *
             */
            do_action('naturis_post_content_after');

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'naturis'),
                    'after'  => '</div>',
                )
            );
            ?>
        </div><!-- .entry-content -->
        <?php
    }
}

if (!function_exists('naturis_post_meta')) {
    /**
     * Display the post meta
     *
     * @since 1.0.0
     */
    function naturis_post_meta($atts = array()) {
        if ('post' !== get_post_type()) {
            return;
        }
        extract(
            shortcode_atts(
                array(
                    'show_author'     => 1,
                    'show_date'       => 1,
                    'show_cats'       => 1,
                ),
                $atts
            )
        );

        $categories      = '';
        if($show_cats == 1){
            $categories_list = get_the_category_list(', ');
            if ('post' === get_post_type() && $categories_list) {
                // Make sure there's more than one category before displaying.
                $categories = '<span class="categories-link"><span class="screen-reader-text">' . esc_html__('Categories', 'naturis') . '</span>' . $categories_list . '</span>';
            }
        }
        $posted_on = '';
        if($show_date == 1) {
            // Posted on.
            $posted_on = '<span class="posted-on">' . sprintf('<a href="%1$s" rel="bookmark">%2$s</a>', esc_url(get_permalink()), get_the_date()) . '</span>';
        }
        $author = '';

        // Author.
        if($show_author == 1){
            $author = sprintf(
                '<span class="post-author"><span>%1$s<a href="%2$s" class="url fn" rel="author">%3$s</a></span></span>',
                esc_html__('By ', 'naturis'),
                esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                esc_html(get_the_author())
            );
        }

        echo wp_kses(
            sprintf('%1$s %2$s %3$s', $categories, $author, $posted_on), array(
                'div'  => array(
                    'class' => array(),
                ),
                'span' => array(
                    'class' => array(),
                ),
                'a'    => array(
                    'href'  => array(),
                    'rel'   => array(),
                    'class' => array(),
                ),
                'time' => array(
                    'datetime' => array(),
                    'class'    => array(),
                )
            )
        );

    }
}

if (!function_exists('naturis_meta_footer')) {
    function naturis_meta_footer() {

        echo '<div class="entry-meta bottom">';

        if ('post' !== get_post_type()) {
            return;
        }

        $categories      = '';
        $categories_list = get_the_category_list(',');
        if ('post' === get_post_type() && $categories_list) {
            // Make sure there's more than one category before displaying.
            $categories = '<span class="categories-link"><span class="screen-reader-text">' . esc_html__('Categories', 'naturis') . '</span>' . $categories_list . '</span>';
        }

        // Author.
        $author = sprintf(
            '<span class="post-author"><span>%1$s<a href="%2$s" class="url fn" rel="author">%3$s</a></span></span>',
            esc_html__('By ', 'naturis'),
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_html(get_the_author())
        );

        echo wp_kses(
            sprintf('%1$s %2$s', $author, $categories), array(
                'div'  => array(
                    'class' => array(),
                ),
                'span' => array(
                    'class' => array(),
                ),
                'a'    => array(
                    'href'  => array(),
                    'rel'   => array(),
                    'class' => array(),
                ),
                'time' => array(
                    'datetime' => array(),
                    'class'    => array(),
                )
            )
        );

        echo '</div>';
    }
}

if (!function_exists('naturis_get_allowed_html')) {
    function naturis_get_allowed_html() {
        return apply_filters(
            'naturis_allowed_html',
            array(
                'br'     => array(),
                'i'      => array(),
                'b'      => array(),
                'u'      => array(),
                'em'     => array(),
                'del'    => array(),
                'a'      => array(
                    'href'  => true,
                    'class' => true,
                    'title' => true,
                    'rel'   => true,
                ),
                'strong' => array(),
                'span'   => array(
                    'style' => true,
                    'class' => true,
                ),
            )
        );
    }
}

if (!function_exists('naturis_edit_post_link')) {
    /**
     * Display the edit link
     *
     * @since 2.5.0
     */
    function naturis_edit_post_link() {
        edit_post_link(
            sprintf(
                wp_kses(__('Edit <span class="screen-reader-text">%s</span>', 'naturis'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<div class="edit-link">',
            '</div>'
        );
    }
}

if (!function_exists('naturis_categories_link')) {
    /**
     * Prints HTML with meta information for the current cateogries
     */
    function naturis_categories_link() {

        // Get Categories for posts.
        $categories_list = get_the_category_list(',');

        if ('post' === get_post_type() && $categories_list) {
            // Make sure there's more than one category before displaying.
            echo '<span class="categories-link"><span class="screen-reader-text">' . esc_html__('Categories', 'naturis') . '</span>' . $categories_list . '</span>';
        }
    }
}

if (!function_exists('naturis_post_taxonomy')) {
    /**
     * Display the post taxonomies
     *
     * @since 2.4.0
     */
    function naturis_post_taxonomy() {
        /* translators: used between list items, there is a space after the comma */

        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list('', ', ');
        ?>
        <aside class="entry-taxonomy">
            <?php if ($tags_list) : ?>
                <div class="tags-links">
                    <span class="label"><?php echo esc_html(_n('Tag:', 'Tags:', count(get_the_tags()), 'naturis')); ?></span>
                    <?php printf('%s', $tags_list); ?>
                </div>
            <?php endif;
            if (naturis_is_elementor_activated()) {
                naturis_social_share();
            }
            ?>
        </aside>
        <?php
    }
}

if (!function_exists('naturis_paging_nav')) {
    /**
     * Display navigation to next/previous set of posts when applicable.
     */
    function naturis_paging_nav() {

        $args = array(
            'type'      => 'list',
            'next_text' => '<span>' . esc_html__('Next', 'naturis') . '</span>',
            'prev_text' => '<span>' . esc_html__('Prev', 'naturis') . '</span>',
        );

        the_posts_pagination($args);
    }
}

if (!function_exists('naturis_post_nav')) {
    /**
     * Display navigation to next/previous post when applicable.
     */
    function naturis_post_nav() {

        $prev_post = get_previous_post();
        $next_post = get_next_post();
        $args      = [];
        if ($next_post) {
            $args['next_text'] = '<span class="nav-content"><span class="reader-text">' . esc_html__('Next post', 'naturis') . ' </span><span class="title">%title</span></span>' . get_the_post_thumbnail($next_post->ID, array(110, 110));
        }
        if ($prev_post) {
            $args['prev_text'] = get_the_post_thumbnail($prev_post->ID, array(110, 110)) . '<span class="nav-content"><span class="reader-text">' . esc_html__('Previous post', 'naturis') . ' </span><span class="title">%title</span></span> ';
        }

        the_post_navigation($args);

    }
}

if (!function_exists('naturis_posted_on')) {
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     *
     * @deprecated 2.4.0
     */
    function naturis_posted_on() {
        _deprecated_function('naturis_posted_on', '2.4.0');
    }
}

if (!function_exists('naturis_homepage_content')) {
    /**
     * Display homepage content
     * Hooked into the `homepage` action in the homepage template
     *
     * @return  void
     * @since  1.0.0
     */
    function naturis_homepage_content() {
        while (have_posts()) {
            the_post();

            get_template_part('content', 'homepage');

        } // end of the loop.
    }
}

if (!function_exists('naturis_get_sidebar')) {
    /**
     * Display naturis sidebar
     *
     * @uses get_sidebar()
     * @since 1.0.0
     */
    function naturis_get_sidebar() {
        get_sidebar();
    }
}

if (!function_exists('naturis_post_thumbnail')) {
    /**
     * Display post thumbnail
     *
     * @param string $size the post thumbnail size.
     *
     * @uses has_post_thumbnail()
     * @uses the_post_thumbnail
     * @var $size thumbnail size. thumbnail|medium|large|full|$custom
     * @since 1.5.0
     */
    function naturis_post_thumbnail($size = 'post-thumbnail') {
        if (has_post_thumbnail()) {
            echo '<div class="post-thumbnail">';
            the_post_thumbnail($size ? $size : 'post-thumbnail');
            echo '</div>';
        }
    }
}

if (!function_exists('naturis_primary_navigation_wrapper')) {
    /**
     * The primary navigation wrapper
     */
    function naturis_primary_navigation_wrapper() {
        echo '<div class="naturis-primary-navigation"><div class="col-full">';
    }
}

if (!function_exists('naturis_primary_navigation_wrapper_close')) {
    /**
     * The primary navigation wrapper close
     */
    function naturis_primary_navigation_wrapper_close() {
        echo '</div></div>';
    }
}

if (!function_exists('naturis_header_container')) {
    /**
     * The header container
     */
    function naturis_header_container() {
        echo '<div class="col-full">';
    }
}

if (!function_exists('naturis_header_container_close')) {
    /**
     * The header container close
     */
    function naturis_header_container_close() {
        echo '</div>';
    }
}

if (!function_exists('naturis_header_custom_link')) {
    function naturis_header_custom_link() {
        echo naturis_get_theme_option('custom-link', '');
    }

}

if (!function_exists('naturis_header_contact_info')) {
    function naturis_header_contact_info() {
        echo naturis_get_theme_option('contact-info', '');
    }

}

if (!function_exists('naturis_header_account')) {
    function naturis_header_account() {

        if (!naturis_get_theme_option('show_header_account', true)) {
            return;
        }

        if (naturis_is_woocommerce_activated()) {
            $account_link = get_permalink(get_option('woocommerce_myaccount_page_id'));
        } else {
            $account_link = wp_login_url();
        }
        ?>
        <div class="site-header-account">
            <a href="<?php echo esc_url($account_link); ?>">
                <i class="naturis-icon-account"></i>
            </a>
            <div class="account-dropdown">

            </div>
        </div>
        <?php
    }

}

if (!function_exists('naturis_template_account_dropdown')) {
    function naturis_template_account_dropdown() {
        if (!naturis_get_theme_option('show_header_account', true)) {
            return;
        }
        ?>
        <div class="account-wrap d-none">
            <div class="account-inner <?php if (is_user_logged_in()): echo "dashboard"; endif; ?>">
                <?php if (!is_user_logged_in()) {
                    naturis_form_login();
                } else {
                    naturis_account_dropdown();
                }
                ?>
            </div>
        </div>
        <?php
    }
}

if (!function_exists('naturis_form_login')) {
    function naturis_form_login() {
        ?>
        <div class="login-form-head">
            <span class="login-form-title"><?php esc_attr_e('Sign in', 'naturis') ?></span>
            <span class="pull-right">
                <a class="register-link" href="<?php echo esc_url(wp_registration_url()); ?>"
                   title="<?php esc_attr_e('Register', 'naturis'); ?>"><?php esc_attr_e('Create an Account', 'naturis'); ?></a>
            </span>
        </div>
        <form class="naturis-login-form-ajax" data-toggle="validator">
            <p>
                <label><?php esc_attr_e('Username or email', 'naturis'); ?> <span class="required">*</span></label>
                <input name="username" type="text" required placeholder="<?php esc_attr_e('Username', 'naturis') ?>">
            </p>
            <p>
                <label><?php esc_attr_e('Password', 'naturis'); ?> <span class="required">*</span></label>
                <input name="password" type="password" required
                       placeholder="<?php esc_attr_e('Password', 'naturis') ?>">
            </p>
            <button type="submit" data-button-action
                    class="btn btn-primary btn-block w-100 mt-1"><?php esc_html_e('Login', 'naturis') ?></button>
            <input type="hidden" name="action" value="naturis_login">
            <?php wp_nonce_field('ajax-naturis-login-nonce', 'security-login'); ?>
        </form>
        <div class="login-form-bottom">
            <a href="<?php echo wp_lostpassword_url(get_permalink()); ?>" class="lostpass-link"
               title="<?php esc_attr_e('Lost your password?', 'naturis'); ?>"><?php esc_attr_e('Lost your password?', 'naturis'); ?></a>
        </div>
        <?php
    }
}

if (!function_exists('')) {
    function naturis_account_dropdown() { ?>
        <?php if (has_nav_menu('my-account')) : ?>
            <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Dashboard', 'naturis'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'my-account',
                    'menu_class'     => 'account-links-menu',
                    'depth'          => 1,
                ));
                ?>
            </nav><!-- .social-navigation -->
        <?php else: ?>
            <ul class="account-dashboard">

                <?php if (naturis_is_woocommerce_activated()): ?>
                    <li>
                        <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>"
                           title="<?php esc_html_e('Dashboard', 'naturis'); ?>"><?php esc_html_e('Dashboard', 'naturis'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>"
                           title="<?php esc_html_e('Orders', 'naturis'); ?>"><?php esc_html_e('Orders', 'naturis'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('downloads')); ?>"
                           title="<?php esc_html_e('Downloads', 'naturis'); ?>"><?php esc_html_e('Downloads', 'naturis'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('edit-address')); ?>"
                           title="<?php esc_html_e('Edit Address', 'naturis'); ?>"><?php esc_html_e('Edit Address', 'naturis'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('edit-account')); ?>"
                           title="<?php esc_html_e('Account Details', 'naturis'); ?>"><?php esc_html_e('Account Details', 'naturis'); ?></a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo esc_url(get_dashboard_url(get_current_user_id())); ?>"
                           title="<?php esc_html_e('Dashboard', 'naturis'); ?>"><?php esc_html_e('Dashboard', 'naturis'); ?></a>
                    </li>
                <?php endif; ?>
                <li>
                    <a title="<?php esc_html_e('Log out', 'naturis'); ?>" class="tips"
                       href="<?php echo esc_url(wp_logout_url(home_url())); ?>"><?php esc_html_e('Log Out', 'naturis'); ?></a>
                </li>
            </ul>
        <?php endif;

    }
}

if (!function_exists('naturis_header_search_popup')) {
    function naturis_header_search_popup() {
        ?>
        <div class="site-search-popup">
            <div class="site-search-popup-wrap">
                <a href="#" class="site-search-popup-close"><i class="naturis-icon-times-circle"></i></a>
                <?php
                if (naturis_is_woocommerce_activated()) {
                    naturis_product_search();
                } else {
                    ?>
                    <div class="site-search">
                        <?php get_search_form(); ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="site-search-popup-overlay"></div>
        <?php
    }
}

if (!function_exists('naturis_header_search_button')) {
    function naturis_header_search_button() {

        add_action('wp_footer', 'naturis_header_search_popup', 1);
        ?>
        <div class="site-header-search">
            <a href="#" class="button-search-popup"><i class="naturis-icon-search-2"></i></a>
        </div>
        <?php
    }
}


if (!function_exists('naturis_header_sticky')) {
    function naturis_header_sticky() {
        get_template_part('template-parts/header', 'sticky');
    }
}

if (!function_exists('naturis_mobile_nav')) {
    function naturis_mobile_nav() {
        if (isset(get_nav_menu_locations()['handheld'])) {
            ?>
            <div class="naturis-mobile-nav">
                <div class="menu-scroll-mobile">
                    <a href="#" class="mobile-nav-close"><i class="naturis-icon-times"></i></a>
                    <?php
                    naturis_mobile_navigation();
                    naturis_social();
                    ?>
                </div>
            </div>
            <div class="naturis-overlay"></div>
            <?php
        }
    }
}

if (!function_exists('naturis_mobile_nav_button')) {
    function naturis_mobile_nav_button() {
        if (isset(get_nav_menu_locations()['handheld'])) {
            ?>
            <a href="#" class="menu-mobile-nav-button">
				<span
                        class="toggle-text screen-reader-text"><?php echo esc_attr(apply_filters('naturis_menu_toggle_text', esc_html__('Menu', 'naturis'))); ?></span>
                <div class="naturis-icon">
                    <span class="icon-1"></span>
                    <span class="icon-2"></span>
                    <span class="icon-3"></span>
                    <span class="icon-4"></span>
                </div>
            </a>
            <?php
        }
    }
}


if (!function_exists('naturis_footer_default')) {
    function naturis_footer_default() {
        get_template_part('template-parts/copyright');
    }
}


if (!function_exists('naturis_pingback_header')) {
    /**
     * Add a pingback url auto-discovery header for single posts, pages, or attachments.
     */
    function naturis_pingback_header() {
        if (is_singular() && pings_open()) {
            echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
        }
    }
}

if (!function_exists('naturis_social_share')) {
    function naturis_social_share() {
        get_template_part('template-parts/socials');
    }
}

if (!function_exists('naturis_update_comment_fields')) {
    function naturis_update_comment_fields($fields) {

        $commenter = wp_get_current_commenter();
        $req       = get_option('require_name_email');
        $aria_req  = $req ? "aria-required='true'" : '';

        $fields['author']
            = '<p class="comment-form-author">
			<input id="author" name="author" type="text" placeholder="' . esc_attr__("Your Name *", "naturis") . '" value="' . esc_attr($commenter['comment_author']) .
              '" size="30" ' . $aria_req . ' />
		</p>';

        $fields['email']
            = '<p class="comment-form-email">
			<input id="email" name="email" type="email" placeholder="' . esc_attr__("Email Address *", "naturis") . '" value="' . esc_attr($commenter['comment_author_email']) .
              '" size="30" ' . $aria_req . ' />
		</p>';

        $fields['url']
            = '<p class="comment-form-url">
			<input id="url" name="url" type="url"  placeholder="' . esc_attr__("Your Website", "naturis") . '" value="' . esc_attr($commenter['comment_author_url']) .
              '" size="30" />
			</p>';

        return $fields;
    }
}

add_filter('comment_form_default_fields', 'naturis_update_comment_fields');

if (!function_exists('naturis_update_comment_review_fields')) {
    function naturis_update_comment_review_fields($comment_form) {
        $commenter = wp_get_current_commenter();

        $name_email_required = (bool)get_option('require_name_email', 1);
        $fields              = array(
            'author' => array(
                'label'    => esc_html__('Name', 'naturis'),
                'type'     => 'text',
                'value'    => $commenter['comment_author'],
                'required' => $name_email_required,
            ),
            'email'  => array(
                'label'    => esc_html__('Email', 'naturis'),
                'type'     => 'email',
                'value'    => $commenter['comment_author_email'],
                'required' => $name_email_required,
            ),
        );

        $comment_form['fields'] = array();

        foreach ($fields as $key => $field) {
            $field_html = '<p class="comment-form-' . esc_attr($key) . '">';

            $field_html .= '<input id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" type="' . esc_attr($field['type']) . '" value="' . esc_attr($field['value']) . '" size="30" ' . ($field['required'] ? 'required' : '') . ' placeholder="'. esc_html($field['label']) .' *"' .' />';

            $field_html .= '</p>';

            $comment_form['fields'][$key] = $field_html;
        }

        if (wc_review_ratings_enabled()) {
            $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__('Your rating', 'naturis') . (wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '') . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__('Rate&hellip;', 'naturis') . '</option>
						<option value="5">' . esc_html__('Perfect', 'naturis') . '</option>
						<option value="4">' . esc_html__('Good', 'naturis') . '</option>
						<option value="3">' . esc_html__('Average', 'naturis') . '</option>
						<option value="2">' . esc_html__('Not that bad', 'naturis') . '</option>
						<option value="1">' . esc_html__('Very poor', 'naturis') . '</option>
					</select></div>';
        }
        $comment_form['comment_field'] .= '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" required placeholder="' . esc_html__('Your review *', 'naturis') . '"></textarea></p>';

        return $comment_form;
    }
}
add_filter('woocommerce_product_review_comment_form_args', 'naturis_update_comment_review_fields');


function naturis_replace_categories_list($output, $args) {
    if ($args['show_count'] = 1) {
        $pattern     = '#<li([^>]*)><a([^>]*)>(.*?)<\/a>\s*\(([0-9]*)\)\s*#i';  // removed ( and )
        $replacement = '<li$1><a$2><span class="cat-name">$3</span> <span class="cat-count">($4)</span></a>';
        return preg_replace($pattern, $replacement, $output);
    }
    return $output;
}

add_filter('wp_list_categories', 'naturis_replace_categories_list', 10, 2);

function naturis_replace_archive_list($link_html, $url, $text, $format, $before, $after, $selected) {
    if ($format == 'html') {
        $pattern     = '#<li><a([^>]*)>(.*?)<\/a>&nbsp;\s*\(([0-9]*)\)\s*#i';  // removed ( and )
        $replacement = '<li><a$1><span class="archive-name">$2</span> <span class="archive-count">($3)</span></a>';
        return preg_replace($pattern, $replacement, $link_html);
    }
    return $link_html;
}

add_filter('get_archives_link', 'naturis_replace_archive_list', 10, 7);


add_filter('bcn_breadcrumb_title', 'naturis_breadcrumb_title_swapper', 3, 10);
function naturis_breadcrumb_title_swapper($title, $type, $id) {
    if (in_array('home', $type)) {
        $title = esc_html__('Home', 'naturis');
    }
    return $title;
}
