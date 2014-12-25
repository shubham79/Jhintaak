<?php get_header(); ?>                          

		<div class="content">
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post-main"> <center><h1><?php _e('Search Results for: ', 'ecogray') ?><?php echo get_search_query(); ?></h1></center>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span>(<?php the_date(); ?>)</span></h1>
				<div class="post">
					<a href="<?php the_permalink(); ?>"></a>
					<?php the_excerpt(); ?>
				</div>
			</div> 
			<?php endwhile; ?>
			<div class="nav">
				<?php posts_nav_link(); ?>
			</div>
			<?php else : ?>
			<div class="post-main"> 
				<h1>No found.</h1>
			</div> 		
			<?php endif; ?>
		</div><div class="row">

</div>
	</div></div>
<?php get_footer(); ?>