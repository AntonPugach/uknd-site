<?php get_header(); ?>

	<!-- Content -->
	get_header();?>

<div class="wraper main_area">
	<div class="col-lg-9 col-md-9 col-sm-9 col-xl-9 work_area">
		<h2>Продажа бизнеса в Украине:</h2>
		<form role="search" method="get" class="search-form form-inline" action="http://uknd-site/">
			<label class="sr-only">Поиск:</label>
			<div class="input-group fut_search">
				<input type="search" value="" name="s" class="search-field form-control search_area" placeholder="Введите название объекта для поиска бизнеса" required>
				<button type="submit" class="search-submit btn btn-info"><i class="fa fa-search" aria-hidden="true"></i> поиск</button>
			</div>
		</form>
		<div class="blurb_con">
			<ul class="last_blurb">
				<?php
				$args=array(
					'post_type' => 'blurbs',
					'showposts'=> 4,
					'meta_key' => 'ale_bus_type',
					'order'				=> 'DESC',
					'orderby'			=> 'post_date',
					'meta_query' => array(
						array(
							'key' => 'ale_bus_type',
							'value' => 'a:1:{i:0;s:1:"3";}',
						),
					),
				);

				$blurbs = get_posts($args);
				foreach ($blurbs as $post)
				{
					setup_postdata($post); ?>
					<li class="col-lg-6 col-md-6 col-sm-6 col-xl-6 blurb">
						<div class="blurb_h"><?php the_title(); ?></div>
						<div class="blurb_i">
							<a href="<?php the_permalink(); ?>">
								<div class="img_content">
									<img src="<?php echo the_post_thumbnail_url(); ?>">
								</div>
								<div class="blurb_date"><?php echo get_the_date(); ?></div>
								<div class="blurb_price"><?php echo ale_get_meta('cost'); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
							</a>
						</div>
						<div class="blurb_c">
							<p>Прибыль:<font style="float: right;"><?php echo ale_get_meta('proceeds_mouth'); ?> <i class="fa fa-rub" aria-hidden="true"></i></font></p>
							<p>Город:<font style="float: right;"><?php echo get_term(implode(ale_get_meta('areal')))->name; ?></font></p>
							<p>Окупаемость:<font style="float: right;"><?php echo ale_get_meta('term'); ?> мес.</font></p>
						</div>
						<div style="text-align: center; line-height: 40px;"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
					</li>
				<?php }
				wp_reset_postdata(); ?>
				</ul>
			<h3>Последние поступления франшиз</h3>
			<ul class="last_blurb">
				<?php
				$args=array(
					'post_type' => 'blurbs',
					'showposts'=>4,
					'meta_key' => 'ale_bus_type',
					'order'				=> 'DESC',
					'orderby'			=> 'meta_value',
					'meta_query' => array(
						array(
							'key' => 'ale_bus_type',
							'value' => 'a:1:{i:0;s:1:"4";}',
						),
					),
				);

				$blurbs = get_posts($args);
				foreach ($blurbs as $post)
				{
					setup_postdata($post); ?>
					<li class="col-lg-6 blurb">
						<div class="blurb_h"><?php the_title(); ?></div>
						<div class="blurb_i">
							<a href="<?php the_permalink(); ?>">
								<div class="img_content">
									<img src="<?php echo the_post_thumbnail_url(); ?>">
								</div>
								<div class="blurb_date"><?php echo get_the_date(); ?></div>
								<div class="blurb_price"><?php echo ale_get_meta('cost'); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
							</a>
						</div>
						<div class="blurb_c">
							<p>Прибыль:<font style="float: right;"><?php echo ale_get_meta('proceeds_mouth'); ?> <i class="fa fa-rub" aria-hidden="true"></i></font></p>
							<p>Город:<font style="float: right;"><?php echo get_term(implode(ale_get_meta('areal')))->name; ?></font></p>
							<p>Окупаемость:<font style="float: right;"><?php echo ale_get_meta('term'); ?> мес.</font></p>
						</div>
						<div style="text-align: center; line-height: 40px;"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
					</li>
				<?php }
				wp_reset_postdata(); ?>
			</ul>
		</div>		
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xl-3 side_bar">
		<div class="side_bar-menu">
			<ul>
				<li>1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
				<li>5</li>
				<li>6</li>
				<li>7</li>
			</ul>
		</div>
		<div class="last_blurbs">
			<header>Последние просмотренныне</header>
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
</div>
	
<?php get_footer(); ?>