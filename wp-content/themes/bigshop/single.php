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
$config = $wpo->configLayout(of_get_option('single-layout','0-1-0'));
?>
<?php get_header($wpo->getHeaderLayout()); ?>

<?php wpo_breadcrumb(); ?>

<section id="wpo-mainbody" class="container wpo-mainbody">
	<div class="row">
		<!-- MAIN CONTENT -->
		<div id="wpo-content" class="wpo-content <?php echo $config['main']['class']; ?>">
			<div class="post-area single-blog wrapper">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'templates/single/single' ); ?>
				<?php endwhile; ?>
			</div>
		</div>
		<!-- //MAIN CONTENT -->
		<?php /******************************* SIDEBAR LEFT ************************************/ ?>
		<?php if($config['left-sidebar']['show']){ ?>
			<div class="wpo-sidebar wpo-sidebar-1 <?php echo $config['left-sidebar']['class']; ?>">
				<?php if(is_active_sidebar(of_get_option('left-sidebar'))): ?>
				<div class="sidebar-inner">
					<?php dynamic_sidebar(of_get_option('left-sidebar')); ?>
				</div>
				<?php endif; ?>
			</div>
		<?php } ?>
		<?php /******************************* END SIDEBAR LEFT *********************************/ ?>

		<?php /******************************* SIDEBAR RIGHT ************************************/ ?>
		<?php if($config['right-sidebar']['show']){ ?>
			<div class="wpo-sidebar wpo-sidebar-2 <?php echo $config['right-sidebar']['class']; ?>">
				<?php if(is_active_sidebar(of_get_option('right-sidebar'))): ?>
				<div class="sidebar-inner">
					<?php dynamic_sidebar(of_get_option('right-sidebar')); ?>
				</div>
				<?php endif; ?>
			</div>
		<?php } ?>
		<?php /******************************* END SIDEBAR RIGHT *********************************/ ?>
	</div>
</section>

<?php get_footer( $wpo->getFooterLayout() ); ?>