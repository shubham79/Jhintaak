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
	'category' => '',
	'number'=>-1,
	'columns_count'=>'4',
	'icon' => '',
	'el_class' => ''
), $atts ) );
// echo $atts['columns_count'];
// die;
switch ($columns_count) {
	case '6':
		$class_column='col-sm-4 col-md-2';
		break;
	case '4':
		$class_column='col-sm-3 col-md-3';
		break;
	case '3':
		$class_column='col-sm-4';
		break;
	case '2':
		$class_column='col-sm-6';
		break;
	default:
		$class_column='col-sm-12';
		break;
}
$_id = wpo_makeid();
if($category=='') return;
$_count = 1;
$args = array(
	'post_type' => 'product',
	'posts_per_page' => $number,
	'product_cat' => $category,
	'post_status' => 'publish'
);
global $wpdb;
$sql = "SELECT name FROM $wpdb->terms where slug = '{$category}'";
$categoryname = $wpdb->get_var($sql);
$loop = new WP_Query( $args );

if ( $loop->have_posts() ) : ?>
	<div class="wpo_productcategory woocommerce<?php echo (($el_class!='')?' '.$el_class:''); ?>">
		<div class="box-heading">
			<?php if($icon!=''){ ?>
			<i class="fa <?php echo $icon; ?>"></i>
			<?php } ?>
			<span><?php echo $categoryname; ?></span>
		</div>
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


