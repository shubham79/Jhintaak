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
	'title' => '',
	'number'=>-1,
	'icon'=>'',
	'el_class'=>''
), $atts ) );

$_id = wpo_makeid();
$args = array(
	'post_type' => 'testimonial',
	'posts_per_page'=>$number
);
$loop = new WP_Query($args);

if ( $loop->have_posts() ) : ?>
<?php
	$_count = 1;

?>
	<section class="box<?php echo (($el_class!='')?' '.$el_class:''); ?>">
		<div class="box-heading">
			<?php if($icon!=''){ ?>
			<i class="fa <?php echo $icon; ?>"></i>
			<?php } ?>
			<span><?php echo $title; ?></span>
		</div>
		<div class="box-content">
			<div class="box-products wrapper no-margin slide" id="productcarouse-<?php echo $_id; ?>">
				<div class="carousel-controls">
					<a href="#productcarouse-<?php echo $_id; ?>" data-slide="prev">
						<span class="conner"><i class="fa fa-angle-left"></i></span>
					</a>
					<a href="#productcarouse-<?php echo $_id; ?>" data-slide="next">
						<span class="conner"><i class="fa fa-angle-right"></i></span>
					</a>
				</div>
				<div class="carousel-inner">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
					<div class="item<?php echo ($_count==1)?" active":"" ; ?>">
						<?php the_post_thumbnail( 'blog-thumbnails' ); ?>
					</div>
					<?php $_count++; ?>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php wp_reset_postdata(); ?>