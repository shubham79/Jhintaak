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
global $post;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-container">
		<div class="post-thumb">
			<?php
				if ( has_post_format( 'video' ) && wpo_is_embed() ) {
				?>
					<div class="video-responsive">
						<?php wpo_embed(); ?>
					</div>
				<?php
				}
				else if ( has_post_format( 'audio' ) && wpo_is_embed() ) {
				?>
					<div class="audio-thumb audio-responsive">
						<?php wpo_embed(); ?>
					</div>
				<?php
				}
				else if ( has_post_format( 'gallery' )) {
					if( wpo_is_gallery() ){
						$_imgs = wpo_gallery();
				?>
					<div id="post-slide-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php foreach ($_imgs as $key => $_img) {
								echo '<div class="item '.(($key==0)?'active':'').'">';
									echo '<img src="'.$_img.'" alt="" class="img-responsive">';
								echo '</div>';
							} ?>
						</div>
						<a class="left carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
							<span class="fa fa-angle-left"></span>
						</a>
						<a class="right carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
							<span class="fa fa-angle-right"></span>
						</a>
					</div>
				<?php
					}
				}
				else if (has_post_thumbnail()) {
				?>
				<a href="<?php the_permalink(); ?>" title="">
					<?php the_post_thumbnail('');?>
				</a>
				<?php }
			?>
		</div>
		<h1 class="blog-title"><?php the_title(); ?></h1>
		<div class="post-name">
			<?php if(of_get_option('post-title')){ ?>
			<h2 class="entry-title">
				<?php the_title(); ?>
			</h2>
			<?php } ?>
			<p class="entry-meta entry-header">
				<span class="published"><?php the_time( 'M d, Y' ); ?></span>
				<span class="meta-sep"> / </span>
				<span class="comment-count">
					<?php comments_popup_link(__(' 0 comment', TEXTDOMAIN), __(' 1 comment', TEXTDOMAIN), __(' % comments', TEXTDOMAIN)); ?>
				</span>
				<span class="meta-sep"> / </span>
				<span class="author-link"><?php the_author_posts_link(); ?></span>
				<span class="meta-sep"> / </span>
				<?php _e('Category',TEXTDOMAIN); ?>: <?php the_category(', '); ?>
				<?php if(is_tag()): ?>
				<span class="meta-sep"> / </span>
				<span class="tag-link"><?php the_tags('Tags: ',', '); ?></span>
				<?php endif; ?>
			</p>
		</div>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div>

		<div class="post-share">
			<div class="row">
				<div class="col-sm-4">
					<h4><?php echo __( 'Share this Post!',TEXTDOMAIN ); ?></h4>
				</div>
				<div class="col-sm-8">
					<?php wpo_share_box(); ?>
				</div>
			</div>
		</div>

		<div class="author-about">
			<?php get_template_part('templates/author-bio'); ?>
		</div>

		<?php comments_template(); ?>
	</div><!--  End .post-container -->
</article>