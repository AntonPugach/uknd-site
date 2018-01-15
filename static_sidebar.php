<div class="side_bar">
	<header class="side_head">Бизнес услуги</header>
	<div class="side_bar-menu">
		<?php echo do_shortcode( "[hmenu id=2]" ); ?>
	</div>
	<div class="last_blurbs">
		<header class="side_head">Последние просмотренные</header>
		<article>
			<?php
			$args = array(
				'post_type' => 'blurbs',
				'showposts'=>3,
				'meta_key' => 'ale_browsing',
				'order'				=> 'DESC',
				'orderby'			=> 'meta_value',
			);
			$blurbs = get_posts( $args );
			foreach ( $blurbs as $post )
			{
				setup_postdata($post); ?>
				<div class="last_blurb">
					<a href="<?php the_permalink(); ?>">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 adv_img">
							<img src="<?php echo the_post_thumbnail_url(); ?>">
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xl-8 last_blurb_content">
							<p><?php the_title(); ?></p>
							<p><?php echo ale_get_meta('cost'); ?> грн</p>
						</div>
					</a>
				</div>
			<?php }
			wp_reset_postdata(); ?>
		</article>
	</div>
</div>