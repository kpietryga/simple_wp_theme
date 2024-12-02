<?php
/**
 * Template for displaying the WooCommerce cart page.
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<div class="container py-5">
    <h1 class="text-center mb-4">Your Cart</h1>

    <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
        <?php do_action('woocommerce_before_cart_table'); ?>

        <table class="table table-bordered cart-table shop_table shop_table_responsive cart woocommerce-cart-form__contents">
            <thead class="thead-light">
                <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-subtotal">Subtotal</th>
                    <th class="product-remove">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                    $_product = $cart_item['data'];
                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0) {
                        $product_permalink = $_product->is_visible() ? $_product->get_permalink($cart_item) : '';
                        ?>
                        <tr class="woocommerce-cart-form__cart-item">
                            <td class="product-thumbnail">
                                <?php
                                $thumbnail = $_product->get_image();
                                echo $thumbnail;
                                ?>
                            </td>
                            <td class="product-name" data-title="Product">
                                <?php
                                if ($product_permalink) {
                                    echo '<a href="' . esc_url($product_permalink) . '">' . $_product->get_name() . '</a>';
                                } else {
                                    echo $_product->get_name();
                                }
                                ?>
                            </td>
                            <td class="product-price" data-title="Price">
                                <?php echo wc_price($_product->get_price()); ?>
                            </td>
                            <td class="product-quantity" data-title="Quantity">
                                <?php
                                woocommerce_quantity_input(array(
                                    'input_name' => "cart[{$cart_item_key}][qty]",
                                    'input_value' => $cart_item['quantity'],
                                    'max_value' => $_product->get_max_purchase_quantity(),
                                    'min_value' => '0',
                                ), $_product);
                                ?>
                            </td>
                            <td class="product-subtotal" data-title="Subtotal">
                                <?php echo wc_price($cart_item['line_total']); ?>
                            </td>
                            <td class="product-remove">
                                <?php
                                echo sprintf(
                                    '<a href="%s" class="btn btn-danger btn-sm" aria-label="Remove item">×</a>',
                                    esc_url(wc_get_cart_remove_url($cart_item_key))
                                );
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="cart-actions mt-3">
            <button type="submit" class="btn btn-primary" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>">
                Update Cart
            </button>
            <?php do_action('woocommerce_cart_actions'); ?>
            <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
        </div>

        <?php do_action('woocommerce_after_cart_table'); ?>
    </form>

    <div class="cart-totals mt-5">
        <?php do_action('woocommerce_cart_collaterals'); ?>
    </div>
</div>

<?php do_action('woocommerce_after_cart'); ?>