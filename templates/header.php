<header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="<?= esc_url(home_url('/')); ?>">
                    <?php $logo = get_field('logotyp'); ?>
                    <img class="logo" src="<?php echo $logo["url"]?>">
                </a>
                <a href="#" class="menu-toggle">
                    <div class="icon-content">
                        <img class="menu-icon" src="<?php echo get_template_directory_uri(); ?>/dist/images/svg/menu.svg">
                        <img class="menu-icon-exit" src="<?php echo get_template_directory_uri(); ?>/dist/images/svg/exit.svg">
                    </div><!-- .icon-content -->
                </a><!-- .menu-toggle -->
            </div><!-- .col-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
</header>
<nav class="menu">
    <?php if (has_nav_menu('primary_navigation')) : ?>
        <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']); ?>
    <?php endif; ?>
</nav><!-- .menu -->