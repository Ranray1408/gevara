<?php

/**
 * Custom header template
 *
 * @package WP-rock
 */

global $global_options;

?>

<header id="site-header" class="site-header js-site-header">
    <div class="container site-header__container">

        <div class="site-header__container-inner">
            <nav class="site-header__menu-wrapper">
                <?php
                wp_nav_menu([
                    'menu' => 'Main menu',
                    'echo' => true,
                    'container' => false,
                    'menu_class' => 'site-header__menu',
                ]);
                ?>
            </nav>

            <button data-role="mobile-menu" class="site-header__hamburger js-site-header-hamburger">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <path d="M26.045 3.95454H3.9541V6.40909H26.045V3.95454Z" fill="#25292C" />
                    <path d="M26.045 23.5909H3.9541V26.0455H26.045V23.5909Z" fill="#25292C" />
                    <path d="M26.045 13.7727H3.9541V16.2273H26.045V13.7727Z" fill="#25292C" />
                </svg>
            </button>
        </div>
    </div>
</header>
