<?php

/**
 * Custom footer template
 *
 * @package WP-rock
 */

?>

<footer id="site-footer" class="site-footer">
    <div class="container site-footer__container">
        <?php if ($logo) : ?>
            <a class="site-footer__logo" href="<?php echo get_site_url(); ?>">
                <img src="<?php echo $logo; ?>" alt="foter logo" />
            </a>
        <?php endif; ?>

        <div class="site-footer__menu-wrapper">
            <?php
            wp_nav_menu([
                'menu'       => 'Footer Main menu',
                'echo'       => true,
                'container'  => false,
                'menu_class' => 'site-footer__menu',
            ]);

            if (!empty($copyright)) {
                echo '<p class="site-footer__ps">' . do_shortcode($copyright) . '</p>';
            }
            ?>
        </div>

        <div class="site-footer__social-wrapper">
            <?php
            wp_nav_menu([
                'menu'       => 'Footer menu',
                'echo'       => true,
                'container'  => false,
                'menu_class' => 'site-footer__policy-menu',
            ])
            ?>
        </div>
    </div>
</footer>
