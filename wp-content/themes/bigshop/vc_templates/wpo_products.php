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

extract( shortcode_atts( array(
	'number'=>-1,
	'columns_count'=>'4',
	'icon' => '',
	'el_class' => '',
	'type'=>''
), $atts ) );

switch ($columns_count) {
	case '6':
		$class_column='col-sm-4 col-md-2';
		break;
	case '4':
		$class_column='col-md-3 col-sm-3';
		break;
	case '3':
		$class_column='col-md-4 col-sm-4';
		break;
	case '2':
		$class_column='col-md-6 col-sm-6';
		break;
	default:
		$class_column='col-md-12 col-sm-12';
		break;
}

if($type=='') return;

global $woocommerce;

$_id = wpo_makeid();
$_count = 1;
$args = array(
	'post_type' => 'product',
	'posts_per_page' => $number,
	'post_status' => 'publish'
);
switch ($type) {
	case 'best_selling':
		$args['meta_key']='total_sales';
		$args['orderby']='meta_value_num';
		$args['ignore_sticky_posts']   = 1;
		$args['meta_query'] = array();
        $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
        $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
		break;
	case 'featured_product':
		$args['ignore_sticky_posts']=1;
		$args['meta_query'] = array();
		$args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
		$args['meta_query'][] = array(
                     'key' => '_featured',
                     'value' => 'yes'
                 );
		$query_args['meta_query'][] = $woocommerce->query->visibility_meta_query();
		break;
	case 'top_rate':
		add_filter( 'posts_clauses',  array( $woocommerce->query, 'order_by_rating_post_clauses' ) );
		$args['meta_query'] = array();
        $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
        $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
		break;
	case 'recent_product':
		$args['meta_query'] = array();
        $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
		break;
}

$loop = new WP_Query( $args );

if ( $loop->have_posts() ) : ?>
	<div class="woocommerce<?php echo (($el_class!='')?' '.$el_class:''); ?>">
		<div class="box-content">
			<div class="box-products slide" id="productcarouse-<?php echo $_id; ?>">
				<?php if( $number>$columns_count && $loop->found_posts > $columns_count ){ ?>
				<div class="carousel-controls">
					<a href="#productcarouse-<?php echo $_id; ?>" data-slide="prev">
						<span class="conner"><i class="fa fa-angle-left"></i></span>
					</a>
					<a href="#productcarouse-<?php echo $_id; ?>" data-slide="next">
						<span class="conner"><i class="fa fa-angle-right"></i></span>
					</a>
				</div>
				<?php } ?>
				<div class="carousel-inner">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
					<?php if( $_count%$columns_count == 1 ) echo '<div class="item'.(($_count==1)?" active":"").'"><div class="row">'; ?>
						<!-- Product Item -->
						<div class="<?php echo $class_column ?>">
							<?php wc_get_template_part( 'content', 'product-inner' ); ?>
						</div>
						<!-- End Product Item -->
					<?php if( ($_count%$columns_count==0 && $_count!=1) || $_count== $number ) echo '</div></div>'; ?>
					<?php $_count++; ?>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>