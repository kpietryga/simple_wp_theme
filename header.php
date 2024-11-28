<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<header class="bg-light py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <h1 class="mb-0">
            <a href="<?php echo home_url(); ?>" class="text-decoration-none text-dark">
                <?php bloginfo('name'); ?>
            </a>
        </h1>
        <p class="mb-0 small text-muted"><?php bloginfo('description'); ?></p>
        <!-- Navigation -->
        <nav>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => 'navbar-nav flex-row gap-3',
                'add_li_class' => 'nav-item',
                'link_class' => 'nav-link text-dark'
            ));
            ?>
        </nav>
    </div>
</header>