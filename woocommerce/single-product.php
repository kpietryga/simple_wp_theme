<?php
/**
 * Template for displaying single product content.
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <!-- Główne zdjęcie produktu -->
            <?php
            do_action('woocommerce_before_single_product');
            if (post_password_required()) {
                echo get_the_password_form();
                return;
            }
            woocommerce_show_product_images();
            ?>
        </div>
        <div class="col-md-6">
            <h1 class="product-title"><?php the_title(); ?></h1>
            <div class="product-price mb-3">
                <?php woocommerce_template_single_price(); ?>
            </div>
            <div class="product-description mb-4">
                <?php woocommerce_template_single_excerpt(); ?>
            </div>
            <div class="add-to-cart">
                <?php woocommerce_template_single_add_to_cart(); ?>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h2>Product Details</h2>
            <?php woocommerce_output_product_data_tabs(); ?>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h2>Related Products</h2>
            <?php woocommerce_output_related_products(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>