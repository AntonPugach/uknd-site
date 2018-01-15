<?php
/**
 * Template Name: Template Blog
 */
get_header(); ?>
	<!-- Content -->
	<div class="wraper main_area">
		<div class="work_area">
			<div class="blog_area">
				<?php /* Display the widget title if one was input (before and after defined by themes). */
					if ( $title )
						echo $before_title . $title . $after_title;
				?>
				<?php 
					$query = new WP_Query(array(
					'posts_per_page'		=> $number,
					'ignore_sticky_posts'	=> 1,
					));
				?>
				<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
				<?php  $image = ale_get_og_meta_image(); ?>
				<div class="blog_content">
					<div class="left_cont col-md-8">
					<?php if ($image) : ?>
						<div class="blog_thumb"><a href="<?php the_permalink(); ?>"><img src="<?php echo $image?>" alt="" /></a>
						</div>
					<?php endif; ?>
						<div class="blog_detail"><?php echo the_content('Читать далее...'); ?></div>
					</div>
					<div class="right_cont col-md-4">
						<h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<span class="blog-meta"><?php the_time('F j, Y'); ?></span>
					</div>
				</div>
				<?php endwhile; endif; ?>	
				<?php wp_reset_query(); ?>
			</div>
		</div>
		<?php get_sidebar() ?>
	</div>

<?php get_footer(); ?>