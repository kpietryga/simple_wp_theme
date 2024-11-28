<?php
get_header();
?>

<main class="container py-5">
    <h1 class="text-center">Shop</h1>
    <?php if (woocommerce_product_loop()) : ?>
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-4 mb-4">
                    <?php wc_get_template_part('content', 'product'); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <?php woocommerce_pagination(); ?>
    <?php else : ?>
        <p>No products found</p>
    <?php endif; ?>
</main>

<?php
get_footer();