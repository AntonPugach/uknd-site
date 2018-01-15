<?php
	if(ale_get_meta('bus_counter')) {
		$count = ale_get_meta('bus_counter') + 1;
		update_post_meta( $post->ID, 'ale_bus_counter', $count );
	}
	else update_post_meta( $post->ID, 'ale_bus_counter', 1 );
	update_post_meta( $post->ID, 'ale_browsing', current_time('mysql') );
?>
<?php get_header(); ?>
	<!-- Content -->
	<div class="wraper main_area">
		<div class="work_area">
			<div class="singl_blog_area">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="singl_blog_meta">
						<i class="fa fa-calendar" aria-hidden="true"></i> <span><?php the_time('F j, Y'); ?></span>
						<i class="fa fa-eye" aria-hidden="true"></i> <span><?php echo ale_get_meta('bus_counter'); ?> просмотров</span>
						<i class="fa fa-comments" aria-hidden="true"></i> <span><?php comments_number( '0 коментариев', '1 коментарий', '% коментариев' ); ?></span>
					</div>
					<?php if (has_post_thumbnail()) : ?>
						<div class="singl_blog_thumb">
							<img src="<?php the_post_thumbnail_url( $size = 'full' ); ?>" alt="" />
						</div>
					<?php endif; ?>
					<div class="singl_blog_text">
						<?php the_content(); ?>
					</div>
				<?php endwhile; else: ?>
					<?php ale_part('notfound')?>
				<?php endif; ?>
				<?php comments_template(); ?>
			</div>
		</div>
		<?php get_sidebar() ?>
	</div>
<?php get_footer(); ?>