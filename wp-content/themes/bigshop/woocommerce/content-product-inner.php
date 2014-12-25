<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Opal  Team <opalwordpressl@gmail.com >
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http:/wpopal.com
 * @support  http://wpopal.com
 */
global $product;
?>
<div class="product-block product product-grid">
	<div class="product-image">
		<div class="image">
            <a href="<?php the_permalink(); ?>">
                <?php
                    /**
                     * woocommerce_before_shop_loop_item_title hook
                     *
                     * @hooked woocommerce_show_product_loop_sale_flash - 10
                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                     */
                    do_action( 'woocommerce_before_shop_loop_item_title' );

                ?>
    		</a>
		</div>
	</div>

	<div class="product-meta">
		<div class="name">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</div>

		<?php
            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action( 'woocommerce_after_shop_loop_item_title' );
        ?>
        <div class="button-groups">
                <?php
                    if( class_exists( 'YITH_WCWL' ) ) {
                        echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                    }
                ?>
                <?php
                     /**
                     * woocommerce_after_shop_loop_item hook
                     *
                     * @hooked woocommerce_template_loop_add_to_cart - 10
                     */
                    do_action( 'woocommerce_after_shop_loop_item' );

                ?>

                <?php
                    $action_add = 'yith-woocompare-add-product';
                    $url_args = array(
                        'action' => $action_add,
                        'id' => $product->id
                    );
                ?>
                <?php if( class_exists( 'YITH_Woocompare' ) ) { ?>
                    <a href="<?php echo wp_nonce_url( add_query_arg( $url_args ), $action_add ); ?>"
                        class="btn btn-compare compare"
                        data-product_id="<?php echo $product->id; ?>">
                        <i class="fa fa-refresh"></i>
                        <span><?php echo __('add to compare',TEXTDOMAIN); ?></span>
                    </a>
                <?php } ?>

        </div>

        <div class="quick-view">
            <a href="#" class="btn btn-quickview quickview"
                data-productslug="<?php echo $product->post->post_name; ?>"
                data-toggle="modal"
                data-target="#wpo_modal_quickview"
            >
                <span><?php echo __('Quick view',TEXTDOMAIN); ?></span>
            </a>
        </div>
	</div>
</div>