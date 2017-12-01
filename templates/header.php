<header class="banner">
    <div class="container">
        <a href="<?= esc_url(home_url('/')); ?>">
            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.png">
        </a>
        <nav class="nav-primary">
            <?php
            if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
            endif;
            ?>
        </nav>
    </div>
</header>